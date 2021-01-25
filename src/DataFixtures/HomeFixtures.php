<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HomeFixtures extends Fixture
{
    private const PICTURE = [
        "placeholder150.png",
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PICTURE as $pictureName) {
            $home = new Home();
            $home->setText("Et si nous prenions plaisir à faire du sport ? C'est le défi que je me lance et que 
            je vous lance ! Et si quelques séances de sport nous permettaient... d'avoir plus d'énergie, de nous 
            reconnecter avec notre corps, de mieux nous connaître, d'être plus joyeux, d'être fier de soi, 
            d'avoir envie de progresser, de découvrir de nouvelles capacités ou de nouveaux muscles..., 
            d'aimer pratiquer au grand air, de se sentir bien... Et si vous tentiez l'aventure... 
            Je vous propose un accompagnement sur-mesure pour être en forme au quotidien !");
            $home->setPicture($pictureName);
            $manager->persist($home);
        }   $manager->flush();
    }
}
