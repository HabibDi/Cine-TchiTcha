<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalleRepository")
 */
class Salle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Numeros;

    /**
     * @ORM\Column(type="integer")
     */
    private $Places;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Séance", mappedBy="Salle_fk")
     */
    private $Seances;

    public function __construct()
    {
        $this->Seances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeros(): ?int
    {
        return $this->Numeros;
    }

    public function setNumeros(int $Numeros): self
    {
        $this->Numeros = $Numeros;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->Places;
    }

    public function setPlaces(int $Places): self
    {
        $this->Places = $Places;

        return $this;
    }

    /**
     * @return Collection|Séance[]
     */
    public function getSeances(): Collection
    {
        return $this->Seances;
    }

    public function addSeance(Séance $seance): self
    {
        if (!$this->Seances->contains($seance)) {
            $this->Seances[] = $seance;
            $seance->setSalleFk($this);
        }

        return $this;
    }

    public function removeSeance(Séance $seance): self
    {
        if ($this->Seances->contains($seance)) {
            $this->Seances->removeElement($seance);
            // set the owning side to null (unless already changed)
            if ($seance->getSalleFk() === $this) {
                $seance->setSalleFk(null);
            }
        }

        return $this;
    }
}
