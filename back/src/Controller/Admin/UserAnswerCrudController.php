<?php

namespace App\Controller\Admin;

use App\Entity\UserAnswer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class UserAnswerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UserAnswer::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            // AssociationField::new('user'),
            AssociationField::new('outfit'),
        ];
    }
   
}
