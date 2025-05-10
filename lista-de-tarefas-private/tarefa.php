<?php

class Tarefa {
    private $id;
    private $id_status;
    private $tarefa;
    private $titulo_tarefa;
    private $data_cadastro;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
         $this->$atributo = $valor;
         return $this;
    }
}
?>
