<?php

namespace App\Controller;

use App\Entity\Scenario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ScenarioController extends AbstractController
{
    /**
     * @Route("/scenario", name="scenario")
     */
    public function index()
    {
        return $this->render('scenario/index.html.twig', [
            'controller_name' => 'ScenarioController',
        ]);
    }

}
