<?php

namespace App\Controller;

use App\Entity\Convenio;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ConvenioRepository;
use App\Helper\ConvenioFactory;

class ConveniosController extends BaseController
{

    public function __construct(EntityManagerInterface $entityManager,
    ConvenioRepository $repository, ConvenioFactory $factory){
        parent::__construct($repository, $entityManager, $factory);
    }
    
    /**
    * @param Convenio $entidadeExistente
    * @param Convenio $entidadeEnviada
    */
    public function atualizarEntidadeExistente(
        $entidadeExistente, $entidadeEnviada){

            $entidadeExistente
            ->setDescricao($entidadeEnviada->getDescricao());
        }

       
}
