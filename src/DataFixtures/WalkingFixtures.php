<?php

namespace App\DataFixtures;

use App\Entity\Walking;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class WalkingFixtures extends Fixture
{
    private const PICTURE = [
        "nordic_walking_place_holder_1.6196b858.jpg",
        "nordic_walking_place_holder_2.8b9eb201.jpg",
        "nordic_walking_place_holder_3.65e40320.jpg"
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PICTURE as $pictureName) {
            $walking = new Walking();
            $walking->setPicture($pictureName);
            $faker = Faker\Factory::create('fr_FR');
            for ($image = 0; $image <= 4; $image++) {
                $walking->setDescription($faker->text);
                $manager->persist($walking);
            }
        }
        $manager->flush();
    }
}
