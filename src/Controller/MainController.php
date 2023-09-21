<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    #[Route('/Apropos', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('main/about.html.twig');
    }

    #[Route('/services', name: 'app_services')]
    public function services(): Response
    {
        return $this->render('main/services.html.twig');
    }

    #[Route('/b-event', name: 'app_event')]
    public function bevent(): Response
    {
        return $this->render('main/bevent.html.twig');
    }

    #[Route('/rencontres', name: 'app_rencontre')]
    public function rencontre(): Response
    {
        return $this->render('main/rencontre.html.twig');
    }
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('main/contact.html.twig');
    }

    #[Route('/don', name: 'app_dont')]
    public function don(): Response
    {
        return $this->render('main/dont.html.twig');
    }
}
