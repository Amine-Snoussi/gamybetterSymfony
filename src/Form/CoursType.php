<?php

namespace App\Form;

use App\Entity\Cours;
use App\Entity\Session;
use App\Entity\User;
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
                'label' => 'Categorie* :',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'categorie',
                ]
            ])
            ->add('jeu', TextType::class, [
                'label' => 'Jeu* :',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'jeu',
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
                'label' => 'User* :',
                'class' => User::class,
                'multiple' => false,
                'placeholder' => 'choisir un propriétaire',
                'expanded' => false,
                'attr' => ['class' => 'form-select']
            ])
            ->add('session', EntityType::class, [
                'class' => Session::class,
                'multiple' => false,
                'expanded' => false,
                'required' => false,
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
