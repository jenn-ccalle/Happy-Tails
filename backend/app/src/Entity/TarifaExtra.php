<?php

namespace App\Entity;

use App\Repository\TarifaExtraRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TarifaExtraRepository::class)
 */
class TarifaExtra
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $Valor;

    /**
     * @ORM\ManyToOne(targetEntity=Servicio::class, inversedBy="tarifaExtras")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Servicio;

    /**
     * @ORM\ManyToOne(targetEntity=TipoTarifa::class, inversedBy="tarifaExtras")
     * @ORM\JoinColumn(nullable=false)
     */
    private $TipoTarifa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValor(): ?string
    {
        return $this->Valor;
    }

    public function setValor(string $Valor): self
    {
        $this->Valor = $Valor;

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

    public function getTipoTarifa(): ?TipoTarifa
    {
        return $this->TipoTarifa;
    }

    public function setTipoTarifa(?TipoTarifa $TipoTarifa): self
    {
        $this->TipoTarifa = $TipoTarifa;

        return $this;
    }
}
