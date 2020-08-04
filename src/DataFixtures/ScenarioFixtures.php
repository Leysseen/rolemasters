<?php

namespace App\DataFixtures;

use App\Entity\Jdr;
use App\Entity\Scenario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ScenarioFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $shadow = $manager->getRepository(Jdr::class)
            ->findOneBy(array('nom' => 'Shadowrun-Anarchy'));
        $scenarii = array(
            array(
                'titre' => 'Le sang bleu',
                'pitch' => 'Les androïdes sont fabriqués à la chaine.',
                'jdr' => $shadow,
            ),
            array(
                'titre' => 'Le père des machines',
                'pitch' => 'Un technomancien au prise avec ses scrupules et sous le joug d\'EVO.',
                'jdr' => $shadow,
            )
        );

        foreach($scenarii as $ceScenar) {
            $scenar = new Scenario();
            foreach ($ceScenar as $key => $value) {
                if('titre' == $key) {
                    $scenar->setTitre($value);
                }
                if('pitch' == $key) {
                    $scenar->setPitch($value);
                }
                if('jdr' == $key) {
                    $scenar->setJdr($value);
                }

                $manager->persist($scenar);
            }
        }

        $manager->flush();
    }
}
