<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Form\OpinionType;
use App\Repository\CarouselRepository;
use App\Repository\GymRepository;
use App\Repository\OpinionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GymController
 * @package App\Controller
 * @Route("/salle-entrainement")
 */
class GymController extends AbstractController
{
    /**
     * @Route("/", name="gym", methods={"GET"})
     * @param GymRepository $gymRepository
     * @param OpinionRepository $opinionRepository
     * @param CarouselRepository $carouselRepository
     * @return Response
     */
    public function index(
        GymRepository $gymRepository,
        OpinionRepository $opinionRepository,
        CarouselRepository $carouselRepository
    ): Response {
        $opinions = $opinionRepository->findBy(['page' => OpinionType::TRAINING_PAGE]);
        $pictures = $carouselRepository->findBy(['page' => CarouselType::TRAINING_PAGE]);
        $gymtexts = $gymRepository->findAll();
        return $this->render('gym/index.html.twig', [
            'gymtexts' => $gymtexts,
            'pictures' => $pictures,
            'opinions' => $opinions,
        ]);
    }
}
