<?php

namespace App\Controller;

use App\Entity\OrdemServicoExame;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OrdemServicoExameRepository;
use App\Helper\OrdemServicoExameFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class OrdemServicoExamesController extends BaseController
{

    public function __construct(EntityManagerInterface $entityManager,
    OrdemServicoExameRepository $repository, OrdemServicoExameFactory $factory){
        parent::__construct($repository, $entityManager, $factory);
    }
    
    /**
    * @param OrdemServicoExame $entidadeExistente
    * @param OrdemServicoExame $entidadeEnviada
    */
    public function atualizarEntidadeExistente(
        $entidadeExistente, $entidadeEnviada){

            $entidadeExistente
            ->setExame($entidadeEnviada->getExame())
            ->setOrdemServico($entidadeEnviada->getOrdemServico())
            ->setDataResultado($entidadeEnviada->getDataResultado())
            ->setPreco($entidadeEnviada->getPreco());
        }

    public function buscarTodosOS(int $id): Response
    {
        $entity = $this->repository->findBy([
            'ordemServico' => $id
        ]);
        $codigoRetorno = is_null($entity) ? Response::HTTP_NO_CONTENT : 200;
        
        return new JsonResponse($entity, $codigoRetorno);
    }

       
}
