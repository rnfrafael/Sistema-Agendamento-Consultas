<?php

class Horarios {

    private $step, $idMedico;
    private $diasSemana = array();
    private $diasSemanaId = array();
    private $horaInicial = array();
    private $horaFinal = array();
    private $data;

    function getData() {
        return $this->data;
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

    function getStep() {
        return $this->step;
    }

    function getHoraInicial() {
        return $this->horaInicial;
    }

    function getHoraInicialIndice($indice = 0) {
        return $this->horaInicial[$indice];
    }

    function getHoraFinal() {
        return $this->horaFinal;
    }

    function getHoraFinalIndice($indice = 0) {
        return $this->horaFinal[$indice];
    }

    function getIdMedico() {
        return $this->idMedico;
    }

    function getDiasSemana() {
        return $this->diasSemana;
    }
    
     function getDiasSemanaIndice($indice = 0) {
        return $this->diasSemana[$indice];
    }

    function getDiasSemanaId() {
        return $this->diasSemanaId;
    }

    function getDiasSemanaIdIndice($indice = 0) {
        return $this->diasSemanaId[$indice];
    }

    function setStep($step) {
        $this->step = $step;
    }

    function setHoraInicial($horaInicial) {
        $this->horaInicial[] = $horaInicial;
    }

    function setHoraFinal($horaFinal) {
        $this->horaFinal[] = $horaFinal;
    }

    function setIdMedico($idMedico) {
        $this->idMedico = $idMedico;
    }

    function setDiasSemana($diasSemana) {
        $this->diasSemana[] = $diasSemana;
    }

    function setDiasSemanaId($diasSemanaId) {
        $this->diasSemanaId[] = $diasSemanaId;
    }

    //Recebe um valor em minutos e transforma em horas hh:mm
    public function TransformaEmHoras($minutos) {
        $hora = floor($minutos / 60);
        $minuto = $minutos % 60;
        if ($minuto == 0) {
            $minuto = '00';
        }
        if ($hora < 10) {
            $hora = "0" . $hora;
        }
        return $hora . ":" . $minuto;
    }

    //Recebe string no formato hh:mm e transforma em minutos
    public function TransformaEmMinutos($hora) {
        list($horas, $minutos, $segundos) = explode(":", $hora);
        return ((int) $horas * 60) + (int) $minutos;
    }

    // Recebe o valor do tempo no formado 00:00 e retorna o com os minutos
    //  somados a esse valor
    public function SomaMinutos($hora, $valor_minutos) {
        list($horas, $minutos, $segundos) = explode(":", $hora);
        $horas = (int) $horas;
        $minutos = (int) $minutos;
        $minutos += $valor_minutos;
        if ($minutos % 60 == 0) {
            $minutos = '00';
            $horas += $horas + 1;
        }
        if ($horas < 10) {
            $horas = '0' . $horas;
        }
        return $horas . ":" . $minutos;
    }

}

/* 
 * Este programa está licenciado por Rafael Fontenele
 */

