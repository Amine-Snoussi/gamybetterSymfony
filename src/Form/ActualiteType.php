<?php

namespace App\Form;

use App\Entity\Actualite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ActualiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('image', FileType::class, array('data_class' => null), [
            'label' => 'Image',


            // unmapped means that this field is not associated to any entity property
            'mapped' => true,


            'required' => false,
            // unmapped fields can't define their validation using annotations
            // in the associated entity, so you can use the PHP constraint classes
            'constraints' => [
                new File([
                    'mimeTypes' => [
                        'image/jpeg',
                        'image/jpg',
                        'image/png',
                    ],
                    'mimeTypesMessage' => 'Image invalide : (jpg,png,jpeg)',
                ])
            ],
        ])
        ->add('video', FileType::class, array('data_class' => null), [
            'label' => 'Video',


            // unmapped means that this field is not associated to any entity property
            'mapped' => true,


            'required' => false,
            // unmapped fields can't define their validation using annotations
            // in the associated entity, so you can use the PHP constraint classes
         /*   'constraints' => [
                new File([
                    'mimeTypes' => [
                        'image/jpeg',
                        'image/jpg',
                        'image/png',
                    ],
                    'mimeTypesMessage' => 'Image invalide : (jpg,png,jpeg)',
                ])
            ],*/
        ])
            ->add('idPersonne')
            ->add('idMatch')
            ->add('jeu',ChoiceType::class, [
                'choices'  => [
                    'Valorant' => 'Valorant',
                    'LOL' => 'LOL',
                    'FIFA'  => 'FIFA'
                    
                    
                ],
            ])
            ->add('titre', TextType::class)
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'by_reference' => true,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actualite::class,
        ]);
    }
}
