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
 * Class AdminRegulationController
 * @package App\Controller
 * @Route("/admin/regulation")
 */

class AdminRegulationController extends AbstractController
{

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
     * @param Regulation $regulation
     * @return Response
     */
    public function show(Regulation $regulation): Response
    {
        return $this->render('admin/regulation/show.html.twig', [
            'regulation' => $regulation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="regulation_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Regulation $regulation
     * @return Response
     */
    public function edit(Request $request, Regulation $regulation): Response
    {
        $form = $this->createForm(RegulationType::class, $regulation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Le texte a bien été modifié');

            return $this->redirectToRoute('regulation_admin');
        }

        return $this->render('admin/regulation/edit.html.twig', [
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

    /**
     * @Route("/", name="regulation_admin", methods={"GET"})
     * @param RegulationRepository $regulationRepository
     * @return Response
     */
    public function indexAdmin(RegulationRepository $regulationRepository): Response
    {
        $regulations = $regulationRepository->findAll();
        return $this->render('admin/regulation/indexAdmin.html.twig', [
            'regulations' => $regulations,
        ]);
    }
}
