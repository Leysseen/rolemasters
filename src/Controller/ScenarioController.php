<?php

namespace App\Controller;

use App\Entity\Scenario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ScenarioController extends AbstractController
{
    /**
     * @Route("/scenario", name="scenarii")
     */
    public function index()
    {
        return $this->render('scenario/index.html.twig', [
            'controller_name' => 'ScenarioController',
        ]);
    }

    /**
     * @Route("/scenario/{id}", name="scenario", requirements={"id" = "\d+"})
     */
    public function view($id)
    {
        $scenario = $this->getDoctrine()
            ->getManager()
            ->getRepository(Scenario::class)
            ->find($id);

        return $this->render('scenario/view.html.twig', [
            'scenario' => $scenario,
        ]);
    }

}
