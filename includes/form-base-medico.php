
<div class="form-group">
    <label class="control-label col-sm-2" for="nome">Nome:</label>
    <div class="col-sm-4">
        <input required='true' class="form-control" type="text" name="nome" id="nome" value="<?= $medicoform->getNome() ?>" />
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="plano">Plano:</label>
    <div class="col-sm-2">
        <select name="plano_id" id="plano" class="form-control">
            <?php foreach ($plano as $plano_atual) :
                ?> 
            <option value="<?= $plano_atual->getId(); ?>"><?= $plano_atual->getNome(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
    

