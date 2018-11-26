<?php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class UsersFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail("ceddfulgore@gmail.com");
        $admin->setFirstname("ced");
        $admin->setLastname("fulgore");
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, "ceddf"));
        $manager->persist($admin);

        $faker = Factory::create('fr_FR');


        for ($i = 0; $i <= 3; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setPassword($this->passwordEncoder->encodePassword($user, "pass"));
            $manager->persist($user);
            $this->addReference('user-' . ($i + 1), $user);
        }
        $manager->flush();
    }
}