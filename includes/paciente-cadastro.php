<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require_once 'autoload.php';

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$datanasc = $_POST['datanascimento'];
$estadocivil = $_POST['estcivil'];
$idade = $_POST['idade'];
$plano_id = $_POST['plano_id'];
$medico_id = $_POST['medicopac'];


$conexao = new Conexao();
$pacienteDAO = new PacienteDAO($conexao);

$paciente = new Paciente();

$paciente->setNome($nome);
$paciente->setTelefone($telefone);
$paciente->setEndereco($endereco);
$paciente->setDataMYSQL($datanasc);
$paciente->setEstadocivil($estadocivil);
$paciente->setIdade($idade);
$paciente->setPlano_id($plano_id);
$paciente->setId_medico($medico_id);

/*
 * echo "<pre>";
 * var_dump($paciente);
 * 
 * echo "</pre>";
 * die();
*/

$inseriu = $pacienteDAO->insere($paciente);


if ($inseriu) {
    $_SESSION['success'] = "Paciente cadastrado com sucesso {$paciente->getNome()}";
} else {
    $_SESSION['danger'] = "Falha no cadastro de {$paciente->getNome()}";
}

header("Location:../index.php");
die();