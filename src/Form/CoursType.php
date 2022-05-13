<?php

namespace App\Form;

use App\Entity\Cours;
use App\Entity\Session;
use App\Entity\User;
use App\Repository\CoursRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Image;


class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'nom du cours'
                ]
            ])
            ->add('categorie', ChoiceType::class, [
                'label' => 'Categorie* :',
                'placeholder' => false,
                'choices' => [
                    'Choose a category' => 'Choose a category',
                    'Solo' => 'Solo',
                    'Team' => 'Team'
                ],
                'choice_attr' =>
                    function ($key, $val, $index) {
                        dump($key);
                        return $val == 'Choose a category' ? ['disabled' => true] : ['disabled' => false];
                    },
                'attr' => [
                    'class' => 'form-select',
                ]
            ])
            ->add('jeu', ChoiceType::class, [
                'label' => 'Jeu* :',
                'placeholder' => false,
                'choices' => [
                    'Choose a game' => 'Choose a game',
                    'Valorant' => 'Valorant',
                    'League of legends' => 'League of legends',
                    'Fifa' => 'Fifa'
                ],
                'choice_attr' =>
                    function ($key, $val, $index) {
                        return $key == 'Choose a game' ? ['disabled' => true] : ['disabled' => false];
                    },
                'attr' => [
                    'class' => 'form-select',
                ]
            ])
            ->add('prix', NumberType::class, [
                'label' => 'prix* :',
                'input' => 'number',
                'html5' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'prix',
                ]
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'label' => 'User* :',
                'multiple' => false,
                'expanded' => false,
                'required'=>true,
                'attr' => ['class' => 'form-select']
            ])
            ->add('fileName', FileType::class, [
                'label' => 'Image :',
                'data_class' => null,
                //mapped false so symfony does not get and set its value from the related entity
                'mapped' => false,
                //required false, so you don't have to re-upload file every time I edit the Cours
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                ],


                //unmapped fields can't define validations using annotations in the entity
                /*'constraints' => [
                   new File([
                       'mimeTypes' => [
                           'application/MP4',
                           'application/jpeg',
                           'application/jpg'
                       ],
                       'mimeTypesMessage' => 'Please upload a valid video'
                   ])
               ]*/
            ])
            ->add('video', FileType::class, [
                'label' => 'Video :',
                'data_class' => null,
                //mapped false so symfony does not get and set its value from the related entity
                'mapped' => false,
                //required false, so you don't have to re-upload file every time I edit the Cours
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                ],


                //unmapped fields can't define validations using annotations in the entity
                /*'constraints' => [
                   new File([
                       'mimeTypes' => [
                           'application/MP4',
                           'application/jpeg',
                           'application/jpg'
                       ],
                       'mimeTypesMessage' => 'Please upload a valid video'
                   ])
               ]*/
            ])
            ->add('session', EntityType::class, [
                'class' => Session::class,
                'multiple' => false,
                'expanded' => false,
                'label' => 'Session :',
                'required' => false,
                'attr' => ['class' => 'form-select']
            ]);
    }

    // TODO : change style of error message in twig.yaml


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
            'users' => []
        ]);
    }


}
