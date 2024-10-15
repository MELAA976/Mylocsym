<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ObjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObjetRepository::class)]
#[ApiResource(normalizationContext: ['groupe' => ['product']])] //AJOUTER API RESOURCE ICI
class Objet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'objets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Proprietaire = null;

    #[ORM\Column(length: 255)]
    private ?string $nomObjet = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Image = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<int, Emprunt>
     */
    #[ORM\OneToMany(targetEntity: Emprunt::class, mappedBy: 'objet')]
    private Collection $emprunts;

    #[ORM\ManyToOne(inversedBy: 'objets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie = null;

    public function __construct()
    {
        $this->emprunts = new ArrayCollection();
    }

    #[ORM\ManyToOne(inversedBy: 'objet')]
    #[ORM\JoinColumn(nullable: false)]

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProprietaire(): ?User
    {
        return $this->Proprietaire;
    }

    public function setProprietaire(?User $Proprietaire): static
    {
        $this->Proprietaire = $Proprietaire;

        return $this;
    }

    public function getNomObjet(): ?string
    {
        return $this->nomObjet;
    }

    public function setNomObjet(string $nomObjet): static
    {
        $this->nomObjet = $nomObjet;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): static
    {
        $this->Image = $Image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Emprunt>
     */
    public function getEmprunts(): Collection
    {
        return $this->emprunts;
    }

    public function addEmprunt(Emprunt $emprunt): static
    {
        if (!$this->emprunts->contains($emprunt)) {
            $this->emprunts->add($emprunt);
            $emprunt->setObjet($this);
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): static
    {
        if ($this->emprunts->removeElement($emprunt)) {
            // set the owning side to null (unless already changed)
            if ($emprunt->getObjet() === $this) {
                $emprunt->setObjet(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
}
