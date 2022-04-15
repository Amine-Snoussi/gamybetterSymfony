<?php

namespace App\Form;

use App\Entity\Cours;
use App\Entity\Personne;
use App\Entity\Session;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('categorie', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'categorie',
                ]
            ])
            ->add('jeu', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'jeu',
                ]
            ])
            ->add('prix', NumberType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'prix',
                ]
            ])
            ->add('personne', EntityType::class, [
                'class' => Personne::class,
                'multiple' => false,
                'placeholder' => 'choisir un propriétaire',
                'expanded' => false,
                'attr' => ['class' => 'form-select']
            ])
            ->add('session', EntityType::class, [
                'class' => Session::class,
                'multiple' => false,
                'expanded' => false,
                'placeholder' => 'choisir une session',
                'attr' => ['class' => 'form-select']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}
