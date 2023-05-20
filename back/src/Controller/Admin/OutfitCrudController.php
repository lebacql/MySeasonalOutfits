<?php

namespace App\Controller\Admin;

use App\Entity\Outfit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OutfitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Outfit::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('answer'),
            TextField::new('Title', 'Titre'),
            // TOP
            ImageField::new('topImg', 'Image du haut')
            ->setBasePath('/upload/images/outfits/top')
            ->setUploadDir('/public/upload/images/outfits/top'),
            TextField::new('topBrand', 'Marque du haut'),
            MoneyField::new('topPrice', 'Prix du haut')->setCurrency('EUR'),
            TextField::new('topLink', 'Lien du haut'),

            //BOTTOM
            ImageField::new('bottomImg', 'Image du bas')
            ->setBasePath('/upload/images/outfits/bottom')
            ->setUploadDir('/public/upload/images/outfits/bottom'),
            TextField::new('bottomBrand', 'Marque du bas'),
            MoneyField::new('bottomPrice', 'Prix du bas')->setCurrency('EUR'),
            TextField::new('bottomLink', 'Lien du bas'),

            //SHOES
            ImageField::new('shoesImg', 'Image des chaussures')
            ->setBasePath('/upload/images/outfits/shoes')
            ->setUploadDir('/public/upload/images/outfits/shoes'),
            TextField::new('shoesBrand', 'Marque des chaussures'),
            MoneyField::new('shoesPrice', 'Prix des chaussures')->setCurrency('EUR'),
            TextField::new('shoesLink', 'Lien des chaussures'),

            //ACCESSORIES
            ImageField::new('accessoriesImg', "Image de l'accesoire")
            ->setBasePath('/upload/images/outfits/accessories')
            ->setUploadDir('/public/upload/images/outfits/accessories'),
            TextField::new('accessoriesBrand', "Marque de l'accesoire"),
            MoneyField::new('accessoriesPrice', "Prix de l'accesoire")->setCurrency('EUR'),
            TextField::new('accessoriesLink', "Lien de l'accesoire"),
        ];
    }
}
