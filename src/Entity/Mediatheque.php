<?php

namespace App\Entity;

use App\Repository\MediathequeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MediathequeRepository::class)
 */
class Mediatheque
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Livre::class, mappedBy="mediatheque", orphanRemoval=true)
     */
    private $livre;

    /**
     * @ORM\OneToMany(targetEntity=Inscrit::class, mappedBy="mediatheque", orphanRemoval=true)
     */
    private $inscrit;

    /**
     * @ORM\OneToMany(targetEntity=Employe::class, mappedBy="mediatheque", orphanRemoval=true)
     */
    private $employe;

    /**
     * @ORM\OneToOne(targetEntity=Catalogue::class, cascade={"persist", "remove"})
     */
    private $catalogue;

    public function __construct()
    {
        $this->livre = new ArrayCollection();
        $this->inscrit = new ArrayCollection();
        $this->employe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Livre[]
     */
    public function getLivre(): Collection
    {
        return $this->livre;
    }

    public function addLivre(Livre $livre): self
    {
        if (!$this->livre->contains($livre)) {
            $this->livre[] = $livre;
            $livre->setMediatheque($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livre->removeElement($livre)) {
            // set the owning side to null (unless already changed)
            if ($livre->getMediatheque() === $this) {
                $livre->setMediatheque(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Inscrit[]
     */
    public function getInscrit(): Collection
    {
        return $this->inscrit;
    }

    public function addInscrit(Inscrit $inscrit): self
    {
        if (!$this->inscrit->contains($inscrit)) {
            $this->inscrit[] = $inscrit;
            $inscrit->setMediatheque($this);
        }

        return $this;
    }

    public function removeInscrit(Inscrit $inscrit): self
    {
        if ($this->inscrit->removeElement($inscrit)) {
            // set the owning side to null (unless already changed)
            if ($inscrit->getMediatheque() === $this) {
                $inscrit->setMediatheque(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Employe[]
     */
    public function getEmploye(): Collection
    {
        return $this->employe;
    }

    public function addEmploye(Employe $employe): self
    {
        if (!$this->employe->contains($employe)) {
            $this->employe[] = $employe;
            $employe->setMediatheque($this);
        }

        return $this;
    }

    public function removeEmploye(Employe $employe): self
    {
        if ($this->employe->removeElement($employe)) {
            // set the owning side to null (unless already changed)
            if ($employe->getMediatheque() === $this) {
                $employe->setMediatheque(null);
            }
        }

        return $this;
    }

    public function getCatalogue(): ?Catalogue
    {
        return $this->catalogue;
    }

    public function setCatalogue(?Catalogue $catalogue): self
    {
        $this->catalogue = $catalogue;

        return $this;
    }
}
