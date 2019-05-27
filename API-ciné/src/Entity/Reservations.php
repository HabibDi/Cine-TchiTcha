<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationsRepository")
 */
class Reservations
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Seance", inversedBy="Reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Seance_fk;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Mail;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NewsletterAbo", inversedBy="Reservation_fk")
     */
    private $newsletterAbo;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Notation", mappedBy="Reservation_fk", cascade={"persist", "remove"})
     */
    private $notation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeanceFk(): ?Seance
    {
        return $this->Seance_fk;
    }

    public function setSeanceFk(?Seance $Seance_fk): self
    {
        $this->Seance_fk = $Seance_fk;

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

    public function getMail(): ?string
    {
        return $this->Mail;
    }

    public function setMail(string $Mail): self
    {
        $this->Mail = $Mail;

        return $this;
    }

    public function getNewsletterAbo(): ?NewsletterAbo
    {
        return $this->newsletterAbo;
    }

    public function setNewsletterAbo(?NewsletterAbo $newsletterAbo): self
    {
        $this->newsletterAbo = $newsletterAbo;

        return $this;
    }

    public function getNotation(): ?Notation
    {
        return $this->notation;
    }

    public function setNotation(Notation $notation): self
    {
        $this->notation = $notation;

        // set the owning side of the relation if necessary
        if ($this !== $notation->getReservationFk()) {
            $notation->setReservationFk($this);
        }

        return $this;
    }
}
