<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route(['fr' => '/bibliographie', 'nl' => '/bibliografie'], name: 'app_bibliography')]
    public function getBibliography(Request $request): Response
    {
        $lang = $request->getLocale();
        switch ($lang){
            case 'nl':
                return $this->redirect('https://www.50spoons.com/nl/bibliografie');
            default:
                return $this->redirect('https://www.50spoons.com/fr/bibliographie');
        }
//        return $this->render('bibliography/index.html.twig');
    }
}
