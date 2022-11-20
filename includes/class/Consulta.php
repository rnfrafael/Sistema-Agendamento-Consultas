<?php

/*
 * Este programa está licenciado por Rafael Fontenele
 */

/**
 * Description of Consulta
 *
 * @author Rafael Fontenele
 */
class Consulta {

    //put your code here

    private $id, $id_paciente, $id_medico, $primeiravez, $hora, $data;

    function getId() {
        return $this->id;
    }

    function getId_paciente() {
        return $this->id_paciente;
    }

    function getId_medico() {
        return $this->id_medico;
    }

    function getPrimeiravez() {
        return $this->primeiravez;
    }

    function getHora() {
        return $this->hora;
    }

    function getData() {
        return $this->data;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_paciente($id_paciente) {
        $this->id_paciente = $id_paciente;
    }

    function setId_medico($id_medico) {
        $this->id_medico = $id_medico;
    }

    function setPrimeiravez($primeiravez) {
        $this->primeiravez = $primeiravez;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setDataMYSQL($data) {
        $dataTemp = explode("/", $data);
        if ($dataTemp[0] && $dataTemp[1] && $dataTemp[2]) {
            $dataTemp = implode("-", array_reverse($dataTemp));
            $this->data = $dataTemp;
        } else {
            $this->data = $data;
        }
    }

    function setDataPHP($data) {
        $dataTemp = explode("-", $data);
        if ($dataTemp[0] && $dataTemp[1] && $dataTemp[2]) {
            $dataTemp = implode("/", array_reverse($dataTemp));
            $this->data = $dataTemp;
        } else {
            $this->data = $data;
        }
    }

}
