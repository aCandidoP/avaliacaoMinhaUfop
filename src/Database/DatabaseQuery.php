<?php

namespace Ensa\Mvc\Database;

use PDO;

class DatabaseQuery {
    private $db;

    public function __construct(PDO $pdo) {
        $this->db = $pdo;
    }

    // SELECT genérico
    public function selectQuery($tabela, $colunas = "*", $condicao = "", $parametros = []) {
        // Se $colunas for um array, converta para string separada por vírgula
        if (is_array($colunas)) {
            $colunas = implode(", ", $colunas);
        }
    
        $query = "SELECT $colunas FROM $tabela";
        if (!empty($condicao)) {
            $query .= " WHERE $condicao";
        }
    
        $stmt = $this->db->prepare($query);
        $stmt->execute($parametros);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // INSERT genérico
    public function insertQuery($tabela, $dados) {
        $colunas = array_keys($dados);
        $valores = array_values($dados);
    
        
        $colunasString = implode(", ", array_map(function($col) {
            return "\"$col\"";
        }, $colunas));
    
        $placeholders = implode(", ", array_fill(0, count($valores), "?"));
    
        $query = "INSERT INTO $tabela ($colunasString) VALUES ($placeholders)";
        
        $stmt = $this->db->prepare($query);
        return $stmt->execute($valores);
    }
    

    // UPDATE genérico
    public function updateQuery($tabela, $dados, $condicao, $parametrosCondicao) {
        $set = implode(", ", array_map(function($coluna) {
            return "$coluna = ?";
        }, array_keys($dados)));

        $query = "UPDATE $tabela SET $set WHERE $condicao";

        $stmt = $this->db->prepare($query);
        return $stmt->execute(array_merge(array_values($dados), $parametrosCondicao));
    }

    // DELETE genérico
    public function deleteQuery($tabela, $condicao, $parametros) {
        $query = "DELETE FROM $tabela WHERE $condicao";
        $stmt = $this->db->prepare($query);
        return $stmt->execute($parametros);
    }
}
?>
