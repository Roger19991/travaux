<?php
 namespace App\Form;

 use App\Entity\ResarcheData;
 use Symfony\Component\Form\AbstractType;
 use Symfony\Component\Form\FormBuilderInterface;
 use Symfony\Component\OptionsResolver\OptionsResolver;
 
 class ResarcheDataType extends AbstractType
 {
     public function buildForm(FormBuilderInterface $builder, array $options): void
     {
         $builder
             ->add('designation')
             ->add('creation_date')
             ->add('modification_date')
             ->add('trafic_statistique')
             ->add('startPeriode')
             ->add('endPeriode')
         ;
     }
 
     public function configureOptions(OptionsResolver $resolver): void
     {
         $resolver->setDefaults([
             'data_class' => ResarcheData::class,
         ]);
     }
 }