<?php

namespace App\DataFixtures;

use App\Entity\County;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CountyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $cotesdarmor = new County();
        $cotesdarmor->setLabel('Côtes d\'Armor');
        $cotesdarmor->setZipcode(22);
        $manager->persist($cotesdarmor);
        $this->addReference('county-22',  $cotesdarmor);

        $finistere = new County();
        $finistere->setLabel('Finistère');
        $finistere->setZipcode(29);
        $manager->persist($finistere);
        $this->addReference('county-29',  $finistere);

        $illeetvilaine = new County();
        $illeetvilaine->setLabel('Ille et Vilaine');
        $illeetvilaine->setZipcode(35);
        $manager->persist($illeetvilaine);
        $this->addReference('county-35',  $illeetvilaine);

        $morbihan = new County();
        $morbihan->setLabel('Morbihan');
        $morbihan->setZipcode(56);
        $manager->persist($morbihan);
        $this->addReference('county-56',  $morbihan);

        $manager->flush();
    }
}
