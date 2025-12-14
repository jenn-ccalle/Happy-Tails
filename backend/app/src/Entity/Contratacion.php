<?php

namespace App\Entity;

use App\Repository\ContratacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContratacionRepository::class)
 */
class Contratacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Comentarios;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $CosteTotal;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaContratacion;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaInicioServicio;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaFinServicio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComentarios(): ?string
    {
        return $this->Comentarios;
    }

    public function setComentarios(?string $Comentarios): self
    {
        $this->Comentarios = $Comentarios;

        return $this;
    }

    public function getCosteTotal(): ?string
    {
        return $this->CosteTotal;
    }

    public function setCosteTotal(?string $CosteTotal): self
    {
        $this->CosteTotal = $CosteTotal;

        return $this;
    }

    public function getFechaContratacion(): ?\DateTimeInterface
    {
        return $this->FechaContratacion;
    }

    public function setFechaContratacion(\DateTimeInterface $FechaContratacion): self
    {
        $this->FechaContratacion = $FechaContratacion;

        return $this;
    }

    public function getFechaInicioServicio(): ?\DateTimeInterface
    {
        return $this->FechaInicioServicio;
    }

    public function setFechaInicioServicio(\DateTimeInterface $FechaInicioServicio): self
    {
        $this->FechaInicioServicio = $FechaInicioServicio;

        return $this;
    }

    public function getFechaFinServicio(): ?\DateTimeInterface
    {
        return $this->FechaFinServicio;
    }

    public function setFechaFinServicio(\DateTimeInterface $FechaFinServicio): self
    {
        $this->FechaFinServicio = $FechaFinServicio;

        return $this;
    }
}
