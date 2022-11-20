<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'includes/cabecalho.php';

$conexao = new Conexao();
$consultaDAO = new ConsultaDAO($conexao);
$medicoDAO = new MedicoDAO($conexao);
$pacienteDAO = new PacienteDAO($conexao);


$array = $consultaDAO->listaTodas();
?>
<table class="table table-bordered table-striped">
    <tr>
        <td class="bg-info text-center"><strong>Nome</strong></td>
        <td class="bg-info text-center"><strong>Médico</strong></td>
        <td class="bg-info text-center"><strong>Primeira Vez?</strong></td>
        <td class="bg-info text-center"><strong>Data</strong></td>
        <td class="bg-info text-center"><strong>Hora</strong></td>
        <td class="bg-info text-center"><strong>Alterar</strong></td>
        <td class="bg-info text-center"><strong>Excluir</strong></td>
    </tr>

    <?php
    foreach ($array as $arratual):
        $medico = $medicoDAO->buscaMedico($arratual->getId_medico());
        $paciente = $pacienteDAO->buscaPaciente($arratual->getId_paciente());
        if ($arratual->getPrimeiravez()) {
            $primeiravez = "Sim";
        } else {
            $primeiravez = "Não";
        }
        ?>
        <tr>
            <td class=" text-center"><?= $paciente->getNome(); ?></td>
            <td class=" text-center"><?= $medico->getNome(); ?></td>
            <td class=" text-center"><?= $primeiravez ?></td>
            <td class=" text-center"><?= $arratual->getData(); ?></td>
            <td class=" text-center"><?= $arratual->getHora(); ?></td>
            <td class=" text-center"><input type="button" class="btn btn-success alteracon" value="Alterar"></td>
            <td class=" text-center"><input type="button" class="btn btn-danger excluicon" value="Excluir"></td>
        <input class="idcon" type="hidden" value="<?= $arratual->getId() ?>"/>
    </tr>



<?php endforeach; ?>
</table>




















<?php require_once 'includes/rodape.php'; ?>