<?php

namespace App\Controller;

use App\Entity\OrdemServico;
use Doctrine\ORM\EntityManagerInterface;
use App\Helper\OrdemServicoFactory;
use App\Repository\OrdemServicoRepository;

class OrdemServicosController extends BaseController
{

    public function __construct(EntityManagerInterface $entityManager,
    OrdemServicoRepository $repository, OrdemServicoFactory $factory){
        parent::__construct($repository, $entityManager, $factory);
    }

    public function retornaTotalOs($id){
        
    }
    
    /**
    * @param OrdemServico $entidadeExistente
    * @param OrdemServico $entidadeEnviada
    */
    public function atualizarEntidadeExistente(
        $entidadeExistente, $entidadeEnviada){

            $entidadeExistente
            ->setPaciente($entidadeEnviada->getPaciente())
            ->setMedico($entidadeEnviada->getMedico())
            ->setDataOs($entidadeEnviada->getDataOs())
            ->setDataRetirada($entidadeEnviada->getDataRetirada())
            ->setUserLab($entidadeEnviada->getUserLab());
    }
       
}
