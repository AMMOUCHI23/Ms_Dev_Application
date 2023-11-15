<?php

namespace App\Controller;
use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {   
       
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            //on crée une instance de Contact
           // $contact = new Contact();
           $contact =$form->getData();
          
            // Traitement des données du formulaire
           // $data = $form->getData();
            //on stocke les données récupérées dans la variable $message
            //$contact = $data;

            $manager->persist($contact);
            $manager->flush();
           
            //Envoie de mail avec le service créer MailService
           /* $mailservice->sendMail(
                "hello@example.com",
                 $contact->getEmail() ,
                  "Les contact",
                   $contact->getMessage(),
                   'emails/contact_email.html.twig',
                  ['contact' => $contact]
                
               
            );*/
        }
        return $this->render('contact/contact.html.twig', [
            "form"=>$form
        ]);
    
}
    
}