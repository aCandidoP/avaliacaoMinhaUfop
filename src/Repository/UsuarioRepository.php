<?php

namespace Ensa\Mvc\Repository;
use Ensa\Mvc\Entity\Usuario;
use PDO;
require_once __DIR__ . '/../Entity/Usuario.php';
class UsuarioRepository
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados)
    {
        return new Usuario(
            $dados['nome'],
            $dados['email']
        );
    }
    public function buscarTodos()
    {
        $sql = "SELECT * FROM usuario ORDER BY nome";
        $stm = $this->pdo->query($sql);
        $dados = $stm->fetchAll(PDO::FETCH_ASSOC);
        $todosDados = array_map(
            function ($usuario){
                return $this->formarObjeto($usuario);
            }, $dados);
        return $todosDados;
    }

}

