<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PublicationRepository;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Publication;

class ApiPublicationController extends AbstractController
{
    /**
     * @Route("/api/publication", name="app_api_publication_index", methods={"GET"})
     */
    public function index(PublicationRepository $PublicationRepository,SerializerInterface $serializer): Response
    {

    
        $post=$PublicationRepository->findAll();
//        $encoders=[new JsonEncoder()];
//        $normalizer =[new ObjectNormalizer()];
//        $serializer=new \Symfony\Component\Serializer\Serializer($normalizer,$encoders);
        $jsonContent=$serializer->serialize($post,'json',['groups' => 'post:read']

        );
        $response=new Response($jsonContent);
        $response->headers->set('Content-Type','application/json');
        return $response;
    }


    /**
     * @Route("/ajouter", name="ajouter",methods={"GET"})
     */
    public function addPost(Request $request,PublicationRepository $PubRepo){

        $en=$this->getDoctrine()->getManager();
        $post=new Publication();
        $post->setPublication((String)$request->query->get('publication'));
        $post->setTitre((String)$request->query->get('titre'));
        $post->setImage((String)$request->query->get('image'));
        //$post->setVideo((String)$request->query->get('video'));
        $post->setDate(new \DateTime('now'));
       // $actualites->setJeu((String)$request->query->get('jeu'));
       // $actualites->setTitre((String)$request->query->get('titre'));
       // $cour->setLienyoutube((String)$request->query->get('lienyoutube'));
        //$cour->setCategorie($request->query->get('categorie'));
        

        $en->persist($post);
        $en->flush();

        return new Response('Post Ajouté');
    }
       
    
}
