<?php

namespace App\Helper;

use App\Entity\OrdemServico;
use App\Repository\PacienteRepository;
use App\Repository\MedicoRepository;
use App\Repository\PostoColetaRepository;
use App\Repository\ConvenioRepository;
use App\Repository\UserLabRepository;

class OrdemServicoFactory implements EntidadeFactory
{
    private $pacienteRepository;
    private $medicoRepository;
    private $userLabRepository;

    public function __construct(PacienteRepository $pacienteRepository,
        MedicoRepository $medicoRepository,
        UserLabRepository $userLabRepository)
    {
        $this->pacienteRepository = $pacienteRepository;
        $this->medicoRepository = $medicoRepository;
        $this->userLabRepository = $userLabRepository;
    }

    public function criarEntidade(string $json): OrdemServico
    {
        $dadoJson = json_decode($json);
        $pacienteId = $dadoJson->pacienteId;
        $medicoId = $dadoJson->medicoId;
        $userLabId = $dadoJson->userLabId;  

        $paciente = $this->pacienteRepository->find($pacienteId);
        $medico = $this->medicoRepository->find($medicoId);
        $userLab = $this->userLabRepository->find($userLabId);
        

        $ordemServico = new OrdemServico();
        $ordemServico->setPaciente($paciente);
        $ordemServico->setMedico($medico);
        $ordemServico->setUserLab($userLab);

        $ordemServico->setDataOs($dadoJson->dataOs);
        $ordemServico->setDataRetirada($dadoJson->dataRetirada);
                     
        return $ordemServico;
    }
}