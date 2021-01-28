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
        $gym->setGymText("Et si on avait une salle rien que pour nous ? Avec votre coach Damien profitez 
        pour vos entraînements d'une salle de sport privée à Saint Jean le Blanc ouverte de 7h à 21h. Une salle 
        intimiste pour 2 ou 3 personnes afin de faciliter l'individualisation de vos efforts ! OK, mais il y a du 
        bon matériel ? Vélo, tapis de course, rameur, sangle de renforcement, espalier, élastiques... 
        et plein de petit matériel pour rendre les exercices encore plus ludiques !! 
        Pour plus d'infos contactez-moi !");
        $manager->persist($gym);
        $manager->flush();
    }
}
