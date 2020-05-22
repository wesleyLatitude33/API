<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExameRepository")
 */
class Exame implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descricao;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $preco;

    /**
     * @ORM\Column(type="integer")
     */
    private $diasResultado;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

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

    public function getDiasResultado(): ?int
    {
        return $this->diasResultado;
    }

    public function setDiasResultado(int $diasResultado): self
    {
        $this->diasResultado = $diasResultado;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
                'id' => $this->getId(),
                'descricao' => $this->getDescricao(),
                'preco' => $this->getPreco(),
                'diasResultado' => $this->getDiasResultado()
        ];
    }
   
}
