<?php

namespace App\Controller\Admin;

use App\Entity\ConferenceReview;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ConferenceReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ConferenceReview::class;
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
