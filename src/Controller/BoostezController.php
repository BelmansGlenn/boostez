<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoostezController extends AbstractController
{

    private $locales;
    private $defaultLocale;

    public function __construct($locales, $defaultLocale)
    {
        $this->locales = $locales;
        $this->defaultLocale = $defaultLocale;
    }

    #[Route('/{redirect}', name: 'app_redirect', defaults: ['redirect' => 'FR'] )]
    public function redirectToHome(): Response
    {
        return $this->redirectToRoute('app_home.FR');
    }

    #[Route(['FR' => '/', 'NL' => '/', 'EN' => '/'], name: 'app_home', defaults: ['redirect' => 'FR'] )]
    public function home(): Response
    {
        return $this->render('home/index.html.twig');
    }


    #[Route(['FR' => '/boostez', 'NL' => '/boostez', 'EN' => '/boostez'], name: 'app_boostez')]
    public function index(): Response
    {
        return $this->render('boostez/index.html.twig');
    }
}
