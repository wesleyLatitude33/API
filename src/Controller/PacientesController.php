<?php

namespace App\Controller;

use App\Entity\Paciente;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PacienteRepository;
use App\Helper\PacienteFactory;

class PacientesController extends BaseController
{

    public function __construct(EntityManagerInterface $entityManager,
    PacienteRepository $repository, PacienteFactory $factory){
        parent::__construct($repository, $entityManager, $factory);
    }
    
    /**
    * @param Paciente $entidadeExistente
    * @param Paciente $entidadeEnviada
    */
    public function atualizarEntidadeExistente(
        $entidadeExistente, $entidadeEnviada){

            $entidadeExistente
            ->setNome($entidadeEnviada->getNome())
            ->setDataNascimento($entidadeEnviada->getDataNascimento())
            ->setSexo($entidadeEnviada->getSexo())
            ->setEndereco($entidadeEnviada->getEndereco());
    }
       
}
