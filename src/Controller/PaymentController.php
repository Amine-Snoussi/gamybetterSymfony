<?php

namespace App\Controller;

use App\Repository\CommandeRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

class PaymentController extends AbstractController
{
    /**
     * @Route("/payment", name="app_payment")
     */
    public function index(): Response
    {
        return $this->render('payment/index.html.twig', [
            'controller_name' => 'PaymentController',
        ]);
    }

    /**
     * @Route("/checkout", name="checkout")
     */
    public function checkout($stripeSK,SessionInterface $session,ProduitRepository $produitRepository): Response
    {
        $total=0;
        $panier = $session->get("panier", []);
        foreach ($panier as $id => $quantite) {
            $produit = $produitRepository->find($id);

            $total += $produit->getPrixUnitair() * $quantite;
        \Stripe\Stripe::setApiKey($stripeSK);
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $produit->getNomProduit(),

                    ],
                    'unit_amount' => $total*100,
                ],
              'quantity'=>1,
            ]],

            'mode' => 'payment',
            'success_url' => $this->generateUrl('success_url',[],
            UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url' => $this->generateUrl('cancel_url',[],
            UrlGeneratorInterface::ABSOLUTE_URL),
        ]);
        }


        return $this->redirect($session->url,303);
    }

    /**
     * @Route("/success-url", name="success_url")
     */
    public function successURL(MailerInterface $mailer,CommandeRepository $repository): Response
    {

        $commande=$repository->find(1);
        /** sending mail to the new trainee **/
        $email = (new Email())
            ->from('azizabouda131@gmail.com')
            ->to('fares.chobba@esprit.tn')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Welcome to GamyBetter !')
            ->text('Thank you for your Purchase')
            ->html($this->renderView(
                'commande/mail_temp.html.twig',[
                'commande' => $commande,
                'titre' => 'Purchase bill',

            ]));
        $mailer->send($email);
        return $this->render('payment/success.html.twig', []);
    }
    /**
     * @Route("/cancel-url", name="cancel_url")
     */
    public function cancelURL(): Response
    {
        return $this->render('payment/cancel.html.twig', []);
    }
}

