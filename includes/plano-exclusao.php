<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id = $_POST['id'];


require_once $_SERVER['DOCUMENT_ROOT'] . "/rafael/cmcc/includes/autoload.php";

$conexao = new Conexao();
$planoDAO = new PlanoDAO($conexao); 


echo json_encode($planoDAO->removePlano($id));


