<?php
require_once 'includes/cabecalho.php';
$conexao = new Conexao();
$pacienteDAO = new PacienteDAO($conexao);
$medicoDAO = new MedicoDAO($conexao);
$planoDAO = new PlanoDAO($conexao);

$pacienteform = new Paciente("", "", "");
$primeiravez = "";

$medico = $medicoDAO->listaTodos();
$plano = $planoDAO->listatodos();



?>

<form class="form-horizontal" role="form" action="includes/marca-consulta.php" method="POST">

<?php include 'includes/form-base-consulta.php'; ?>
    <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-2">
            <button type="submit" class="btn btn-default">Cadastrar</button>
        </div>
    </div>
</form>









<?php require_once 'includes/rodape-cad.php'; ?>