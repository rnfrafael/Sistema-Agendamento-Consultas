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
$planoDAO = new PlanoDAO($conexao);

$nome = $_POST['nome'];

$plano = new Plano($nome);

$inseriu = $planoDAO->insere($plano);


if ($inseriu) {
    $_SESSION['success'] = "Plano cadastrado com Sucesso: {$plano->getNome()}";
} else {
    $_SESSION['danger'] = "Falha no cadastro de: {$plano->getNome()}";
}

header("Location:../index.php");
die();