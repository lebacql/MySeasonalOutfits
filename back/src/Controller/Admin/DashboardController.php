<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Article;
use App\Entity\Outfit;
use App\Entity\Question;
use App\Entity\Quiz;
use App\Entity\UserAnswer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ){   
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(ArticleCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Back');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::section('Articles', 'fa fa-newspaper');

        yield MenuItem::subMenu('Actions', 'fa fa-pickaxe')->setSubItems([
            MenuItem::linkToCrud('Ajouter Article', 'fa fa-plus', Article::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Articles', 'fa fa-eye', Article::class)
        ]);

        yield MenuItem::section('Quiz', 'fa fa-pen');
        yield MenuItem::subMenu('Actions', 'fa fa-pickaxe')->setSubItems([
            MenuItem::linkToCrud('Ajouter Quiz', 'fa fa-plus', Quiz::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Quiz', 'fa fa-eye', Quiz::class)
        ]);

        yield MenuItem::section('Questions', 'fa fa-question');
        yield MenuItem::subMenu('Actions', 'fa fa-pickaxe')->setSubItems([
            MenuItem::linkToCrud('Ajouter Question', 'fa fa-plus', Question::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Questions', 'fa fa-eye', Question::class)
        ]);

        yield MenuItem::section('Réponses Utilisateurs', 'fa fa-user-pen');
        yield MenuItem::subMenu('Actions', 'fa fa-pickaxe')->setSubItems([
            MenuItem::linkToCrud('Réponses Utilisateurs', 'fa fa-eye', UserAnswer::class)
        ]);

        yield MenuItem::section('Tenues', 'fa fa-shirt');
        yield MenuItem::subMenu('Actions', 'fa fa-pickaxe')->setSubItems([
            MenuItem::linkToCrud('Ajouter Outfits', 'fa fa-plus', Outfit::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Outfits', 'fa fa-eye', Outfit::class)
        ]);
    }
}