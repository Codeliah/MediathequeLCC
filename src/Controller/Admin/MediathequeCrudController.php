<?php

namespace App\Controller\Admin;

use App\Entity\Mediatheque;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MediathequeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mediatheque::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
