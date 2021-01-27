<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarouselFixtures extends Fixture
{
    private const PICTURE = [
        "placeholder.png" => "home",
        "placefitness.png" => "fitness",
        "fondSectionSport.jpg" => "walking",
        "nordic_walking_place_holder_1.jpg" => "adapted-activity",
        "nordic_walking_place_holder_2.jpg" => "company",
        "placeWalking.png" => "training",
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
