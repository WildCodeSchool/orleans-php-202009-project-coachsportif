<?php

namespace App\DataFixtures;

use App\Entity\SportAdapte;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class SportAdapteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i <= 4; $i++) {
            $sportAdapte = new SportAdapte();
            $sportAdapte->setPicture($faker->imageUrl(630, 420, 'sports'));
            $sportAdapte->setDescription($faker->text);
            $manager->persist($sportAdapte);
        }
        $manager->flush();
    }
}
