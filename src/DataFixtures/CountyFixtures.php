<?php
namespace App\DataFixtures;
use App\Entity\County;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
class CountyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    { $counties = [
        ["Cotes-Armor", "22" ],
        ["Finistere", "29" ],
        ["Ille-et-Vilaine", "35" ],
        ["Morbihan", "56" ],
    ];
        foreach ($counties as $key => $county) {
            $coun = new County();
            $coun->setLabel($county[0]);
            $coun->setZipcode($county[1]);
            $manager->persist($coun);
            $this->setReference('county-' . ($key + 1), $coun);
        }
        $manager->flush();
    }
}