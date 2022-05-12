<?php

namespace App\Controller;
use App\Entity\Personne;
use App\Entity\Publication;
use App\Entity\Commentaire;
use App\Form\PublicationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Repository\PublicationRepository;
use App\Repository\CommentaireRepository;

/**
 * @Route("/publication")
 */
class PublicationController extends AbstractController
{
    /**
     * @Route("/", name="app_publication_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $publications = $entityManager
            ->getRepository(Publication::class)
            ->findAll();

        return $this->render('publication/index.html.twig', [
            'publications' => $publications,
        ]);
    }

     
    public function LastPost()
    {
        $em = $this->getDoctrine()->getManager();
        $query=$em 
        ->createQuery("Select p From App\Entity\Publication p 
        order By p.date DESC"); 
        return $query->getResult();

         

    }


    /**
     * @Route("/triLike_poste", name="tri_nbr_like")
     */
    public function TriIDPOSTE(PublicationRepository $rep)
    {
        $publication= $rep->TriParLike();
        return $this->render('blog-grid.html.twig', [
            'publications' => $publication,
        ]);
    }

  /**
     * @Route("/triLikeD_poste", name="tri_nbr_likeD")
     */

    public function TriIDPOSTED(PublicationRepository $rep)
    {
        $publication=$rep->TriParLikeD();
        return $this->render('blog-grid.html.twig', [
            'publications' => $publication,
        ]);
    }
   


    /**
     * @Route("/Liste_pdf", name="app_publication_index_pdf", methods={"GET"})
     */
    public function listepdf(EntityManagerInterface $entityManager): Response
    {

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);


        $publications = $entityManager
            ->getRepository(Publication::class)
            ->findAll();


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('publication/Liste_pdf.html.twig', [
            'publications' => $publications,
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
    }


    /**
     * @Route("/new", name="app_publication_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $publication = new Publication();
        $publication->setDate(new \DateTime('now'));
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ImageFile = $form->get('image')->getData();
            if ($ImageFile) {
                $originalFilename = pathinfo($ImageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                //$safeFilename = $slugger->slug($originalFilename);
                $newFilename = md5(uniqid()) . '.' . $ImageFile->guessExtension();

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
                $publication->setImage($newFilename);
            }
            $entityManager->persist($publication);
            $entityManager->flush();
            $this->addFlash(
                'info',
                'Added successfully!'
            );

            return $this->redirectToRoute('app_publication_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('publication/new.html.twig', [
            'publication' => $publication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_publication_show", methods={"GET"})
     */
    public function show(Publication $publication): Response
    {
        return $this->render('publication/show.html.twig', [
            'publication' => $publication,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_publication_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Publication $publication, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ImageFile = $form->get('image')->getData();
            if ($ImageFile) {
                $originalFilename = pathinfo($ImageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                //$safeFilename = $slugger->slug($originalFilename);
                $newFilename = md5(uniqid()) . '.' . $ImageFile->guessExtension();

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
                $publication->setImage($newFilename);
            }
            $entityManager->flush();

            $this->addFlash(
                'info',
                'updated successfully!'
            );
            return $this->redirectToRoute('app_publication_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('publication/edit.html.twig', [
            'publication' => $publication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_publication_delete", methods={"POST"})
     */
    public function delete(Request $request, Publication $publication, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $publication->getId(), $request->request->get('_token'))) {
            $entityManager->remove($publication);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_publication_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/blog_details/{id}", name="blog_details")
     * @return Response
     */
    public function blog_details($id, PublicationRepository $publicationRepository, CommentaireRepository $commentaireRepository,Request $request): Response
    {
        $commentaire = new Commentaire();
        $commentaire->setDate(new \DateTime('now'));
        $form = $this->createFormBuilder()
        ->add('contCommentaire',TextType::class,[
            'attr'=> [
                'placeholder' => 'add something',
                'class' => 'form-control required'
            ]
        ])
        ->add('add',SubmitType::class)
        ->getForm();
        
    
    $publication = $publicationRepository->find($id);
        if ($form->isSubmitted()) {

            dump($request->getContent());
            $commentaire->setContcommentaire($content);
            $entityManager->persist($commentaire);
            $entityManager->flush();
            $this->addFlash(
                'info',
                'Added successfully!'
            );
            return $this->render('blog_details.html.twig', [
                'publ   ication' => $publication,
                'commentaires'=> $commentaires,
                'form'=>$form->createView(),
            ]);
        }

        
        $commentaires = $commentaireRepository->findBy(['idPublication'=>$publication->getId()]);
        return $this->render('blog_details.html.twig', [
            'controller_name' => 'DefaultController',
            'publication' => $publication,
            'commentaires'=> $commentaires,
            'form'=>$form->createView(),
        ]);
    }


  /**
     * @Route("/", name="rechercheTitre")
     */
    public function rechercheByTitre(Request $request){
        $em = $this->getDoctrine()->getManager();
        $publications =$em ->getRepository( Publication::class) ->findAll();

if ($request->isMethod("POST")){
  
    $titre =$request ->get('titre');
   
    $publications =$em ->getRepository( Publication::class) ->findBy(array('titre'=>$titre));
    dump($publications);

}
  return $this->render('publication/index.html.twig', [
            'publications' => $publications,
        ]);
        
        
    }

    /**
     * @Route("/rechercheByTitreFront", name="rechercheTitreFront")
     */
    public function rechercheByTitreFront(Request $request,PaginatorInterface $paginator,PublicationRepository $publicationRepository): Response
    {
        $em = $this->getDoctrine()->getManager();
        
if ($request->isMethod("POST")){
  
    $titre =$request ->get('titre');
   
    $publications =$em ->getRepository( Publication::class) ->findBy(array('titre'=>$titre));
    dump($publications);
    
}
return $this->render('blog-grid.html.twig', [
    'publications' => $publications,
 ]);
        
        
    }




    }


        
    







