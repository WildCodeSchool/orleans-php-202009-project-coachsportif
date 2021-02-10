<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/contact")
 */
class AdminContactController extends AbstractController
{
    /**
     * @Route("/", name="contact_admin", methods={"GET"})
     * @param ContactRepository $contactRepository
     * @return Response
     */
    public function index(ContactRepository $contactRepository): Response
    {
        return $this->render('admin/contact/index.html.twig', [
            'contacts' => $contactRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouveau", name="contact_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            $this->addFlash('success', 'Les informations ont bien été ajoutée');
            return $this->redirectToRoute('contact_admin');
        }

        return $this->render('admin/contact/new.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="contact_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Contact $contact
     * @return Response
     */
    public function edit(Request $request, Contact $contact): Response
    {
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Les données ont bien été modifiées');

            return $this->redirectToRoute('contact_admin');
        }

        return $this->render('admin/contact/edit.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contact_delete", methods={"DELETE"})
     * @param Request $request
     * @param Contact $contact
     * @return Response
     */
    public function delete(Request $request, Contact $contact): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contact->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contact);
            $entityManager->flush();
            $this->addFlash('danger', 'Les données ont bien été supprimées');
        }

        return $this->redirectToRoute('contact_admin');
    }
}
