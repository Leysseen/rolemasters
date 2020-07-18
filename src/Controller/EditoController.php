<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EditoController extends AbstractController
{
    /**
     * @Route("/", name="edito")
     */
    public function index()
    {
        return $this->render('edito/index.html.twig', [
            'controller_name' => 'EditoController',
        ]);
    }
}
