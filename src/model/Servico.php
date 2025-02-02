<?php

class Servico {

    private $id_servico;
    private $servicoMinhaUfop;
    
    public function __construct($id_servico, $servicoMinhaUfop){
        $this->id_servico = $id_servico;
        $this->servicoMinhaUfop = $servicoMinhaUfop;
    }

    /**
     * @return mixed
     */
    public function getIdServico()
    {
        return $this->id_servico;
    }

    /**
     * @param mixed $id_servico
     */
    public function setIdServico($id_servico): void
    {
        $this->id_servico = $id_servico;
    }

    /**
     * @return mixed
     */
    public function getServicoMinhaUfop()
    {
        return $this->servicoMinhaUfop;
    }

    /**
     * @param mixed $servicoMinhaUfop
     */
    public function setServicoMinhaUfop($servicoMinhaUfop): void
    {
        $this->servicoMinhaUfop = $servicoMinhaUfop;
    }

}





