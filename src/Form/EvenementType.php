<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomEvent', TextType::class, array('attr' => array('class' => 'form-control', 'required' => true)))
            ->add('nbEq' , IntegerType::class, array('attr' => array('class' => 'form-control', 'required' => true)))
            ->add('descriptionEvent' , TextType::class, array('attr' => array('class' => 'form-control', 'required' => true)))
            ->add('dateDebutEvent',DateType::class, array('attr' => array('widget' => 'single_text', 'format' => 'yyyy-MM-dd',)))
            ->add('dateFinEvent',DateType::class, array('attr' => array('widget' => 'single_text', 'format' => 'yyyy-MM-dd',)))
            ->add('prix',NumberType::class, array('attr' => array('class' => 'form-control', 'required' => true)))
            ->add('etat',IntegerType::class, array('attr' => array('class' => 'form-control', 'required' => true)))
            ->add('listeEquipe',TextType::class, array('attr' => array('class' => 'form-control', 'required' => true)))
            ->add('save', SubmitType::class, array(
                'label' => 'Enregistrer',
                'attr' => array('class' => 'btn btn-primary mt-3')
            ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
