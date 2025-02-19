<?php

namespace Ensa\Mvc\Controller;

use Ensa\Mvc\Entity\Avaliacao;
use Ensa\Mvc\Repository\AvaliacaoRepository;

class AvaliacaoController implements Controller
{
    public function __construct()
    {
    }
    public function processaRequisicao($pdo)
    {
        $enviar = filter_input(INPUT_POST, 'enviar');
        if ($enviar === false) {
            header('Location: /?sucesso=0');
            return;
        }

        $selectservico = filter_input(INPUT_POST, 'selectservico');
        if ($selectservico === false || $selectservico === null) {
            header('Location: /?sucesso=0');
            return;
        }

        $selectnome = filter_input(INPUT_POST, 'selectnome');
        if ($selectnome === false  || $selectnome === null) {
            header('Location: /?sucesso=0');
            return;
        }

        $numStar = filter_input(INPUT_POST, 'numStar');
        if ($numStar === false) {
            header('Location: /?sucesso=0');
            return;
        }

        $comentario = filter_input(INPUT_POST, 'comentario');
        if ($comentario === false) {
            header('Location: /?sucesso=0');
            return;
        }


        if (isset($enviar)) {
                $avaliacao = new Avaliacao(
                    $selectservico,
                    $selectnome,
                    $numStar,
                    $comentario,
                    date("d/m/Y H:i:s")
                );
                $avaliacaoRepository = new AvaliacaoRepository($pdo);
                $success = $avaliacaoRepository->salvar($avaliacao);
                if ($success === false) {
                    header('Location: /?sucesso=0');
                } else {
                    header('Location: /?sucesso=1');
                }

            }
        }


}




