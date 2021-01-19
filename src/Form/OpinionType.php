<?php

namespace App\Form;

use App\Entity\Opinion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OpinionType extends AbstractType
{
    private const FITNESS_PAGE = 'fitness';
    private const ADAPTED_PAGE = 'adapted-activity';
    private const WALKING_PAGE = 'walking';
    private const COMPAGNY_PAGE = 'company';
    private const TRAINING_PAGE = 'training';
    private const WHO_PAGE = 'who';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('author')
            ->add('comment')
            ->add('page', ChoiceType::class, [
                'choices' => [
                    'Marche nordique' => self::WALKING_PAGE,
                    'Qui suis-je ?' => self::WHO_PAGE,
                    'Remise en forme' => self::FITNESS_PAGE,
                    'La salle d\'entrainement' => self::TRAINING_PAGE,
                    'Santé en entreprise' => self::COMPAGNY_PAGE,
                    'Sport adapté' => self::ADAPTED_PAGE,
                ]]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Opinion::class,
        ]);
    }
}
