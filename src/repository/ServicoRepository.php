<?php

class ServicoRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjetos($dados): Servico
    {
        return new Servico(
            $dados['id_servico'],
            $dados['servicominhaufop']
        );
    }
    public function buscarTodos()
    {
        $sql = "SELECT * FROM servico";
        $stm = $this->pdo->query($sql);
        $dados = $stm->fetchAll(PDO::FETCH_ASSOC);
        $todosDados = array_map(
            function ($servico){
               return $this->formarObjetos($servico);
            }, $dados);
        return $todosDados;
    }

}