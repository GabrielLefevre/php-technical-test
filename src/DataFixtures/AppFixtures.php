<?php

namespace App\DataFixtures;

use App\Entity\TypeRunning;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $password = $this->encoder->encodePassword($admin, 'pass_1234');

        $admin->setRoles(['ROLE_ADMIN'])->setUsername('admin')->setPassword($password);
        $manager->persist($admin);

        $names = ['Entraînement', 'Course', 'Compétition'];

        foreach ($names as $name) {
            $type = new TypeRunning();
            $type->setName($name);

            $manager->persist($type);
        }

        $manager->flush();
    }
}
