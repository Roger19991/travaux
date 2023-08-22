<?php

namespace App\Form;

use App\Entity\Axles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AxleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('designation', ChoiceType::class, [
                'label' => 'Designation',
                'choices' => [
                    'c1' => 'c1',
                    'c2' => 'c2',
                    'c3' => 'c3',
                    'c4' => 'c4',
                    'c5' => 'c5',
                ],
                'placeholder' => 'Choisissez une désignation',
                'required' => false,
            ])
            ->add('description')
            ->add('caracteristique', ChoiceType::class, [
                'label' => 'Caracteristique',
                'choices' => [
                    'c1(de 7t à 20t)' => 'c1',
                    'c2(de 7t à 28t)' => 'c2',
                    'c3(de 7t à 41t)' => 'c3',
                    'c4(de 7t à 49t)' => 'c4',
                    'c5(de 7t à 50t)' => 'c5',
                ],
                'placeholder' => 'Choisissez une caractéristique',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Axles::class,
        ]);
    }
}