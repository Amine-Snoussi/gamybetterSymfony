<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Form\CoursType;
use App\Repository\CoursRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Imagine\Image\Box;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Intervention\Image\ImageManager;
use Symfony\Component\Routing\Annotation\Route;
use Imagine\Image;



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
     * @Route("/new", name="create", methods={"GET", "POST"})
     * @param Request $request
     * @param CoursRepository $coursRepository
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
                try {

                    $coursRepository->add($cour);
                } catch (OptimisticLockException|ORMException $e) {
                }
            }
            return $this->redirectToRoute('cours.list', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('cours/new.html.twig', [
            'cour' => $cour,
            'form' => $form->createView(),
        ]);
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
            $coursRepository->add($cour);
            return $this->redirectToRoute('cours.list', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('cours/edit.html.twig', [
            'cour' => $cour,
            'form' => $form->createView(),
        ]);
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




}
