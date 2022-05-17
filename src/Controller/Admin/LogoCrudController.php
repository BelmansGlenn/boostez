<?php

namespace App\Controller\Admin;

use App\Entity\Logo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class LogoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Logo::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnIndex()->hideOnForm(),
            ImageField::new('image', 'Image')
                ->setBasePath('uploads/images/logo')
                ->setUploadDir('public/uploads/images/logo')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            IntegerField::new('inOrder', 'Ordre'),
        ];
    }

}
