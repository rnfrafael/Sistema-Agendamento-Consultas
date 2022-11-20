<?php

/*
 * Este programa está licenciado por Rafael Fontenele
 */

$id_medico = $_POST['id'];
//echo $id;
//echo "HA";
require_once $_SERVER['DOCUMENT_ROOT'] . "/rafael/cmcc/includes/class/Conexao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/rafael/cmcc/includes/class/PlanoDAO.php";

$conexao = new Conexao();
$planoDAO = new PlanoDAO($conexao);

$planos = $planoDAO->buscaPlanoMedico($id_medico);
$retorno_ajax = array();

foreach ($planos as $plano_atual) {
    //$retorno_ajax .= $plano_atual->getId() . ':' . $plano_atual->getNome();
    $retorno_ajax[] = $plano_atual->getId();
    $retorno_ajax[] = $plano_atual->getNome();
}

echo json_encode($retorno_ajax);