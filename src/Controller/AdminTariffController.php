<?php

namespace App\Controller;

use App\Entity\Tariff;
use App\Form\TariffType;
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
    public function new(Request $request): Response
    {
        $tariff = new Tariff();
        $form = $this->createForm(TariffType::class, $tariff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($tariff);
            $entityManager->flush();
            $this->addFlash('success', 'Le nouveau tarif à bien été crée');

            return $this->redirectToRoute('tarif_index');
        }
        return $this->render('admin/tarif/new.html.twig', ["form" => $form->createView()]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     * @param Request $request
     * @param Tariff $tarif
     * @return Response
     */
    public function edit(Request $request, tariff $tarif): Response
    {
        $form = $this->createForm(TariffType::class, $tarif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Le tarif à bien été modifier');


            return $this->redirectToRoute('tarif_index');
        }
        return $this->render('admin/tarif/edit.html.twig', [
            'tarif' => $tarif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     * @param Request $request
     * @param Tariff $tarif
     * @return Response
     */
    public function delete(Request $request, Tariff $tarif): Response
    {
        if ($this->isCsrfTokenValid('delete' . $tarif->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tarif);
            $entityManager->flush();
            $this->addFlash('danger', 'Le tarif à bien été supprimé');
        }
        return $this->redirectToRoute('tarif_index');
    }
}
