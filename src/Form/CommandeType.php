<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\Personne;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            /*->add('dateCommande', DateType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])*/

            ->add('nomPersonne', TextType::class, [
                'attr' => [
                    'placeholder' => 'nomPersonne',
                    'class' => 'form-control'
                ]
            ])
            ->add('addressPersonne', TextType::class, [
                'attr' => [
                    'placeholder' => 'addressPersonne',
                    'class' => 'form-control'
                ]
            ])
            ->add('emailPersonne', TextType::class, [
                'attr' => [
                    'placeholder' => 'emailPersonne',
                    'class' => 'form-control'
                ]
            ])
            ->add('prixTotale', NumberType::class, [
                'attr' => [
                    'placeholder' => 'prixTotale',
                    'class' => 'form-control'
                ]
            ])
            ->add('discount', NumberType::class, [
                'attr' => [
                    'placeholder' => 'discount',
                    'class' => 'form-control'
                ]
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
            /* ->add('itemcode', EntityType::class, [
                 'attr' => [
                     'placeholder' => 'id produit',
                     'class' => 'form-control'
                 ]
             ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
