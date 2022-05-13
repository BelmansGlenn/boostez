<?php

namespace App\Controller\Admin;

use App\Entity\Newsletter;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class NewsletterCrudController extends AbstractCrudController
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getEntityFqcn(): string
    {
        return Newsletter::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('firstname', 'Prénom'),
            TextField::new('lastname', 'Nom de famille'),
            EmailField::new('email'),
        ];
    }

    public function renderExcel(EntityManagerInterface $entityManager)
    {
        $newsletters = $entityManager->getRepository(Newsletter::class)->findAll();
        $spreadSheet = new Spreadsheet();
        $i = 1;
        $sheet = $spreadSheet->getActiveSheet();
        $sheet->setCellValue('A'.$i, 'Email');
        $sheet->setCellValue('B'.$i, 'Prenom');
        $sheet->setCellValue('C'.$i, 'Nom de famille');
        foreach ($newsletters as $newsletter)
        {
            $i = $i + 1;

            $sheet->setCellValue('A'.$i, $newsletter->getEmail());
            $sheet->setCellValue('B'.$i, $newsletter->getFirstname());
            $sheet->setCellValue('C'.$i, $newsletter->getLastname());


        }

        $writer = new Xlsx($spreadSheet);
        $fileName = 'list_susbcriber_newsletter'.uniqid().'.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return $this->file($tempFile, $fileName, ResponseHeaderBag::DISPOSITION_INLINE);
    }

    public function configureActions(Actions $actions): Actions
    {

        $excelNewsletter = Action::new('excelNewsletter','Newsletter Excel','fa-solid fa-file-excel')
        ->linkToCrudAction('renderExcel')
        ->createAsGlobalAction();

        return $actions
            ->add(Crud::PAGE_INDEX, $excelNewsletter);
    }



}
