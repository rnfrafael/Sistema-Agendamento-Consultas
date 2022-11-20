<?php

/* 
 * Este programa está licenciado por Rafael Fontenele
 */

session_start();
function autoload($class) {
    require_once $_SERVER['DOCUMENT_ROOT']."/rafael/cmcc/includes/class/{$class}.php";
}

spl_autoload_register("autoload");


$conexao = new Conexao();
$medicoDAO = new MedicoDAO($conexao);

$nome = $_POST['nome'];

$planos = $_POST['planos'];

$medico = new Medico($nome);
$medico->setArrayPlanos($planos);



$inseriu = $medicoDAO->insere($medico);


if ($inseriu) {
    $_SESSION['success'] = "Plano cadastrado com Sucesso: {$medico->getNome()}";
} else {
    $_SESSION['danger'] = "Falha no cadastro de: {$medico->getNome()}";
}

header("Location:../index.php");
die();