<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, [
            'label' => 'Nom :',
                ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom :',
                ])
            ->add('age', IntegerType::class, [
                'label' => 'Age :',
            ])
            ->add('size', IntegerType::class, [
                'label' => 'Taille :',
            ])
            ->add('imc', IntegerType::class, [
                'label' => 'IMC :'
            ])
            ->add('weight', IntegerType::class, [
                'label' => 'Poids :',
            ])
            ->add('fatMass', IntegerType::class, [
                'label' => 'Masse graisseuse :',
            ])
            ->add('bodyWater', IntegerType::class, [
                'label' => 'Masse hydrique :'
            ])
            ->add('muscleMass', IntegerType::class, [
                'label' => 'Masse musculaire :',
            ])
            ->add('armCircumference', IntegerType::class, [
                'label' => 'Tour de bras :',
            ])
            ->add('waistSize', IntegerType::class, [
                'label' => 'Tour de taille :'
            ])
            ->add('thighCircumference', IntegerType::class, [
                'label' => 'Tour de cuisse :'
            ])
            ->add('ruffierDickstonTest', IntegerType::class, [
                'label' => 'Test Ruffier Dickston :'
            ])
            ->add('three', IntegerType::class, [
                'label' => 'Equilibre :'
            ])
            ->add('pathology', TextType::class, [
                'label' => 'Pathologie :'
            ])
            ->add('treatment', TextType::class, [
                'label' => 'Traitement :'
            ])
            ->add('prescription', TextType::class, [
                'label' => 'Prescription médicale :'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
