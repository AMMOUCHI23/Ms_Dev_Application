<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Monolog\DateTime;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_commande = null;


    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '2')]
    private ?string $total = null;

    #[ORM\Column]
    private ?int $etat = null;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: Detail::class)]
    private Collection $details;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message:"Le champ d'adresse ne peut pas etre vide")]
    #[Assert\Length(
        min: 15,
        max: 100,
        minMessage: "Le champ d'adresse doit avoir minimum {{ limit }} caractères",
        maxMessage: "Le champ d'adresse doit avoir maximum {{ limit }} caractères",
    )]
    private ?string $adresse_de_livraison = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $adresse_de_facturation = null;

    #[ORM\Column(length: 50)]
    private ?string $mode_de_paiement = null;

    public function __construct()
    {
        $this->details = new ArrayCollection();
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->date_commande;
    }

    public function setDateCommande(\DateTimeInterface $date_commande): static
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): static
    {
        $this->total = $total;

        return $this;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * @return Collection<int, Detail>
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(Detail $detail): static
    {
        if (!$this->details->contains($detail)) {
            $this->details->add($detail);
            $detail->setCommande($this);
        }

        return $this;
    }

    public function removeDetail(Detail $detail): static
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getCommande() === $this) {
                $detail->setCommande(null);
            }
        }

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getAdresseDeLivraison(): ?string
    {
        return $this->adresse_de_livraison;
    }

    public function setAdresseDeLivraison(string $adresse_de_livraison): static
    {
        $this->adresse_de_livraison = $adresse_de_livraison;

        return $this;
    }

    public function getAdresseDeFacturation(): ?string
    {
        return $this->adresse_de_facturation;
    }

    public function setAdresseDeFacturation(?string $adresse_de_facturation): static
    {
        $this->adresse_de_facturation = $adresse_de_facturation;

        return $this;
    }

    public function getModeDePaiement(): ?string
    {
        return $this->mode_de_paiement;
    }

    public function setModeDePaiement(string $mode_de_paiement): static
    {
        $this->mode_de_paiement = $mode_de_paiement;

        return $this;
    }
}
