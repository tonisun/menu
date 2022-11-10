<?php

namespace App\Controller;

use App\Entity\Liste;
use App\Form\Liste1Type;
use App\Repository\ListeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * CRUD Methods for Entity Liste
 */
#[Route('/liste', name: 'liste.')]
class ListeController extends AbstractController
{

    /**
     * Show all Liste items
     */
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ListeRepository $listeRepository): Response
    {
        return $this->render('liste/index.html.twig', [
            'listes' => $listeRepository->findAll(),
        ]);
    }

    /**
     * Create a new item in the Liste
     */
    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, ListeRepository $listeRepository): Response
    {
        $liste = new Liste();
        $form = $this->createForm(Liste1Type::class, $liste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $listeRepository->save($liste, true);

            return $this->redirectToRoute('liste.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('liste/new.html.twig', [
            'liste' => $liste,
            'form' => $form,
        ]);
    }

    /**
     * Show by Id
     */
    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Liste $liste): Response
    {
        return $this->render('liste/show.html.twig', [
            'liste' => $liste,
        ]);
    }

    /**
     * Edit by Id
     */
    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Liste $liste, ListeRepository $listeRepository): Response
    {
        $form = $this->createForm(Liste1Type::class, $liste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $listeRepository->save($liste, true);

            return $this->redirectToRoute('liste.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('liste/edit.html.twig', [
            'liste' => $liste,
            'form' => $form,
        ]);
    }

    /**
     * Delete by Id
     */
    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Liste $liste, ListeRepository $listeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $liste->getId(), $request->request->get('_token'))) {
            $listeRepository->remove($liste, true);
        }

        return $this->redirectToRoute('liste.index', [], Response::HTTP_SEE_OTHER);
    }
}