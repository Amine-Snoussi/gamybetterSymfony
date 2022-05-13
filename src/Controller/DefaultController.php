<?php

namespace App\Controller;

use App\Repository\CoursRepository;
use App\Repository\SessionRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\CoursController;
use App\Controller\ActualiteController;

use App\Repository\PublicationRepository;
use App\Entity\Actualite;
use App\Entity\Game;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Publication;
use Knp\Component\Pager\PaginatorInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_default")
     * @param \App\Controller\ActualiteController $act
     * @param GameController $mat
     * @param PublicationController $pub
     * @return Response
     */
    public function index(ActualiteController $act, GameController $mat, PublicationController $pub): Response
    {
        $tab_date = $pub->LastPost();
        $tab_date = $act->latest_date();
        $tab_match = $mat->latest_match();
        // $chercher= $rech ->rechercheByJeu();
        return $this->render('default/index-front.html.twig', [
            'actualites' => $tab_date,
            'games' => $tab_match,
            'publications' => $tab_date,
            // 'actualite' => $actualites

            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/teammate", name="teammate")
     * @return Response
     */
    public function profile(): Response
    {
        return $this->render('profile.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    /**
     * @Route("/blog", name="blog")
     * @param EntityManagerInterface $entityManager
     * @param PaginatorInterface $paginator
     * @param PublicationRepository $pubrepo
     * @param Request $request
     * @return Response
     */
    public function blog(EntityManagerInterface $entityManager, PaginatorInterface $paginator, PublicationRepository $pubrepo, Request $request): Response
    {
        $publication = $paginator->paginate(
            $donnees = $pubrepo->findAll(),
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            3 // Nombre de résultats par page
        );
        return $this->render('blog-grid.html.twig', [
            'publications' => $publication,
        ]);

    }

    /**
     * @Route("/gallery", name="galery")
     * @return Response
     */
    public function gallery(): Response
    {
        return $this->render('gallery.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/store", name="store")
     * @return Response
     */
    public function store(): Response
    {
        return $this->render('store.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/product", name="product")
     * @return Response
     */
    public function product(): Response
    {
        return $this->render('product.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     * @return Response
     */
    public function admin(): Response
    {
        return $this->render('default/index-front.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    /**
     * @Route("/watch", name="watch")
     * @param GameController $mat
     * @return Response
     */
    public function watch(GameController $mat): Response
    {
        $tab_match = $mat->latest_match();

        return $this->render('watchStream.html.twig', [
            'games' => $tab_match
        ]);
    }

    /**
     * @Route("/team", name="team")
     * @return Response
     */
    public function team(): Response
    {
        return $this->render('team.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }

    /**
     * @Route("/tournaments", name="tournaments")
     * @return Response
     */
    public function tournaments(): Response
    {
        return $this->render('tournaments.html.twig', [
            'controller_name' => 'EvenementController',
        ]);
    }

    /**
     * @Route("/signup", name="signup")
     * @return Response
     */
    public function signup(): Response
    {
        return $this->render('signup.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/blog_details", name="blog_details")
     * @return Response
     */
    public function blog_details(): Response
    {
        return $this->render('blog_details.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/checkout_form", name="checkout_form")
     * @return Response
     */
    public function checkout(): Response
    {
        return $this->render('checkout.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }




    /**
     * @Route("/news", name="news", methods={"GET"})
     */
    /*  public function news(EntityManagerInterface $entityManager): Response
      {
          $actualites = $entityManager
              ->getRepository(Actualite::class)
              ->findAll();

          return $this->render('default/index-front.html.twig', [
              'actualites' => $actualites,
          ]);
      }
  */


    /**
     * @Route("/games", name="games", methods={"GET"})
     */
    /*   public function games(EntityManagerInterface $entityManager): Response
       {
           $games = $entityManager
           ->getRepository(Game::class)
           ->findAll();

       return $this->render('default/index-front.html.twig', [
           'games' => $games,
       ]);
       }
   */


}