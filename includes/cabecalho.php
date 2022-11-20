<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/rafael/cmcc/includes/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/rafael/cmcc/includes/mostra-alerta.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>CMCC</title>
        <link rel="stylesheet" href="includes/dtp/jquery.datetimepicker.css">
        <link rel="stylesheet" href="includes/css/bootstrap.css">
        <link rel="stylesheet" href="includes/css/cmcc.css">
        <script src="includes/js/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">CMCC</a>
                </div>             
                <div>
                    <ul class="nav navbar-nav">
                        <li><a href="marcacao-consultas.php">Marcar Consulta</a></li>
                        <li><a href="listapac.php">Lista de Pacientes</a></li>
                        <li><a href="cadastro-paciente.php">Cadastro de Pacientes</a></li>
                        <li><a href="cadastro-medico.php">Cadastro de Médicos</a></li>
                        <li><a href="cadastro-plano-saude.php">Cadastro de Planos</a></li>
                        <li><a href="lista-consultas.php">Listar Consultas</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="principal">
            <div class="loading container">
                <img src="imgs/ajax-loader.gif"/>
            </div>
            <?php mostraAlerta("success"); ?>
            <?php mostraAlerta("danger"); ?>

