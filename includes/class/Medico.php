<?php

class Medico {

    private $id;
    private $nome;
    private $planos = array();

    function __construct($nome) {
        $this->nome = $nome;
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
    
    function getPlanos() {
        return $this->planos;
    }

    function setPlanos($planos) {
        $this->planos[] = $planos;
    }

}

/* 
 * Este programa está licenciado por Rafael Fontenele
 */

