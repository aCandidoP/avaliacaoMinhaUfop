<?php

spl_autoload_register(function ($className) {
    $caminho = str_replace('Ensa\\Mvc', 'src', $className) . '.php';
    $caminho = str_replace('\\', DIRECTORY_SEPARATOR, $caminho);

    $atual = __DIR__;
    $atual = str_replace("/utils", '', $atual);
    $caminhoCompleto = $atual . DIRECTORY_SEPARATOR . $caminho;

    if(file_exists($caminhoCompleto)) {
        require_once $caminhoCompleto;
    }
});