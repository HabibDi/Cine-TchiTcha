<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsletterAboRepository")
 */
class NewsletterAbo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservations", mappedBy="newsletterAbo")
     */
    private $Reservation_fk;

    public function __construct()
    {
        $this->Reservation_fk = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
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

    /**
     * @return Collection|Reservations[]
     */
    public function getReservationFk(): Collection
    {
        return $this->Reservation_fk;
    }

    public function addReservationFk(Reservations $reservationFk): self
    {
        if (!$this->Reservation_fk->contains($reservationFk)) {
            $this->Reservation_fk[] = $reservationFk;
            $reservationFk->setNewsletterAbo($this);
        }

        return $this;
    }

    public function removeReservationFk(Reservations $reservationFk): self
    {
        if ($this->Reservation_fk->contains($reservationFk)) {
            $this->Reservation_fk->removeElement($reservationFk);
            // set the owning side to null (unless already changed)
            if ($reservationFk->getNewsletterAbo() === $this) {
                $reservationFk->setNewsletterAbo(null);
            }
        }

        return $this;
    }
}
