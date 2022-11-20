<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require_once 'autoload.php';


$conexao = new Conexao();
$planoDAO = new PlanoDAO($conexao);

//----------------------------------
$id = $_POST['id_plano'];
$nome = $_POST['nome'];
//---------------------------------
$plano = new Plano($nome);

$plano->setId($id);
//---------------------------------


$alterou = $planoDAO->alteraPlano($plano);

if ($alterou) {
    $_SESSION['success'] = "Plano Alterado com sucesso: {$plano->getNome()}";
} else {
    $_SESSION['danger'] = "Falha na Alteração de: {$plano->getNome()}";
}

header("Location:../index.php");
die();








