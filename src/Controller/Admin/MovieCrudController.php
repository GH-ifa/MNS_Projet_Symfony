<?php

namespace App\Controller\Admin;

use DateTime;
use App\Entity\Movie;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MovieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Movie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title','Titre'),
            AssociationField::new('genre', 'Genre'),
            Field::new('synopsis', 'Synopsis'),
            Field::new('actors', 'Acteurs'),
            Field::new('duration', 'Durée'),
            ChoiceField::new('status', 'Status')
            ->setChoices([
                'A l\'affiche' => 'currently',
                'Prochainement' => 'coming_soon'
            ]),
            ImageField::new('posterFilename', 'Affiche')
            ->setBasePath($this->getParameter('pub_posters_directory'))
            ->setUploadedFileNamePattern('[randomhash]-[name].[extension]')
            ->setUploadDir($this->getParameter('posters_directory'))
            ,
        ];
    }
    

    public function createEntity(string $entityFqcn)
    {
        $movie = new Movie();
        // $screening->setTime(new DateTime((new DateTime())->format('Y-m-d')));
        $movie->setCreatedAt(new DateTimeImmutable());
        $movie->setUpdatedAt(new DateTime());
        return $movie;
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
