<?php

namespace App\Controller;

use App\Repository\GerichtRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    #[Route('/', name: 'home')]
    public function index(GerichtRepository $gerichtRepository, Request $request): Response {
        //echo phpinfo();
        //dd($request);

        $gerichte = $gerichtRepository->findAll();

        $zufallGerichte = array_rand($gerichte, 3);

        #dump($gerichte[$zufallGerichte[0]]);
        #dump($gerichte[$zufallGerichte[1]]);
        #dump($gerichte[$zufallGerichte[2]]);

        return $this->render('home/index.html.twig', [
            'gericht1' => $gerichte[$zufallGerichte[0]] ,
            'gericht2' => $gerichte[$zufallGerichte[1]] ,
            'gericht3' => $gerichte[$zufallGerichte[2]] ,
        ]);
    }

  
}
