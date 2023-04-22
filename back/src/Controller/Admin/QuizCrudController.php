<?php

namespace App\Controller\Admin;

use App\Entity\Quiz;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class QuizCrudController extends AbstractCrudController
{
    public const ARTICLES_BASE_PATH = './upload/images/quiz';
    public const ARTICLES_UPLOAD_DIR = '/public/upload/images/quiz';

    public static function getEntityFqcn(): string
    {
        return Quiz::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('season'),
            TextField::new('title'),
            TextEditorField::new('description'),
            ImageField::new('image')
            ->setBasePath(self::ARTICLES_BASE_PATH)
            ->setUploadDir(self::ARTICLES_UPLOAD_DIR),
        ];
    }

}
