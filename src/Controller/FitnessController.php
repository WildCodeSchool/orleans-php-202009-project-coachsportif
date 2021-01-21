<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Form\OpinionType;
use App\Repository\OpinionRepository;
use App\Repository\CarouselRepository;
use App\Entity\Fitness;
use App\Form\FitnessType;
use App\Repository\FitnessRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FitnessController
 * @package App\Controller
 * @Route("/fitness")
 */
class FitnessController extends AbstractController
{
    /**
     * @Route("/", name="fitness", methods={"GET"})
     * @param FitnessRepository $fitnessRepository
     * @param CarouselRepository $carouselRepository
     * @param OpinionRepository $opinionRepository
     * @return Response
     */
    public function index(
        FitnessRepository $fitnessRepository,
        CarouselRepository $carouselRepository,
        OpinionRepository $opinionRepository
    ): Response {
        $opinions = $opinionRepository->findBy(['page' => OpinionType::FITNESS_PAGE]);
        $pictures = $carouselRepository->findBy(['page' => CarouselType::FITNESS_PAGE]);
        $descriptions = $fitnessRepository->findAll();
        return $this->render('fitness/index.html.twig', [
            'descriptions' => $descriptions,
            'pictures' => $pictures,
            'opinions' => $opinions,
        ]);
    }
}
