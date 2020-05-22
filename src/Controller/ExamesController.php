<?php

namespace App\Controller;

use App\Entity\Exame;
use Doctrine\ORM\EntityManagerInterface;
use App\Helper\EspecialidadeFactory;
use App\Helper\ExameFactory;
use App\Repository\EspecialidadeRepository;
use App\Repository\ExameRepository;

class ExamesController extends BaseController
{

    public function __construct(EntityManagerInterface $entityManager,
    ExameRepository $repository, ExameFactory $factory){
        parent::__construct($repository, $entityManager, $factory);
    }
    
    /**
    * @param Exame $entidadeExistente
    * @param Exame $entidadeEnviada
    */
    public function atualizarEntidadeExistente(
        $entidadeExistente, $entidadeEnviada){
  
            $entidadeExistente
            ->setDescricao($entidadeEnviada->getDescricao())
            ->setPreco($entidadeEnviada->getPreco())
            ->setDiasResultado($entidadeEnviada->getDiasResultado());
    }

    public function teste(){
        
    }
       
}
