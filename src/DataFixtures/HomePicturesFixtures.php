<?php

namespace App\DataFixtures;

use App\Entity\Home;
use App\Entity\HomePictures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HomePicFixtures extends Fixture
{
    private const PICTURE = [
        "overlay.3e600b29.jpg",
        "backgroundFitness.bcc3e096.jpg",
        "fondSectionSport.e0b81bd1.jpg"
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PICTURE as $key => $pictureName) {
            $home = new HomePictures();
            $home->setPicture($pictureName);
            $manager->persist($home);
        }
            $manager->flush();
    }
}
