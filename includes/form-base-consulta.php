
<div class="form-group">
    <label class="control-label col-sm-2" for="nome">Nome:</label>
    <div class="col-sm-4">
        <input required='true' class="form-control" type="text" name="nome" id="nome" value="<?= $pacienteform->getNome() ?>" />
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="tel">Telefone:</label>
    <div class="col-sm-2"><input required="true" class="form-control" type="text" name="telefone" id="tel" value="<?= $pacienteform->getTelefone() ?>"/></div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="pvez">Primeira Vez?:</label>
    <div class="col-sm-1"><input type="checkbox" name="primeiravez" id="pvez" value="Primeira Vez?" <?= $primeiravez ?>/></div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="medico">Médico:</label>
    <div class="col-sm-2">
        <select name="medico" id="medico" class="form-control">
            <option></option>
            <?php foreach ($medico as $medico_atual) :
                ?> 
                <option value="<?= $medico_atual->getId(); ?>"><?= $medico_atual->getNome(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="form-group" id="divplano" style="display: none">
    <label class="control-label col-sm-2" for="plano">Plano:</label>
    <div class="col-sm-2">
        <select name="plano_id" id="planos" class="form-control">
            <option></option>
            <?php foreach ($plano as $plano_atual) :
                ?> 
            <option class="planos" value="<?= $plano_atual->getId(); ?>"><?= $plano_atual->getNome(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="form-group" style="display: none" id="divdata">
    <label class="control-label col-sm-2" for="datetimepicker">Data da Consulta:</label>
    <div class="col-sm-2"><input class="form-control" required='true' type="text" name="dataconsulta" id="datetimepicker" value=""></div>
</div>
<div class="form-group" id="horapicker" style="display: none">
    <label class="control-label col-sm-2" for="datetimepicker2">Hora Consulta:</label>
    <div class="col-sm-1"><input class="form-control" required='true' type="text" name="horaconsulta" id="datetimepicker2" value=""></div>
</div>