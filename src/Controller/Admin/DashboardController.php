<?php

namespace App\Controller\Admin;

use App\Entity\BusinessConference;
use App\Entity\BusinessWorkshop;
use App\Entity\PrivateRetreat;
use App\Entity\PrivateWorkshop;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route(['FR' =>'/admin'], name: 'admin')]
    public function index(): Response
    {
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(NewsletterCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Boostez');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Newsletter', 'fa-solid fa-business-time');
         yield MenuItem::linkToCrud('Conference Entreprise', 'fa-solid fa-business-time', BusinessConference::class);
         yield MenuItem::linkToCrud('Atelier Entreprise', 'fa-solid fa-paint-roller', BusinessWorkshop::class);
         yield MenuItem::linkToCrud('Retraite Particulier', 'fa-solid fa-campground', PrivateRetreat::class);
         yield MenuItem::linkToCrud('Atelier Particulier', 'fa-solid fa-paintbrush', PrivateWorkshop::class);
    }
}
