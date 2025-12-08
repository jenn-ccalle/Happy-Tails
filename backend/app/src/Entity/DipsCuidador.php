<?php

namespace App\Entity;

use App\Repository\DipsCuidadorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DipsCuidadorRepository::class)
 */
class DipsCuidador
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Fecha;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Disponible;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->Fecha;
    }

    public function setFecha(\DateTimeInterface $Fecha): self
    {
        $this->Fecha = $Fecha;

        return $this;
    }

    public function isDisponible(): ?bool
    {
        return $this->Disponible;
    }

    public function setDisponible(bool $Disponible): self
    {
        $this->Disponible = $Disponible;

        return $this;
    }
}
