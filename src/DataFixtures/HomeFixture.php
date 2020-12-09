<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HomeFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $home = new Home();
        $home->setText('Vous accompagner dans votre pratique physique, sur mesure, dans mon chaleureux studio 
        d’entraînement en petit groupe ou en individuel, en privilégiant la notion de plaisir et d’accomplissement.
        Que vous souhaitiez retrouver/entretenir votre condition physique ou que vous ayez besoin de prévenir/réduire 
        les effets d’une pathologie je saurai rendre agréable votre pratique tout en répondant à vos attentes.');
        $manager->persist($home);
        $manager->flush();
    }
}
