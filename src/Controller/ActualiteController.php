<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Form\ActualiteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ActualiteRepository;
use Doctrine\ORM\EntityManager;


/**
 * @Route("/actualite")
 */
class ActualiteController extends AbstractController
{
    /**
     * @Route("/", name="app_actualite_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $actualites = $entityManager
       
            ->getRepository(Actualite::class)
            ->findAll();

        return $this->render('actualite/index.html.twig', [
            'actualites' => $actualites,
        ]);
    }

    /**
     * @Route("/new", name="app_actualite_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $actualite = new Actualite();
        $form = $this->createForm(ActualiteType::class, $actualite);
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
                $actualite->setImage($newFilename);
            }
            
            $entityManager->persist($actualite);
            $entityManager->flush();

            return $this->redirectToRoute('app_actualite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('actualite/new.html.twig', [
            'actualite' => $actualite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idActualite}", name="app_actualite_show", methods={"GET"})
     */
    public function show(Actualite $actualite): Response
    {
        return $this->render('actualite/show.html.twig', [
            'actualite' => $actualite,
        ]);
    }

    /**
     * @Route("/{idActualite}/edit", name="app_actualite_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Actualite $actualite, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActualiteType::class, $actualite);
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
                $actualite->setImage($newFilename);
            }
            $entityManager->flush();

            return $this->redirectToRoute('app_actualite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('actualite/edit.html.twig', [
            'actualite' => $actualite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idActualite}", name="app_actualite_delete", methods={"POST"})
     */
    public function delete(Request $request, Actualite $actualite, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actualite->getIdActualite(), $request->request->get('_token'))) {
            $entityManager->remove($actualite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_actualite_index', [], Response::HTTP_SEE_OTHER);
    }

    
    public function latest_date(){
      
    {
        $em = $this->getDoctrine()->getManager();
        $query=$em
        ->createQuery("Select p From App\Entity\Actualite p 
        Order By p.date DESC");
        return $query->getResult();


       /* $em = $this->getDoctrine()->getManager();
        $actualites =$em ->getRepository( Actualite::class) ->latestdate();
        //$actualites= $repository->latestdate();
      */
    }
    } 

    /**
     * @Route("/", name="rechercheDate")
     */

public function rechercheByJeu(Request $request){
    $em = $this->getDoctrine()->getManager();
    $actualites =$em ->getRepository( Actualite::class) ->findAll();
if ($request->isMethod("POST")){

$jeu =$request ->get('jeu');

$actualites =$em ->getRepository( Actualite::class) ->findBy(array('jeu'=>$jeu));

}
return $this->render('actualite/index.html.twig', [
        'actualites' => $actualites,
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


        $Actualite = $entityManager
            ->getRepository(Actualite::class)
            ->findAll();


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('actualite/Liste_pdf.html.twig', [
            'Actualite' => $Actualite,
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


    }
