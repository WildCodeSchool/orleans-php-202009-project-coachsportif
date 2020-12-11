<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FitnessController extends AbstractController
{
    /**
     * @Route("/remiseEnForme", name="fitness")
     */
    public function index(): Response
    {
        return $this->render('fitness/index.html.twig');
    }
}
