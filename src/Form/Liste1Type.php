<?php

namespace App\Form;

use App\Entity\Liste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Liste1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('strasse')
            ->add('plz')
            ->add('stadt')
            ->add('telefon')
            ->add('email')
            ->add('geburtsdatum')
            ->add('gastEintrag')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Liste::class,
        ]);
    }
}
