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
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    /**
     * @var Collection<int, Produit>
     */
    #[ORM\OneToMany(targetEntity: Produit::class, mappedBy: 'categoryfk')]
    private Collection $productsFK;

    public function __construct()
    {
        $this->productsFK = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->Nom;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProductsFK(): Collection
    {
        return $this->productsFK;
    }

    public function addProductsFK(Produit $productsFK): static
    {
        if (!$this->productsFK->contains($productsFK)) {
            $this->productsFK->add($productsFK);
            $productsFK->setCategoryfk($this);
        }

        return $this;
    }

    public function removeProductsFK(Produit $productsFK): static
    {
        if ($this->productsFK->removeElement($productsFK)) {
            // set the owning side to null (unless already changed)
            if ($productsFK->getCategoryfk() === $this) {
                $productsFK->setCategoryfk(null);
            }
        }

        return $this;
    }
}
