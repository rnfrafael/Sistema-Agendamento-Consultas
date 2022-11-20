<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author rnfra
 */
class Login {

    //put your code here
    private $usuario, $senha, $nivel;
    private $datacad, $dataultimologin, $info;
    private $iniciaSessao = True;
    private $prefixo;

    function __construct() {
        
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNivel() {
        return $this->nivel;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function getDatacad() {
        return $this->datacad;
    }

    function getDataultimologin() {
        return $this->dataultimologin;
    }

    function getInfo() {
        return $this->info;
    }

    function setDatacad($datacad) {
        $this->datacad = $datacad;
    }

    function setDataultimologin($dataultimologin) {
        $this->dataultimologin = $dataultimologin;
    }

    function setInfo($info) {
        $this->info = $info;
    }

    public function logado() {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location:formulario_login.html");
            die();
        }
    }
    
    public function logaUsuario() {
        
    }

}
