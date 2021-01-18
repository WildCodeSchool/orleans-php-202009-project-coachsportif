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
        $faker = Faker\Factory::create('fr_FR',);

            $fitness = new Fitness();
            $fitness->setFitnessText('Vous avez arrêté le sport depuis longtemps, et voulez redevenir actif 
            avec l\'aide d\'un professionnel ? Je vous propose donc un programme de remise en forme ! Axé sur le 
            renforcement musculaire et des activités intense pour réveiller votre système cardio-vasculaire, Vous 
            retrouverez une forme physique rapidement et efficacement, dans une ambiance agréable et conviviale. 
            J\'ai à disposition pour vous, une salle équipé de tout les accessoires nécessaire pour des séances 
            agréable, intense, et sérieuses. Vous pourrez donc me retrouver dans cette salle de sport individuellement 
            ou en petit groupe, pour parvenir à votre objectif.');

            $manager->persist($fitness);
            $manager->flush();
    }
}
