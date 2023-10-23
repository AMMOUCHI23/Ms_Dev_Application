<?php

namespace App\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ArtistRepository;
use App\Repository\DiscRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    //On va avoir souvent besoin d'injecter les respositories de nos entités dans les contrôleurs et les services
    //Pour ne pas les injecter dans chaque fonction, on va les instancier UNE SEULE fois dans le constructeur de notre contrôleur:
    //N'oubliez pas d'importer vos respositories (les lignes "use..." en haut de la page)

    
         // """""""" Exemple d'utilisation de Doctrine Query Langage (DQL)

        private $artistRepo;
        private $discRepo;
        private $em;

        public function __construct(ArtistRepository $artistRepo, DiscRepository $discRepo, EntityManagerInterface $em)

        /*
        // Exempele d'etulisation des classes de reposotory pour récupérer les données dans la base de

          //On va avoir souvent besoin d'injecter les respositories de nos entités dans les contrôleurs et les services
    //Pour ne pas les injecter dans chaque fonction, on va les instancier UNE SEULE fois dans le constructeur de notre contrôleur:
    //N'oubliez pas d'importer vos respositories (les lignes "use..." en haut de la page)

    private $artistRepo;
    private $discRepo;

    public function __construct(ArtistRepository $artistRepo, DiscRepository $discRepo)
    {
        $this->artistRepo = $artistRepo;
        $this->discRepo = $discRepo;

    }

    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response
    {

        //on appelle la fonction `findAll()` du repository de la classe `Artist` afin de récupérer tous les artists de la base de données;

        $artistes = $this->artistRepo->findAll();

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            //on va envoyer à la vue notre variable qui stocke un tableau d'objets $artistes (c'est-à-dire tous les artistes trouvés dans la base de données)
            'artistes' => $artistes
        ]);
    }
        */
        // Exemple d'etulisation de DQL et le QueryBuilder pour interoger la base de donnée
        {
            $this->artistRepo = $artistRepo;
            $this->discRepo = $discRepo;
            $this->em = $em;

        }
        #[Route('/accueil', name: 'app_accueil')]
        public function index(): Response
        {
           //on appelle le repository pour accéder à la fonction
            $artistes = $this->artistRepo->getSomeArtists("Neil");

            //on teste le contenu de la variable $artistes : dd() veut dire Dump and Die
            dd($artistes); 

        }
    
       // Exemple d'utilisation de requete de QueryBuilder 

        }