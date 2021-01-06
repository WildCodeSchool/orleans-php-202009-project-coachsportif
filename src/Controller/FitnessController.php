<?php

namespace App\Controller;

use App\Repository\CarouselRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FitnessController extends AbstractController
{
    /**
     * @Route("/remise_en_forme", name="fitness")
     * @param CarouselRepository $carouselRepository
     * @return Response
     */
    public function index(CarouselRepository $carouselRepository): Response
    {
        $pictures = $carouselRepository->findBy(['page' => 'fitness']);
        return $this->render('fitness/index.html.twig', ['pictures' => $pictures,]);
    }
}
