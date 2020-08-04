<?php

namespace App\DataFixtures;

use App\Entity\Jdr;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JdrFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $noms = array(
            'Shadowrun',
            'Shadowrun-Anarchy',
            'Dongeons&Dragons',
            'Vampire',
            'Werewolf',
            'Star-Wars',
            'L\'appel de Cthulhu',
            'Xin',
            'Légende des 5 anneaux',
        );

        foreach($noms as $nom) {
            $jdr = new Jdr();
            $jdr->setNom($nom);
            $manager->persist($jdr);
        }

        $manager->flush();
    }
}
