<?php

namespace App\Controller\Admin;

use App\Entity\BookReview;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
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
            TextField::new('company', 'Poste and entreprise')->setRequired(false)->hideOnIndex(),
            TextField::new('review', 'Avis'),
            ChoiceField::new('language', 'Langue')->setChoices(['FR'=>'FR','NL'=>'NL','EN'=>'EN']),
            IntegerField::new('inOrder', 'Ordre'),
        ];
    }

}
