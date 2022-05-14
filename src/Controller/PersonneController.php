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
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


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
     * @param PersonneRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/AfficheListbyname", name = "AfficheListbyname")
     */
    public function AfficheListbyname(PersonneRepository $repository)
    {
        
        $personne = $repository->orderbyname();
        return $this -> render('personne/AfficheListbyname.html.twig',
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
            return $this->redirectToRoute('affichePersonne');
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
    public function Login (AuthenticationUtils $authenticationUtils){
         // get the login error if there is one
         $error = $authenticationUtils->getLastAuthenticationError();
         // last username entered by the user
         $lastUsername = $authenticationUtils->getLastUsername();
       
         return $this->render('signin.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
    
     /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }




    /**
     * @Route("/sign", name="inscription")
     */
    /*  public function inscription (Request $request,UserPasswordEncoderInterface $encoder){
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
              return $this->redirectToRoute('#');
          }
          return $this -> render ('signin.html.twig',[
              'form' => $form->createView()

          ]);
      }*/
        /**
     * @Route("/registration", name="app_user_new", methods={"GET", "POST"})
     */
    public function new(Request $request,UserPasswordEncoderInterface $userPasswordEncoder, EntityManagerInterface $entityManager): Response
    {
        $user = new Personne();

        $form = $this->createForm(PersonneType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $userPasswordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                ));

            // generer un activation token
            $user->setActivationToken(md5(uniqid()));

            $entityManager->persist($user);
            $entityManager->flush();


          /* 
                $email = (new Email())
            ->from('azizabouda131@gmail.com')
            ->to($user->getEmail())
            ->subject('Welcome to GamyBetter !')
            ->html(renderView(
                'email/activation.html.twig',['token'=>$user->getActivationToken()]
            ),'text/html');
            $mailer->send($email);
            $mailer->send($message);

            dd($user->getActivationToken());*/
            return $this->redirectToRoute('login');


           // return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('signup.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

        /**
     * @Route ("/activation/{token}", name="activation")
     */
    public function activation($token)
    {
        $user = $this->getDoctrine()->getRepository(Personne::class)->findOneBy(['activation_token'=>$token]);
        if(!$user){
            throw $this->createNotFoundException("User not found");
        }
        $user->setActivationToken(null);
        $em=$this->getDoctrine()->getManager();
        $em->flush();
        $this->addFlash('success','vous avez bien activé votre compte');
        return $this->redirectToRoute('login');

    }
   

}