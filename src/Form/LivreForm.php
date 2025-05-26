<?php

namespace App\Form;

use App\Entity\Auteur;
use App\Entity\Livre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('annee')
            ->add('auteur', EntityType::class, [
                'class' => Auteur::class,
                // 'choice_label' => 'id',
                'choice_label' => function (Auteur $auteur) {
        return $auteur->getNom() . ' ' . $auteur->getPrenom();
    },
    'placeholder' => 'Sélectionner un auteur',

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}