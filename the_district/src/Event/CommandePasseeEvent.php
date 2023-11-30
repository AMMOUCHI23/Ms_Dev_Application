<?php
namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class CommandePasseeEvent extends Event
{
    private $commande;

    public function __construct($commande)
    {
        $this->commande = $commande;
    }

    public function getCommande()
    {
        return $this->commande;
    }
}