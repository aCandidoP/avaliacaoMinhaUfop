<?php

namespace Ensa\Mvc\Repository;

use Ensa\Mvc\Entity\Avaliacao;
use Ensa\Mvc\Database\DatabaseQuery;

require_once __DIR__ . '/../Entity/Avaliacao.php';
require_once __DIR__ . '/../Database/DatabaseQuery.php';

class AvaliacaoRepository
{
    private $dbQuery;

    public function __construct($pdo)
    {
        $this->dbQuery = new DatabaseQuery($pdo);
    }

    public function salvar($avaliacao)
    {
        return $this->dbQuery->insert('avaliacao', [
            'servicoavaliado' => $avaliacao->getServicoAvaliado(),
            'nomeusuario' => $avaliacao->getNomeUsuario(),
            'numeroestrelas' => $avaliacao->getNumeroEstrelas(),
            'comentario' => $avaliacao->getComentario(),
            'dataHora' => $avaliacao->getDataHora()
        ]);
    }

    public function buscarFormatado()
    {
        $sql = "SELECT 
                    servicoavaliado, 
                    nomeusuario,
                    CASE
                        WHEN numeroestrelas = 1 THEN '*'
                        WHEN numeroestrelas = 2 THEN '* *'
                        WHEN numeroestrelas = 3 THEN '* * *'
                        WHEN numeroestrelas = 4 THEN '* * * *'
                        WHEN numeroestrelas = 5 THEN '* * * * *'
                    ELSE
                        'NÃO ESPECIFICADO'
                    END AS numeroestrelas,
                    comentario, 
                    datahora 
                FROM avaliacao";

        $dados = $this->dbQuery->fetchAll($sql);
        
        return array_map(
            function ($avaliacao) {
                return $this->formarObjeto($avaliacao);
            }, 
            $dados
        );
    }

    private function formarObjeto($dados)
    {
        return new Avaliacao(
            $dados['servicoavaliado'],
            $dados['nomeusuario'],
            $dados['numeroestrelas'],
            $dados['comentario'],
            $dados['datahora']
        );
    }
}
?>
