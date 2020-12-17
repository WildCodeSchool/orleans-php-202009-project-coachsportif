<?php

namespace App\DataFixtures;

use App\Entity\WalkingPictures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WalkingPicturesFixtures extends Fixture
{
    private const PICTURE = [
        "nordic_walking_place_holder_1.6196b858.jpg",
        "nordic_walking_place_holder_2.8b9eb201.jpg",
        "nordic_walking_place_holder_3.65e40320.jpg"
    ];

    public function load(ObjectManager $manager)
    {

        foreach (self::PICTURE as $pictureName) {
            $walking = new WalkingPictures();
            $walking->setPicture($pictureName);
            $manager->persist($walking);
        }
            $manager->flush();
    }
}
