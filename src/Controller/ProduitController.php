<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Produit;
use App\Form\inputType;
use App\Form\ProduitType;
use App\Repository\CommandeRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ProduitController extends AbstractController
{
    /**
     * @Route("/panier_back", name="app_produit_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {

        $articles = $entityManager
            ->getRepository(Produit::class)
            ->findAll();
        return $this->render('produit/index.html.twig', [
            'produits' => $articles
        ]);

    }

    public function findall(){
        $em=$this->getDoctrine()->getManager();
        $produits = $em
            ->getRepository(Produit::class)
            ->findAll();
        return $produits;
    }

    /**
     * @Route("/produit/new", name="app_produit_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ImageFile = $form->get('image')->getData();
            if ($ImageFile) {
                $originalFilename = pathinfo($ImageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                //$safeFilename = $slugger->slug($originalFilename);
                $newFilename = md5(uniqid()).'.'.$ImageFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $ImageFile->move(
                        $this->getParameter('uploads_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the '$produit' property to store the image file name
                // instead of its contents
                $produit->setImage($newFilename);
            }
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('produit/new.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/produit/show/{idProduit}", name="app_produit_show", methods={"GET"})
     */
    public function show(Produit $produit): Response
    {
        return $this->render('produit/show.html.twig', [
            'produit' => $produit,
        ]);
    }

    /**
     * @Route("/produit/{idProduit}/edit", name="app_produit_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Produit $produit, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ImageFile = $form->get('image')->getData();
            if ($ImageFile) {
                $originalFilename = pathinfo($ImageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                //$safeFilename = $slugger->slug($originalFilename);
                $newFilename = md5(uniqid()).'.'.$ImageFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $ImageFile->move(
                        $this->getParameter('uploads_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the '$produit' property to store the image file name
                // instead of its contents
                $produit->setImage($newFilename);
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/prduit/delete/{idProduit}", name="app_produit_delete", methods={"POST"})
     */
    public function delete(Request $request, Produit $produit, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getIdProduit(), $request->request->get('_token'))) {
            $entityManager->remove($produit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/produit/catalog", name="catalog")
     * @return Response
     */
    public function catalog(ProduitRepository $produitRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('game',ChoiceType::class,[
                'choices'=>[
                    'League Of Legends'=>'League Of Legends',
                    'Valorant'=>'Valorant',
                    'FIFA'=>'FIFA',
                    'None'=>'None',
                ],
                'multiple'=>false,
                'expanded'=>false,
            ])
        ->add('slider', RangeType::class, [
        'attr' => [
            'min' => 20,
            'max' => 500,
            'class' => 'nk-input-slider-input',
        ],

    ])
            ->getForm()
            ->handleRequest($request)
        ;

        if ($form->isSubmitted() ) {
            /** @var $selected game */
            $selected = $form->get('game')->getData();
            $slide = $form->get('slider')->getData();
            $produits = $paginator->paginate(
                $donnees = $produitRepository->findBySlider($slide,$selected),
                $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
                6 // Nombre de résultats par page
            );

            dump($selected,$slide);
            return $this->render('produit/catalog.html.twig', [
                'produits' => $produits,
                'form' => $form->createView(),
            ]);
        }

        $produits = $paginator->paginate(
            $donnees = $produitRepository->findAll(),
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            6 // Nombre de résultats par page
        );
        return $this->render('produit/catalog.html.twig', [
            'produits' => $produits,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("catalog/product/{idProduit}", name="product")
     * @return Response
     */
    public function product( Produit $produit): Response
    {

        return $this->render('produit/product.html.twig', [
            'produit' => $produit,
        ]);
    }

    /**
     * @Route("catalog/filter/{category}", name="category")
     * @return Response
     */
    public function Category(ProduitRepository $produitRepository,PaginatorInterface $paginator,$category, Request $request): Response
    {

        $produits = $paginator->paginate(
            $donnees = $produitRepository->findByExampleField($category),
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            6 // Nombre de résultats par page
        );
        return $this->render('produit/catalog.html.twig', [
            'produits' => $produits,
        ]);
    }




    /**
     * Search action.
     * @Route("/search/{search}", name="search")
     * @param  Request               $request Request instance
     * @param  string                $search  Search term
     * @return Response|JsonResponse          Response instance
     */
    public function searchAction(Request $request, string $search)
    {
        if (!$request->isXmlHttpRequest()) {
            return $this->render("search.html.twig");
        }

        if (!$searchTerm = trim($request->query->get("search", $search))) {
            return new JsonResponse(["error" => "Search term not specified."], Response::HTTP_BAD_REQUEST);
        }

        $em = $this->getDoctrine()->getManager();
        if (!($results = $em->getRepository(User::class)->findOneByEmail($searchTerm))) {
            return new JsonResponse(["error" => "No results found."], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse([
            "html" => $this->renderView("search.ajax.twig", ["results" => $results]),
        ]);
    }
}
