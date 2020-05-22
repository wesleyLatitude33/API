<?php

namespace App\Controller;

use App\Entity\PostoColeta;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PostoColetaRepository;
use App\Helper\PostoColetaFactory;

class PostoColetasController extends BaseController
{

    public function __construct(EntityManagerInterface $entityManager,
    PostoColetaRepository $repository, PostoColetaFactory $factory){
        parent::__construct($repository, $entityManager, $factory);
    }
    
    /**
    * @param PostoColeta $entidadeExistente
    * @param PostoColeta $entidadeEnviada
    */
    public function atualizarEntidadeExistente(
        $entidadeExistente, $entidadeEnviada){

            $entidadeExistente
            ->setDescricao($entidadeEnviada->getDescricao())
            ->setEndereco($entidadeEnviada->getEndereco());
        }

       
}
