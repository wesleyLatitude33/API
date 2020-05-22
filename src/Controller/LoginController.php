<?php

namespace App\Controller;

use App\Entity\UserLab;
use App\Entity\PostoColeta;
use App\Repository\UserLabRepository;
use App\Repository\UserRepository;
use Firebase\JWT\JWT;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoginController extends AbstractController
{
    private $repository;
    private $encoder;

    public function __construct(
        UserLabRepository $repository,
        UserPasswordEncoderInterface $encoder)
    {
        $this->repository = $repository;
        $this->encoder = $encoder;
    }

    /**
     * @Route("/login", name="login")
     */
    public function index(Request $request)
    {
        $dadosEmJson = json_decode($request->getContent());
        if (is_null($dadosEmJson->usuario) || is_null($dadosEmJson->senha)){
            return new JsonResponse([
                'erro' => 'Favor enviar usuário e senha'],
            Response::HTTP_BAD_REQUEST);
        }

        $user = $this->repository->findOneBy([
            'username' => $dadosEmJson->usuario
        ]);

        if(!$this->encoder->isPasswordValid($user, $dadosEmJson->senha)){
            return new JsonResponse([
                'erro' => 'Usuário ou senha inválidos'],
            Response::HTTP_UNAUTHORIZED);
        }

        $token = JWT::encode([
           'username' => $user->getUsername(),
        ], 'chave', 'HS256');

        $credentials = JWT::decode($token, 'chave', ['HS256']);

        return new JsonResponse([
            'acces_token' => $token,
            'username' => $user->getUsername(),
            'postoColetaId' => $user->getPostoColeta()->getId(),
            'nome' => $user->getNome(),
            'id' => $user->getId()
        ]);
    }
}