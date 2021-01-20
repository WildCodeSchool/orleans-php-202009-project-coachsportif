<?php

namespace App\Controller;

use App\Form\OpinionType;
use App\Repository\OpinionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/who")
 */
class WhoIAmController extends AbstractController
{
    /**
     * @Route("/", name="who")
     * @param OpinionRepository $opinionRepository
     * @return Response
     */
    public function index(OpinionRepository $opinionRepository): Response
    {
        $opinions = $opinionRepository->findBy(['page' => OpinionType::WHO_PAGE,]);
        return $this->render('whoIAm/index.html.twig', [
            'opinions' => $opinions
        ]);
    }
}
