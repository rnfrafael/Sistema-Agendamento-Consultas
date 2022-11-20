<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once 'autoload.php';


$conexao = new Conexao();
$medicoDAO = new MedicoDAO($conexao);

$nome = $_POST['nome'];
$id_medico = $_POST['id'];
$planos = $_POST['planos'];


$medico = new Medico($nome);
$medico->setArrayPlanos($planos);
$medico->setId($id_medico);

$alterou = $medicoDAO->alteraMedico($medico);

if ($alterou) {
    $_SESSION['success'] = "Medico Alterado com sucesso: {$medico->getNome()}";
} else {
    $_SESSION['danger'] = "Falha na Alteração de: {$medico->getNome()}";
}

header("Location:../index.php");
die();








