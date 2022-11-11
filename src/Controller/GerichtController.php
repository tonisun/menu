<?php

namespace App\Controller;

use App\Entity\Gericht;
use App\Form\GerichtType;
use App\Repository\GerichtRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gericht', name: 'gericht.')]
class GerichtController extends AbstractController
{

    #[Route('/', name: 'bearbeiten')]
    public function index(GerichtRepository $gerichtRepository): Response
    {

        $alleGerichte = $gerichtRepository->findAll();

        return $this->render('gericht/index.html.twig', [
            'allegerichte' => $alleGerichte,
        ]);
    }


    #[Route('/create', name: 'create')]
    public function createGericht(Request $request): Response
    {
        $gericht = new Gericht();

        // Gericht aus den Form generieren
        $form = $this->createForm(GerichtType::class, $gericht);

        // Request handeln
        $form->handleRequest($request);

        // prüfen ob submit button gedruckt ist
        if ($form->isSubmitted()) {
            // EntityManager
            $entityManager = $this->getDoctrine()->getManager();
            $bild = $request->files->get('gericht')['bild'];

            if ($bild) {
                $dateiname = md5(uniqid()) . '.' . $bild->guessClientExtension();
            }

            $bild->move(
                $this->getParameter('img_directory'),
                $dateiname
            );

            $gericht->setBild($dateiname);

            $entityManager->persist($gericht);
            $entityManager->flush();

            return $this->redirect($this->generateUrl('gericht.bearbeiten'));
        }

        // Response
        return $this->render('gericht/create.html.twig', [
            'createGerichtForm' => $form->createView(),
        ]);
    }


    #[Route('/delete/{id}', name: 'delete')]
    public function delete($id, GerichtRepository $gerichtRepository)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $gericht = $gerichtRepository->find($id);
        $entityManager->remove($gericht);
        $entityManager->flush();

        // message
        $this->addFlash('Erfolg', 'Gericht wurde erfolgreich gelöscht');

        return $this->redirect($this->generateUrl('gericht.bearbeiten'));
    }


    #[Route('/anzeigen/{id}', name: 'anzeigen')]
    public function bildAnzeigen(Gericht $gericht)
    {
        #dump($gericht);
        // Response
        return $this->render('gericht/anzeigen.html.twig', [
            'gericht' => $gericht,
        ]);
    }

    #[Route('/preis/{id}', name: 'preis')]
    public function preis($id, GerichtRepository $gr)
    {
        $gerichte = $gr->under5euro($id);
        dump($gerichte);
        // Response
        //return $this->render('gericht/anzeigen.html.twig', [
        //  'gericht' => 
        //]);
    }
}