<?php

namespace App\Entity;

use App\Repository\ContratacionMascotaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContratacionMascotaRepository::class)
 */
class ContratacionMascota
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Mascota::class, inversedBy="contratacionMascotas")
     */
    private $Mascota;

    /**
     * @ORM\ManyToMany(targetEntity=Contratacion::class)
     */
    private $Contratacion;

    public function __construct()
    {
        $this->Mascota = new ArrayCollection();
        $this->Contratacion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection<int, Contratacion>
     */
    public function getContratacion(): Collection
    {
        return $this->Contratacion;
    }

    public function addContratacion(Contratacion $contratacion): self
    {
        if (!$this->Contratacion->contains($contratacion)) {
            $this->Contratacion[] = $contratacion;
        }

        return $this;
    }

    public function removeContratacion(Contratacion $contratacion): self
    {
        $this->Contratacion->removeElement($contratacion);

        return $this;
    }
}
