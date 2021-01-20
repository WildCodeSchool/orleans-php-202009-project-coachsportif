<?php

namespace App\DataFixtures;

use App\Entity\Media;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MediaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $media = new Media();
        $media->setIdYoutube('uK4X_1dxyRA');
        $media->setTitle('Damien Gouveia');
        $manager->persist($media);
        $manager->flush();
    }
}
