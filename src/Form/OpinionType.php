<?php

namespace App\Form;

use App\Entity\Opinion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OpinionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('author')
            ->add('comment')
            ->add('page', ChoiceType::class, [
                'choices' => [
                    'Remise en forme' => 'fitness',
                    'Sport adapter' => 'adapted-activity',
                    'Marche nordique' => 'walking',
                    'Santé en entreprise' => 'company',
                    'La salle d\'entrainement' => 'training',
                    'Qui suis-je ?' => 'who',
                ]]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Opinion::class,
        ]);
    }
}
