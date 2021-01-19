<?php

namespace App\Controller;

use App\Repository\OpinionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/who")
 */
class WhoIAmController extends AbstractController
{
    private const WHO_PAGE = "who";

    /**
     * @Route("/", name="who")
     * @param OpinionRepository $opinionRepository
     * @return Response
     */
    public function index(OpinionRepository $opinionRepository): Response
    {
        $opinions = $opinionRepository->findBy(['page' => self::WHO_PAGE,]);
        return $this->render('whoIAm/index.html.twig', [
            'opinions' => $opinions
        ]);
    }
}
