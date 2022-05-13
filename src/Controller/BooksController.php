<?php

namespace App\Controller;

use App\Form\NewsletterFormType;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends AbstractController
{
    #[Route(['FR' => '/livres', 'NL' => '/boeken', 'EN' => '/books'], name: 'app_books')]
    public function index(BookRepository $bookRepository, Request $request): Response
    {

        $booksLocale = $bookRepository->findAllBooksByLocaleOrderByImportance($request->getLocale());
        $otherBooks = $bookRepository->findAllBooksWhereLocaleIsNotEqualOrderByImportance($request->getLocale());

        $form = $this->createForm(NewsletterFormType::class);

        return $this->render('books/index.html.twig', [
            'bookLocale' => $booksLocale,
            'otherBooks' => $otherBooks,
            'form' => $form->createView()
        ]);
    }
}
