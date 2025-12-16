<?php

namespace App\Entity;

use App\Repository\EspecieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EspecieRepository::class)
 */
class Especie
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
     * @ORM\OneToMany(targetEntity=Raza::class, mappedBy="Especie")
     */
    private $razas;

    public function __construct()
    {
        $this->razas = new ArrayCollection();
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
     * @return Collection<int, Raza>
     */
    public function getRazas(): Collection
    {
        return $this->razas;
    }

    public function addRaza(Raza $raza): self
    {
        if (!$this->razas->contains($raza)) {
            $this->razas[] = $raza;
            $raza->setEspecie($this);
        }

        return $this;
    }

    public function removeRaza(Raza $raza): self
    {
        if ($this->razas->removeElement($raza)) {
            // set the owning side to null (unless already changed)
            if ($raza->getEspecie() === $this) {
                $raza->setEspecie(null);
            }
        }

        return $this;
    }
}
