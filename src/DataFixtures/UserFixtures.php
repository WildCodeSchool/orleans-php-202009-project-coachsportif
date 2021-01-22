<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
// Création d’un utilisateur de type “contributeur” (= auteur)
        $member = new User();
        $member->setEmail('membre@monsite.com');
        $member->setRoles(['ROLE_MEMBER']);
        $member->setAge(23);
        $member->setArmCircumference(33);
        $member->setBodyWater(50);
        $member->setFatMass(14);
        $member->setImc(18);
        $member->setFirstname('Michel');
        $member->setLastname('Mipoivre');
        $member->setMuscleMass(170);
        $member->setPathology('Palu');
        $member->setPrescription('Marijuanas');
        $member->setRuffierDickstonTest(5);
        $member->setSize(180);
        $member->setThree(35);
        $member->setThighCircumference(35);
        $member->setTreatment('travailler');
        $member->setWaistSize(60);
        $member->setPassword($this->passwordEncoder->encodePassword(
            $member,
            '$memberpassword'
        ));

        $manager->persist($member);

        // Création d’un utilisateur de type “administrateur”
        $admin = new User();
        $admin->setEmail('Coach@monsite.com');
        $admin->setRoles(['ROLE_COACH']);
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'Coachpassword'
        ));

        $manager->persist($admin);

        // Sauvegarde des 2 nouveaux utilisateurs :
        $manager->flush();
    }
}
