<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SéanceRepository")
 */
class Séance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Salle", inversedBy="Seances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Salle_fk;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Film", inversedBy="Seances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Film_fk;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Heure;

    /**
     * @ORM\Column(type="integer")
     */
    private $PlacesDisponibles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservations", mappedBy="Seance_fk")
     */
    private $Reservations;

    public function __construct()
    {
        $this->Reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalleFk(): ?Salle
    {
        return $this->Salle_fk;
    }

    public function setSalleFk(?Salle $Salle_fk): self
    {
        $this->Salle_fk = $Salle_fk;

        return $this;
    }

    public function getFilmFk(): ?Film
    {
        return $this->Film_fk;
    }

    public function setFilmFk(?Film $Film_fk): self
    {
        $this->Film_fk = $Film_fk;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->Heure;
    }

    public function setHeure(\DateTimeInterface $Heure): self
    {
        $this->Heure = $Heure;

        return $this;
    }

    public function getPlacesDisponibles(): ?int
    {
        return $this->PlacesDisponibles;
    }

    public function setPlacesDisponibles(int $PlacesDisponibles): self
    {
        $this->PlacesDisponibles = $PlacesDisponibles;

        return $this;
    }

    /**
     * @return Collection|Reservations[]
     */
    public function getReservations(): Collection
    {
        return $this->Reservations;
    }

    public function addReservation(Reservations $reservation): self
    {
        if (!$this->Reservations->contains($reservation)) {
            $this->Reservations[] = $reservation;
            $reservation->setSeanceFk($this);
        }

        return $this;
    }

    public function removeReservation(Reservations $reservation): self
    {
        if ($this->Reservations->contains($reservation)) {
            $this->Reservations->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getSeanceFk() === $this) {
                $reservation->setSeanceFk(null);
            }
        }

        return $this;
    }
}
