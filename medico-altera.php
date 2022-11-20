<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'includes/cabecalho.php';

/*
 * Este programa está licenciado por Rafael Fontenele
 */

$conexao = new Conexao();
$medicoDAO = new MedicoDAO($conexao);
$planoDAO = new PlanoDAO($conexao);

$id_medico = $_POST['id'];

$medicotemp = $medicoDAO->buscaMedico($id_medico);
$plano = $planoDAO->listatodos();

$medicoform = $medicoDAO->buscaIdPlanos($medicotemp);


?>


<form class="form-horizontal" role="form" action="includes/altera-medico.php" method="POST">

    <?php include 'includes/form-base-medico.php'; ?>
    <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-2">
            <button type="submit" class="btn btn-default">Alterar</button>
        </div>
    </div>
</form>







<?php require_once 'includes/rodape-cad.php'; ?>