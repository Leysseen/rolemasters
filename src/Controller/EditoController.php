<?php

namespace App\Controller;

use App\Entity\Edito;
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
}
