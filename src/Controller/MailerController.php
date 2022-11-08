<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class MailerController extends AbstractController {
    
    #[Route('/mail', name: 'mail')]
    public function sendEmail(MailerInterface $mailerInterface, Request $request): Response {

        $emailForm = $this->createFormBuilder()
            ->add('nachricht', TextareaType::class, [
                'attr' => array('rows' => '5')
            ])
            ->add('abschicken', SubmitType::class, [
                'attr' =>  [
                    'class' => 'btn btn-outline-danger float-right'
                    ]
            ])
            ->getForm();

        $emailForm->handleRequest($request);

        if ($emailForm->isSubmitted()) {
            $eingabe = $emailForm->getData();
            $text = $eingabe['nachricht'];
            $kellnerName = "Toni";
            $tisch = 'Tisch 1';

            $email = (new TemplatedEmail())
                ->from('tisch.1@menu.wip')
                ->to(strtolower("kellner.{$kellnerName}@menu.wip"))
                ->subject('Bestellung von Tisch 1')

                ->htmlTemplate('mailer/mail.html.twig')
                ->context([
                    'kellnerName' => $kellnerName,
                    'tisch' => $tisch,
                    'text' => $text,
                ]);

            $mailerInterface->send($email);
            $this->addFlash('nachricht', 'Nachricht wurde versendet!');
            return $this->redirect($this->generateURL('mail'));
        }

        return $this->render('mailer/index.html.twig', [
            'emailForm' => $emailForm->createView()
        ]);
    }
}
