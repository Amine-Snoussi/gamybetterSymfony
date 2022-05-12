<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Publication;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PublicationRepository;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_default")
     * @return Response
     */
    public function index(PublicationController $pub ) : Response
    {
      $tab_date=$pub->LastPost();
     


        return $this->render('default/index-front.html.twig', [
            'publications' => $tab_date,
            
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
    public function blog(EntityManagerInterface $entityManager , PaginatorInterface $paginator,PublicationRepository $pubrepo,Request $request): Response
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
    



}