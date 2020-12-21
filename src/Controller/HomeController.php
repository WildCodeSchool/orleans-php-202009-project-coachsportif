<?php

namespace App\Controller;

use App\Entity\ContactHome;
use App\Form\ContactHomeType;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param HomeRepository $homeRepository
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function index(HomeRepository $homeRepository, Request $request, MailerInterface $mailer): Response
    {
        $contact = new ContactHome();
        $form = $this->createForm(ContactHomeType::class, $contact);
        $form->handleRequest($request);
        if (($form->isSubmitted() && $form->isValid())) {
            $email = (new Email())
                ->from($this->getParameter('mailer_from'))
                ->to('loicchenuet@hotmail.fr')
                ->subject('Sujet:' . $contact->getSubject())
                ->html($this->renderView('home/contactHomeEmail.html.twig', ['contact' => $contact]));
            $mailer->send($email);
            return $this->redirectToRoute('confirmation');
        }
        $home = $homeRepository->findAll();
        return $this->render('home/index.html.twig', [
            "form" => $form->createView(),
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
}
