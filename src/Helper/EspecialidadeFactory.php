<?php

namespace App\Helper;

use App\Entity\Especialidade;

class EspecialidadeFactory implements EntidadeFactory
{

    public function criarEntidade(string $json): Especialidade
    {
        $dadoJson = json_decode($json);

        $especialidade = new Especialidade();
        $especialidade->setDescricao($dadoJson->descricao);
             
        return $especialidade;
    }
}