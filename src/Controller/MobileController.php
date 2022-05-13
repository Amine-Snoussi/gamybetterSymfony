<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Repository\EquipeRepository;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
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
    /*/**
     *
     * @Route("/equipeMobile/listeEquipes", name="listeEquipes")
     */
    /*public function listeEquipes(EquipeRepository $repository ,SerializerInterface $serializer)
    {
        $equipes=$repository->findAll();
        $jsonContent=$serializer->serialize($equipes,'json',['groups' => 'events']
        );
        $response=new Response($jsonContent);
        $response->headers->set('Content-Type','application/json');
        return $response;
    }*/
   /* /**
     * @Route("/equipeMobile/ajouterEquipe", name="ajouterEquipe",methods={"GET"})
     */
   /* public function addEquipe(Request $request,EquipeRepository $rep){

        $en=$this->getDoctrine()->getManager();
        $equipes=new Equipe();
        $equipes->setNom((String)$request->query->get('nom'));
        $equipes->setDescriptionEquipe((String)$request->query->get('description_equipe'));

        $en->persist($equipes);
        $en->flush();

        return new Response('Equipe Ajouté');
    }*/
    /*
    /**
     * @Route("/equipeMobile/{id}/{nom}/{description_equipe}/editEquipe",name="editEquipe")
     * @param Request $request
     * @param EquipeRepository $rep
     * @param SerializerInterface $serializer
     * @param $id
     * @param $nom
     * @param $description_equipe
     * @return Response
     * @throws ExceptionInterface
     */
    /* public function editEquipe(Request $request, EquipeRepository $rep, SerializerInterface $serializer, $id, $nom, $description_equipe): Response
    {

        $em = $this->getDoctrine()->getManager();
        $equipes = $rep->find($id);
        $equipes->setNom($nom);
        $equipes->setDescriptionEquipe($description_equipe);
        $em->persist($equipes);
        $em->flush();
        $jsonContent = $serializer->normalize($equipes, 'json', ['groups' => 'post:read']);
        return new Response(json_encode($jsonContent));
    }*/
    /*
    /**
     * @Route("/equipeMobile/deleteEquipe/{id}",name="delete_equipe")
     * @param Request $request
     * @param EquipeRepository $rep
     * @param SerializerInterface $serializer
     * @param $id
     * @return Response
     * @throws ExceptionInterface
     */
   /* public function deleteEquipe(Request $request, EquipeRepository $rep, SerializerInterface $serializer, $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $equipes = $rep->find($id);
        $em->remove($equipes);
        $em->flush();
        $jsonContent = $serializer->normalize($equipes, 'json', ['groups' => 'post:read']);
        return new Response(json_encode($jsonContent));
    }
    */

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
