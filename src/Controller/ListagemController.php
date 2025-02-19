<?php

namespace Ensa\Mvc\Controller;
use Ensa\Mvc\Repository\ServicoRepository;
use Ensa\Mvc\Repository\UsuarioRepository;

class
ListagemController implements Controller
{
    public function __construct()
    {
    }
    public function processaRequisicao($pdo)
    {
        $servicoRepository = new ServicoRepository($pdo);
        $servico = $servicoRepository->buscarTodos();

        $usuarioRepository = new UsuarioRepository($pdo);
        $usuario = $usuarioRepository->buscarTodos();

        require_once __DIR__ . '/../../views/home-html.php';
    }

}