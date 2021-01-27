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
            $fitness = new Fitness();
            $fitness->setFitnessText("Et si le secret pour rester ou retrouver la forme était la régularité 
            et le sourire en fin de séance ... Coach Damien vous accompagne pour ne rien lâcher de vos objectifs ! 
            Nous mettrons en place un programme adapté avec des exercices variés : renforcement musculaire général / 
            exercice sans charge ou petits matériels (sangle, élastique, petits poids) / 
            méthodes inspirées du Pilates /cardio (vélo, rameur, tapis de marche / course) avec comme fil conducteur 
            le respect de votre corps. Pour le décor, nous pouvons travailler dans ma salle, chez vous, sur les bords 
            de loire, sur un stade, en visio... et la fréquence s'adapte à vos besoins et à votre emploi du temps ! 
            On commence ?");
            $manager->persist($fitness);
            $manager->flush();
    }
}
