<?php

namespace App\Entity;

use App\Repository\PersonaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonaRepository::class)
 */
class Persona
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Nombre;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Apellidos;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaNac;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $Telefono;

    /**
     * @ORM\Column(type="integer")
     */
    // private $Id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Direccion;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $Dni;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Contrasena;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $Email;

    /**
     * @ORM\OneToOne(targetEntity=Cliente::class, mappedBy="Persona", cascade={"persist", "remove"})
     */
    private $cliente;

    /**
     * @ORM\OneToOne(targetEntity=Cuidador::class, mappedBy="Persona", cascade={"persist", "remove"})
     */
    private $cuidador;

    /**
     * @ORM\OneToMany(targetEntity=Mascota::class, mappedBy="Persona")
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

    public function getApellidos(): ?string
    {
        return $this->Apellidos;
    }

    public function setApellidos(string $Apellidos): self
    {
        $this->Apellidos = $Apellidos;

        return $this;
    }

    public function getFechaNac(): ?\DateTimeInterface
    {
        return $this->FechaNac;
    }

    public function setFechaNac(\DateTimeInterface $FechaNac): self
    {
        $this->FechaNac = $FechaNac;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->Telefono;
    }

    public function setTelefono(string $Telefono): self
    {
        $this->Telefono = $Telefono;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->Direccion;
    }

    public function setDireccion(string $Direccion): self
    {
        $this->Direccion = $Direccion;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->Dni;
    }

    public function setDni(string $Dni): self
    {
        $this->Dni = $Dni;

        return $this;
    }

    public function getContrasena(): ?string
    {
        return $this->Contrasena;
    }

    public function setContrasena(string $Contrasena): self
    {
        $this->Contrasena = $Contrasena;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente): self
    {
        // set the owning side of the relation if necessary
        if ($cliente->getPersona() !== $this) {
            $cliente->setPersona($this);
        }

        $this->cliente = $cliente;

        return $this;
    }

    public function getCuidador(): ?Cuidador
    {
        return $this->cuidador;
    }

    public function setCuidador(Cuidador $cuidador): self
    {
        // set the owning side of the relation if necessary
        if ($cuidador->getPersona() !== $this) {
            $cuidador->setPersona($this);
        }

        $this->cuidador = $cuidador;

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
            $mascota->setPersona($this);
        }

        return $this;
    }

    public function removeMascota(Mascota $mascota): self
    {
        if ($this->mascotas->removeElement($mascota)) {
            // set the owning side to null (unless already changed)
            if ($mascota->getPersona() === $this) {
                $mascota->setPersona(null);
            }
        }

        return $this;
    }
}
