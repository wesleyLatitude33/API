<?php

namespace App\Helper;

use App\Entity\Convenio;

class ConvenioFactory implements EntidadeFactory
{

    public function criarEntidade(string $json): Convenio
    {
        $dadoJson = json_decode($json);

        $convenio = new Convenio();
        $convenio->setDescricao($dadoJson->descricao);
             
        return $convenio;
    }
}