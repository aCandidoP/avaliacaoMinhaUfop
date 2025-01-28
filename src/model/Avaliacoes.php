<?php
class Avaliacoes{

    private $id_avaliacao;
    private $servicoAvaliado;
    private $emailUsuario;
    private $numeroEstrelas;
    private $comentario;
    private $dataHora;

    public function  __construct($servicoAvaliado, $emailUsuario, $numeroEstrelas, $comentario, $dataHora){
        $this->servicoAvaliado = $servicoAvaliado;
        $this->emailUsuario = $emailUsuario;
        $this->numeroEstrelas = $numeroEstrelas;
        $this->comentario = $comentario;
        $this->dataHora = $dataHora;
    }

    /**
     * @return mixed
     */
    public function getIdAvaliacao()
    {
        return $this->id_avaliacao;
    }

    /**
     * @param mixed $id_avaliacao
     */
    public function setIdAvaliacao($id_avaliacao): void
    {
        $this->id_avaliacao = $id_avaliacao;
    }

    /**
     * @return mixed
     */
    public function getServicoAvaliado()
    {
        return $this->servicoAvaliado;
    }

    /**
     * @param mixed $servicoAvaliado
     */
    public function setServicoAvaliado($servicoAvaliado): void
    {
        $this->servicoAvaliado = $servicoAvaliado;
    }

    /**
     * @return mixed
     */
    public function getEmailUsuario()
    {
        return $this->emailUsuario;
    }

    /**
     * @param mixed $emailUsuario
     */
    public function setEmailUsuario($emailUsuario): void
    {
        $this->emailUsuario = $emailUsuario;
    }

    /**
     * @return mixed
     */
    public function getNumeroEstrelas()
    {
        return $this->numeroEstrelas;
    }

    /**
     * @param mixed $numeroEstrelas
     */
    public function setNumeroEstrelas($numeroEstrelas): void
    {
        $this->numeroEstrelas = $numeroEstrelas;
    }

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentario($comentario): void
    {
        $this->comentario = $comentario;
    }

    /**
     * @return mixed
     */
    public function getDataHora()
    {
        return $this->dataHora;
    }

    /**
     * @param mixed $dataHora
     */
    public function setDataHora($dataHora): void
    {
        $this->dataHora = $dataHora;
    }

}