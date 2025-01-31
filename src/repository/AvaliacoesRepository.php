<?php

class AvaliacoesRepository
{

    private PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function salvar($avaliacoes)
    {
        $sql = "INSERT INTO avaliacoes (servicoavaliado, nomeusuario, numeroestrelas, comentario, dataHora) VALUES (?,?,?,?,?)";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(1, $avaliacoes->getServicoAvaliado());
        $stm->bindValue(2, $avaliacoes->getNomeUsuario());
        $stm->bindValue(3, $avaliacoes->getNumeroEstrelas());
        $stm->bindValue(4, $avaliacoes->getComentario());
        $stm->bindValue(5, $avaliacoes->getDataHora());
        $stm->execute();
    }

    private function formarObjeto($dados): Avaliacoes
    {
        return new Avaliacoes(
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
    FROM avaliacoes";

        $stm = $this->pdo->query($sql);
        $dados = $stm->fetchAll(PDO::FETCH_ASSOC);
        $todosDados = array_map(
            function ($avaliacoes){
                return $this->formarObjeto($avaliacoes);
            }, $dados);
        return $todosDados;
    }

}