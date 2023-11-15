<?php

namespace App\Controller;
use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'panier')]
    public function index(SessionInterface $session, PlatRepository $platRepository )
    { 
       
        
        $cart=$session->get("cart",[]);
       
       $data=[];
       $total=0;
       foreach ($cart as $id => $quantite) {
        $plat=$platRepository->find($id);
        $data[]=[
            "plat"=>$plat,
           "quantite"=> $quantite
        ];
        $total+=$plat->getPrix()*$quantite;
        
       }
        return $this->render('panier/panier.html.twig', [
          'data'  =>$data,
          'total'  =>$total
        ]);
      
    }
    
    #[Route('/panier/ajout/{id}', name: 'ajoutPanier')]
    public function ajouter(Plat $plat, SessionInterface $session, PlatRepository $platRepository): Response
    {
        // Récuperer l'id du plat
        $id=$plat->getId();
        //récupérer le panier
        $cart=$session->get("cart",[]);
       
 
        //ajout de produit dans le panier
        if (empty($cart[$id])) {
            $plat=$platRepository->find($id);
            $cart[$id]=1;
        }
        else{
            $plat=$platRepository->find($id);
            $cart[$id]++ ;
        }
        $session->set("cart",$cart);
        

        return $this->redirectToRoute('panier', [
          
        ]);
    }
    #[Route('/modifier/{id}', name: 'modifier')]
    public function remove(Plat $plat, SessionInterface $session)
    {
        //On récupère l'id du produit
        $id = $plat->getId();

        // On récupère le panier existant
        $cart = $session->get('cart', []);

        // On retire le produit du panier s'il n'y a qu'1 exemplaire
        // Sinon on décrémente sa quantité
        if(!empty($cart[$id])){
            if($cart[$id] > 1){
                $cart[$id]--;
            }else{
                unset($cart[$id]);
            }
        }

        $session->set('cart', $cart);
        
        //On redirige vers la page du panier
        return $this->redirectToRoute('panier');
    }

    #[Route('/supprime/{id}', name: 'supprime')]
    public function delete(Plat $plat, SessionInterface $session)
    {
        //On récupère l'id du produit
        $id = $plat->getId();

        // On récupère le panier existant
        $cart = $session->get('cart', []);

        if(!empty($cart[$id])){
            unset($cart[$id]);
        }

        $session->set('cart', $cart);
        
        //On redirige vers la page du panier
        return $this->redirectToRoute('panier');
    }

    #[Route('/vider', name: 'vider')]
    public function empty(SessionInterface $session)
    {
        $session->remove('cart');

        return $this->redirectToRoute('panier');
    }

  
}