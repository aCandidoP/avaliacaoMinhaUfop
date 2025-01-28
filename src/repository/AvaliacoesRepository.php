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
        $sql = "INSERT INTO avaliacoes (servicoavaliado, emailusuario, numeroestrelas, comentario, dataHora) VALUES (?,?,?,?,?)";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(1, $avaliacoes->getServicoAvaliado());
        $stm->bindValue(2, $avaliacoes->getEmailUsuario());
        $stm->bindValue(3, $avaliacoes->getNumeroEstrelas());
        $stm->bindValue(4, $avaliacoes->getComentario());
        $stm->bindValue(5, $avaliacoes->getDataHora());
        $stm->execute();
    }

}