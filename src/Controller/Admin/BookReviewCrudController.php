<?php

namespace App\Controller\Admin;

use App\Entity\BookReview;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BookReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BookReview::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnIndex()->hideOnForm(),
            TextField::new('firstname', 'Prénom'),
            TextField::new('lastname', 'Nom'),
            TextField::new('reviewFR', 'Avis en francais'),
            TextField::new('reviewNL', 'Avis en néerlandais')->hideOnIndex(),
            TextField::new('reviewEN', 'Avis en anglais')->hideOnIndex(),
            IntegerField::new('inOrder', 'Ordre'),
        ];
    }

}
