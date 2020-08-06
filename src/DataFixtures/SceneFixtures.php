<?php

namespace App\DataFixtures;

use App\Entity\Scenario;
use App\Entity\Scene;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SceneFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $scenario = $manager->getRepository(Scenario::class)
            ->findOneBy(array("titre" => "Le sang bleu"));

        $scene = new Scene();
        $scene->setTitre('Briefing de Mme Wu');
        $scene->setScenario($scenario);
        $scene->setRang(1);
        $scene->setContenu('<p>Mme Wu vous reçoit comme l\'autre fois dans cet étrange bureau inoccupé.</p>');
        // 2
        $scene2 = new Scene();
        $scene2->setTitre('Recherche d\'informations');
        $scene2->setScenario($scenario);
        $scene2->setRang(2);
        $scene2->setContenu('<p>Les personnages devraient tenter de glâner un maximum d\'informations pour établir un plan d\'action.</p>');

        $manager->persist($scene);
        $manager->persist($scene2);

        $manager->flush();
    }
}
