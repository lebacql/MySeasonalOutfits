<?php

namespace App\Controller\Admin;

use App\Entity\Proposal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class ProposalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Proposal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('quiz'),
            AssociationField::new('question'),
            AssociationField::new('answer', 'Réponse'),
            AssociationField::new('outfit', 'Tenue'),
        ];
    }
}
