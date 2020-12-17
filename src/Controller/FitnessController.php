<?php

namespace App\Controller;

use App\Repository\FitnessPicturesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FitnessController extends AbstractController
{
    /**
     * @Route("/remise_en_forme", name="fitness")
     * @param FitnessPicturesRepository $fitnessPicRepository
     * @return Response
     */
    public function index(FitnessPicturesRepository $fitnessPicRepository): Response
    {
        $pictures = $fitnessPicRepository->findAll();
        return $this->render('fitness/index.html.twig', [
            'pictures' => $pictures,
        ]);
    }
}
