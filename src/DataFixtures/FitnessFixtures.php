<?php

namespace App\DataFixtures;

use App\Entity\Fitness;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class FitnessFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i <= 4; $i++) {
            $fitness = new Fitness();
            $fitness->setFitnessText($faker->text);
            $manager->persist($fitness);

            $manager->flush();
        }
    }
}
