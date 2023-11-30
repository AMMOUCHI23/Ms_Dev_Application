<?php

namespace App\Controller;

use App\Entity\Detail;
use App\Entity\Commande;
use App\Form\CommandeFormType;
use App\Repository\PlatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Event\CommandePasseeEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use DateTime;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'commande')]
    public function maCommande(Request $request, SessionInterface $session, PlatRepository $platRepository, EntityManagerInterface $manager, EventDispatcherInterface $dispatcher): Response
    {   
        $formCommande = $this->createForm(CommandeFormType::class);
        $formCommande->handleRequest($request);
        if ($formCommande->isSubmitted() && $formCommande->isValid()) {

            $accepteCGU = $formCommande->get('accepte_cgu')->getData();
           
           
            // récupérer l'id d'utilisateur
            $utilisateurId=$this->getUser()->getId();

            //récupérer le total de la commande
            $total=$session->get('total');
            //dd($total);
            // récupérer le détail de la commande
            $detail=$session->get('cart');
            // dd($detail);
           
        
            // Récupérer les éléments de la table commande
            $commande =$formCommande->getData();
            $commande->setDateCommande(new DateTime());
            $commande->setEtat(0);
            $commande->setTotal($total);
            $commande->setUtilisateur($this->getUser());
            // dd($commande);
             
            // Récupérer les éléments de la table détail
            foreach ($detail as $id => $q) {
                $plat = $platRepository->find($id);
                $d = new Detail();
                $d->setPlat($plat);
                $d->setQuantite($q);
                $d->setCommande($commande);
                $manager->persist($d);
            }
           
           
            $manager->persist($commande);
            $manager->flush();

            // déclancher l'évenement
            $event = new CommandePasseeEvent($commande);
            // distribuer l'evenement 
            $dispatcher->dispatch($event, 'commande.passee');
           
            // supprimer le panier dans la sission 
            $session->remove("cart");

          // Ajouter un message flash de succès
          $this->addFlash('success', 'Votre commande a été passée avec succès.');

          //$this->redirectToRoute('catalogue');
        }
    
        $total=$session->get('total');
        
       
        return $this->render('commande/commande.html.twig', [
            "formCommande"=>$formCommande,
            'total'=>$total
        ]);
        
}
}