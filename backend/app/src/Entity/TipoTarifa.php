<?php

namespace App\Entity;

use App\Repository\TipoTarifaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipoTarifaRepository::class)
 */
class TipoTarifa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nombre;

    /**
     * @ORM\OneToMany(targetEntity=TarifaExtra::class, mappedBy="TipoTarifa")
     */
    private $tarifaExtras;

    public function __construct()
    {
        $this->tarifaExtras = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, TarifaExtra>
     */
    public function getTarifaExtras(): Collection
    {
        return $this->tarifaExtras;
    }

    public function addTarifaExtra(TarifaExtra $tarifaExtra): self
    {
        if (!$this->tarifaExtras->contains($tarifaExtra)) {
            $this->tarifaExtras[] = $tarifaExtra;
            $tarifaExtra->setTipoTarifa($this);
        }

        return $this;
    }

    public function removeTarifaExtra(TarifaExtra $tarifaExtra): self
    {
        if ($this->tarifaExtras->removeElement($tarifaExtra)) {
            // set the owning side to null (unless already changed)
            if ($tarifaExtra->getTipoTarifa() === $this) {
                $tarifaExtra->setTipoTarifa(null);
            }
        }

        return $this;
    }
}
