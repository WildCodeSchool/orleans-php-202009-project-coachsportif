<?php

namespace App\DataFixtures;

use App\Entity\FitnessPictures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FitnessPicturesFixtures extends Fixture
{
    private const PICTURE = [
        "remise_en_forme_carousel.de8ad0d4.jpg",
        "remise_en_forme_carousel_2.b2419913.jpg",
        "fondSectionSport.e0b81bd1.jpg"
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PICTURE as $pictureName) {
            $home = new FitnessPictures();
            $home->setPicture($pictureName);
            $manager->persist($home);
        }
            $manager->flush();
    }
}
