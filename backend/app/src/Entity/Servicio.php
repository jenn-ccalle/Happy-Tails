<?php

namespace App\Entity;

use App\Repository\ServicioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServicioRepository::class)
 */
class Servicio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Direccion;

    /**
     * @ORM\Column(type="integer")
     */
    private $Experiencia;

    /**
     * @ORM\Column(type="smallint")
     */
    private $MasMascotas;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $TarifaBase;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDireccion(): ?string
    {
        return $this->Direccion;
    }

    public function setDireccion(string $Direccion): self
    {
        $this->Direccion = $Direccion;

        return $this;
    }

    public function getExperiencia(): ?int
    {
        return $this->Experiencia;
    }

    public function setExperiencia(int $Experiencia): self
    {
        $this->Experiencia = $Experiencia;

        return $this;
    }

    public function getMasMascotas(): ?int
    {
        return $this->MasMascotas;
    }

    public function setMasMascotas(int $MasMascotas): self
    {
        $this->MasMascotas = $MasMascotas;

        return $this;
    }

    public function getTarifaBase(): ?string
    {
        return $this->TarifaBase;
    }

    public function setTarifaBase(string $TarifaBase): self
    {
        $this->TarifaBase = $TarifaBase;

        return $this;
    }
}
