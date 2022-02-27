<?php

namespace App\Controller;

use DateTime;
use DateTimeImmutable;
use App\Entity\Screening;
use App\Form\ScreeningType;
use App\Repository\ScreeningRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Date;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/screening")
 */
class ScreeningController extends AbstractController
{
    /**
     * @Route("/", name="screening_index", methods={"GET"})
     */
    public function index(ScreeningRepository $screeningRepository): Response
    {
        return $this->render('screening/index.html.twig', [
            'screenings' => $screeningRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="screening_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $screening = new Screening();
        $screening->setTime(new DateTime((new DateTime())->format('Y-m-d'))); //prefill with today's date
        $form = $this->createForm(ScreeningType::class, $screening);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $screening->setCreatedAt(new DateTimeImmutable());
            $screening->setUpdatedAt(new DateTime());
            $entityManager->persist($screening);
            $entityManager->flush();

            return $this->redirectToRoute('screening_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('screening/new.html.twig', [
            'screening' => $screening,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="screening_show", methods={"GET"})
     */
    public function show(Screening $screening): Response
    {
        return $this->render('screening/show.html.twig', [
            'screening' => $screening,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="screening_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Screening $screening, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ScreeningType::class, $screening);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $screening->setUpdatedAt(new DateTime());
            $entityManager->flush();

            return $this->redirectToRoute('screening_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('screening/edit.html.twig', [
            'screening' => $screening,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="screening_delete", methods={"POST"})
     */
    public function delete(Request $request, Screening $screening, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$screening->getId(), $request->request->get('_token'))) {
            $entityManager->remove($screening);
            $entityManager->flush();
        }

        return $this->redirectToRoute('screening_index', [], Response::HTTP_SEE_OTHER);
    }
}
