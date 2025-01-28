<?php

class UsuariosRepository
{

    private PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados): Usuarios
    {
        return new Usuarios(
            $dados['nome'],
            $dados['email']
        );
    }
    public function buscarTodos()
    {
        $sql = "SELECT * FROM usuarios ORDER BY nome";
        $stm = $this->pdo->query($sql);
        $dados = $stm->fetchAll(PDO::FETCH_ASSOC);
        $todosDados = array_map(
            function ($usuarios){
                return $this->formarObjeto($usuarios);
            }, $dados);
        return $todosDados;
    }

}
