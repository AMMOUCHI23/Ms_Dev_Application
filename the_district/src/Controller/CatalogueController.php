<?php

namespace App\Controller;
use App\Entity\Categorie;
use App\Entity\Plat;
use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class CatalogueController extends AbstractController
{
    // Controlleur pour afficher la page d'accueil
    #[Route('/', name: 'catalogue')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        $categories = $categorieRepository->findAll();
       
        return $this->render('catalogue/index.html.twig', [
           
            'categories'=>$categories
        ]);
    }


    //Controlleur pour afficher les plats 
    #[Route('/plats', name: 'plats')]
    public function afficherPlat(PlatRepository $platRepository): Response
    {
        $plats = $platRepository->findAll();
       
        return $this->render('catalogue/plat.html.twig', [
           
            'plats'=>$plats
        ]);
    }

     //Controlleur pour afficher les plats par categorie_id
     #[Route('/plats/{id}', name: 'plats_categorie')]
      public function platParCategorie(EntityManagerInterface $entityManager, int $id): Response
     {
         $categorie = $entityManager->getRepository(Categorie::class)->find($id);
         
   
         if (!$categorie) {
             throw $this->createNotFoundException(
                 'Aucune Categorie a un id '.$id
             );
         }
         $plats = $categorie->getPlats();
         $nomCategorie=$categorie->getLibelle();
        //  dd($plats);
         return $this->render('catalogue/platCategorie.html.twig', [
            'plats' => $plats,
            'nomCategorie'=>$nomCategorie
        ]);
     }

     
     //Controlleur pour afficher les categorie
     #[Route('/categorie', name: 'categories')]
     public function afficherCategorie(CategorieRepository $categorieRepository): Response
     {
         $categories = $categorieRepository->findAll();
        
         return $this->render('catalogue/categorie.html.twig', [
            
             'categories'=>$categories
         ]);
     }

      //Controlleur pour afficher le detail d'un plat
      #[Route('/plats/{id}/detail', name: 'detail')]
      public function afficherDetailPlat(EntityManagerInterface $entityManager,int $id): Response
      {
        $plat= $entityManager->getRepository(Plat::class)->find($id);
       //dd($plats);
         // $id=$plats->getId();
          return $this->render('catalogue/detail.html.twig', [
             
              'plat'=>$plat,
              
             
          ]);
      }
 }
