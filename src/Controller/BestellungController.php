<?php

namespace App\Controller;

use App\Entity\Gericht;
use App\Entity\Bestellung;
use App\Repository\BestellungRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BestellungController extends AbstractController {
    
    #[Route('/bestellung', name: 'bestellung')]
    public function index( BestellungRepository $bestellungRepository ): Response {
        
        $bestellung = $bestellungRepository->findBy([
            'tisch' => "Tisch: 1",
        ]);
        
        return $this->render('bestellung/index.html.twig', [
            'bestellungen' => $bestellung,
        ]);
    }


    #[Route('/bestellen/{id}', name: 'bestellen')]
    public function bestellen(Gericht $gericht): Response {
       
        $bestellung = new Bestellung();

        $bestellung->setTisch('Tisch: 1');
        $bestellung->setName( $gericht->getName() );
        $bestellung->setBestellNummer( $gericht->getId() );
        $bestellung->setPreis( $gericht->getPreis() );
        $bestellung->setStatus('offen');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist( $bestellung );
        $entityManager->flush();

        $this->addFlash('bestellt', $bestellung->getName(). ' wurde zu Bestellung hinzugefügt');

        return $this->redirect( $this->generateUrl('menu') );
    }


    #[Route('/status/{id},{status}', name: 'status')]
    public function status( $id, $status ) {
        $entityManager = $this->getDoctrine()->getManager();

        $bestellung = $entityManager->getRepository( Bestellung::class) ->find( $id );

        $bestellung->setStatus( $status );
        $entityManager->flush();

        return $this->redirect( $this->generateUrl('bestellung') );
    }

    #[Route('/loeschen/{id}', name: 'loeschen')]
    public function delete ( $id, BestellungRepository $bestellungRepository ) {
        $entityManager = $this->getDoctrine()->getManager();
        
        $bestellung = $bestellungRepository->find( $id );
        $entityManager->remove( $bestellung );
        $entityManager->flush();
        
        return $this->redirect( $this->generateUrl('bestellung') );
    }

}
