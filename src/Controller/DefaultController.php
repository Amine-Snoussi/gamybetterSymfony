<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_default")
     * @return Response
     */
    public function index(): Response
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
     * @Route("/admin", name="admin")
     * @return Response
     */
    public function admin(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    /**
     * @Route("/watch", name="watch")
     * @return Response
     */
    public function watch(): Response
    {
        return $this->render('watchStream.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    /**
     * @Route("/team", name="team")
     * @return Response
     */
    public function team(): Response
    {
        return $this->render('team.html.twig', [
            'controller_name' => 'DefaultController',
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




}