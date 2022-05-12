<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EvenementRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * @Route ("/evenement")
 */
class EvenementController extends AbstractController
{
    /**
     * @Route("/list", name="list_evenement", methods={"GET"})
     */
    public function list (Request $request, PaginatorInterface $paginator)
    {
        $repository = $this->getDoctrine()->getRepository(Evenement::class)->findAll();
        $evenements = $paginator->paginate(
            $repository, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            4 // Nombre de résultats par page
        );
        return $this->render('/evenements/ListEvenement.html.twig', ['evenements'=>$evenements]);

    }

    /**
     * @Route("/add", name="add_evenement", methods={"GET","POST"})
     */
    public function add(Request $request)
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class,$evenement);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evenement);
            $entityManager->flush();
            return $this->redirectToRoute('list_evenement');
        }
        return $this->render('/evenements/AddEvenement.html.twig', array(
            'format' => $form->createView(),));
    }

    /**
     * @Route("delete/{id}", name="delete_evenement", methods={"GET","DELETE"})
     */
    public function delete(Evenement $evenement)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($evenement);
        $em->flush();
        return $this->redirectToRoute('list_evenement');
    }

    /**
     * @Route("/edit/{id}", name="edit_evenement",methods={"GET","POST"})
     * @ParamConverter("evenement", class="App:Evenement")
     */
    public function editEvenement(Request $request, $evenement)
    {
        $form = $this->createForm(EvenementType::class,$evenement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('success', 'edit successfully!');
            return $this->redirectToRoute('list_evenement');
        }
        return $this->render('Evenements/EditEvenement.html.twig', [
            'format' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="details_evenement", requirements={"id"="\d+"}, methods={"GET"})
     * @ParamConverter("evenement", class="App:Evenement")
     */
    public function detail($evenement)
    {
        return $this->render('Evenements/DetailsEvenement.html.twig', ['evenement'=> $evenement] );
    }
    /**
     * @Route("/tournaments", name="tournaments", methods={"GET"})
     */
    public function listf(Request $request , EvenementRepository  $er)
    {
        $list_evenements = $er->findAll();
        return $this->render('tournaments.html.twig', ['boucle' => $list_evenements,
        ]);


    }


}
