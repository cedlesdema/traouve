<?php

namespace App\DataFixtures;

use App\Entity\State;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StateFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $perdu = new State();
        $perdu->setLabel('Perdu');
        $perdu->setColor('#e62e00');
        $manager->persist($perdu);
        $this->addReference('state-perdu', $perdu);

        $trouve = new State();
        $trouve->setLabel('Trouvé');
        $trouve->setColor('#2eb82e');
        $manager->persist($trouve);
        $this->addReference('state-trouve', $trouve);


        $manager->flush();
    }
}
