<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;
use App\Entity\Traobject;

class TraobjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $traobjects = [
            ["Portefeuille retrouvé boulevard Louis Pasteur ", new \DateTime('2018-11-20'),
                "Bruz", $this->getReference("state-1"), $this->getReference("category-2"),
                $this->getReference('user-' . $faker->numberBetween(1, 3)), $this->getReference("county-1")],
            ["Clés retrouvées dans un vestiaires à la piscine", new \DateTime('2018-11-19'),
                "quimper", $this->getReference("state-2"), $this->getReference("category-1"),
                $this->getReference('user-' . $faker->numberBetween(1, 3)), $this->getReference("county-2")],
            ["Ours en peluche à villejean", new \DateTime('2018-11-19'),
                "Rennes", $this->getReference("state-1"), $this->getReference("category-3"),
                $this->getReference('user-' . $faker->numberBetween(1, 3)), $this->getReference("county-1")],
            ["Clés perdues au Cinema", new \DateTime('2018-11-12'),
                "Lorient", $this->getReference("state-1"), $this->getReference("category-2"),
                $this->getReference('user-' . $faker->numberBetween(1, 3)), $this->getReference("county-4")],
        ];
        foreach ($traobjects as $key => $traobject) {
            $traobj = new Traobject();
            $traobj->setTitle($traobject[0]);
            $traobj->setEventAt($traobject[1]);
            $traobj->setCity($traobject[2]);
            $traobj->setState($traobject[3]);
            $traobj->setCategory($traobject[4]);
            $traobj->setUser($traobject[5]);
            $traobj->setCounty($traobject[6]);
            $manager->persist($traobj);
            $this->setReference('traobject-' . ($key + 1), $traobj);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [UsersFixtures::class, StateFixtures::class, CategoryFixtures::class, CountyFixtures::class];
    }
}