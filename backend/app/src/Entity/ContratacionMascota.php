<?php

namespace App\Entity;

use App\Repository\ContratacionMascotaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContratacionMascotaRepository::class)
 */
class ContratacionMascota
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Contratacion::class, inversedBy="contratacionMascotas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contratacion;

    /**
     * @ORM\ManyToOne(targetEntity=Mascota::class, inversedBy="contratacionMascotas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mascota;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContratacion(): ?Contratacion
    {
        return $this->contratacion;
    }

    public function setContratacion(?Contratacion $contratacion): static
    {
        $this->contratacion = $contratacion;
        return $this;
    }

    public function getMascota(): ?Mascota
    {
        return $this->mascota;
    }

    public function setMascota(?Mascota $mascota): static
    {
        $this->mascota = $mascota;
        return $this;
    }
}
