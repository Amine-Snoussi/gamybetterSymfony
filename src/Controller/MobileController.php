<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


class MobileController extends AbstractController
{
    /**
     * @Route("/mobile", name="app_mobile")
     */
    public function index(): Response
    {
        return $this->render('mobile/index.html.twig', [
            'controller_name' => 'MobileController',
        ]);
    }

    /**
     * @Route("/ajouterProduitMobile", name="ajouter",methods={"GET"})
     * @param Request $request
     * @param EntityManagerInterface $en
     * @return Response
     */
    public function add(Request $request, EntityManagerInterface $en){

        $en=$this->getDoctrine()->getManager();
        $produit=new Produit();
        dd($request->query);
        $produit->setGame((String)$request->query->get('game'));
        $produit->setDescription((String)$request->query->get('description'));
        $produit->setNomProduit((String)$request->query->get('nom_produit'));
        $produit->setCategorie((String)$request->query->get('categorie'));
        $produit->setStars(0);
        $produit->setQuantiteStock(0);
        $produit->setDiscount(0);
        $produit->setPrixUnitair(0);
        $produit->setImage(' empty');
        $en->persist($produit);
        $en->flush();

        return new Response('Produit Ajouté');
    }
    /**
     * @Route("/listeProduitMobile", name="liste", methods={"GET"})
     */
    public function liste(ProduitRepository $repository ,SerializerInterface $serializer): Response
    {
        $produit=$repository->findAll();
        $jsonContent=$serializer->serialize($produit,'json',['groups' => 'produit']);
        $response=new Response($jsonContent);
        $response->headers->set('Content-Type','application/json');
        return $response;
    }

}
