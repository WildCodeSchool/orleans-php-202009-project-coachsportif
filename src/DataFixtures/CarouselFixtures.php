<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarouselFixtures extends Fixture
{
    private const PICTURE = [
        "overlay.3e600b29.jpg",
        "backgroundFitness.bcc3e096.jpg",
        "fondSectionSport.e0b81bd1.jpg"
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PICTURE as $pictureName) {
            $carousel = new Carousel();
            $carousel->setPath($pictureName);
            $carousel->setPage('home');
            $manager->persist($carousel);
        }
        $manager->flush();
    }
}
