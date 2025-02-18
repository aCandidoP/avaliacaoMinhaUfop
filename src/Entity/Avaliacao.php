<?php
namespace Ensa\Mvc\Entity;

use DateTime;

class Avaliacao{

    private $id_avaliacao;
    private $servicoAvaliado;
    private $nomeUsuario;
    private $numeroEstrelas;
    private $comentario;
    private $dataHora;

    public function  __construct($servicoAvaliado, $nomeUsuario, $numeroEstrelas, $comentario, $dataHora){
        $this->servicoAvaliado = $servicoAvaliado;
        $this->nomeUsuario = $nomeUsuario;
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
    public function setIdAvaliacao($id_avaliacao)
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
    public function setServicoAvaliado($servicoAvaliado)
    {
        $this->servicoAvaliado = $servicoAvaliado;
    }

    /**
     * @return mixed
     */
    public function getNomeUsuario()
    {
        return $this->nomeUsuario;
    }

    /**
     * @param mixed $nomeUsuario
     */
    public function setNomeUsuario($nomeUsuario)
    {
        $this->nomeUsuario = $nomeUsuario;
    }

    /**
     * @return mixed
     */


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
    public function setNumeroEstrelas($numeroEstrelas)
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
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * @return mixed
     */
    public function getDataHora()
    {
        $data = DateTime::createFromFormat('d/m/Y H:i:s', $this->dataHora);
        return $data ? $data->format('Y-m-d H:i:s') : null;
    }


    /**
     * @param mixed $dataHora
     */
    public function setDataHora($dataHora)
    {
        $this->dataHora = $dataHora;
    }

}