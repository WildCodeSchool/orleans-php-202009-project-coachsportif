<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/media")
 */
class MediaController extends AdminController
{
    /**
     * @Route("/", name="media_index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('media/index.html.twig');
    }
}
