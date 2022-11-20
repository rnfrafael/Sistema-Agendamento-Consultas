<?php

class Paciente {

    private $id;
    private $nome;
    private $telefone;
    private $plano_id;
    private $id_medico;
    private $endereco, $datanasc, $estadocivil, $idade;

    function __construct($nome = "", $telefone = "", $plano_id = "") {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->plano_id = $plano_id;
    }

    function getId_medico() {
        return $this->id_medico;
    }

    function setId_medico($id_medico) {
        $this->id_medico = $id_medico;
    }

    function getDia() {
        return $this->dia;
    }

    function getHora() {
        return $this->hora;
    }

    function setDia($dia) {
        $this->dia = $dia;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getPlano_id() {
        return $this->plano_id;
    }

    function getPrimeiravez() {
        return $this->primeiravez;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setPlano_id($plano_id) {
        $this->plano_id = $plano_id;
    }

    function setPrimeiravez($primeiravez) {
        $this->primeiravez = $primeiravez;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getDatanasc() {
        return $this->datanasc;
    }

    function getEstadocivil() {
        return $this->estadocivil;
    }

    function getIdade() {
        return $this->idade;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    /* function setDatanasc($datanasc) {
      $this->datanasc = $datanasc;
      } */

    function setEstadocivil($estadocivil) {
        $this->estadocivil = $estadocivil;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    function setDataMYSQL($data) {
        $dataTemp = explode("/", $data);
        if ($dataTemp[0] && $dataTemp[1] && $dataTemp[2]) {
            $dataTemp = implode("-", array_reverse($dataTemp));
            $this->datanasc = $dataTemp;
        } else {
            $this->datanasc = $data;
        }
    }

    function setDataPHP($data) {
        $dataTemp = explode("-", $data);
        if ($dataTemp[0] && $dataTemp[1] && $dataTemp[2]) {
            $dataTemp = implode("/", array_reverse($dataTemp));
            $this->datanasc = $dataTemp;
        } else {
            $this->datanasc = $data;
        }
    }

}
