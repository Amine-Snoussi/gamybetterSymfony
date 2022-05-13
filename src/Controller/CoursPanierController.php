<?php

namespace App\Controller;

use App\Entity\Basket;
use App\Entity\Cours;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CoursRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


/**
 * @Route("/panierCours", name="panierCours")
 */
class CoursPanierController extends AbstractController
{

    /**
     * @Route("/", name=".index")
     */
    public function CarteShow(SessionInterface $session, CoursRepository $coursRepository, Request $request): Response
    {
        dump($session->get('panier'));

        $panier = $session->get('panier', []);
        $panierWithData = [];
        foreach ($panier as $id => $quantity) {
            $produit = $coursRepository->find($id);

            $panierWithData[] = [
                'produit' => $produit,
                'quantity' => $quantity,
                'nom' => $produit->getNom(),
                'price' => $produit->getPrix()

            ];
        }

        $total = 0;
        $totalPrice = 0;
        foreach ($panierWithData as $item) {
            $totalitem = $item['produit']->getPrix() * $item['quantity'];
            $total += $totalitem;
            $totalPrice += $item['price'];
        }

        return $this->render('cours_panier/index.html.twig', [
            'items' => $panierWithData,
            'total' => $total,

        ]);
    }

    /**
     * @Route("/panier/add/{id}", name=".card_add")
     */
    public function addCarte($id, SessionInterface $session): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $panier = $session->get('panier', []);
        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }
        $session->set('panier', $panier);
        return $this->redirectToRoute("panierCours.index");
    }


}
