<?php

namespace App\Controller;

use App\Entity\Edito;
use App\Entity\Scenario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EditoController extends AbstractController
{
    /**
     * @Route("/", name="edito")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $repEdito = $em->getRepository(Edito::class);
        $edito = $repEdito->findBy(array('published' => true));

        return $this->render('edito/index.html.twig', [
            'controller_name' => 'EditoController',
            'edito' => $edito[0],
        ]);
    }

    public function menuLastScenarii()
    {
        $scenarii = $this->getDoctrine()
            ->getManager()
            ->getRepository(Scenario::class)
            ->findBy(array("published" => true),array("createdAt" => "DESC"),4);

        return $this->render('scenario/last.html.twig', [
            'scenarii' => $scenarii,
        ]);
    }
}
