<?php

namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompanyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $company = new Company();
        $company->setDescription("Aïe, aïe, aïe, j'ai mal à la nuque, au dos, au poignet, à la tête... 
        mais pourquoi ? C'est probablement dû à votre position de travail. Suite à un accident, une maladie 
        ou à un changement de bureau...il faut parfois réaliser des adaptations dans votre environnement : 
        suréléver votre écran, bien placer vos pieds, hauteur de votre chaise, type d'assise, orientation de 
        votre bureau, porte, fenêtre, distance de l'armoire, lumière, climatisation... Avec Damien faites un 
        point sur votre environnement et vos maux, il vous aidera à optimiser votre espace et vous prodiguera 
        de précieux conseils pour soulager vos tensions du quotidien. Un mot d'ordre : l'ergonomie appliquée !");
        $manager->persist($company);
        $manager->flush();
    }
}
