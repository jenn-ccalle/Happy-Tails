<?php

namespace App\Entity;

use App\Repository\ContratacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContratacionRepository::class)
 */
class Contratacion
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
    private $Comentarios;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $CosteTotal;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaContratacion;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaInicioServicio;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaFinServicio;

    /**
     * @ORM\ManyToOne(targetEntity=Servicio::class, inversedBy="contratacions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Servicio;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="contratacions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Cliente;

    /**
     * @ORM\ManyToOne(targetEntity=Cuidador::class, inversedBy="contratacions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Cuidador;

    /**
     * @ORM\ManyToOne(targetEntity=MetodoPago::class, inversedBy="contratacions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $MetodoPago;

    /**
     * @ORM\ManyToOne(targetEntity=EstadoContratacion::class, inversedBy="contratacions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $EstadoContratacion;

    /**
     * @ORM\ManyToMany(targetEntity=Mascota::class, inversedBy="contratacions")
     */
    private $Mascota;

    /**
     * @ORM\OneToMany(targetEntity=Opinion::class, mappedBy="Contratacion")
     */
    private $opinions;

    public function __construct()
    {
        $this->Mascota = new ArrayCollection();
        $this->opinions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComentarios(): ?string
    {
        return $this->Comentarios;
    }

    public function setComentarios(?string $Comentarios): self
    {
        $this->Comentarios = $Comentarios;

        return $this;
    }

    public function getCosteTotal(): ?string
    {
        return $this->CosteTotal;
    }

    public function setCosteTotal(?string $CosteTotal): self
    {
        $this->CosteTotal = $CosteTotal;

        return $this;
    }

    public function getFechaContratacion(): ?\DateTimeInterface
    {
        return $this->FechaContratacion;
    }

    public function setFechaContratacion(\DateTimeInterface $FechaContratacion): self
    {
        $this->FechaContratacion = $FechaContratacion;

        return $this;
    }

    public function getFechaInicioServicio(): ?\DateTimeInterface
    {
        return $this->FechaInicioServicio;
    }

    public function setFechaInicioServicio(\DateTimeInterface $FechaInicioServicio): self
    {
        $this->FechaInicioServicio = $FechaInicioServicio;

        return $this;
    }

    public function getFechaFinServicio(): ?\DateTimeInterface
    {
        return $this->FechaFinServicio;
    }

    public function setFechaFinServicio(\DateTimeInterface $FechaFinServicio): self
    {
        $this->FechaFinServicio = $FechaFinServicio;

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

    public function getCliente(): ?Cliente
    {
        return $this->Cliente;
    }

    public function setCliente(?Cliente $Cliente): self
    {
        $this->Cliente = $Cliente;

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

    public function getMetodoPago(): ?MetodoPago
    {
        return $this->MetodoPago;
    }

    public function setMetodoPago(?MetodoPago $MetodoPago): self
    {
        $this->MetodoPago = $MetodoPago;

        return $this;
    }

    public function getEstadoContratacion(): ?EstadoContratacion
    {
        return $this->EstadoContratacion;
    }

    public function setEstadoContratacion(?EstadoContratacion $EstadoContratacion): self
    {
        $this->EstadoContratacion = $EstadoContratacion;

        return $this;
    }

    /**
     * @return Collection<int, Mascota>
     */
    public function getMascota(): Collection
    {
        return $this->Mascota;
    }

    public function addMascotum(Mascota $mascotum): self
    {
        if (!$this->Mascota->contains($mascotum)) {
            $this->Mascota[] = $mascotum;
        }

        return $this;
    }

    public function removeMascotum(Mascota $mascotum): self
    {
        $this->Mascota->removeElement($mascotum);

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
            $opinion->setContratacion($this);
        }

        return $this;
    }

    public function removeOpinion(Opinion $opinion): self
    {
        if ($this->opinions->removeElement($opinion)) {
            // set the owning side to null (unless already changed)
            if ($opinion->getContratacion() === $this) {
                $opinion->setContratacion(null);
            }
        }

        return $this;
    }
}
