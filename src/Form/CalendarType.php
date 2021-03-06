<?php

namespace App\Form;

use App\Entity\Calendar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalendarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('start', DateTimeType::class, [
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'label' => 'Début'
            ])
            ->add('end', DateTimeType::class, [
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'label' => 'Fin'
            ])
            ->add('description', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Calendar::class,
        ]);
    }
}
