<?php

namespace App\Helper;

use App\Entity\OrdemServicoExame;
use App\Repository\OrdemServicoRepository;
use App\Repository\ExameRepository;

class OrdemServicoExameFactory implements EntidadeFactory
{
    private $ordemServicoRepository;
    private $exameRepository;

    public function __construct(OrdemServicoRepository $ordemServicoRepository,
        ExameRepository $exameRepository)
    {
        $this->ordemServicoRepository = $ordemServicoRepository;
        $this->exameRepository = $exameRepository;
    }
    
    public function criarEntidade(string $json): OrdemServicoExame
    {
        $dadoJson = json_decode($json);
        $ordemServicoId = $dadoJson->ordemServicoId;
        $exameId = $dadoJson->exameId;

        $ordemServico = $this->ordemServicoRepository->find($ordemServicoId);
        $exame = $this->exameRepository->find($exameId);

        $ordemServicoExame = new OrdemServicoExame();
        $ordemServicoExame->setExame($exame);
        $ordemServicoExame->setOrdemServico($ordemServico);
        $ordemServicoExame->setPreco($dadoJson->preco);
        $ordemServicoExame->setDataResultado($dadoJson->dataResultado);

        return $ordemServicoExame;
    }
}