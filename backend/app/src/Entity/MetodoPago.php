<?php

namespace App\Entity;

use App\Repository\MetodoPagoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MetodoPagoRepository::class)
 */
class MetodoPago
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
     * @ORM\OneToMany(targetEntity=Contratacion::class, mappedBy="MetodoPago")
     */
    private $contratacions;

    public function __construct()
    {
        $this->contratacions = new ArrayCollection();
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
     * @return Collection<int, Contratacion>
     */
    public function getContratacions(): Collection
    {
        return $this->contratacions;
    }

    public function addContratacion(Contratacion $contratacion): self
    {
        if (!$this->contratacions->contains($contratacion)) {
            $this->contratacions[] = $contratacion;
            $contratacion->setMetodoPago($this);
        }

        return $this;
    }

    public function removeContratacion(Contratacion $contratacion): self
    {
        if ($this->contratacions->removeElement($contratacion)) {
            // set the owning side to null (unless already changed)
            if ($contratacion->getMetodoPago() === $this) {
                $contratacion->setMetodoPago(null);
            }
        }

        return $this;
    }
}
