<?php

namespace App\Form;

use App\Entity\Opinion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OpinionType extends AbstractType
{
    public const FITNESS_PAGE = 'fitness';
    public const ADAPTED_PAGE = 'adapted-activity';
    public const WALKING_PAGE = 'walking';
    public const COMPANY_PAGE = 'company';
    public const TRAINING_PAGE = 'training';
    public const WHO_PAGE = 'who';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('author', TextType::class, ['label' => 'Auteur'])
            ->add('comment', TextType::class, ['label' => 'Commentaire'])
            ->add('page', ChoiceType::class, [
                'choices' => [
                    'Marche nordique' => self::WALKING_PAGE,
                    'Qui suis-je ?' => self::WHO_PAGE,
                    'Remise en forme' => self::FITNESS_PAGE,
                    'La salle d\'entrainement' => self::TRAINING_PAGE,
                    'Santé en entreprise' => self::COMPANY_PAGE,
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
