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
    #[Route(['fr' => '/livres', 'nl' => '/boeken', 'en' => '/books'], name: 'app_books')]
    public function index(BookRepository $bookRepository, Request $request): Response
    {
        $lang = $request->getLocale();
        switch ($lang){
            case 'fr':
                return $this->redirect('https://www.50spoons.com/fr/livres');
            case 'nl':
                return $this->redirect('https://www.50spoons.com/nl/boeken');
            default:
                return $this->redirect('https://www.50spoons.com/en/books');
        }
//        $booksLocale = $bookRepository->findAllBooksByLocaleOrderByImportance($request->getLocale());
//        $otherBooks = $bookRepository->findAllBooksWhereLocaleIsNotEqualOrderByImportance($request->getLocale());
//
//        $form = $this->createForm(NewsletterFormType::class);
//
//        return $this->render('books/index.html.twig', [
//            'bookLocale' => $booksLocale,
//            'otherBooks' => $otherBooks,
//            'form' => $form->createView()
//        ]);
    }
}
