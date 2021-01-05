<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarouselFixtures extends Fixture
{
    private const PICTURE = [
        "fondSectionSport.jpg" => "home",
        "sportAdapte.jpg" => "home",
        "overlay.jpg" => "home",
        "remise_en_forme_carousel.jpg" => "fitness",
        "remise_en_forme_carousel_2.jpg" => "fitness",
        "remise_en_forme_carousel.de8ad0d4.jpg" => "fitness",
        "nordic_walking_place_holder_4.jpg" => "walking",
        "nordic_walking_place_holder_2.jpg" => "walking",
        "nordic_walking_place_holder_3.jpg" => "walking",
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
