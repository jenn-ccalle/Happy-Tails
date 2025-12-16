<?php

namespace App\Entity;

use App\Repository\ServicioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServicioRepository::class)
 */
class Servicio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Direccion;

    /**
     * @ORM\Column(type="integer")
     */
    private $Experiencia;

    /**
     * @ORM\Column(type="smallint")
     */
    private $MasMascotas;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $TarifaBase;

    /**
     * @ORM\ManyToOne(targetEntity=TipoServicio::class, inversedBy="servicios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $TipoServicio;

    /**
     * @ORM\OneToMany(targetEntity=TarifaExtra::class, mappedBy="Servicio")
     */
    private $tarifaExtras;

    /**
     * @ORM\OneToMany(targetEntity=Contratacion::class, mappedBy="Servicio")
     */
    private $contratacions;

    /**
     * @ORM\OneToMany(targetEntity=DipsCuidador::class, mappedBy="Servicio")
     */
    private $dipsCuidadors;

    public function __construct()
    {
        $this->tarifaExtras = new ArrayCollection();
        $this->contratacions = new ArrayCollection();
        $this->dipsCuidadors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getExperiencia(): ?int
    {
        return $this->Experiencia;
    }

    public function setExperiencia(int $Experiencia): self
    {
        $this->Experiencia = $Experiencia;

        return $this;
    }

    public function getMasMascotas(): ?int
    {
        return $this->MasMascotas;
    }

    public function setMasMascotas(int $MasMascotas): self
    {
        $this->MasMascotas = $MasMascotas;

        return $this;
    }

    public function getTarifaBase(): ?string
    {
        return $this->TarifaBase;
    }

    public function setTarifaBase(string $TarifaBase): self
    {
        $this->TarifaBase = $TarifaBase;

        return $this;
    }

    public function getTipoServicio(): ?TipoServicio
    {
        return $this->TipoServicio;
    }

    public function setTipoServicio(?TipoServicio $TipoServicio): self
    {
        $this->TipoServicio = $TipoServicio;

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
            $tarifaExtra->setServicio($this);
        }

        return $this;
    }

    public function removeTarifaExtra(TarifaExtra $tarifaExtra): self
    {
        if ($this->tarifaExtras->removeElement($tarifaExtra)) {
            // set the owning side to null (unless already changed)
            if ($tarifaExtra->getServicio() === $this) {
                $tarifaExtra->setServicio(null);
            }
        }

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
            $contratacion->setServicio($this);
        }

        return $this;
    }

    public function removeContratacion(Contratacion $contratacion): self
    {
        if ($this->contratacions->removeElement($contratacion)) {
            // set the owning side to null (unless already changed)
            if ($contratacion->getServicio() === $this) {
                $contratacion->setServicio(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DipsCuidador>
     */
    public function getDipsCuidadors(): Collection
    {
        return $this->dipsCuidadors;
    }

    public function addDipsCuidador(DipsCuidador $dipsCuidador): self
    {
        if (!$this->dipsCuidadors->contains($dipsCuidador)) {
            $this->dipsCuidadors[] = $dipsCuidador;
            $dipsCuidador->setServicio($this);
        }

        return $this;
    }

    public function removeDipsCuidador(DipsCuidador $dipsCuidador): self
    {
        if ($this->dipsCuidadors->removeElement($dipsCuidador)) {
            // set the owning side to null (unless already changed)
            if ($dipsCuidador->getServicio() === $this) {
                $dipsCuidador->setServicio(null);
            }
        }

        return $this;
    }
}
