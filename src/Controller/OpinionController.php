<?php

namespace App\Controller;

use App\Entity\Opinion;
use App\Form\OpinionType;
use App\Repository\OpinionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/commentaire")
 */
class OpinionController extends AbstractController
{

    /**
     * @Route("/", name="opinion_index")
     * @param OpinionRepository $opinionRepository
     * @return Response
     */
    public function index(OpinionRepository $opinionRepository): Response
    {
        return $this->render('admin/opinion/index.html.twig', [
            'opinions' => $opinionRepository->findAll()]);
    }
    /**
     * @Route("/new", name="opinion_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $opinion = new Opinion();
        $form = $this->createForm(OpinionType::class, $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($opinion);
            $entityManager->flush();
            $this->addFlash('success', 'Le nouveau commentaire a bien été créé');
            return $this->redirectToRoute('opinion_index');
        }

        return $this->render('admin/opinion/new.html.twig', [
            'opinion' => $opinion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="opinion_show", methods={"GET"})
     * @param Opinion $opinion
     * @return Response
     */
    public function show(Opinion $opinion): Response
    {
        return $this->render('admin/opinion/show.html.twig', [
            'opinion' => $opinion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="opinion_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Opinion $opinion
     * @return Response
     */
    public function edit(Request $request, Opinion $opinion): Response
    {
        $form = $this->createForm(OpinionType::class, $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Le commentaire a bien été modifié');
            return $this->redirectToRoute('opinion_index');
        }

        return $this->render('admin/opinion/edit.html.twig', [
            'opinion' => $opinion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="opinion_delete", methods={"DELETE"})
     * @param Request $request
     * @param Opinion $opinion
     * @return Response
     */
    public function delete(Request $request, Opinion $opinion): Response
    {
        if ($this->isCsrfTokenValid('delete' . $opinion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($opinion);
            $entityManager->flush();
            $this->addFlash('danger', 'Le commentaire a bien été supprimé');
        }

        return $this->redirectToRoute('opinion_index');
    }
}
