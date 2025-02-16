<?php

namespace Ensa\Mvc\Controller;
use Ensa\Mvc\Repository\ServicoRepository;
use Ensa\Mvc\Repository\UsuarioRepository;

require_once __DIR__ . '/../Repository/ServicoRepository.php';
require_once __DIR__ . '/../Repository/UsuarioRepository.php';
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