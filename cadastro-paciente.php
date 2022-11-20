<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'includes/cabecalho.php';

$conexao = new Conexao();
$PacienteDAO = new PacienteDAO($conexao);

$medicoDAO = new MedicoDAO($conexao);
$medicos = $medicoDAO->listaTodos();

$planoDAO = new PlanoDAO($conexao);
$planos = $planoDAO->listatodos();

$pacienteform = new Paciente();

?>

<form class="form-horizontal" role="form" action="includes/paciente-cadastro.php" method="POST">

    <?php include 'includes/form-base-paciente.php'; ?>
    <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-2">
            <button type="submit" class="btn btn-default">Cadastrar</button>
        </div>
    </div>
</form>














<?php require_once 'includes/rodape-cad.php'; ?>