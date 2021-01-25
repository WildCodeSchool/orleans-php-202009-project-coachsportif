<?php

namespace App\DataFixtures;

use App\Entity\Opinion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class OpinionFixtures extends Fixture
{
    private const OPINION = [
        "who",
        "fitness",
        "walking",
        "adapted-activity",
        "company",
        "training",
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::OPINION as $opinionPage) {
            $faker = Faker\Factory::create('fr_FR');
            $opinion = new Opinion();
            $opinion->setPage($opinionPage);
            for ($count = 0; $count <= 6; $count++) {
                $opinion->setComment($faker->text);
                $opinion->setAuthor($faker->name);
                $manager->persist($opinion);
            }
        }
        $manager->flush();
    }
}
