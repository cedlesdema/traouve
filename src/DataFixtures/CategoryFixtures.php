<?php
namespace App\DataFixtures;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    { $categories = [
        ["High-tech", "fas fa-mobile", "blue"],
        ["Portefeuille", "fas fa-wallet", "grey"],
        ["Jouets", "fas fa-truck-monster", "yellow" ],
        ["Clés", "fas fa-key", "orange" ],
        ["Vetements", "fas fa-tshirt", "purple" ],
    ];
        foreach ($categories as $key => $category) {
            $cat = new Category();
            $cat->setLabel($category[0]);
            $cat->setIcon($category[1]);
            $cat->setColor($category[2]);
            $manager->persist($cat);
            $this->setReference('category-' . ($key + 1), $cat);
        }
        $manager->flush();
    }
}