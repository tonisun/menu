<?php

namespace App\Controller\Admin;

use App\Entity\Gericht;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class GerichtCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gericht::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            AssociationField::new('kategorie'),
            TextField::new('name'),
            TextEditorField::new('beschreibung'),
            NumberField::new('preis'),
            ImageField::new('bild')->setUploadDir('public/uploads/'),
        ];
    }
}