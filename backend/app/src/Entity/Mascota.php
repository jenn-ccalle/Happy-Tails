<?php

namespace App\Entity;

use App\Repository\MascotaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MascotaRepository::class)
 */
class Mascota
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
    private $Alimentacion;

    /**
     * @ORM\Column(type="smallint")
     */
    private $CompGatos;

    /**
     * @ORM\Column(type="smallint")
     */
    private $CompNinos;

    /**
     * @ORM\Column(type="smallint")
     */
    private $CompPerros;

    /**
     * @ORM\Column(type="integer")
     */
    private $Edad;

    /**
     * @ORM\Column(type="smallint")
     */
    private $Energia;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Esterilizado;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaAdopcion;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $InfoExtra;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $InfoVet;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Medicacion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Microchip;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Nombre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Sexo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $SobreMascota;

    /**
     * @ORM\Column(type="smallint")
     */
    private $TiempoSolo;

    /**
     * @ORM\Column(type="smallint")
     */
    private $TiempoNecesidades;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlimentacion(): ?int
    {
        return $this->Alimentacion;
    }

    public function setAlimentacion(int $Alimentacion): self
    {
        $this->Alimentacion = $Alimentacion;

        return $this;
    }

    public function getCompGatos(): ?int
    {
        return $this->CompGatos;
    }

    public function setCompGatos(int $CompGatos): self
    {
        $this->CompGatos = $CompGatos;

        return $this;
    }

    public function getCompNinos(): ?int
    {
        return $this->CompNinos;
    }

    public function setCompNinos(int $CompNinos): self
    {
        $this->CompNinos = $CompNinos;

        return $this;
    }

    public function getCompPerros(): ?int
    {
        return $this->CompPerros;
    }

    public function setCompPerros(int $CompPerros): self
    {
        $this->CompPerros = $CompPerros;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->Edad;
    }

    public function setEdad(int $Edad): self
    {
        $this->Edad = $Edad;

        return $this;
    }

    public function getEnergia(): ?int
    {
        return $this->Energia;
    }

    public function setEnergia(int $Energia): self
    {
        $this->Energia = $Energia;

        return $this;
    }

    public function isEsterilizado(): ?bool
    {
        return $this->Esterilizado;
    }

    public function setEsterilizado(bool $Esterilizado): self
    {
        $this->Esterilizado = $Esterilizado;

        return $this;
    }

    public function getFechaAdopcion(): ?\DateTimeInterface
    {
        return $this->FechaAdopcion;
    }

    public function setFechaAdopcion(\DateTimeInterface $FechaAdopcion): self
    {
        $this->FechaAdopcion = $FechaAdopcion;

        return $this;
    }

    public function getInfoExtra(): ?string
    {
        return $this->InfoExtra;
    }

    public function setInfoExtra(?string $InfoExtra): self
    {
        $this->InfoExtra = $InfoExtra;

        return $this;
    }

    public function getInfoVet(): ?string
    {
        return $this->InfoVet;
    }

    public function setInfoVet(?string $InfoVet): self
    {
        $this->InfoVet = $InfoVet;

        return $this;
    }

    public function getMedicacion(): ?int
    {
        return $this->Medicacion;
    }

    public function setMedicacion(?int $Medicacion): self
    {
        $this->Medicacion = $Medicacion;

        return $this;
    }

    public function isMicrochip(): ?bool
    {
        return $this->Microchip;
    }

    public function setMicrochip(bool $Microchip): self
    {
        $this->Microchip = $Microchip;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function isSexo(): ?bool
    {
        return $this->Sexo;
    }

    public function setSexo(bool $Sexo): self
    {
        $this->Sexo = $Sexo;

        return $this;
    }

    public function getSobreMascota(): ?string
    {
        return $this->SobreMascota;
    }

    public function setSobreMascota(?string $SobreMascota): self
    {
        $this->SobreMascota = $SobreMascota;

        return $this;
    }

    public function getTiempoSolo(): ?int
    {
        return $this->TiempoSolo;
    }

    public function setTiempoSolo(int $TiempoSolo): self
    {
        $this->TiempoSolo = $TiempoSolo;

        return $this;
    }

    public function getTiempoNecesidades(): ?int
    {
        return $this->TiempoNecesidades;
    }

    public function setTiempoNecesidades(int $TiempoNecesidades): self
    {
        $this->TiempoNecesidades = $TiempoNecesidades;

        return $this;
    }
}
