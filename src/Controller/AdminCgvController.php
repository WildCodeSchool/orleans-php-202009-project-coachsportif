<?php

namespace App\Controller;

use App\Entity\Cgv;
use App\Form\CgvType;
use App\Repository\CgvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/cgv")
 */
class AdminCgvController extends AbstractController
{
    /**
     * @Route("/", name="cgv_admin", methods={"GET"})
     * @param CgvRepository $cgvRepository
     * @return Response
     */
    public function index(CgvRepository $cgvRepository): Response
    {
        return $this->render('admin/cgv/index.html.twig', [
            'cgvs' => $cgvRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cgv_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $cgv = new CGV();
        $form = $this->createForm(CGVType::class, $cgv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cgv);
            $entityManager->flush();

            return $this->redirectToRoute('cgv_admin');
        }

        return $this->render('admin/cgv/new.html.twig', [
            'cgv' => $cgv,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cgv_edit", methods={"GET","POST"})
     * @param Request $request
     * @param CGV $cgv
     * @return Response
     */
    public function edit(Request $request, CGV $cgv): Response
    {
        $form = $this->createForm(CGVType::class, $cgv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Les conditions générales de vente ont bien été modifiées');

            return $this->redirectToRoute('cgv_admin');
        }

        return $this->render('admin/cgv/edit.html.twig', [
            'cgv' => $cgv,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cgv_delete", methods={"DELETE"})
     * @param Request $request
     * @param CGV $cgv
     * @return Response
     */
    public function delete(Request $request, CGV $cgv): Response
    {
        if ($this->isCsrfTokenValid('delete' . $cgv->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cgv);
            $entityManager->flush();
            $this->addFlash('danger', 'Les conditions générales de vente ont bien été supprimé');
        }

        return $this->redirectToRoute('cgv_admin');
    }
}
