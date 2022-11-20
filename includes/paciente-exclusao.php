<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id_paciente = $_POST['id'];


require_once $_SERVER['DOCUMENT_ROOT'] . "/rafael/cmcc/includes/class/Conexao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/rafael/cmcc/includes/class/PacienteDAO.php";

$conexao = new Conexao();
$pacienteDAO = new PacienteDAO($conexao); 


echo json_encode($pacienteDAO->removePaciente($id_paciente));


