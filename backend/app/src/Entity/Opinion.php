<?php

namespace App\Entity;

use App\Repository\OpinionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OpinionRepository::class)
 */
class Opinion
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
    private $Texto;

    /**
     * @ORM\Column(type="smallint")
     */
    private $Valoracion;

    /**
     * @ORM\Column(type="datetime")
     */
    private $FechaHora;

    /**
     * @ORM\ManyToOne(targetEntity=Cuidador::class, inversedBy="opinions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Cuidador;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="opinions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Cliente;

    /**
     * @ORM\ManyToOne(targetEntity=Contratacion::class, inversedBy="opinions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Contratacion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexto(): ?string
    {
        return $this->Texto;
    }

    public function setTexto(?string $Texto): self
    {
        $this->Texto = $Texto;

        return $this;
    }

    public function getValoracion(): ?int
    {
        return $this->Valoracion;
    }

    public function setValoracion(int $Valoracion): self
    {
        $this->Valoracion = $Valoracion;

        return $this;
    }

    public function getFechaHora(): ?\DateTimeInterface
    {
        return $this->FechaHora;
    }

    public function setFechaHora(\DateTimeInterface $FechaHora): self
    {
        $this->FechaHora = $FechaHora;

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

    public function getCliente(): ?Cliente
    {
        return $this->Cliente;
    }

    public function setCliente(?Cliente $Cliente): self
    {
        $this->Cliente = $Cliente;

        return $this;
    }

    public function getContratacion(): ?Contratacion
    {
        return $this->Contratacion;
    }

    public function setContratacion(?Contratacion $Contratacion): self
    {
        $this->Contratacion = $Contratacion;

        return $this;
    }
}
