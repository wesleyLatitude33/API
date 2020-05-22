<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdemServicoExameRepository")
 */
class OrdemServicoExame implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\OrdemServico")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ordemServico;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $preco;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Exame")
     * @ORM\JoinColumn(nullable=false)
     */
    private $exame;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $dataResultado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdemServico(): ?ordemServico
    {
        return $this->ordemServico;
    }

    public function setOrdemServico(?ordemServico $ordemServico): self
    {
        $this->ordemServico = $ordemServico;

        return $this;
    }

    public function getPreco(): ?string
    {
        return $this->preco;
    }

    public function setPreco(string $preco): self
    {
        $this->preco = $preco;

        return $this;
    }

    public function getExame(): ?exame
    {
        return $this->exame;
    }

    public function setExame(?exame $exame): self
    {
        $this->exame = $exame;

        return $this;
    }

    public function getDataResultado(): ?string
    {
        return $this->dataResultado;
    }

    public function setDataResultado(?string $dataResultado): self
    {
        $this->dataResultado = $dataResultado;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
                'id' => $this->getId(),
                'ordemServicoId' => $this->getOrdemServico()->getId(),
                'exameId' => $this->getExame()->getId(),
                'exameNome' => $this->getExame()->getDescricao(),
                'preco' => $this->getPreco(),
                'dataResultado' => $this->getDataResultado()
        ];
    }
}
