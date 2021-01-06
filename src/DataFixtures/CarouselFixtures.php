<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarouselFixtures extends Fixture
{
    private const PICTURE = [
        "placeholder.png" => "home",
        "placeholder2.jpg" => "fitness",
        "placeholder3.jpg" => "walking",
    ];


    public function load(ObjectManager $manager)
    {
        foreach (self::PICTURE as $pictureName => $pageName) {
            $carousel = new Carousel();
            $carousel->setPath($pictureName);
            $carousel->setPage($pageName);
            $manager->persist($carousel);
        }
        $manager->flush();
    }
}
