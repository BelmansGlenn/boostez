<?php

namespace App\Controller;

use App\Repository\LogoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\NewsletterFormType;

class BiographyController extends AbstractController
{
    #[Route(['fr' => '/biographie', 'nl' => '/biografie', 'en' => '/biography'], name: 'app_biography')]
    public function index(LogoRepository $logoRepository, Request $request): Response
    {
        $lang = $request->getLocale();
        switch ($lang){
            case 'fr':
                return $this->redirect('https://www.50spoons.com/fr/biographie');
            case 'nl':
                return $this->redirect('https://www.50spoons.com/nl/biografie');
            default:
                return $this->redirect('https://www.50spoons.com/en/biography');
        }
//        $form = $this->createForm(NewsletterFormType::class);
//       $logo = $logoRepository->findAllLogoByOrderByImportance();
//
//        return $this->render('biography/index.html.twig', [
//            'logo' => $logo,
//            'form' => $form->createView()
//        ]);
    }
}
