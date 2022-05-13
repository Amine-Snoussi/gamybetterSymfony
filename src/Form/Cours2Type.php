<?php

namespace App\Form;

use App\Entity\Cours;
use App\Entity\Session;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Cours2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('categorie', TextType::class, [
                'attr' => [
                    'placeholder' => 'categorie',
                    'class' => 'form-control'
                ]
            ])
            ->add('jeu', TextType::class, [
                'attr' => [
                    'placeholder' => 'jeu',
                    'class' => 'form-control'
                ]
            ])
            ->add('prix', NumberType::class, [
                'attr' => [
                    'placeholder' => 'prix',
                    'class' => 'form-control'
                ]
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'attr' => [
                    'placeholder' => 'User',
                    'class' => 'form-select'
                ]
            ])
            ->add('session', EntityType::class, [
                'class' => Session::class,
                'attr' => [
                    'placeholder' => 'select session',
                    'class' => 'form-select'
                ]
            ])
            ->add('enregistrer', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class

        ]);
    }
}
