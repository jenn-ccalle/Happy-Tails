<?php

namespace App\Entity;

use App\Repository\TarifaExtraRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TarifaExtraRepository::class)
 */
class TarifaExtra
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $Valor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValor(): ?string
    {
        return $this->Valor;
    }

    public function setValor(string $Valor): self
    {
        $this->Valor = $Valor;

        return $this;
    }
}
