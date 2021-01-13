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
