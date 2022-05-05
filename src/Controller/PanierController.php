<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Panier;
use App\Entity\Personne;
use App\Form\inputType;
use App\Form\PanierType;
use App\Repository\CommandeRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/panier")
 */
class PanierController extends AbstractController
{
    /**
     * @Route("/", name="cart_index")
     */
    public function index(SessionInterface $session, ProduitRepository $produitRepository)
    {
        $panier = $session->get("panier", []);

        // On "fabrique" les données
        $dataPanier = [];
        $total = 0;


        foreach($panier as $id => $quantite){
            $produit = $produitRepository->find($id);
            $dataPanier[] = [
                "produit" => $produit,
                "quantite" => $quantite
            ];
            $total += $produit->getPrixUnitair() * $quantite;
        }

        return $this->render('panier/Cart.html.twig', compact("dataPanier", "total"));

    }

    /**
     * @Route("/add/{id}", name="add")
     */
    public function add($id, SessionInterface $session)
    {

            // On récupère le panier actuel
        $panier = $session->get("panier", []);


        if(!empty($panier[$id])){
            $panier[$id]++;

        }else{
            $panier[$id] = 1;
        }

        // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/remove/{id}", name="remove")
     */
    public function remove($id, SessionInterface $session)
    {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);


        if(!empty($panier[$id])){
            if($panier[$id] > 1){
                $panier[$id]--;
            }else{
                unset($panier[$id]);
            }
        }

        // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/delete/{id}", name="product_cart_delete")
     */
    public function delete($id, SessionInterface $session)
    {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);

        if(!empty($panier[$id])){
            unset($panier[$id]);
        }

        // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/delete", name="delete_all")
     */
    public function deleteAll(SessionInterface $session)
    {
        $session->remove("panier");

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/save", name="save")
     */
    public function save(SessionInterface $session,ProduitRepository $produitRepository,EntityManagerInterface $entityManager)
    {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);
        //dd($panier);
        $total = 0;
        $quantite = 0;
        $p = 0;

        foreach ($panier as $id => $quantite) {
            $produit = $produitRepository->find($id);
            $dataPanier[] = [
                "produit" => $produit,
                "quantite" => $quantite
            ];
            $total += $produit->getPrixUnitair() * $quantite;
        }
        //dd($dataPanier);

        $com = new Commande();
        $com->setPrixTotale($total);

        $user = $this->getDoctrine()->getRepository(Personne::class)->find(1);
        $com->setIdpersonne($user);
        $com->setNomPersonne($user->getNom());
        $com->setDateCommande(new \DateTime('now'));
        $com->setEmailPersonne($user->getEmail());
        $com->setAddressPersonne('Cité mileha ');
        $com->setDiscount(0);
        $entityManager->persist($com);
        $entityManager->flush();
        return $this->redirectToRoute("checkout");

    }
}
