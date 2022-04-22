<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('username',TextType::class,[
            'label' => 'Nom Personne',
            'attr' => [
                'placeholder' =>'Merci de définir votre nom',
                'class' => 'username'
            ],
        ])
        ->add('contact',TextType::class,[
            'label' => 'Num contact',
            'attr' => [
                'placeholder' =>'Merci de définir votre contact',
                'class' => 'contact'
            ],
        ])
        ->add('password',PasswordType::class,[
            'label' => 'mot de passe',
            'attr' => [
                'placeholder' =>'Merci de définir votre mot de passe',
                'class' => 'password'
            ],
        ])
        
        ->add('confirm_password',PasswordType::class,[
            'label' => 'confirmer ',
            'attr' => [
                'placeholder' =>'Merci de confirmer votre mot de passe',
                'class' => 'confirm_password'
            ],
        ])
        ->add('email',TextType::class,[
            'label' => 'email',
            'attr' => [
                'placeholder' =>'veuillez saisir votre mail',
                'class' => 'email'
            ],
        ])
        ->add('role',TextType::class,[
            'label' => 'role',
            'attr' => [
                'placeholder' =>'votre role',
                'class' => 'role'
            ],
        ])
        ->add('image',FileType::class,[
            'mapped' => false,
            'required' => false,
            'label' => 'Parcourir ',
            'attr' => [
                'class' => 'form-control'
            ],
        ])

        ->add('description',TextType::class,[
            'label' => 'description',
            'attr' => [
                'placeholder' =>'description',
                'class' => 'description'
            ],
        ])
        

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_personne' => Personne::class,
        ]);
    }
}