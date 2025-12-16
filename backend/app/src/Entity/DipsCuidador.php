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

    /**
     * @ORM\ManyToOne(targetEntity=Cuidador::class, inversedBy="dispCuidadores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Cuidador;

    /**
     * @ORM\ManyToOne(targetEntity=Servicio::class, inversedBy="dipsCuidadors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Servicio;

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

    public function getCuidador(): ?Cuidador
    {
        return $this->Cuidador;
    }

    public function setCuidador(?Cuidador $Cuidador): self
    {
        $this->Cuidador = $Cuidador;

        return $this;
    }

    public function getServicio(): ?Servicio
    {
        return $this->Servicio;
    }

    public function setServicio(?Servicio $Servicio): self
    {
        $this->Servicio = $Servicio;

        return $this;
    }
}
