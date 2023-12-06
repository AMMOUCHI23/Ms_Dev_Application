<?php

namespace App\Controller;
use App\Entity\Contact;
use App\Entity\Utilisateur;
use App\Form\ContactFormType;
use App\Repository\UtilisateurRepository;
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

            // Ajouter un message flash de succès
          $this->addFlash('success', 'Votre demande a été envoyée avec succès, elle sera traitée par nos services dans les meilleurs délais.');
           
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
    // controlleur pour afficher mes ccordonnées de l'utilisateur connecté
#[Route('/profil', name: 'profil')]
public function monProfil(): Response
{   
    $utilisateur =$this->getUser(); 
    
    return $this->render('contact/profil.html.twig', [
        'utilisateur'=> $utilisateur
    ]);

}
    // controlleur pour afficher les Mentions légales
    #[Route('/Mentions_Legales', name: 'mentionsL')]
    public function mentionsLegales(): Response
    {   
    
        
        return $this->render('contact/mentionslegales.html.twig', [
            
        ]);
    
    }

        // controlleur pour afficher la politique de confidentialité
        #[Route('/plitique_de_confidentialite', name: 'politique')]
        public function politiqueDeConfidentialite(): Response
        {   
        
            
            return $this->render('contact/politique.html.twig', [
                
            ]);
        
        }
/*
// controlleur pour modifier mes coordonnées
#[Route('/profil', name: 'profil')]
public function editProfil(): Response
{   
    $utilisateur =$this->getUser(); 
    
    return $this->render('contact/profil.html.twig', [
        'utilisateur'=> $utilisateur
    ]);

}
*/
}