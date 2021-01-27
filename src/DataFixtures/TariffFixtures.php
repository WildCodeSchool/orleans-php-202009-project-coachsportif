<?php

namespace App\DataFixtures;

use App\Controller\AdminTariffController;
use App\Entity\Tariff;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TariffFixtures extends Fixture
{
    private const TARIFS = [
        "Sport en salle" => "35",
        "Marche nordique" => "135",
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::TARIFS as $seance => $price) {
            $tarif = new Tariff();
            $tarif->setDescription("Pour plus d'informations sur les tarifs n'hésitez pas à m'envoyer un email.");
            $tarif->setPrice($price);
            $tarif->setTitle($seance);
            $manager->persist($tarif);
        }
        $manager->flush();
    }
}
