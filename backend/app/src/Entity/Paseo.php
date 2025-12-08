<?php

namespace App\Entity;

use App\Repository\PaseoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaseoRepository::class)
 */
class Paseo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $Dias;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaFin;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaInicio;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $IntervaloSemanas;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Repite;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Nombre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDias(): ?int
    {
        return $this->Dias;
    }

    public function setDias(int $Dias): self
    {
        $this->Dias = $Dias;

        return $this;
    }

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->FechaFin;
    }

    public function setFechaFin(\DateTimeInterface $FechaFin): self
    {
        $this->FechaFin = $FechaFin;

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->FechaInicio;
    }

    public function setFechaInicio(\DateTimeInterface $FechaInicio): self
    {
        $this->FechaInicio = $FechaInicio;

        return $this;
    }

    public function getIntervaloSemanas(): ?int
    {
        return $this->IntervaloSemanas;
    }

    public function setIntervaloSemanas(?int $IntervaloSemanas): self
    {
        $this->IntervaloSemanas = $IntervaloSemanas;

        return $this;
    }

    public function getRepite(): ?int
    {
        return $this->Repite;
    }

    public function setRepite(?int $Repite): self
    {
        $this->Repite = $Repite;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(?string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }
}
