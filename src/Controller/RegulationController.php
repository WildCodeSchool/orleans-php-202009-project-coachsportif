<?php

namespace App\Controller;

use App\Entity\Regulation;
use App\Form\RegulationType;
use App\Repository\RegulationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/regulation")
 */
class RegulationController extends AbstractController
{
    /**
     * @Route("/", name="regulation_index", methods={"GET"})
     */
    public function index(RegulationRepository $regulationRepository): Response
    {
        return $this->render('regulation/index.html.twig', [
            'regulations' => $regulationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="regulation_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $regulation = new Regulation();
        $form = $this->createForm(RegulationType::class, $regulation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($regulation);
            $entityManager->flush();
            $this->addFlash('success', "le texte a bien été ajouté");

            return $this->redirectToRoute('regulation_admin');
        }

        return $this->render('admin/regulation/new.html.twig', [
            'regulation' => $regulation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="regulation_show", methods={"GET"})
     */
    public function show(Regulation $regulation): Response
    {
        return $this->render('regulation/show.html.twig', [
            'regulation' => $regulation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="regulation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Regulation $regulation): Response
    {
        $form = $this->createForm(RegulationType::class, $regulation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('regulation_index');
        }

        return $this->render('regulation/edit.html.twig', [
            'regulation' => $regulation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="regulation_delete", methods={"DELETE"})
     * @param Request $request
     * @param Regulation $regulation
     * @return Response
     */
    public function delete(Request $request, Regulation $regulation): Response
    {
        if ($this->isCsrfTokenValid('delete' . $regulation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($regulation);
            $entityManager->flush();
            $this->addFlash('success', 'Le Texte a bien été supprimé');
        }

        return $this->redirectToRoute('regulation_admin');
    }
}
