<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarouselFixtures extends Fixture
{
    private const PICTURE = [
        "placeholder.png" => "Accueil",
        "placefitness.png" => "fitness",
        "fondSectionSport.jpg" => "Marche-nordique",
        "nordic_walking_place_holder_1.jpg" => "Activité-adapté",
        "nordic_walking_place_holder_2.jpg" => "Entreprise",
        "placeWalking.png" => "Salle-de-sport",
    ];


    public function load(ObjectManager $manager)
    {
        foreach (self::PICTURE as $pictureName => $pageName) {
            $carousel = new Carousel();
            $carousel->setPath($pictureName);
            $carousel->setPage($pageName);
            $manager->persist($carousel);
        }
        $manager->flush();
    }
}
