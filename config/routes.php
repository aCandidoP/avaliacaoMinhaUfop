<?php

return [
    'GET|/' => \Ensa\Mvc\Controller\ListagemController::class,
    'POST|/' => \Ensa\Mvc\Controller\AvaliacaoController::class,
    'GET|/lista-avaliacoes' => \Ensa\Mvc\Controller\ListaAvaliacoesController::class,
];