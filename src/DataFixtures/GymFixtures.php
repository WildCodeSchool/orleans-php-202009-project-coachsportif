<?php

namespace App\DataFixtures;

use App\Entity\Gym;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GymFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $gym = new Gym();
        $gym->setGymText('Je vous accueillerais dans mon humble salle d\'entrainement. Il y aura à votre disposition
        tout les accessoires liés à votre programme, que ce soit pour une perte de poids, ou activité adaptée.
        Il y a un tapis de course, des medecine balls, un rameur, et bien d\'autres');

        $manager->persist($gym);
        $manager->flush();
    }
}
