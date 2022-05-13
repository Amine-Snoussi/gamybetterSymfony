<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           /* ->add('rating', RatingType::class, [
                'label' => 'Rating'
            ])*/

            ->add('image',FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' =>'Choose an image',
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('nomProduit',TextType::class,[
                'attr'=>[
                    'placeholder' =>"nom Produit",
                    'class'=>'form-control'
                ]
            ])
            ->add('description',TextType::class,[
                'attr'=>[
                    'placeholder' =>"description Produit",
                    'class'=>'form-control'
                ]
            ])
            ->add('categorie',TextType::class,[
                'attr'=>[
                    'placeholder' =>"categorie Produit",
                    'class'=>'form-control'
                ]
            ])
            ->add('quantiteStock', NumberType::class, [
                'attr' => [
                    'placeholder' => 'quantite Stock',
                    'class' => 'form-control'
                ]
            ])
            ->add('prixUnitair', NumberType::class, [
                'attr' => [
                    'placeholder' => 'prix Unitair',
                    'class' => 'form-control'
                ]
            ])
            ->add('discount', NumberType::class, [
                'attr' => [
                    'placeholder' => 'discount',
                    'class' => 'form-control'
                ]
            ])
            // ->add('idCommande')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
