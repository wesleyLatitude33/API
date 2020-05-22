<?php

namespace App\Helper;

use App\Entity\PostoColeta;

class PostoColetaFactory implements EntidadeFactory
{

    public function criarEntidade(string $json): PostoColeta
    {
        $dadoJson = json_decode($json);

        $postoColeta = new PostoColeta();
        $postoColeta->setDescricao($dadoJson->descricao);
        $postoColeta->setEndereco($dadoJson->endereco);
             
        return $postoColeta;
    }
}