<?php

namespace App\Controller;

use App\Repository\CarouselRepository;
use App\Entity\Fitness;
use App\Form\FitnessType;
use App\Repository\FitnessRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FitnessController
 * @package App\Controller
 * @Route("/fitness")
 */
class FitnessController extends AbstractController
{
    /**
     * @Route("/remise_en_forme", name="fitness", methods={"GET"})
     * @param FitnessRepository $fitnessRepository
     * @param CarouselRepository $carouselRepository
     * @return Response
     */
    public function index(FitnessRepository $fitnessRepository, CarouselRepository $carouselRepository): Response
    {
        $pictures = $carouselRepository->findBy(['page' => 'fitness']);
        $descriptions = $fitnessRepository->findAll();
        return $this->render('fitness/index.html.twig', [
            'descriptions' => $descriptions,
            'pictures' => $pictures,
        ]);
    }

    /**
     * @Route("/new", name="fitness_new", methods={"GET","POST"})
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

            return $this->redirectToRoute('fitness_index');
        }

        return $this->render('fitness/new.html.twig', [
            'fitness' => $fitness,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fitness_show", methods={"GET"})
     */
    public function show(Fitness $fitness): Response
    {
        return $this->render('fitness/show.html.twig', [
            'fitness' => $fitness,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fitness_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fitness $fitness): Response
    {
        $form = $this->createForm(FitnessType::class, $fitness);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fitnessAdmin');
        }

        return $this->render('fitness/edit.html.twig', [
            'fitness' => $fitness,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fitness_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fitness $fitness): Response
    {
        if ($this->isCsrfTokenValid('delete' . $fitness->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fitness);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fitness_index');
    }

    /**
     * @Route("/remise-en-forme/Admin", name="fitnessAdmin", methods={"GET"})
     * @param FitnessRepository $fitnessRepository
     * @return Response
     */
    public function indexAdmin(FitnessRepository $fitnessRepository): Response
    {
        $descriptions = $fitnessRepository->findAll();
        return $this->render('fitness/indexAdmin.html.twig', [
            'descriptions' => $descriptions,
        ]);
    }
}
