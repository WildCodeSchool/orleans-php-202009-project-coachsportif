<?php

namespace App\Controller;

use App\Repository\WalkingPicturesRepository;
use App\Repository\WalkingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class nordicWalkingController
 * @package App\Controller
 * @Route("/walking", name="walking_")
 */
class WalkingController extends AbstractController
{
    /**
     * @Route("/", name="show")
     * @param WalkingRepository $walkingRepository
     * @param WalkingPicturesRepository $walkingPicRepository
     * @return Response
     */
    public function show(
        WalkingRepository $walkingRepository,
        WalkingPicturesRepository $walkingPicRepository
    ): Response {
        $walks = $walkingRepository->findAll();
        $pictures = $walkingPicRepository->findAll();
        return $this->render('walking/show.html.twig', [
            'pictures' => $pictures,
            'walks' => $walks,
        ]);
    }
}
