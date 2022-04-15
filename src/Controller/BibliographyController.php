<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BibliographyController extends AbstractController
{
    private $locales;
    private $defaultLocale;

    public function __construct($locales, $defaultLocale)
    {
        $this->locales = $locales;
        $this->defaultLocale = $defaultLocale;
    }

    #[Route("/{redirect}", name: 'app_home', defaults: ['redirect' => 'FR'] )]
    public function home(): Response
    {
        return $this->redirectToRoute('app_bibliography.FR');
    }

    #[Route(['FR' => '/bibliographie', 'NL' => '/bibliografie', 'EN' => '/bibliography'], name: 'app_bibliography')]
    public function getBibliography(): Response
    {

        return $this->render('bibliography/index.html.twig');
    }
}
