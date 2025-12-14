<?php

namespace App\Entity;

use App\Repository\CuidadorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CuidadorRepository::class)
 */
class Cuidador
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
    private $InfoExperiencia;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Ninos;

    /**
     * @ORM\Column(type="integer")
     */
    private $TiempoExperiencia;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $TipoVivienda;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $AdminMedicamentos;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Coche;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Fuma;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfoExperiencia(): ?string
    {
        return $this->InfoExperiencia;
    }

    public function setInfoExperiencia(?string $InfoExperiencia): self
    {
        $this->InfoExperiencia = $InfoExperiencia;

        return $this;
    }

    public function getNinos(): ?int
    {
        return $this->Ninos;
    }

    public function setNinos(?int $Ninos): self
    {
        $this->Ninos = $Ninos;

        return $this;
    }

    public function getTiempoExperiencia(): ?int
    {
        return $this->TiempoExperiencia;
    }

    public function setTiempoExperiencia(int $TiempoExperiencia): self
    {
        $this->TiempoExperiencia = $TiempoExperiencia;

        return $this;
    }

    public function getTipoVivienda(): ?string
    {
        return $this->TipoVivienda;
    }

    public function setTipoVivienda(string $tipoVivienda): self
    {
        $this->TipoVivienda = $tipoVivienda;

        return $this;
    }

    public function getAdminMedicamentos(): ?int
    {
        return $this->AdminMedicamentos;
    }

    public function setAdminMedicamentos(?int $AdminMedicamentos): self
    {
        $this->AdminMedicamentos = $AdminMedicamentos;

        return $this;
    }

    public function getCoche(): ?int
    {
        return $this->Coche;
    }

    public function setCoche(?int $Coche): self
    {
        $this->Coche = $Coche;

        return $this;
    }

    public function getFuma(): ?int
    {
        return $this->Fuma;
    }

    public function setFuma(?int $Fuma): self
    {
        $this->Fuma = $Fuma;

        return $this;
    }
}
