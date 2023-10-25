<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
//use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\File;
use Symfony\Component\Routing\Annotation\Route;


class MailerController extends AbstractController
{
    #[Route('/email', name: 'app_email')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        //$chemin = "../public/bonjour.pdf";
        $email = (new TemplatedEmail())
            ->from('hello@example.com')
            ->to(new Address('ryan@example.com'))
            ->subject('Time for Symfony Mailer!')

            // joindre un fichier
            ->addPart(new DataPart(new File('../public/bonjour.pdf')))

            // joindre une image
            ->addPart((new DataPart(fopen('../public/img/cafe.jpg', 'r')))->asInline())

            ->htmlTemplate('emails/signup.html.twig')

            // un tableau de variable à passer à la vue; 
            //  on choisit le nom d'une variable pour la vue et on lui attribue une valeur (comme dans la fonction `render`) :
            ->context([
                $dateTime = new \DateTime('+7 days'),
                $formattedDateTime = $dateTime->format('Y-m-d'),
                'expiration_date' => $formattedDateTime,
                'username' => 'foo',

            ]);
        try {
            $mailer->send($email);
            return $this->redirectToRoute('app_contact');
        } catch (MailerInterface $e) {
            echo "error d'envoi d'email";
        }

        //return $this->render("emails/signup.html.twig");

    }
}
