<?php

namespace App\Controller\Admin;

use DateTime;
use DateTimeImmutable;
use App\Entity\Screening;
use Doctrine\ORM\EntityManagerInterface;
use App\Controller\Admin\MovieCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ScreeningCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Screening::class;
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

    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('time', 'Heure')
            // ->form(function ($value, $entity) {
            //     return $entity->getId() ? $value : (new DateTime((new DateTime())->format('Y-m-d')));
            // })
            ,
            Field::new('vf', 'VF'),
            Field::new('subtitled', 'Sous-titré'),
            AssociationField::new('movie', 'Film'),
            AssociationField::new('room', 'Salle'),
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $screening = new Screening();
        // $screening->setTime(new DateTime((new DateTime())->format('Y-m-d')));
        $screening->setCreatedAt(new DateTimeImmutable());
        $screening->setUpdatedAt(new DateTime());
        return $screening;
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $entityInstance->setUpdatedAt(new DateTime());
        $entityManager->persist($entityInstance);
        $entityManager->flush();
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ;
    }

}
