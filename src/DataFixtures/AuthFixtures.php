<?php

namespace App\DataFixtures;

use App\Entity\Auth;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $levels = array(
            'Invité',
            'Inscrit',
            'Modérateur',
            'Administrateur'
        );

        foreach($levels as $level) {
            $auth = new Auth();
            $auth->setLevel($level);
            $manager->persist($auth);
        }

        $manager->flush();
    }
}
