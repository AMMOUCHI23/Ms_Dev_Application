<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\DemoFormType;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function sendEmail(MailerInterface $mailer,Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //on crée une instance de Contact
            $message = new Contact();
            // Traitement des données du formulaire
            $data = $form->getData();
            //on stocke les données récupérées dans la variable $message
            $contact = $data;

            $entityManager->persist($contact);
            $entityManager->flush();
           // dd($data);


            // envoie de l'email
            $email = (new TemplatedEmail())
            ->from('hello@example.com')
            ->to($contact->getEmail())
            ->subject('Les contacts')
            ->htmlTemplate('emails/contact_email.html.twig')

            ->context([
                
                $objet = $contact->getObject(),
                $mail = $contact->getEmail(),
                $demande = $contact->getMessage(),
                'objet' => $objet,
                'mail' =>$mail,
                'message'=> $demande,
                'data' => $data,
            ]);
            try {
                $mailer->send($email);
                return $this->redirectToRoute('app_accueil');
            } catch (MailerInterface $e) {
                echo "error d'envoi d'email";
            }

           
        }

        return $this->render('contact/index.html.twig', [
//            'form' => $form->createView(),
              'form' => $form ,
        ]);
    }
}