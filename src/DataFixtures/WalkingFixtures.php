<?php

namespace App\DataFixtures;

use App\Entity\Walking;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class WalkingFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i <= 4; $i++) {
            $walking = new Walking();
            $walking->setPicture($faker->imageUrl(400, 250, 'sports'));
            $walking->setDescription($faker->text);
            $manager->persist($walking);
        }
        $manager->flush();
    }
}
