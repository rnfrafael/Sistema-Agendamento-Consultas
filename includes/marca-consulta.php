<?php
session_start();
function autoload($class) {
    require_once $_SERVER['DOCUMENT_ROOT']."/rafael/cmcc/includes/class/{$class}.php";
}

spl_autoload_register("autoload");



$conexao = new Conexao();
$PacienteDAO = new PacienteDAO($conexao);
$ConsultaDAO = new ConsultaDAO($conexao);
$consulta = new Consulta();

/*
 * Este programa está licenciado por Rafael Fontenele
 */

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$id_medico = $_POST['medico'];//id médico
$id_plano = $_POST['plano_id'];//id plano
$dataconsulta = $_POST['dataconsulta'];//Data Consulta formato dd/mm/yyyy
$horaconsulta = $_POST['horaconsulta'];//Hora da Consulta formato HH:ii

//Vai tentar inserir o Paciente, caso ele exista retorna apenas o id

$paciente = new Paciente($nome, $telefone, $id_plano);

try {
    $idPaciente = $PacienteDAO->insere($paciente);
} catch (Exception $ex) {
    echo 'ERRO';
}


//Fim

if (isset($_POST['primeiravez'])) {
    $primeiravez = true;
} else {
    $primeiravez = false;
}

$consulta->setId_paciente($idPaciente);
$consulta->setId_medico($id_medico);
$consulta->setPrimeiravez($primeiravez);
$consulta->setHora($horaconsulta);
$consulta->setDataMYSQL($dataconsulta);


$id_consulta = $ConsultaDAO->insere($consulta);




if ($idPaciente) {
    $_SESSION['success'] = "Consulta marcada com Sucesso para a {$paciente->getNome()} no dia: xx";
} else {
    $_SESSION['danger'] = "Falha na Consulta para a {$paciente->getNome()}";
}

header("Location:../index.php");
die();
