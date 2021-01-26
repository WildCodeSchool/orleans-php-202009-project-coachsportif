<?php

namespace App\Controller;

use App\Form\OpinionType;
use App\Repository\OpinionRepository;
use App\Repository\PresentationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/presentation")
 */
class WhoIAmController extends AbstractController
{
    /**
     * @Route("/", name="who")
     * @param OpinionRepository $opinionRepository
     * @param PresentationRepository $presentations
     * @return Response
     */
    public function index(
        OpinionRepository $opinionRepository,
        PresentationRepository $presentations
    ): Response {
        $opinions = $opinionRepository->findBy(['page' => OpinionType::WHO_PAGE,]);
        return $this->render('whoIAm/index.html.twig', [
            'presentations' => $presentations->findAll(),
            'opinions' => $opinions
        ]);
    }
}
