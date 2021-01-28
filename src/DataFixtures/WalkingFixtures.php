<?php

namespace App\DataFixtures;

use App\Entity\Walking;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class WalkingFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $walking = new Walking();
        $walking->setPicture($faker->imageUrl(630, 420, 'sports'));
        $walking->setDescription("La marche nordique, c'est bon pour le corps, le cœur et l'esprit ! 
        Alors RDV tous les mardis 12h30-13h30 et mercredis 14h30-16h au Parc de Morchène à St Cyr en Val 
        pour arpenter les chemins... Mais pourquoi marcher ? et avec des bâtons ? La marche nordique est un 
        excellent sport d'endurance. En alternant des phases dynamiques et d'autres plus lentes, ce sport permet 
        de faire travailler et d'améliorer ses capacités cardiaques. Un sport de plein air qui vous redonne 
        du souffle tout en faisant travailler tous les muscles de votre corps. Avec des bâtons spécifiques, 
        la marche nordique tonifie vos muscles et entretient votre souplesse comme votre équilibre et la 
        coordination entre vos bras et vos jambes. La marche nordique est un excellent moyen de prévenir 
        certaines maladies et de rester en bonne santé. On commence ?");
        $walking->setPdf($faker->text);
        $manager->persist($walking);
        $manager->flush();
    }
}
