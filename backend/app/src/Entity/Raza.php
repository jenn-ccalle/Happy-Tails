<?php

namespace App\Entity;

use App\Repository\RazaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RazaRepository::class)
 */
class Raza
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $Nombre;

    /**
     * @ORM\OneToMany(targetEntity=Mascota::class, mappedBy="Raza")
     */
    private $mascotas;

    /**
     * @ORM\ManyToOne(targetEntity=Especie::class, inversedBy="razas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Especie;

    public function __construct()
    {
        $this->mascotas = new ArrayCollection();
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
     * @return Collection<int, Mascota>
     */
    public function getMascotas(): Collection
    {
        return $this->mascotas;
    }

    public function addMascota(Mascota $mascota): self
    {
        if (!$this->mascotas->contains($mascota)) {
            $this->mascotas[] = $mascota;
            $mascota->setRaza($this);
        }

        return $this;
    }

    public function removeMascota(Mascota $mascota): self
    {
        if ($this->mascotas->removeElement($mascota)) {
            // set the owning side to null (unless already changed)
            if ($mascota->getRaza() === $this) {
                $mascota->setRaza(null);
            }
        }

        return $this;
    }

    public function getEspecie(): ?Especie
    {
        return $this->Especie;
    }

    public function setEspecie(?Especie $Especie): self
    {
        $this->Especie = $Especie;

        return $this;
    }
}
