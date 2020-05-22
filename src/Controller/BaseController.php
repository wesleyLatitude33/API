<?php

namespace App\Controller;

use App\Helper\EntidadeFactory;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use Exception;
use Firebase\JWT\JWT;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseController extends AbstractController
{
    protected $repository;
    protected $entityManager;
    protected $entidadeFactory;

    public function __construct(ObjectRepository $repository, 
            EntityManager $entityManager, EntidadeFactory $entidadeFactory)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->entidadeFactory = $entidadeFactory;
    }

    public function buscarTodos(Request $request): Response
    {
        
        $entityList = $this->repository->findAll();
        return new JsonResponse($entityList);    
  
    }


    public function buscarPorCodigo(int $id): Response
    {
        $entity = $this->repository->find($id);
        $codigoRetorno = is_null($entity) ? Response::HTTP_NO_CONTENT : 200;
        
        return new JsonResponse($entity, $codigoRetorno);    
    }

    public function remove(int $id): Response
    {
        $entity = $this->repository->find($id);;
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
        
        return new Response('', Response::HTTP_NO_CONTENT);    
    }
    
    public function novo(Request $request): Response
    {
        
        $dadosRequest = $request->getContent();
        $entidade = $this->entidadeFactory->criarEntidade($dadosRequest);
        
        $this->entityManager->persist($entidade);
        $this->entityManager->flush();

        return new JsonResponse($entidade);
       
    }

    public function atualiza(int $id, Request $request): Response
    {
        $corpoRequisição = $request->getContent();
        $entidadeEnviada = $this->entidadeFactory->criarEntidade($corpoRequisição);

        $entidade = $this->repository->find($id);
        
        // caso médico passado por parâmetro não exista a função para por aqui
        // e retorna erro 404
        if (is_null($entidade)){
            return new Response('',Response::HTTP_NOT_FOUND);
        }

        $this->atualizarEntidadeExistente($entidade, $entidadeEnviada);
        
        $this->entityManager->flush();

        return new JsonResponse($entidade);

    }

    abstract public function atualizarEntidadeExistente(
        $entidadeExistente, $entidadeEnviada);

}