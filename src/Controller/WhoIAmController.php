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
    /**
     * @Route("/", name="who")
     * @param OpinionRepository $opinionRepository
     * @return Response
     */
    public function index(OpinionRepository $opinionRepository): Response
    {
        $opinions = $opinionRepository->findAll();
        return $this->render('whoIAm/index_admin.html.twig', [
            'opinions' => $opinions
        ]);
    }
}
