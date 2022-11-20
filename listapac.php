<?php
require_once 'includes/cabecalho.php';
/*
 * Este programa está licenciado por Rafael Fontenele
 */

$conexao = new Conexao();
$pacienteDAO = new PacienteDAO($conexao);
$planoDAO = new PlanoDAO($conexao);
$medicoDAO = new MedicoDAO($conexao);

$pacientes = $pacienteDAO->listaTodos();
$planos = $planoDAO->listatodos();
$medicos = $medicoDAO->listaTodos();
?>

<table class="table table-bordered table-striped">
    <tr>
        <td class="bg-info text-center"><strong>Nome</strong></td>
        <td class="bg-info text-center"><strong>Endereco</strong></td>
        <td class="bg-info text-center"><strong>Telefone</strong></td>
        <td class="bg-info text-center"><strong>Data Nascimento</strong></td>
        <td class="bg-info text-center"><strong>Idade</strong></td>
        <td class="bg-info text-center"><strong>Estado Civil</strong></td>
        <td class="bg-info text-center"><strong>Médico</strong></td>
        <td class="bg-info text-center"><strong>Plano</strong></td>
        <td class="bg-info text-center"><strong>Alterar</strong></td>
        <td class="bg-info text-center"><strong>Excluir</strong></td>
    </tr>
    <!-- Compara a id do plano do objeto paciente com id do plano do objeto plano, se for igual pega o nome do plano -->
<?php
foreach ($pacientes as $paciente_atual) :
    foreach ($planos as $plano_atual) {
        if ($plano_atual->getId() == $paciente_atual->getPlano_id()) {
            $plano = $plano_atual->getNome();
        }
    }
    if(!isset($plano)){
        $plano = "-";
    }
    ?>
        <!-- Compara a id do medico do objeto paciente com id do medico do objeto medico, se for igual pega o nome do medico -->
        <?php
        foreach ($medicos as $medico_atual) {
            if ($medico_atual->getId() == $paciente_atual->getId_medico()) {
                $medico = $medico_atual->getNome();
            }
        }
        if(!isset($medico)){
            $medico = "-";
        }
        ?>
        <tr>
            <td class="nomepaciente"><?= $paciente_atual->getNome() ?></td>
            <td><?= $paciente_atual->getEndereco() ?></td>
            <td><?= $paciente_atual->getTelefone() ?></td>
            <td><?= $paciente_atual->getDatanasc() ?></td>
            <td><?= $paciente_atual->getIdade() ?></td>
            <td><?= $paciente_atual->getEstadocivil() ?></td>
            <td><?= $medico ?></td>
            <td><?= $plano ?></td>
            <td class=" text-center"><input type="button" class="btn btn-success alterapac" value="Alterar"></td>
            <td class=" text-center"><input type="button" class="btn btn-danger excluipac" value="Excluir"></td>
        <input class="idpac" type="hidden" value="<?= $paciente_atual->getId() ?>"/>
    </tr>
<?php endforeach; ?>
</table>








<?php require_once 'includes/rodape.php'; ?>