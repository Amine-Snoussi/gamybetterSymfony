<?php

namespace App\Form;

use App\Entity\Equipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom' , TextType::class, array('attr' => array('class' => 'form-control', 'required' => true)))
            ->add('descriptionEquipe',TextType::class, array('attr' => array('class' => 'form-control', 'required' => true)))
            ->add('save', SubmitType::class, array(
                'label' => 'Enregistrer',
                'attr' => array('class' => 'btn btn-primary mt-3')
            ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipe::class,
        ]);
    }
}
