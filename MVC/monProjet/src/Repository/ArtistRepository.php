<?php

namespace App\Repository;

use App\Entity\Artist;
use App\Entity\Disc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Mailer\MailerInterface;

/**
 * @extends ServiceEntityRepository<Artist>
 *
 * @method Artist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artist[]    findAll()
 * @method Artist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artist::class);
    }
    /*
     // """""""" 1- Exemple d'utilisation de Doctrine Query Langage (DQL)
    public function getSomeArtists($name)
    {
        //$name est un paramètre qui pour cet exemple a come valeur "Neil";
        $entityManager = $this->getEntityManager(); //on instancie l'entity manager
    
        $query = $entityManager->createQuery( //on crée la requête 
            'SELECT a
            FROM App\Entity\Artist a
            WHERE a.name  like :name'
        )->setParameter('name', '%'.$name.'%');
    
        // retourne un tableau d'objets de type Artist
        return $query->getResult();
    
    }
    */
     // 2- Exemple d'utilisation de requete de QueryBuilder 

    public function getSomeArtists($name)
    {
        //$name est un paramètre qui pour cet exemple a comme valeur "Neil";

        $qb = $this->createQueryBuilder('a');
        $qb
            ->andWhere('a.name like :name') //le `placeholder, comme en PDO!
            ->setParameter('name', '%' . $name . '%')
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery();
            $query = $qb->getQuery();
        $artists = $query->getResult();
        return $artists;
    }
//    /**
//     * @return Artist[] Returns an array of Artist objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Artist
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
