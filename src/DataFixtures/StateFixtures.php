<?php
namespace App\DataFixtures;
use App\Entity\State;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
class StateFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    { $states = [
        ["Trouvé", "far fa-smile-beam", "badge-lost"],
        ["Perdu", "far fa-sad-tear", "badge-lost"],
    ];
        foreach ($states as $key => $state) {
            $st = new State();
            $st->setLabel($state[0]);
            $st->setColor($state[1]);
            $manager->persist($st);
            $this->setReference('state-' . ($key + 1), $st);
        }
        $manager->flush();
    }
}