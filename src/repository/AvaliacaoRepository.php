<?php

class AvaliacaoRepository
{

    private PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function salvar($avaliacao)
    {
        $sql = "INSERT INTO avaliacao (servicoavaliado, nomeusuario, numeroestrelas, comentario, dataHora) VALUES (?,?,?,?,?)";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(1, $avaliacao->getServicoAvaliado());
        $stm->bindValue(2, $avaliacao->getNomeUsuario());
        $stm->bindValue(3, $avaliacao->getNumeroEstrelas());
        $stm->bindValue(4, $avaliacao->getComentario());
        $stm->bindValue(5, $avaliacao->getDataHora());
        $stm->execute();
    }

    private function formarObjeto($dados): Avaliacao
    {
        return new Avaliacao(
            $dados['servicoavaliado'],
            $dados['nomeusuario'],
            $dados['numeroestrelas'],
            $dados['comentario'],
            $dados['datahora']
        );
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

        $stm = $this->pdo->query($sql);
        $dados = $stm->fetchAll(PDO::FETCH_ASSOC);
        $todosDados = array_map(
            function ($avaliacao){
                return $this->formarObjeto($avaliacao);
            }, $dados);
        return $todosDados;
    }

}