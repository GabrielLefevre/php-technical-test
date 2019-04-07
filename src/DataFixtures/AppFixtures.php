<?php

namespace App\DataFixtures;

use App\Entity\TypeRunning;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $names = ['Entraînement', 'Course', 'Compétition'];

        foreach ($names as $name) {
            $type = new TypeRunning();
            $type->setName($name);

            $manager->persist($type);
        }

        $manager->flush();
    }
}
