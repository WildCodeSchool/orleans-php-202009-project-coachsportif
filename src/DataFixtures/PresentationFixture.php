<?php

namespace App\DataFixtures;

use App\Entity\Presentation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PresentationFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $presentation = new Presentation();
        $presentation->setDescription("Après avoir travaillé pendant plusieurs années dans la préparation 
        physique, mais aussi dans le monde de l’entrainement auprès de sportifs professionnels. J'ai eu envie de 
        donner un véritable sens, un accomplissement à ma vie professionnelle :
        Accompagner les personnes dans leur prise en charge de la santé. Participer à améliorer leur qualité de vie
        Je mets alors à contribution, mon expérience, mes savoirs et compétences acquis
        dans le domaine de l’entrainement au profit de personnes sédentaires, peu sportives ou atteintes de pathologies.
        Ma complémentarité avec les professionnels de santé
        (médecins, endocrinologues, kinésithérapeutes, ostéopathes, … )
        avec qui je collabore quotidiennement permet d’établir un véritable travail d’équipe qui n’en rendra
        notre travail que plus efficace.");
        $manager->persist($presentation);
        $manager->flush();
    }
}
