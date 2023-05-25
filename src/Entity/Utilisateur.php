<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $Nom = null;

    #[ORM\Column(length: 20)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 20)]
    private ?string $role = null;

    #[ORM\OneToMany(mappedBy: 'id_us', targetEntity: Projet::class, orphanRemoval: true)]
    private Collection $id_proj;

    public function __construct()
    {
        $this->id_proj = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, Projet>
     */
    public function getIdProj(): Collection
    {
        return $this->id_proj;
    }

    public function addIdProj(Projet $idProj): self
    {
        if (!$this->id_proj->contains($idProj)) {
            $this->id_proj->add($idProj);
            $idProj->setIdUs($this);
        }

        return $this;
    }

    public function removeIdProj(Projet $idProj): self
    {
        if ($this->id_proj->removeElement($idProj)) {
            // set the owning side to null (unless already changed)
            if ($idProj->getIdUs() === $this) {
                $idProj->setIdUs(null);
            }
        }

        return $this;
    }
}
