<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $doudou = new Category();
        $doudou->setLabel('Doudou');
        $doudou->setIcon('fa-child');
        $doudou->setColor('#4da6ff');
        $manager->persist($doudou);
        $this->addReference('category-doudou',  $doudou);

        $portefeuille = new Category();
        $portefeuille->setLabel('Portefeuille');
        $portefeuille->setIcon('fa-credit-card');
        $portefeuille->setColor('#996600');
        $manager->persist($portefeuille);
        $this->addReference('category-portefeuille',  $portefeuille);

        $cle = new Category();
        $cle->setLabel('Cle');
        $cle->setIcon('fa-key');
        $cle->setColor('#808080');
        $manager->persist($cle);
        $this->addReference('category-cle',  $cle);

        $voiture = new Category();
        $voiture->setLabel('Voiture');
        $voiture->setIcon('fa-car');
        $voiture->setColor('#000000');
        $manager->persist($voiture);
        $this->addReference('category-voiture',  $voiture);

        $manager->flush();
    }
}
