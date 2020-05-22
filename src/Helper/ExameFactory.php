<?php

namespace App\Helper;

use App\Entity\Exame;

class ExameFactory implements EntidadeFactory
{

    public function criarEntidade(string $json): Exame
    {
        $dadoJson = json_decode($json);

        $exame = new Exame();
        $exame->setDescricao($dadoJson->descricao);
        $exame->setPreco($dadoJson->preco);
        $exame->setDiasResultado($dadoJson->diasResultado);
             
        return $exame;
    }
}