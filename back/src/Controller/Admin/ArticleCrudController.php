<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

class ArticleCrudController extends AbstractCrudController
{
    public const ACTION_DUPLICATE = 'duplicate';
    public const ARTICLES_BASE_PATH = './upload/images/articles';
    public const ARTICLES_UPLOAD_DIR = '/public/upload/images/articles';

    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Article) return;
        $entityInstance->setDate(new \DateTimeImmutable);
        parent::persistEntity($em, $entityInstance);
    }

    public function configureActions(Actions $actions): Actions {
        $duplicate = Action::new(self::ACTION_DUPLICATE)->linkToCrudAction('duplicateArticle')
        ->setCssClass('btn btn-info');

        return $actions
        ->add(Crud::PAGE_EDIT, $duplicate);

    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Title', 'Titre'),
            TextEditorField::new('Content', 'Contenu'),
            DateTimeField::new('Date'),
            ImageField::new('image')
            ->setBasePath(self::ARTICLES_BASE_PATH)
            ->setUploadDir(self::ARTICLES_UPLOAD_DIR),
        ];
    }

    public function duplicateArticle(AdminContext $context, EntityManagerInterface $em,
    AdminUrlGenerator $adminUrlGenerator): Response 
    {
        /** @var Article $article */
        $article = $context->getEntity()->getInstance();

        $duplicateArticle = clone $article;

        parent::persistEntity($em, $duplicateArticle);

        $url = $adminUrlGenerator->setController(self::class)->setAction(Action::DETAIL)
        ->setEntityId($duplicateArticle->getId())
        ->generateUrl();

        return $this->redirect($url);
    }


    
}
