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
}
