<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Repository\CoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Knp\Component\Pager\PaginatorInterface;


/**
 * @Route("/frontlist", name="coursFront", methods={"GET"})
 */
class CoursFrontController extends AbstractController
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @Route("/", name=".list", methods={"GET"})
     */
    public function index(CoursRepository $coursRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $articles = $paginator->paginate(
            $donnees = $coursRepository->findAll(),
            $request->query->getInt('page', 1), 3
        );
        return $this->render('cours_front/index.html.twig', [
            'cours' => $articles,
        ]);
    }

    /**
     * @Route("/filter/{filter}", defaults={"filter"=""}, name=".filter",  methods={"GET"})
     * @param CoursRepository $coursRepository
     * @param $filter
     * @return Response
     */

    public function filter(CoursRepository $coursRepository, $filter): Response
    {
        $cours = $coursRepository->findAll();
        switch (mb_strtolower($filter)) {
            case "valorant" :
                $cours = $this->filterCourses($coursRepository, "Valorant");
                break;
            case "league of legends" :
                $cours = $this->filterCourses($coursRepository, "League of legends");
                break;

            case "fifa":
                $cours = $this->filterCourses($coursRepository, "Fifa");
                break;
            default :
                $cours = $coursRepository->findAll();
                break;
        }
        return $this->render('cours_front/index.html.twig', [
            'cours' => $cours
        ]);
    }

    public function filterCourses(CoursRepository $coursRepository, string $filter): array
    {
        return $coursRepository->findBy(['jeu' => $filter]);
    }


    /**
     * @Route ("/session/{id}", name=".addToSession")
     * @param Request $request
     * @param CoursRepository $coursRepository
     * @param $id
     * @return Response
     */
    public function addToSession(Request $request, CoursRepository $coursRepository, $id): Response
    {
        $cours = new Cours();
        $session = $request->getSession();
        if ($session->has('cours')) {
            $cours = $coursRepository->find($id);
        }
        $session->set('cours', $cours);

        return $this->render('cours_front/index.html.twig', [
            'cours' => $coursRepository->findAll()
        ]);

    }

    public function clearSession(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
        $session = $this->requestStack->getSession();

    }

}
