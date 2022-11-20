<?php

/*
 * Este programa está licenciado por Rafael Fontenele
 */

/**
 * Description of Calendario
 *
 * @author Rafael Fontenele
 */
class Calendario {

    private $tempoTotal;
    private $diaSemana = array();
    private $horaInicial,$horaFinal;

    public function TransformaEmHoras($minutos) {
        $hora = floor($minutos / 60);
        $minuto = $minutos % 60;
        if ($minuto == 0) {
            $minuto = '00';
        }
        return $hora . ":" . $minuto;
    }

    public function TransformaEmMinutos($hora) {
        list($horas, $minutos) = explode(":", $hora);
        return ((int) $horas * 60) + (int) $minutos;
    }

    // Recebe o valor do tempo no formado 00:00 
    public function SomaMinutos($tempo, $valor_minutos) {
        list($horas, $minutos) = explode(":", $tempo);
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
