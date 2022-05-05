<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Reclamation;
use App\Entity\Personne;
use App\Repository\ReclamationRepository;
use App\Repository\PersonneRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ReclamationType;

class ReclamationController extends AbstractController
{
    /**
     * @Route("/reclamation", name="app_reclamation")
     */
    public function index(): Response
    {
        return $this->render('reclamation/index.html.twig', [
            'controller_name' => 'ReclamationController',
        ]);
    }

     /**
     * @param ReclamationRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/afficheReclamation", name = "afficheReclamation")
     */
    public function AfficheList(ReclamationRepository $repository)
    {
        
        $reclamation = $repository->findAll();
        return $this -> render('reclamation/afficheReclamation.html.twig',
         ['reclamation'=>$reclamation]);
    }

     /**
     * @Route("/deleteReclamation/{id}", name="deleteReclamation")
     */
    public function deleteReclamation($id, ReclamationRepository $repository)
    {
     $reclamation = $repository->findOneById($id);
     $em = $this->getDoctrine()->getManager();
     $em->remove($reclamation);
     $em->flush();
     return $this->redirectToRoute('afficheReclamation');
    }

      /**
     * @Route("/reclamation/add", name="addReclamation")
     */
    public function AddReclamation (Request $request){
        $reclamation = new Reclamation();
        $form = $this->createForm(ReclamationType::class,$reclamation);
        $form->add('ajouter',SubmitType::class);
        $form->handleRequest($request);
        
        if (  $form ->isSubmitted() && $form -> isValid()){
            $em = $this->getDoctrine()->getManager();
            $em ->persist($reclamation);
            $em->flush();
            return $this->redirectToRoute('afficheReclamation');
        }
            return $this -> render ('reclamation/addReclamation.html.twig',[
                'form' => $form->createView()

            ]);
        }

                  /**
     * @Route("/reclamation/update/{id}", name="updateReclamation")
     */
    public function UpdateReclamation ($id,ReclamationRepository $repository,Request $request){
        $reclamation = $repository->find($id);
        $form = $this->createForm(ReclamationType::class,$reclamation);
        $form->add('update',SubmitType::class);
        $form->handleRequest($request);
        
        if (  $form ->isSubmitted() && $form -> isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('afficheReclamation');
        }
        return $this -> render ('reclamation/updateReclamation.html.twig',[
            'f' => $form->createView()

        ]);

    }

             /**
     * @Route("/reclamation/recherche/{personne.username}", name="recherche1")
     */
    public function Recherche1 (PersonneRepository $repository1 , ReclamationRepository $repository , Request $request){
        $data=$request->get('search1');
        $personne = $repository1->findBy(['username'=>$data]);
        $reclamation = $repository->findBy(['personne'=>$personne]);
        return $this->render('reclamation/afficheReclamation.html.twig',
        ['reclamation'=>$reclamation]);

    }
}
