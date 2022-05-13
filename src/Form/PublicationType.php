<?php

namespace App\Form;

use App\Entity\Publication;
use App\Entity\Personne;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('publication', TextType::class, [
            'attr' => [
                'placeholder' => 'add post',
                'class' => 'form-control'
            ]
        ])
            ->add('titre',ChoiceType::class,[
                'choices'=>[
                    'valo'=>'valo',
                    'fifa'=>'fifa',
                    'lol'=>'lol',
                ],
                'multiple'=>false,
                'expanded'=>true,
            ])
          
          
            ->add('image',  FileType::class, array('data_class' => null), [
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
            
            ->add('idpersonne',EntityType::class,
                ['class'=>
                    Personne::class,
                    'choice_label'=> 'id_personne',
                    'multiple'=> false,
                    'expanded'=> false,
                    'attr' => [
                        'class' => 'form-select'
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
        ]);
    }
}
