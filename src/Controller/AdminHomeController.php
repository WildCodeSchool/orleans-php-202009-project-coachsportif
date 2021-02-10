<?php

namespace App\Controller;

use App\Entity\Home;
use App\Form\HomeType;
use App\Repository\HomeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/accueil")
 */
class AdminHomeController extends AbstractController
{
    /**
     * @Route("/", name="index_Admin", methods={"GET"})
     * @param HomeRepository $homeRepository
     * @return Response
     */
    public function indexAdmin(HomeRepository $homeRepository): Response
    {
        $presentations = $homeRepository->findAll();
        return $this->render('admin/home/index_admin.html.twig', [
            'presentations' => $presentations,
        ]);
    }

    /**
     * @Route("/nouveau", name="home_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $home = new Home();
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($home);
            $entityManager->flush();
            $this->addFlash('success', 'La presentation a bien été ajoutée');
            return $this->redirectToRoute('index_Admin');
        }

        return $this->render('admin/home/new.html.twig', [
            'home' => $home,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="home_show", methods={"GET"})
     * @param Home $home
     * @return Response
     */
    public function show(Home $home): Response
    {
        return $this->render('admin/home/show.html.twig', [
            'home' => $home,
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="home_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Home $home
     * @return Response
     */
    public function edit(Request $request, Home $home): Response
    {
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'La présentation a bien été modifiée');
            return $this->redirectToRoute('index_Admin');
        }
        return $this->render('admin/home/edit.html.twig', [
            'home' => $home,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="home_delete", methods={"DELETE"})
     * @param Request $request
     * @param Home $home
     * @return Response
     */
    public function delete(Request $request, Home $home): Response
    {
        if ($this->isCsrfTokenValid('delete' . $home->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($home);
            $entityManager->flush();
            $this->addFlash('danger', 'La présentation a bien été supprimée');
        }

        return $this->redirectToRoute('index_Admin');
    }
}
