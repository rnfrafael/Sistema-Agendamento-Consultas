<?php
require_once 'includes/cabecalho.php';

/*
 * Este programa está licenciado por Rafael Fontenele
 */

$conexao = new Conexao();
$medicoDAO = new MedicoDAO($conexao);
$planoDAO = new PlanoDAO($conexao);

$medicoform = new Medico("");

$plano = $planoDAO->listatodos();

$medicos = $medicoDAO->listaTodos();
?>


<form class="form-horizontal" role="form" action="includes/cadastra-medico.php" method="POST">

    <?php include 'includes/form-base-medico.php'; ?>
    <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-2">
            <button type="submit" class="btn btn-default">Cadastrar</button>
        </div>
    </div>
</form>



<!-- Lista de médicos Já Cadastrados-->

<table class="table table-bordered table-striped">
    <tr>
        <td class="bg-info text-center"><strong>Nome</strong></td>
        <td class="bg-info text-center"><strong>Planos Atendidos</strong></td>
        <td class="bg-info text-center"><strong>Alterar</strong></td>
        <td class="bg-info text-center"><strong>Excluir</strong></td>
    </tr>
    <?php
    foreach ($medicos as $medico_atual) :
        $planos = $planoDAO->buscaPlanoMedico($medico_atual->getId());
        ?>
        <tr>
            <td class="nomemedico" id="mmm<?= $medico_atual->getId() ?>"><?= $medico_atual->getNome() ?></td>
            <td>
                <div class="container col-sm-7">
                <?php
                foreach ($planos as $plano_atual) {
                    echo "<div class='col-sm-2'><strong>" . $plano_atual->getNome() . "</strong></div>";
                }
                ?>            
            </div>
            </td>
            <td class="text-center">
                <form method="post" action="medico-altera.php">
                    <input type="hidden" name="id" value="<?= $medico_atual->getId() ?>"/>
                    <button type="submit" class="btn btn-success">Alterar</button>
                </form>
            </td>
            <td class="text-center">
                <form method="post" action="#">
                    <input type="hidden" class="idmed" id="removeMedico" value="<?= $medico_atual->getId() ?>"/>
                    <button value="<?= $medico_atual->getId() ?>" class="btn btn-danger btnRemoveMedico">Excluir</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>





<?php require_once 'includes/rodape-cad.php'; ?>