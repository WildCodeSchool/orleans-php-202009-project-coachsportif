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
            'label' => 'Nom',
                'required' => false,
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'required' => false,
            ])
            ->add('age', IntegerType::class, [
                'label' => 'Age',
                'required' => false,
            ])
            ->add('size', IntegerType::class, [
                'label' => 'Taille',
                'required' => false,
            ])
            ->add('imc', IntegerType::class, [
                'label' => 'IMC',
                'required' => false,
            ])
            ->add('weight', IntegerType::class, [
                'label' => 'Poids',
                'required' => false,
            ])
            ->add('fatMass', IntegerType::class, [
                'label' => 'Masse graisseuse',
                'required' => false,
            ])
            ->add('bodyWater', IntegerType::class, [
                'label' => 'Masse hydrique',
                'required' => false,
            ])
            ->add('muscleMass', IntegerType::class, [
                'label' => 'Masse musculaire',
                'required' => false,
            ])
            ->add('armCircumference', IntegerType::class, [
                'label' => 'Tour de bras',
                'required' => false,
            ])
            ->add('waistSize', IntegerType::class, [
                'label' => 'Tour de taille',
                'required' => false,
            ])
            ->add('thighCircumference', IntegerType::class, [
                'label' => 'Tour de cuisse',
                'required' => false,
            ])
            ->add('ruffierDickstonTest', IntegerType::class, [
                'label' => 'Test Ruffier Dickston',
                'required' => false,
            ])
            ->add('three', IntegerType::class, [
                'label' => 'Equilibre',
                'required' => false,
            ])
            ->add('pathology', TextType::class, [
                'label' => 'Pathologie',
                'required' => false,
            ])
            ->add('treatment', TextType::class, [
                'label' => 'Traitement',
                'required' => false,
            ])
            ->add('prescription', TextType::class, [
                'label' => 'Prescription médicale',
                'required' => false,
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
