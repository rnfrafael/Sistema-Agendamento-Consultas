<?php

/*
 * Este programa está licenciado por Rafael Fontenele
 */



require_once $_SERVER['DOCUMENT_ROOT'] . "/rafael/cmcc/includes/class/Conexao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/rafael/cmcc/includes/class/HorariosDAO.php";
//Deve retornar um array contendo os dias em que o médico não atende
//0 = Domingo 1 = Segunda ... 6 = Sábado

$id_medico = $_POST['id'];

$conexao = new Conexao();
$horariosDAO = new HorariosDAO($conexao);


$diasSemana = $horariosDAO->diasSemana($id_medico);

$retorno2 = $diasSemana->getDiasSemanaId();
$retorno = array();
for($i = 0; $i<7; $i++){
    if(!in_array($i, $retorno2)){
        $retorno[] = $i;
    }
}

echo json_encode($retorno);

?>