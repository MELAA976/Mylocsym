<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpruntRepository::class)]
class Emprunt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Objet>
     */
  
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDeDebut = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $utilisateur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDeFin = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Objet $objet = null;

   
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Objet>
     */
   
    public function getDateDeDebut(): ?\DateTimeInterface
    {
        return $this->dateDeDebut;
    }

    public function setDateDeDebut(\DateTimeInterface $dateDeDebut): static
    {
        $this->dateDeDebut = $dateDeDebut;

        return $this;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getDateDeFin(): ?\DateTimeInterface
    {
        return $this->dateDeFin;
    }

    public function setDateDeFin(\DateTimeInterface $dateDeFin): static
    {
        $this->dateDeFin = $dateDeFin;

        return $this;
    }

    public function getObjet(): ?objet
    {
        return $this->objet;
    }

    public function setObjet(?objet $objet): static
    {
        $this->objet = $objet;

        return $this;
    }
}
