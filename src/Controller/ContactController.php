<?php

namespace App\Controller;

use App\Form\NewsletterFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route(['FR' => '/contact', 'NL' => '/contact', 'EN' => '/contact'], name: 'app_contact')]
    public function index(): Response
    {

        $form = $this->createForm(NewsletterFormType::class);


        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
