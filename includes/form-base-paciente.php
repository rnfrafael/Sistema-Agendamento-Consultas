<input name="id" type="hidden" value="<?= $pacienteform->getId() ?>"/>
<div class="form-group">
    <label class="control-label col-sm-2" for="nome">Nome:</label>
    <div class="col-sm-4">
        <input required='true' class="form-control" type="text" name="nome" id="nome" value="<?= $pacienteform->getNome() ?>" />
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="tel">Telefone:</label>
    <div class="col-sm-2">
        <input required="true" class="form-control" type="text" name="telefone" id="tel" value="<?= $pacienteform->getTelefone() ?>"/></div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="ender">Endereço:</label>
    <div class="col-sm-2">
        <input class="form-control" type="text" name="endereco" id="ender" value="<?= $pacienteform->getEndereco() ?>"/></div>
</div>
<div class="form-group" id="divdata">
    <label class="control-label col-sm-2" for="datetimepicker">Data Nascimento:</label>
    <div class="col-sm-2"><input class="form-control" type="text" name="datanascimento" id="datetimepickerdtnasc" value="<?= $pacienteform->getDatanasc() ?>"></div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="estcivil">Estado Civil:</label>
    <div class="col-sm-2">
        <select name="estcivil" id="estcivil" class="form-control">
            <option <?php if($pacienteform->getEstadocivil() == "Solteira(o)"){ echo "selected";}?> value="Solteira(o)">Solteira(o)</option>
            <option <?php if($pacienteform->getEstadocivil() == "Casada(o)"){ echo "selected";}?> value="Casada(o)">Casada(o)</option>
            <option <?php if($pacienteform->getEstadocivil() == "Viúva(o)"){ echo "selected";}?> value="Viúva(o)">Viúva(o)</option>
            <option <?php if($pacienteform->getEstadocivil() == "Separada(o)"){ echo "selected";}?> value="Separada(o)">Separada(o)</option>
            <option <?php if($pacienteform->getEstadocivil() == "Divorciada(o)"){ echo "selected";}?> value="Divorciada(o)">Divorciada(o)</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="idade">Idade:</label>
    <div class="col-sm-2">
        <input class="form-control" type="text" name="idade" id="idade" value="<?= $pacienteform->getIdade() ?>"/></div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="medico">Médico:</label>
    <div class="col-sm-2">
        <select name="medicopac" id="medicopac" class="form-control">
            <option></option>
            <?php
            foreach ($medicos as $medico_atual) :
                if ($medico_atual->getId() == $pacienteform->getId_medico()) {
                    $selected = "selected";
                }
                ?> 
                <option <?= $selected ?> value="<?= $medico_atual->getId(); ?>"><?= $medico_atual->getNome(); ?></option>
                <?php
                $selected = '';
            endforeach;
            ?>
        </select>
    </div>
</div>
<div class="form-group" id="divplano">
    <label class="control-label col-sm-2" for="plano">Plano:</label>
    <div class="col-sm-2">
        <select name="plano_id" id="planos" class="form-control">
            <option></option>
            <?php
            foreach ($planos as $plano_atual) :
                if ($plano_atual->getId() == $pacienteform->getPlano_id()) {
                    $selected = "selected";
                }
                ?> 
                <option <?= $selected ?> class="planos" value="<?= $plano_atual->getId(); ?>"><?= $plano_atual->getNome(); ?></option>
                <?php
                $selected = '';
            endforeach;
            ?>
        </select>
    </div>
</div>


