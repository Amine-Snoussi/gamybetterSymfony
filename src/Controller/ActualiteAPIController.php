<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Repository\GameRepository;
use App\Repository\PersonneRepository;


use App\Form\ActualiteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ActualiteRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;



/**
 * @Route("/actualite/api")
 */
class ActualiteAPIController extends AbstractController
{
    /**
     *
     * @Route("/liste", name="liste")
     */
    public function liste(ActualiteRepository $repository ,SerializerInterface $serializer)
    {
        $actualites=$repository->findAll();
//        $encoders=[new JsonEncoder()];
//        $normalizer =[new ObjectNormalizer()];
//        $serializer=new \Symfony\Component\Serializer\Serializer($normalizer,$encoders);
        $jsonContent=$serializer->serialize($actualites,'json',['groups' => 'actu']

        );
        $response=new Response($jsonContent);
        $response->headers->set('Content-Type','application/json');
        return $response;
    }


/**
     * @Route("/ajouter", name="ajouter",methods={"GET"})
     */
    public function add(Request $request,ActualiteRepository $actrep,GameRepository $gamerep,PersonneRepository $perep){

        $en=$this->getDoctrine()->getManager();
        $actualites=new Actualite();
        $actualites->setImage((String)$request->query->get('image'));
        $actualites->setDescription((String)$request->query->get('description'));
        $actualites->setVideo((String)$request->query->get('video'));
        $actualites->setDate(new \DateTime());
        $actualites->setJeu((String)$request->query->get('jeu'));
        $actualites->setTitre((String)$request->query->get('titre'));
       // $cour->setLienyoutube((String)$request->query->get('lienyoutube'));
        //$cour->setCategorie($request->query->get('categorie'));
       // $actualites->setIdPersonne($perep->find((int)$request->query->get('id_personne')));
       // $actualites->setIdMatch($gamerep->find((int)$request->query->get('id_match')));

        $en->persist($actualites);
        $en->flush();

        return new Response('Actualité Ajouté');
    }


}