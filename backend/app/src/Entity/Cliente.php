<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClienteRepository::class)
 */
class Cliente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Persona::class, inversedBy="cliente", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Persona;

    /**
     * @ORM\OneToMany(targetEntity=Contratacion::class, mappedBy="Cliente")
     */
    private $contratacions;

    /**
     * @ORM\OneToMany(targetEntity=Opinion::class, mappedBy="Cliente")
     */
    private $opinions;

    public function __construct()
    {
        $this->contratacions = new ArrayCollection();
        $this->opinions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersona(): ?Persona
    {
        return $this->Persona;
    }

    public function setPersona(Persona $Persona): self
    {
        $this->Persona = $Persona;

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
            $contratacion->setCliente($this);
        }

        return $this;
    }

    public function removeContratacion(Contratacion $contratacion): self
    {
        if ($this->contratacions->removeElement($contratacion)) {
            // set the owning side to null (unless already changed)
            if ($contratacion->getCliente() === $this) {
                $contratacion->setCliente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Opinion>
     */
    public function getOpinions(): Collection
    {
        return $this->opinions;
    }

    public function addOpinion(Opinion $opinion): self
    {
        if (!$this->opinions->contains($opinion)) {
            $this->opinions[] = $opinion;
            $opinion->setCliente($this);
        }

        return $this;
    }

    public function removeOpinion(Opinion $opinion): self
    {
        if ($this->opinions->removeElement($opinion)) {
            // set the owning side to null (unless already changed)
            if ($opinion->getCliente() === $this) {
                $opinion->setCliente(null);
            }
        }

        return $this;
    }
}
