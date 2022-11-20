<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'includes/cabecalho.php';

$id = $_GET['id'];

$conexao = new Conexao();
$planoDAO = new PlanoDAO($conexao);

$planoform = $planoDAO->buscaPlano($id);

?>

<form class="form-horizontal" role="form" action="includes/plano-altera.php" method="POST">

    <?php include 'includes/form-base-plano.php'; ?>
    <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-2">
            <button type="submit" class="btn btn-default">Cadastrar</button>
        </div>
    </div>
</form>














<?php require_once 'includes/rodape-cad.php'; ?>