<?php

namespace App\Form;

use App\Entity\Personne;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'label' => 'Nom',
            'attr' => [
                'placeholder' => 'Merci de définir votre nom',
                'class' => 'form-control'
            ],
        ])
        ->add('prenom', TextType::class, [
            'label' => 'Prenom',
            'attr' => [
                'placeholder' => 'Merci de définir votre prenom',
                'class' => 'form-control'
            ],
        ])
        ->add('age', NumberType::class)
        ->add('contact', TextType::class, [
            'label' => 'Num contact',
            'attr' => [
                'placeholder' => 'Merci de définir votre contact',
                'class' => 'form-control'
            ],
        ])
            ->add('pseudo')

            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ))
            ->add('email',EmailType::class)
            ->add('dateofbirth', DateType::class, [
                'format' => 'yyyy-MM-dd',
                'widget' => 'single_text'
            ])
       
            ->add('roles',ChoiceType::class, [
                'choices'=>[
                    'Player'=>'ROLE_USER',
                    'Manager'=>'ROLE_MANAGER',
                    'Admin'=>'ROLE_ADMIN'
                ],
                'expanded'=>true,
                'multiple'=>true,
                'label'=>'Roles'
            ])
            ->add('image',FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' =>'Choose an image',
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
