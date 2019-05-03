<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotationRepository")
 */
class Notation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Reservations", inversedBy="notation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Reservation_fk;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Film", inversedBy="notations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Film_fk;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservationFk(): ?Reservations
    {
        return $this->Reservation_fk;
    }

    public function setReservationFk(Reservations $Reservation_fk): self
    {
        $this->Reservation_fk = $Reservation_fk;

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

    public function getNote(): ?int
    {
        return $this->Note;
    }

    public function setNote(int $Note): self
    {
        $this->Note = $Note;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(?string $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }
}
