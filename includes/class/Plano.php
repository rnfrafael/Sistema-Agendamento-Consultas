<?php

/* 
 * Este programa está licenciado por Rafael Fontenele
 */

class Plano {
    private $id;
    private $nome;
    
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

}