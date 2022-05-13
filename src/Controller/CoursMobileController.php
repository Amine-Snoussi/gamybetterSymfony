<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Entity\Session;
use App\Form\CoursType;
use App\Repository\CoursRepository;
use App\Repository\SessionRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Imagine\Image\Box;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\SerializerInterface;


/**
 * @Route("/coursMobile", name="cours.")
 */
class CoursMobileController extends AbstractController
{

    /**
     * @Route("/indexMobile", name="listMobile", methods={"GET"})
     */
    public function indexMobile(CoursRepository $coursRepository, SerializerInterface $serializer): Response
    {
        $cours = $coursRepository->findAll();
        $json = $serializer->serialize($cours, 'json', ['groups' => 'cours']);
        $response = new Response($json);
        $response->headers->set('Content-Type','application/json');
        return $response;
    }

    public function list(): array
    {
        $em = $this->getDoctrine()->getRepository(Cours::class);
        return $em->findAll();
    }

    /**
     * @Route("/newMobile", name="createMobile", methods={"GET", "POST"})
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $em
     * @return Response
     */

    /* public function newMobile(Request $request, SerializerInterface $serializer, EntityManagerInterface $em): Response
     {
         $content = $request->getContent();
         $data = $serializer->deserialize($content, Cours::class, 'json');
         $em->persist($data);
         $em->flush();
         return new Response('cours added successfully');
     }*/

    public function newMobile(Request $request, SerializerInterface $serializer, EntityManagerInterface $em): Response
    {
        $em = $this->getDoctrine()->getManager();
        $cours = new Cours();
        $cours->setNom((String)$request->query->get('nom'));
        $cours->setCategorie((String)$request->query->get('categorie'));
        $cours->setJeu((String)$request->query->get('jeu'));
        $cours->setPrix((double)$request->query->get('prix'));
        $em->persist($cours);
        $em->flush();
        return new Response('post ajouté');
    }

    /**
     * @Route("/{id}/{nom}/{prix}/editMobile",name="editMobile")
     * @param Request $request
     * @param CoursRepository $coursRepository
     * @param SerializerInterface $serializer
     * @param $id
     * @param $nom
     * @param $prix
     * @return Response
     * @throws ExceptionInterface
     */
    public function editMobile(Request $request, CoursRepository $coursRepository, SerializerInterface $serializer, $id, $nom, $prix): Response
    {

        $em = $this->getDoctrine()->getManager();
        $cours = $coursRepository->find($id);
        $cours->setNom($nom);
        $cours->setPrix($prix);
        $em->persist($cours);
        $em->flush();
        $jsonContent = $serializer->normalize($cours, 'json', ['groups' => 'post:read']);
        return new Response(json_encode($jsonContent));
    }


    /**
     * @Route("/deleteMobile/{id}",name="delete_mobile")
     * @param Request $request
     * @param CoursRepository $coursRepository
     * @param SerializerInterface $serializer
     * @param $id
     * @return Response
     * @throws ExceptionInterface
     */
    public function deleteMobile(Request $request, CoursRepository $coursRepository, SerializerInterface $serializer, $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $cours = $coursRepository->find($id);
        $em->remove($cours);
        $em->flush();
        $jsonContent = $serializer->normalize($cours, 'json', ['groups' => 'post:read']);
        return new Response(json_encode($jsonContent));
    }


}
