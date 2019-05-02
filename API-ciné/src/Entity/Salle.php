<?php

namespace App\Entity;

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
}
