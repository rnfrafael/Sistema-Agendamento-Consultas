<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require_once 'autoload.php';


$conexao = new Conexao();
$pacienteDAO = new PacienteDAO($conexao);

//----------------------------------
$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$datanasc = $_POST['datanascimento'];
$estadocivil = $_POST['estcivil'];
$idade = $_POST['idade'];
$plano_id = $_POST['plano_id'];
$medico_id = $_POST['medicopac'];
//---------------------------------
$paciente = new Paciente();

$paciente->setId($id);
$paciente->setNome($nome);
$paciente->setTelefone($telefone);
$paciente->setEndereco($endereco);
$paciente->setDataMYSQL($datanasc);
$paciente->setEstadocivil($estadocivil);
$paciente->setIdade($idade);
$paciente->setPlano_id($plano_id);
$paciente->setId_medico($medico_id);
//---------------------------------


$alterou = $pacienteDAO->alteraPaciente($paciente);

if ($alterou) {
    $_SESSION['success'] = "Paciente Alterado com sucesso: {$paciente->getNome()}";
} else {
    $_SESSION['danger'] = "Falha na Alteração de: {$paciente->getNome()}";
}

header("Location:../index.php");
die();








