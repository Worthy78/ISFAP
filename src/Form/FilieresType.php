<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Filieres;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FilieresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', TextType::class)
            ->add('duree', TextType::class)
            ->add('niveau', TextType::class)
            ->add('inscription', TextType::class)
            ->add('mensualite_demi_bourse', TextareaType::class)
            ->add('mensualite_bourse_entiere', TextareaType::class)
            ->add('mensualite_nom_boursier', TextareaType::class)
            ->add('categorie', EntityType::class, array(
                'class'=>Categories::class,
                'label'=>"Choisir une categorie",
        'choice_label'=>'libelle'))
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Filieres::class,
        ]);
    }
}
