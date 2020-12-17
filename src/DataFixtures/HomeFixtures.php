<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HomeFixtures extends Fixture
{
    const PICTURE = [
        "DamienG.0f310ae1.jpg",
    ];

    public function load(ObjectManager $manager)
{

        foreach (self::PICTURE as $key => $pictureName) {
            $home = new Home();
            $home->setText('Vous accompagner dans votre pratique physique, sur mesure, dans mon chaleureux studio 
            d’entraînement en petit groupe ou en individuel, en privilégiant la notion de plaisir et d’accomplissement.
            Que vous souhaitiez retrouver/entretenir votre condition physique ou que vous ayez besoin de prévenir/réduire 
            les effets d’une pathologie je saurai rendre agréable votre pratique tout en répondant à vos attentes.');
            $home->setPicture($pictureName);
            $manager->persist($home);
        }
            $manager->flush();
    }
}
