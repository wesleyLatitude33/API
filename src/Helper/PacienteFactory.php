<?php

namespace App\Helper;

use App\Entity\Paciente;
use App\Repository\ConvenioRepository;

class PacienteFactory implements EntidadeFactory
{

    private $convenioRepository;

    public function __construct(ConvenioRepository $convenioRepository)
    {
        $this->convenioRepository = $convenioRepository;
    }

    public function criarEntidade(string $json): Paciente
    {
        $dadoJson = json_decode($json);

        $dadoJson = json_decode($json);
        $convenioid = $dadoJson->convenioId;

        $convenio = $this->convenioRepository->find($convenioid);

        $paciente = new Paciente();
        $paciente->setNome($dadoJson->nome);
        $paciente->setDataNascimento($dadoJson->dataNascimento);
        $paciente->setSexo($dadoJson->sexo);
        $paciente->setEndereco($dadoJson->endereco);
        $paciente->setConvenio($convenio);
             
        return $paciente;
    }
}