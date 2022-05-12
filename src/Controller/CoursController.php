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
 * @Route("/cours", name="cours.")
 */
class CoursController extends AbstractController
{
    /**
     * @Route("/", name="list", methods={"GET"})
     */
    public function index(CoursRepository $coursRepository): Response
    {
        return $this->render('cours/index.html.twig', [
            'cours' => $coursRepository->findAll(),
        ]);
    }

    /**
     * @Route("/indexMobile", name="listMobile", methods={"GET"})
     */
    public function indexMobile(CoursRepository $coursRepository, SerializerInterface $serializer): Response
    {
        $cours = $coursRepository->findAll();
        $json = $serializer->serialize($cours, 'json', ['groups' => 'cours']);
        return new Response(json_encode($json));
    }

    public function list(): array
    {
        $em = $this->getDoctrine()->getRepository(Cours::class);
        return $em->findAll();
    }


    /**
     * @Route("/new", name="create", methods={"GET", "POST"})
     * @param Request $request
     * @param CoursRepository $coursRepository
     * @param UserRepository $userRepository
     * @return Response
     */
    public function new(Request $request, CoursRepository $coursRepository, UserRepository $userRepository): Response
    {
        $cour = new Cours();
        $formOptions = ['users' => $userRepository->findAll()];
        $form = $this->createForm(CoursType::class, $cour, $formOptions);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            /** @var UploadedFile $video */
            $file = ($request->files->get('cours')['fileName']);
            $video = ($request->files->get('cours')['video']);
            dump($request->files->get('cours'));

            $this->checkFiles($file, $video, $cour, $coursRepository);
            try {
                $coursRepository->add($cour);
            } catch (OptimisticLockException|ORMException $e) {
            }
            return $this->redirectToRoute('cours.list', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('cours/new.html.twig', [
            'cour' => $cour,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/newMobile", name="createMobile", methods={"GET", "POST"})
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $em
     * @return Response
     */

    public function newMobile(Request $request, SerializerInterface $serializer, EntityManagerInterface $em): Response
    {
        $content = $request->getContent();
        $data = $serializer->deserialize($content, Cours::class, 'json');
        $em->persist($data);
        $em->flush();
        return new Response('cours added successfully');
    }


    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(Cours $cour): Response
    {
        return $this->render('cours/show.html.twig', [
            'cour' => $cour,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET", "POST"})
     * @param Request $request
     * @param Cours $cour
     * @param CoursRepository $coursRepository
     * @return Response
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function edit(Request $request, Cours $cour, CoursRepository $coursRepository): Response
    {
        $form = $this->createForm(CoursType::class, $cour);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            /** @var UploadedFile $video */
            $file = ($request->files->get('cours')['fileName']);
            $video = ($request->files->get('cours')['video']);
            $this->checkFiles($file, $video, $cour, $coursRepository);
            $coursRepository->add($cour);
            return $this->redirectToRoute('cours.list', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('cours/edit.html.twig', [
            'cour' => $cour,
            'form' => $form->createView(),
        ]);
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
    public function editMobile(Request $request,CoursRepository $coursRepository, SerializerInterface $serializer, $id, $nom, $prix): Response
    {

        $em = $this->getDoctrine()->getManager();
        $cours = $coursRepository->find($id);
        $cours->setNom($nom);
        $cours->setPrix($prix);
        $em->persist($cours);
        $em->flush();
        $jsonContent=$serializer->normalize($cours,'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));

    }

    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, Cours $cour, CoursRepository $coursRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $cour->getId(), $request->request->get('_token'))) {
            try {
                $coursRepository->remove($cour);
            } catch (OptimisticLockException|ORMException $e) {
            }
        }
        return $this->redirectToRoute('cours.list', [], Response::HTTP_SEE_OTHER);
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

    /**
     * @param $file
     * @param $video
     * @param Cours $cour
     * @param CoursRepository $coursRepository
     * @return void
     */
    public function checkFiles($file, $video, Cours $cour, CoursRepository $coursRepository): void
    {
        if ($file && $video) {
            $newfilename = md5(uniqid()) . '.' . $file->guessClientExtension();
            $newVideoName = md5(uniqid()) . '.' . $video->guessClientExtension();
            $file->move(
                $this->getParameter('uploads_dir'),
                $newfilename
            );
            $video->move(
                $this->getParameter('uploads_dir'),
                $newVideoName
            );

            $cour->setFileName($newfilename);
            $cour->setVideo($newVideoName);

        }
    }


}
