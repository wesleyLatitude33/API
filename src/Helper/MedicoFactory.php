<?php

namespace App\Helper;

use App\Entity\Medico;
use App\Repository\EspecialidadeRepository;

class MedicoFactory implements EntidadeFactory
{
    private $especialidadeRepository;

    public function __construct(EspecialidadeRepository $especialidadeRepository)
    {
        $this->especialidadeRepository = $especialidadeRepository;
    }
    public function criarEntidade(string $json): Medico
    {
        $dadoJson = json_decode($json);
        $especialidadeId = $dadoJson->especialidadeId;

        $especialidade = $this->especialidadeRepository->find($especialidadeId);

        $medico = new Medico();
        $medico->setNome($dadoJson->nome);
        $medico->setEspecialidade($especialidade);
             
        return $medico;
    }
}