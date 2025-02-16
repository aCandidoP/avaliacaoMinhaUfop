<?php

namespace Ensa\Mvc\Controller;

use Ensa\Mvc\Repository\AvaliacaoRepository;

require_once __DIR__ . '/../Repository/AvaliacaoRepository.php';

class ListaAvaliacoesController implements Controller
{
    public function __construct()
    {
    }
    public function processaRequisicao($pdo)
    {
        $avaliacaoRepository = new AvaliacaoRepository($pdo);
        $avaliacao = $avaliacaoRepository->buscarFormatado();

        require_once __DIR__ . '/../../views/avaliacoes-html.php';
    }

}