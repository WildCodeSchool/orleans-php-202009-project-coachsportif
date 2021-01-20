<?php

namespace App\DataFixtures;

use App\Entity\SportAdapte;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SportAdapteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
            $sportAdapte = new SportAdapte();
            $sportAdapte->setDescription('Ok, le sport c\'est bon pour la santé, mais comment me motiver et 
            trouver la fréquence et les exercices adaptés à ma situation ? Avec Coach Damien, c\'est 100% sur-mesure,
            avec des exercices adaptés à votre morphologie et à votre état de santé (sédentaire, pathologie ALD...).
            Un travail en duo, objectif bien-être et plaisir de prendre soin de son corps. 
            Des exercices graduels pour progresser en fonction de vos besoins et de vos attentes : 
            cardio, renforcement musculaire, souplesse, coordination, équilibre, avec ou sans matériel. 
            Une à 3 fois par semaine, pendant 1h ,nous pouvons travailler chez vous, dans ma salle privée, en vision, 
            en plein air... En cette période de pandémie, ma salle reste accessible aux personnes ayant une 
            prescription médicale pour la pratique de l\'activité physique. On commence ?');
            $manager->persist($sportAdapte);
            $manager->flush();
    }
}
