<?php

namespace App\Controller\Admin;

use App\Entity\Room;
use App\Entity\Genre;
use App\Entity\Movie;
use App\Entity\Screening;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\ScreeningCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        return $this->redirect($routeBuilder->setController(ScreeningCrudController::class)->generateUrl());
        // return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet');
    }

    public function configureMenuItems(): iterable
    {
        return [MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        MenuItem::section('Gestion Cinéma'),
        MenuItem::linkToCrud('Films', 'fas fa-list', Movie::class),
        MenuItem::linkToCrud('Séances', 'fas fa-list', Screening::class),
        MenuItem::linkToCrud('Salles', 'fas fa-list', Room::class),
        MenuItem::linkToCrud('Genres', 'fas fa-list', Genre::class),

        ];
    }

    // public function configureUserMenu(UserInterface $user): UserMenu
    // {
    //     $userMenu = parent::configureUserMenu($user);
    //     $userMenu->setMenuItems([]);
    //     return $userMenu;
    // }

}
