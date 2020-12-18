<?php

namespace App\DataFixtures;

use App\Entity\Opinion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class OpinionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_Fr');
        for ($i = 0; $i <= 2; $i++) {
            $opinion = new Opinion();
            $opinion->setComment($faker->text);
            $opinion->setAuthor($faker->name);
            $manager->persist($opinion);
        }
        $manager->flush();
    }
}
