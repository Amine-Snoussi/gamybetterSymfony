<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Repository\CoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Stripe\Exception\ApiErrorException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class StripeController extends AbstractController
{
    private $session;

    public function __construct(EntityManagerInterface $objectManager = null)
    {
        $this->session = new Session();
        $this->objectManager = $objectManager;
    }

    /**
     * @Route("/payment", name="payment")
     */
    public function index(): Response
    {
        return $this->render('Stripe/index.html.twig', [
            'controller_name' => 'StripeController',
        ]);
    }


    /**
     * @Route("/checkout", name="checkout")
     * @param $stripeSK
     * @param SessionInterface $session
     * @param CoursRepository $coursRepository
     * @return Response
     * @throws ApiErrorException
     */
    public function checkout($stripeSK, SessionInterface $session, CoursRepository $coursRepository): Response
    {
        $products = $session->get('panier');
        $totalPrice = 0;
        $quantity = 0;
        foreach ($products as $key => $value) {
            $totalPrice = $totalPrice + $coursRepository->find($key)->getPrix();
            $quantity++;
        }
        $totalPrice = $totalPrice * 100;


        $this->getParameter('stripeSK');
        Stripe::setApiKey($stripeSK);


        $session = Session::create([
            'payment_method_types' => ['card'],
            'customer_email' => 'customer@example.com',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Total commande',
                        ],
                        'unit_amount' => $totalPrice,
                    ],
                    'quantity' => $quantity,
                ]
            ],
            'mode' => 'payment',
            'success_url' => $this->generateUrl('success_url', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url' => $this->generateUrl('cancel_url', [], UrlGeneratorInterface::ABSOLUTE_URL),
        ]);
        dump($session);

        return $this->redirect($session->url, 303);
    }


    /**
     * @Route("/success-url", name="success_url")
     * @param MailerInterface $mailer
     * @param SessionInterface $session
     * @param CoursRepository $coursRepository
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function successUrl(MailerInterface $mailer, SessionInterface $session,CoursRepository $coursRepository): Response
    {
        $products = $session->get('panier');
        foreach ($products as $key => $value) {
            $cours = $coursRepository->find($key);
            $cours->setRating($cours->getRating()+0.1);
            try {
                $coursRepository->add($cours);
            } catch (OptimisticLockException|ORMException $e) {
            }
        }
        //$this->clear();
        $email = (new Email())
            ->from('skander.gassa@esprit.tn')
            ->to('skander.gassa@esprit.tn')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Purchase')
            ->text('this is your ID and Pass!')
            ->html('<h2>Hello  </h2><br>
                    <p>Thank you for your purchase from ou site<br>
                    
                    feel free buy whatever you desire</p>');
        $mailer->send($email);

        return $this->render('stripe/success.html.twig', []);
    }


    /**
     * @Route("/cancel-url", name="cancel_url")
     */
    public function cancelUrl(): Response
    {
        return $this->render('stripe/cancel.html.twig', []);
    }

    /*public function clear()
    {
        $this->session->remove('products');
    }

    public function remove(Cours $cours)
    {
        $products = $this->all();
        unset($products[$cours->getId()]);
        $this->session->set('products', $products);
    }*/
}
