<?php

namespace App\Form;

use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class GameType extends AbstractType
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
            ->add('score',IntegerType::class, [
                'attr' => [
                    'placeholder' => 'score',
                    'class' => 'form-control'
                ]
            ])
            ->add('lienStreaming',TextType::class, [
                'attr' => [
                    'placeholder' => 'Lien streaming',
                    'class' => 'form-control'
                ]
            ])
            ->add('status',ChoiceType::class, [
                'choices'  => [
                    'Winner' => 'Winner',
                    'Loser' => 'Loser',
                    
                    
                ],
            ])
            ->add('gold',TextType::class, [
                'attr' => [
                    'placeholder' => 'gold',
                    'class' => 'form-control'
                ]
            ])
            ->add('duree',ChoiceType::class, [
                'choices'  => [
                    '15 Minutes' => '15 Minutes',
                    '20 Minutes' => '20 Minutes',
                    '25 Minutes' => '25 Minutes',
                    '30 Minutes' => '30 Minutes',
                ]
            ])
            ->add('date')
            ->add('idEquipe1')
            ->add('idEquipe2')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
