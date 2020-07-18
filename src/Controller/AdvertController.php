<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class AdvertController extends AbstractController
{
    /**
     * @Route("/advert", name="advert")
     */
    public function index(Environment $twig)
    {
        $content = $twig->render('advert/index.html.twig', [
            'controller_name' => 'AdvertController',
        ]);

        return new Response($content);
    }

    public function add()
    {

    }

    public function
}
