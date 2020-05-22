<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\Paciente;
use App\Entity\Medico;
use App\Entity\UserLab;
use DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdemServicoRepository")
 */
class OrdemServico implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Paciente", inversedBy="medico")
     */
    private $paciente;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Medico", inversedBy="ordemServicos")
     */
    private $medico;

    /**
    * @ORM\Column(type="string")
    */
    private $dataOs;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $dataRetirada;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserLab")
     * @ORM\JoinColumn(nullable=false)
     */
    private $UserLab;

    public function __construct()
    {
        $this->preco = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaciente(): ?Paciente
    {
        return $this->paciente;
    }

    public function setPaciente(?Paciente $paciente): self
    {
        $this->paciente = $paciente;

        return $this;
    }

    public function getMedico(): ?Medico
    {
        return $this->medico;
    }

    public function setMedico(?Medico $medico): self
    {
        $this->medico = $medico;

        return $this;
    }

    public function getDataOs(): ?string
    {
        return $this->dataOs;
    }

    public function setDataOs(?string $dataOs): self
    {
        $this->dataOs = $dataOs;

        return $this;
    }

    public function getDataRetirada(): ?string
    {
        return $this->dataRetirada;
    }

    public function setDataRetirada(?string $dataRetirada): self
    {
        $this->dataRetirada = $dataRetirada;

        return $this;
    }


    public function jsonSerialize()
    {
        return [
                'id' => $this->getId(),
                'pacienteId' => $this->getPaciente()->getId(),
                'medicoId' => $this->getMedico()->getId(),
                'dataOs' => $this->getDataOs(),
                'dataRetirada' => $this->getDataRetirada(),
                'userLabId' => $this->getUserLab()->getId()
        ];
    }

    public function getUserLab(): ?UserLab
    {
        return $this->UserLab;
    }

    public function setUserLab(?UserLab $UserLab): self
    {
        $this->UserLab = $UserLab;

        return $this;
    }
}
