<?php
namespace App\EventSubscriber;

use App\Event\CommandePasseeEvent;
use App\Service\MailService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;


class CommandeSubscriber implements EventSubscriberInterface

{ 
    // ajouter la dépendance de MailService
    
    private $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    } 



    public static function getSubscribedEvents(): array
    {
        // return the subscribed events, their methods and priorities
        return [
            'commande.passee' => 'onCommandePassee',
           
        ];
    }

    public function onCommandePassee(CommandePasseeEvent $event)
    {
        //récupérer les données de la commande
        $commande = $event->getCommande();

        // envoie de mail de confirmation de la commande avec mon service MailService
       $this-> mailService->sendMail(
            "the_district@gmail.fr",
             $commande->getUtilisateur()->getEmail(),
              "Confirmation de la commande",
               "Votre Commande est passée avec succès",
               'Email/CommandeEmail.html.twig',
              ['commande' => $commande]
   
        );
    }
}