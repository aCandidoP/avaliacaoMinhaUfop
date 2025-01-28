<?php

class ServicosRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjetos($dados): Servicos
    {
        return new Servicos(
            $dados['id_servico'],
            $dados['servicominhaufop']
        );
    }
    public function buscarTodos()
    {
        $sql = "SELECT * FROM servicos";
        $stm = $this->pdo->query($sql);
        $dados = $stm->fetchAll(PDO::FETCH_ASSOC);
        $todosDados = array_map(
            function ($servicos){
               return $this->formarObjetos($servicos);
            }, $dados);
        return $todosDados;
    }

}