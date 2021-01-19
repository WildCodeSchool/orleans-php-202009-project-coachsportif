<?php

namespace App\Controller;

use App\Entity\ContactHome;
use App\Entity\Home;
use App\Form\CarouselType;
use App\Repository\CarouselRepository;
use App\Form\HomeType;
use App\Form\ContactHomeType;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param HomeRepository $homeRepository
     * @param CarouselRepository $carouselRepository
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */

    public function index(
        HomeRepository $homeRepository,
        Request $request,
        MailerInterface $mailer,
        CarouselRepository $carouselRepository
    ): Response {
        $contact = new ContactHome();
        $form = $this->createForm(ContactHomeType::class, $contact);
        $form->handleRequest($request);
        if (($form->isSubmitted() && $form->isValid())) {
            $email = (new Email())
                ->from($this->getParameter('mailer_from'))
                ->to($this->getParameter('mailer_to'))
                ->subject('Sujet:' . $contact->getSubject())
                ->html($this->renderView('home/contactHomeEmail.html.twig', ['contact' => $contact]));
            $mailer->send($email);
            return $this->redirectToRoute('confirmation');
        }
        $home = $homeRepository->findAll();
        $pictures = $carouselRepository->findBy(['page' => CarouselType::HOME_PAGE]);
        return $this->render('home/index.html.twig', [
            "form" => $form->createView(),
            'pictures' => $pictures,
            'home' => $home
        ]);
    }

    /**
     * @Route ("/confirmation", name="confirmation")
     * @return Response
     */
    public function confirmation(): Response
    {
        return $this->render('contact/contactConfirmation.html.twig', [
        ]);
    }

    /**
     * @Route("/home/admin/{id}", name="home_show", methods={"GET"})
     * @param Home $home
     * @return Response
     */
    public function show(Home $home): Response
    {
        return $this->render('home/show.html.twig', [
            'home' => $home,
        ]);
    }

    /**
     * @Route("/home/admin/{id}/edit", name="home_edit", methods={"GET","POST"})
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
            $this->addFlash('success', 'La présentation à bien été modifiée');
            return $this->redirectToRoute('index_Admin');
        }
        return $this->render('home/edit.html.twig', [
            'home' => $home,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/home/admin/{id}", name="home_delete", methods={"DELETE"})
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
            $this->addFlash('success', 'La présentation à bien été supprimée');
        }

        return $this->redirectToRoute('index_Admin');
    }

    /**
     * @Route("/home/admin", name="index_Admin", methods={"GET"})
     * @param HomeRepository $homeRepository
     * @return Response
     */
    public function indexAdmin(HomeRepository $homeRepository): Response
    {
        $presentations = $homeRepository->findAll();
        return $this->render('home/index_admin.html.twig', [
            'presentations' => $presentations,
        ]);
    }
}
