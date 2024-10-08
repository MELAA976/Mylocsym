<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomDeLaCategorie = null;

    #[ORM\Column]
    private ?int $nombreDePoints = null;

    /**
     * @var Collection<int, Objet>
     */
    #[ORM\OneToMany(targetEntity: Objet::class, mappedBy: 'categorie')]
    private Collection $objets;

    public function __construct()
    {
        $this->objets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDeLaCategorie(): ?string
    {
        return $this->nomDeLaCategorie;
    }

    public function setNomDeLaCategorie(string $nomDeLaCategorie): static
    {
        $this->nomDeLaCategorie = $nomDeLaCategorie;

        return $this;
    }

    public function getNombreDePoints(): ?int
    {
        return $this->nombreDePoints;
    }

    public function setNombreDePoints(int $nombreDePoints): static
    {
        $this->nombreDePoints = $nombreDePoints;

        return $this;
    }

    /**
     * @return Collection<int, Objet>
     */
    public function getObjets(): Collection
    {
        return $this->objets;
    }

    public function addObjet(Objet $objet): static
    {
        if (!$this->objets->contains($objet)) {
            $this->objets->add($objet);
            $objet->setCategorie($this);
        }

        return $this;
    }

    public function removeObjet(Objet $objet): static
    {
        if ($this->objets->removeElement($objet)) {
            // set the owning side to null (unless already changed)
            if ($objet->getCategorie() === $this) {
                $objet->setCategorie(null);
            }
        }

        return $this;
    }
}
