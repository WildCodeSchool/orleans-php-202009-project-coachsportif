<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Form\OpinionType;
use App\Repository\OpinionRepository;
use App\Repository\CarouselRepository;
use App\Entity\Fitness;
use App\Form\FitnessType;
use App\Repository\FitnessRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminFitnessController
 * @package App\Controller
 * @Route("/admin/fitness")
 */
class AdminFitnessController extends AbstractController
{
    /**
     * @Route("/new", name="fitness_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $fitness = new Fitness();
        $form = $this->createForm(FitnessType::class, $fitness);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fitness);
            $entityManager->flush();
            $this->addFlash('success', 'le texte de Remise en forme a bien été ajouté');
            return $this->redirectToRoute('fitness_admin');
        }

        return $this->render('admin/fitness/new.html.twig', [
            'fitness' => $fitness,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fitness_show", methods={"GET"})
     * @param Fitness $fitness
     * @return Response
     */
    public function show(Fitness $fitness): Response
    {
        return $this->render('admin/fitness/show.html.twig', [
            'fitness' => $fitness,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fitness_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Fitness $fitness
     * @return Response
     */
    public function edit(Request $request, Fitness $fitness): Response
    {
        $form = $this->createForm(FitnessType::class, $fitness);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Le texte de Remise en forme a bien été modifié');
            return $this->redirectToRoute('fitness_admin');
        }

        return $this->render('admin/fitness/edit.html.twig', [
            'fitness' => $fitness,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fitness_delete", methods={"DELETE"})
     * @param Request $request
     * @param Fitness $fitness
     * @return Response
     */
    public function delete(Request $request, Fitness $fitness): Response
    {
        if ($this->isCsrfTokenValid('delete' . $fitness->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fitness);
            $entityManager->flush();
            $this->addFlash('success', 'Le texte de Remise en forme a bien été supprimé');
        }

        return $this->redirectToRoute('fitness_admin');
    }

    /**
     * @Route("/", name="fitness_admin", methods={"GET"})
     * @param FitnessRepository $fitnessRepository
     * @return Response
     */
    public function indexAdmin(FitnessRepository $fitnessRepository): Response
    {
        $descriptions = $fitnessRepository->findAll();
        return $this->render('admin/fitness/indexAdmin.html.twig', [
            'descriptions' => $descriptions,
        ]);
    }
}
