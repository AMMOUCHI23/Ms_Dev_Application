<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use App\Entity\Commande;

class CommandeFixtures extends Fixture

{
    private Generator $faker;
    public function __construct()
    {
        $this->faker=Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        // Utiliser Fker Php pour générer des données de la table commande
        for ($i=0; $i <5 ; $i++) { 
            $commande = new Commande();
            
            $commande->setDateCommande($this->faker->dateTime());
            $commande->setTotal($this->faker->numberBetween(0, 100))
            ->setEtat($this->faker->numberBetween(0, 3));
            $manager->persist($commande);

        
    }
    $manager->flush();
}
}