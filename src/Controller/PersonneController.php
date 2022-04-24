<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Form\PersonneType;
use App\Repository\PersonneRepository;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PersonneController extends AbstractController
{
    /**
     * @Route("/personne", name="personne")
     */
    public function index(): Response
    {
        return $this->render('personne/home.html.twig', [
            'controller_name' => 'PersonneController',
        ]);
    }

    /**
     * @param PersonneRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/affichePersonne", name = "affichePersonne")
     */
    public function AfficheList(PersonneRepository $repository)
    {
        
        $personne = $repository->findAll();
        return $this -> render('personne/affichePersonne.html.twig',
         ['personne'=>$personne]);
    }

    /**
     * @Route("/delete/{id}", name="deletePersonne")
     */
    public function deletePersonne($id, PersonneRepository $repository)
    {
     $personne = $repository->find($id);
     $em = $this->getDoctrine()->getManager();
     $em->remove($personne);
     $em->flush();
     return $this->redirectToRoute('affichePersonne');
    }

    /**
     * @Route("/personne/add", name="addPersonne")
     */
    public function AddPersonne (Request $request,UserPasswordEncoderInterface $encoder){
        $personne = new Personne();
        $form = $this->createForm(PersonneType::class,$personne);
        $form->add("S'inscrire",SubmitType::class);
        $form->handleRequest($request);
        
        if (  $form ->isSubmitted() && $form -> isValid()){
            $ImageFile = $form->get('image')->getData();
            if ($ImageFile) {
                $originalFilename = pathinfo($ImageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                //$safeFilename = $slugger->slug($originalFilename);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$ImageFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $ImageFile->move(
                        $this->getParameter('uploads_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                // updates the '$personne' property to store the image file name
                // instead of its contents
                $personne->setImage($newFilename);
            }

            
            $hash = $encoder ->encodePassword($personne,$personne->getPassword());
            $personne ->setPassword($hash);
            $em = $this->getDoctrine()->getManager();
            $em ->persist($personne);
            $em->flush();
            return $this->redirectToRoute('login');
        }
            return $this -> render ('personne/addPersonne.html.twig',[
                'form' => $form->createView()

            ]);
        }

             /**
     * @Route("/personne/update/{id}", name="updatePersonne")
     */
    public function UpdatePersonne ($id,PersonneRepository $repository,Request $request,UserPasswordEncoderInterface $encoder){
        $personne = $repository->find($id);
        $form = $this->createForm(PersonneType::class,$personne);
        $form->add('update',SubmitType::class);
        $form->handleRequest($request);
        
        if (  $form ->isSubmitted() && $form -> isValid()){
            $ImageFile = $form->get('image')->getData();
            if ($ImageFile) {
                $originalFilename = pathinfo($ImageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                //$safeFilename = $slugger->slug($originalFilename);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$ImageFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $ImageFile->move(
                        $this->getParameter('uploads_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                // updates the '$personne' property to store the image file name
                // instead of its contents
                $personne->setImage($newFilename);
            }
            $hash = $encoder ->encodePassword($personne,$personne->getPassword());
            $personne ->setPassword($hash);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('affichePersonne');
        }
        return $this -> render ('personne/updatePersonne.html.twig',[
            'f' => $form->createView()

        ]);

    }
     /**
      * @Route("/login" ,name="login")
      */
    public function Login (){
        return $this->render ('personne/login.html.twig');
    }
    /**
     *  @Route("/" ,name="logout")
     */
    public function Logout (){}
    

    /**
     * @Route("/profile" , name="profile")
     */
    public function profil (){
        return $this->render ('personne/profile.html.twig');
    }
   

}