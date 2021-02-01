<?php

namespace App\Form;

use App\Entity\Carousel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class CarouselType extends AbstractType
{
    public const FITNESS_PAGE = 'fitness';
    public const ADAPTED_PAGE = 'adapted-activity';
    public const WALKING_PAGE = 'walking';
    public const COMPANY_PAGE = 'company';
    public const TRAINING_PAGE = 'training';
    public const HOME_PAGE = 'home';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('page', ChoiceType::class, [
                'label' => 'Choisir une page',
                'choices' => [
                    'Accueil' => self::HOME_PAGE,
                    'Marche nordique' => self::WALKING_PAGE,
                    'Remise en forme' => self::FITNESS_PAGE,
                    'La salle d\'entrainement' => self::TRAINING_PAGE,
                    'Santé en entreprise' => self::COMPANY_PAGE,
                    'Sport adapté' => self::ADAPTED_PAGE,
                ]])
            ->add('pathFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
                'label' => 'Image à télécharger'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Carousel::class,
        ]);
    }
}
