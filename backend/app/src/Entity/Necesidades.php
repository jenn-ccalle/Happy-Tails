<?php

namespace App\Entity;

use App\Repository\NecesidadesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NecesidadesRepository::class)
 */
class Necesidades
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
     * @ORM\OneToMany(targetEntity=Mascota::class, mappedBy="Necesidades")
     */
    private $mascotas;

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
            $mascota->setNecesidades($this);
        }

        return $this;
    }

    public function removeMascota(Mascota $mascota): self
    {
        if ($this->mascotas->removeElement($mascota)) {
            // set the owning side to null (unless already changed)
            if ($mascota->getNecesidades() === $this) {
                $mascota->setNecesidades(null);
            }
        }

        return $this;
    }
}
