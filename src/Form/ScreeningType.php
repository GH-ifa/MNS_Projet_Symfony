<?php

namespace App\Form;

use App\Entity\Screening;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScreeningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('time')
            ->add('vf')
            ->add('subtitled')
            // ->add('createdAt')
            // ->add('updatedAt')
            ->add('movie')
            ->add('room')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Screening::class,
        ]);
    }
}
