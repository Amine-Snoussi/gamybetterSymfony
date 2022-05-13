<?php

namespace App\Form;

use App\Entity\Cours;
use App\Entity\Session;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('duree', TimeType::class, [
                'widget' => 'single_text',
                'by_reference' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'durée'
                ]
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'by_reference' => true,
                'attr' => [
                    'class' => 'form-control',
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
            ->add('categorie', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'catégorie'
                ]
            ])
            ->add('prix', NumberType::class, [
                'input' => 'number',
                'html5' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'prix',
                ]
            ])
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'nom de la session'
                ]
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'multiple' => false,
                'expanded' => false,
                'placeholder' => 'choisir un utilisateur',
                'attr' => [
                    'class' => 'form-select',
                ]
            ])
            ->add('cours', EntityType::class, [
                'class' => Cours::class,
                'multiple' => true,
                'expanded' => false,
                'attr' => [
                    'class' => 'form-select'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
