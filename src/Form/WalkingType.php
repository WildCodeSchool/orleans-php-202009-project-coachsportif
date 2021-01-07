<?php

namespace App\Form;

use App\Entity\Walking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class WalkingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', TextareaType::class, [
                'label' => 'Description :'
            ])
            ->add('pictureFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
                'label' => 'Image à télécharger :'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Walking::class,
        ]);
    }
}
