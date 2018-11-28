<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    /**
     * UserFixtures constructor.
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $lucie = new User();
        $lucie->setFirstname('Lucie');
        $lucie->setLastname('Baudoin');
        $lucie->setEmail('l.baudoin@gmail.com');
        $lucie->setPassword($this->passwordEncoder->encodePassword($lucie, "lbaudoin"));
        $lucie->setPhone('0652414875');
        $lucie->setPicture('lucie-baudouin.jpg');
        $lucie->setRoles(["ROLE_USER"]);
        $manager->persist($lucie);
        $this->addReference('user-lucie', $lucie);

        $francois = new User();
        $francois->setFirstname('François');
        $francois->setLastname('Héline');
        $francois->setEmail('f.heline@gmail.com');
        $francois->setPassword($this->passwordEncoder->encodePassword($francois, "fheline"));
        $francois->setPhone('0632856161');
        $francois->setPicture('francois-heline.jpg');
        $francois->setRoles(["ROLE_USER"]);
        $manager->persist($francois);
        $this->addReference('user-francois', $francois);

        $pierre = new User();
        $pierre->setFirstname('Pierre');
        $pierre->setLastname('Jehan');
        $pierre->setEmail('p.jehan@gmail.com');
        $pierre->setPassword($this->passwordEncoder->encodePassword($pierre, "pjehan"));
        $pierre->setPhone('0623741182');
        $pierre->setPicture('pierre-jehan.jpg');
        $pierre->setRoles(["ROLE_USER"]);
        $manager->persist($pierre);
        $this->addReference('user-pierre', $pierre);

        $pazpok = new User();
        $pazpok->setFirstname('Paz');
        $pazpok->setLastname('Pok');
        $pazpok->setEmail('pazpok@gmail.com');
        $pazpok->setPassword($this->passwordEncoder->encodePassword($pazpok, "pazpok"));
        $pazpok->setPhone('0656565656');
        $pazpok->setPicture('');
        $pazpok->setRoles(["ROLE_ADMIN"]);
        $manager->persist($pazpok);
        $this->addReference('user-pazpok', $pazpok);
        $manager->flush();
    }
}
