<?php

namespace App\Controller;

use App\Repository\CoursRepository;
use App\Repository\SessionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\CoursController;
use App\Controller\ActualiteController;


use App\Entity\Actualite;
use App\Entity\Game;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_default")
     * @return Response
     */
    public function index(ActualiteController $act,GameController $mat): Response
    {
        $tab_date=$act->latest_date();
        $tab_match=$mat->latest_match();
       // $chercher= $rech ->rechercheByJeu();
        return $this->render('default/index-front.html.twig', [
            'actualites' => $tab_date,
            'games'=> $tab_match,
           // 'actualite' => $actualites
            
        ]);
    }

    /**
     * @Route("/blog", name="blog")
     * @return Response
     */
    public function blog(): Response
    {
        return $this->render('blog-grid.html.twig', [
            'controller_name' => 'DefaultController',
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
     * @Route("/watch", name="watch")
     * @return Response
     */
    public function watch(GameController $mat): Response
    {$tab_match=$mat->latest_match();
        
        return $this->render('watchStream.html.twig', [
            'games'=> $tab_match
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