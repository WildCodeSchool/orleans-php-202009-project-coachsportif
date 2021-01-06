<?php

namespace App\Controller;

use App\Entity\Tariff;
use App\Repository\TariffRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin/tarifs", name="tarif_")
 */
class AdminTariffController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param TariffRepository $tariffRepository
     * @return Response
     */
    public function index(TariffRepository $tariffRepository): Response
    {
        return $this->render('admin/tarif/index.html.twig', [
            'tarifs' => $tariffRepository->findAll()]);
    }

    /**
     * @Route("/new", name="new")
     * @param Request $request
     * @return Response
     */
}
