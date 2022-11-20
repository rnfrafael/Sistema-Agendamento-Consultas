<?php
require_once 'includes/cabecalho.php';

/*
 * Este programa está licenciado por Rafael Fontenele
 */


$conexao = new Conexao();
$pacienteDAO = new PacienteDAO($conexao);
$medicoDAO = new MedicoDAO($conexao);
$planoDAO = new PlanoDAO($conexao);

$planoform = new Plano("");

$planos = $planoDAO->listatodos();
?>


<form class="form-horizontal" role="form" action="includes/cadastra-plano.php" method="POST">

    <?php include 'includes/form-base-plano.php'; ?>
    <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-2">
            <button type="submit" class="btn btn-default">Cadastrar</button>
        </div>
    </div>
</form>


<table class="table table-bordered table-striped">
    <tr>
        <td class="bg-info text-center col-sm-4"><strong>Plano</strong></td>
        <td class="bg-info text-center col-sm-1"><strong>Alterar</strong></td>
        <td class="bg-info text-center col-sm-1"><strong>Excluir</strong></td>
    </tr>
    <?php foreach ($planos as $plano_atual) : ?>
        <tr>
            <td class="text-center nome-plano"><?= $plano_atual->getNome() ?></td>
            <td class="text-center"><input type="button" class="btn btn-success alteraplano" value="Alterar"></td>
            <td class="text-center"><input type="button" class="btn btn-danger excluiplano" value="Excluir"></td>
        <input class="idplano" type="hidden" value="<?= $plano_atual->getId() ?>"/>
    </tr>
<?php endforeach; ?>
</table>






<?php require_once 'includes/rodape-cad.php'; ?>