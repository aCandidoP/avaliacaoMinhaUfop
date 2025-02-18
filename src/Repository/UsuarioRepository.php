<?php

namespace Ensa\Mvc\Repository;

use Ensa\Mvc\Entity\Usuario;
use Ensa\Mvc\Database\DatabaseQuery;

require_once __DIR__ . '/../Entity/Usuario.php';
require_once __DIR__ . '/../Database/DatabaseQuery.php';

class UsuarioRepository
{
    private $dbQuery;

    public function __construct($pdo)
    {
        $this->dbQuery = new DatabaseQuery($pdo);
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
        $dados = $this->dbQuery->select('usuario', [], 'id, nome, email');
        
        return array_map(
            function ($usuario) {
                return $this->formarObjeto($usuario);
            }, 
            $dados
        );
    }
}
?>
