
<div class="form-group">
    <label class="control-label col-sm-2" for="nome">Nome:</label>
    <div class="col-sm-4">
        <input required='true' class="form-control" type="text" name="nome" id="nome" value="<?= $planoform->getNome() ?>" />
    </div>
    <input type="hidden" name="id_plano" id="id_plano" value="<?= $planoform->getId() ?>">
</div>
