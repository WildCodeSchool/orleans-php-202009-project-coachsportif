<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $contact = new Contact();
        $contact->setEmail("damien_gouveia@hotmail.fr");
        $contact->setAdress('4 allee des Lilas');
        $contact->setCodeAndCity(' 45650 Saint-Jean-le-Blanc');
        $contact->setPhone('06 15 26 37 67');
        $manager->persist($contact);
        $manager->flush();
    }
}
