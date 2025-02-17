<?php

namespace Ensa\Mvc\Repository;

use Ensa\Mvc\Entity\Servico;
use Ensa\Mvc\Database\DatabaseQuery;

require_once __DIR__ . '/../Entity/Servico.php';
require_once __DIR__ . '/../Database/DatabaseQuery.php';

class ServicoRepository
{
    private $dbQuery;

    public function __construct($pdo)
    {
        $this->dbQuery = new DatabaseQuery($pdo);
    }

    private function formarObjeto($dados)
    {
        return new Servico(
            $dados['id_servico'],
            $dados['servicominhaufop']
        );
    }

    public function buscarTodos()
    {
        $dados = $this->dbQuery->select('servico', [], 'id_servico, servicominhaufop');

        return array_map(
            function ($servico) {
                return $this->formarObjeto($servico);
            }, 
            $dados
        );
    }
}
?>
