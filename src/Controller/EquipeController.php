<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Form\EquipeType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EquipeRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route ("/equipe")
 */
class EquipeController extends AbstractController
{

    /**
     * @Route("/list", name="list_equipe", methods={"GET"})
     */
    public function list(Request $request , PaginatorInterface $paginator)
    {
        $repository = $this->getDoctrine()->getRepository(Equipe::class)->findAll();
        $equipes = $paginator->paginate(
            $repository, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            4 // Nombre de résultats par page
        );
        return $this->render('/equipes/ListEquipe.html.twig', ['equipes'=>$equipes]);

    }

    /**
     * @Route("/add", name="add_equipe", methods={"GET","POST"})
     */
    public function add(Request $request)
    {
        $equipe = new Equipe();
        $form = $this->createForm(EquipeType::class,$equipe);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($equipe);
            $entityManager->flush();
            return $this->redirectToRoute('list_equipe');
        }
        return $this->render('/equipes/AddEquipe.html.twig', array(
            'format' => $form->createView(),));
    }

    /**
     * @Route("delete/{id}", name="delete_equipe", methods={"GET","DELETE"})
     */
    public function delete(Equipe $equipe)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($equipe);
        $em->flush();
        return $this->redirectToRoute('list_equipe');
    }

    /**
     * @Route("/edit/{id}", name="edit_equipe",methods={"GET","POST"})
     * @ParamConverter("equipe", class="App:Equipe")
     */
    public function editEquipe(Request $request, $equipe)
    {
        $form = $this->createForm(EquipeType::class,$equipe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('success', 'edit successfully!');
            return $this->redirectToRoute('list_equipe');
        }
        return $this->render('Equipes/EditEquipe.html.twig', [
            'format' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="details_equipe", requirements={"id"="\d+"}, methods={"GET"})
     * @ParamConverter("equipe", class="App:Equipe")
     */
    public function detail($equipe)
    {
        return $this->render('Equipes/DetailsEquipe.html.twig', ['equipe'=> $equipe] );
    }





}
