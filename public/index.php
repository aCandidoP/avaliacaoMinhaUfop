<?php

use Ensa\Mvc\Controller\Controller;
use Ensa\Mvc\Controller\ListagemController;
use Ensa\Mvc\Controller\AvaliacaoController;
use Ensa\Mvc\Controller\Error404Controller;
use Ensa\Mvc\Controller\ListaAvaliacoesController;

require_once __DIR__ . '/../utils/autoload.php';

require_once __DIR__ . '/../src/conexao-bd.php';

$routes = require_once __DIR__ . '/../config/routes.php';

$pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/' ;
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];

    $controller = new $controllerClass();
} else {
    $controller = new Error404Controller();
}
/** @var Controller $controller */
$controller->processaRequisicao($pdo);