<?php

namespace App\Entity;

use App\Repository\CuidadorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CuidadorRepository::class)
 */
class Cuidador
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
    private $InfoExperiencia;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Ninos;

    /**
     * @ORM\Column(type="integer")
     */
    private $TiempoExperiencia;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $TipoVivienda;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $AdminMedicamentos;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Coche;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Fuma;

    /**
     * @ORM\OneToOne(targetEntity=Persona::class, inversedBy="cuidador", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Persona;

    /**
     * @ORM\OneToMany(targetEntity=Contratacion::class, mappedBy="Cuidador")
     */
    private $contratacions;

    /**
     * @ORM\OneToMany(targetEntity=DipsCuidador::class, mappedBy="Cuidador")
     */
    private $dispCuidadores;

    /**
     * @ORM\OneToMany(targetEntity=Opinion::class, mappedBy="Cuidador")
     */
    private $opinions;

    public function __construct()
    {
        $this->contratacions = new ArrayCollection();
        $this->dispCuidadores = new ArrayCollection();
        $this->opinions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfoExperiencia(): ?string
    {
        return $this->InfoExperiencia;
    }

    public function setInfoExperiencia(?string $InfoExperiencia): self
    {
        $this->InfoExperiencia = $InfoExperiencia;

        return $this;
    }

    public function getNinos(): ?int
    {
        return $this->Ninos;
    }

    public function setNinos(?int $Ninos): self
    {
        $this->Ninos = $Ninos;

        return $this;
    }

    public function getTiempoExperiencia(): ?int
    {
        return $this->TiempoExperiencia;
    }

    public function setTiempoExperiencia(int $TiempoExperiencia): self
    {
        $this->TiempoExperiencia = $TiempoExperiencia;

        return $this;
    }

    public function getTipoVivienda(): ?string
    {
        return $this->TipoVivienda;
    }

    public function setTipoVivienda(string $tipoVivienda): self
    {
        $this->TipoVivienda = $tipoVivienda;

        return $this;
    }

    public function getAdminMedicamentos(): ?int
    {
        return $this->AdminMedicamentos;
    }

    public function setAdminMedicamentos(?int $AdminMedicamentos): self
    {
        $this->AdminMedicamentos = $AdminMedicamentos;

        return $this;
    }

    public function getCoche(): ?int
    {
        return $this->Coche;
    }

    public function setCoche(?int $Coche): self
    {
        $this->Coche = $Coche;

        return $this;
    }

    public function getFuma(): ?int
    {
        return $this->Fuma;
    }

    public function setFuma(?int $Fuma): self
    {
        $this->Fuma = $Fuma;

        return $this;
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
            $contratacion->setCuidador($this);
        }

        return $this;
    }

    public function removeContratacion(Contratacion $contratacion): self
    {
        if ($this->contratacions->removeElement($contratacion)) {
            // set the owning side to null (unless already changed)
            if ($contratacion->getCuidador() === $this) {
                $contratacion->setCuidador(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DipsCuidador>
     */
    public function getDispCuidadores(): Collection
    {
        return $this->dispCuidadores;
    }

    public function addDispCuidadore(DipsCuidador $dispCuidadore): self
    {
        if (!$this->dispCuidadores->contains($dispCuidadore)) {
            $this->dispCuidadores[] = $dispCuidadore;
            $dispCuidadore->setCuidador($this);
        }

        return $this;
    }

    public function removeDispCuidadore(DipsCuidador $dispCuidadore): self
    {
        if ($this->dispCuidadores->removeElement($dispCuidadore)) {
            // set the owning side to null (unless already changed)
            if ($dispCuidadore->getCuidador() === $this) {
                $dispCuidadore->setCuidador(null);
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
            $opinion->setCuidador($this);
        }

        return $this;
    }

    public function removeOpinion(Opinion $opinion): self
    {
        if ($this->opinions->removeElement($opinion)) {
            // set the owning side to null (unless already changed)
            if ($opinion->getCuidador() === $this) {
                $opinion->setCuidador(null);
            }
        }

        return $this;
    }
}
