<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id_medico = $_POST['id'];


require_once $_SERVER['DOCUMENT_ROOT'] . "/rafael/cmcc/includes/class/Conexao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/rafael/cmcc/includes/class/MedicoDAO.php";

$conexao = new Conexao();
$medicoDAO = new MedicoDAO($conexao); 


echo json_encode($medicoDAO->removeMedico($id_medico));


