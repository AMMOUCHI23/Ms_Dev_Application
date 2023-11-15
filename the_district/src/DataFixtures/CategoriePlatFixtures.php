<?php

namespace App\DataFixtures;
use App\Entity\Categorie;
use App\Entity\Plat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriePlatFixtures extends Fixture
{  
    public function load(ObjectManager $manager): void
    {
        require ('public/assets/tables/categorietb.php');
        require('public/assets/tables/plattb.php');
      
        $categorieRepo = $manager->getRepository(Categorie::class);
        // importer la table categorie
        foreach ($categorie as $cat ){ 
            $categorieDB = new Categorie();
            $categorieDB->setId($cat['id'])
            ->setLibelle($cat['libelle'])
            ->setImage($cat['image'])
            ->setActive($cat['active']);

            $manager->persist($categorieDB);

             // empêcher l'auto incrément
             $metadata = $manager->getClassMetaData(Categorie::class);
             $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
        }
        $manager->flush();
         //importer la table plat
        foreach ($plat as $pla) {
            $platDB = new Plat();
            $platDB->setId($pla['id'])
            ->setLibelle($pla['libelle'])
            ->setDescription($pla['description'])
            ->setPrix($pla['prix'])
            ->setImage($pla['image'])
            ->setActive($pla['active']);
            $categorieId = $pla['id_categorie'];
            $categorie = $categorieRepo->find($categorieId);
            $platDB->setCategorie($categorie);

           
          
            $manager->persist($platDB);

            // empêcher l'auto incrément
            $metadata = $manager->getClassMetaData(Plat::class);
            $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
            
        }

        $manager->flush();
    }
}
