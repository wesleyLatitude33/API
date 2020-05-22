<?php

namespace App\Controller;

use App\Entity\Medico;
use Doctrine\ORM\EntityManagerInterface;
use App\Helper\MedicoFactory;
use App\Repository\MedicoRepository;

class MedicosController extends BaseController
{

    public function __construct(EntityManagerInterface $entityManager,
    MedicoRepository $repository, MedicoFactory $factory){
        parent::__construct($repository, $entityManager, $factory);
    }
    
    /**
    * @param Medico $entidadeExistente
    * @param Medico $entidadeEnviada
    */
    public function atualizarEntidadeExistente(
        $entidadeExistente, $entidadeEnviada){

            $entidadeExistente
            ->setNome($entidadeEnviada->getNome())
            ->setEspecialidade($entidadeEnviada->getEspecialidade());
    }
       
}
