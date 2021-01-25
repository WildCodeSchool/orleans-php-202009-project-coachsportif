<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\ActivityType;
use App\Form\CarouselType;
use App\Form\OpinionType;
use App\Repository\ActivityRepository;
use App\Repository\CarouselRepository;
use App\Repository\OpinionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/activity")
 */
class ActivityController extends AbstractController
{
    /**
     * @Route("/", name="activity_index", methods={"GET"})
     * @param ActivityRepository $activityRepository
     * @param CarouselRepository $carouselRepository
     * @param OpinionRepository $opinionRepository
     * @return Response
     */
    public function index(
        ActivityRepository $activityRepository,
        CarouselRepository $carouselRepository,
        OpinionRepository $opinionRepository
    ): Response {
        $pictures = $carouselRepository->findBy(['page' => CarouselType::ADAPTED_PAGE]);
        $opinions = $opinionRepository->findBy(['page' => OpinionType::ADAPTED_PAGE]);
        return $this->render('activity/index.html.twig', [
            'activities' => $activityRepository->findAll(),
            'pictures' => $pictures,
            'opinions' => $opinions,
        ]);
    }
}
