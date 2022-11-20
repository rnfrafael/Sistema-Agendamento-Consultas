<?php

/*
 * Este programa está licenciado por Rafael Fontenele
 */

/**
 * Description of CalendarioDAO
 *
 * @author Rafael Fontenele
 */
class CalendarioDAO {
    //put your code here
    private $conexao;

    function __construct(PDO $conexao) {
        $this->conexao = $conexao;
    }
    
    public function pegaHoras(Medico $medico) {
        $sql = "SELECT * FROM horarios";
    }
    
}
