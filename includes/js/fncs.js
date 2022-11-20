/* 
 * Este programa está licenciado por Rafael Fontenele
 */

/* Funcão para o onChange no select do médico no formulário de marcação de consultas,
 sempre que o id=medico mudar de valor a div com id=planos abre carregando os planos que
 esse médico atende.
 
 
 */

jQuery(function ($) {
    $('#medico').change(function () {
        $('#divplano').show();
        $('#divdata').show();
        $('#planos').find('option').remove();

        var id_medico = $(this).find('option:selected').val();
        input_datas(id_medico);
        input_horas(id_medico);
        //console.log("Essa é a id do médico antes de enviar pelo ajax: "+id_medico);
        /*var options = JSON.parse(PegaOptions(id_medico));
         console.log(options);*/
        var options = PegaOptions(id_medico);
        //var opt = JSON.parse(options);
        //console.log(opt);
        montaOptions(options);
    });
});

function carregando(x) {
    if (x) {
        $('.loading').show();
        //$('body').css('background', 'black');
    } else {
        $('.loading').hide();
        //$('body').css('background', '');
    }
}


function PegaOptions(id_medico) {
    var retorno = "";
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'includes/monta-opts-plano.php',
        async: false, // não achei método alternativo
        // Valor default é true então essa opção é desnecessária agora - async: true,
        data: 'id=' + id_medico,
        success: function (response) {
            //console.log("Sucesso no envio da solicitação Ajax");
            //console.log(response);
            carregando(true);
            retorno = response;
        },
        error: function (response) {
            //console.log("Erro na Solicitação Ajax");
            //console.log(response);
            retorno = false;
        },
        complete: function (response) {
            //console.log("Solicitação Ajax Completada");
            //console.log(response);
            carregando(false);
        }

    });
    return retorno;
}

function PegaHorarios(id_medico, data, diasemana) {
    var retorno = [];
    carregando(true);
    $.ajax({
        type: 'POST',
        //dataType: 'json',
        url: 'includes/monta-horas.php',
        async: false, // não achei método alternativo
        // Valor default é true então essa opção é desnecessária agora - async: true,
        data: 'id=' + id_medico + '&data=' + data + '&diasemana=' + diasemana,
        success: function (response) {
            //console.log("Sucesso no envio da solicitação Ajax");
            //console.log(response);
            carregando(true);
            retorno = response;
        },
        error: function (response) {
            //console.log("Erro na Solicitação Ajax");
            //console.log(response);
            retorno = false;
        },
        complete: function (response) {
            //console.log("Solicitação Ajax Completada");
            //console.log(response);
            carregando(false);
        }

    });
    return retorno;
}

function PegaDias(id_medico) {
    var retorno = "";
    carregando(true);
    $.ajax({
        type: 'POST',
        url: 'includes/monta-dias-semana.php',
        async: false, // não achei método alternativo
        data: 'id=' + id_medico,
        success: function (response) {
            //console.log("Sucesso no envio da solicitação Ajax");
            //console.log(response);
            carregando(true);
            retorno = response;
        },
        error: function (response) {
            //console.log("Erro na Solicitação Ajax");
            //console.log(response);
            retorno = false;
        },
        complete: function (response) {
            //console.log("Solicitação Ajax Completada");
            //console.log(response);
            carregando(false);
        }

    });
    return retorno;

}

function montaOptions(opcoes) {
    /*
     $.each(opcoes, function (index, valor) {
     var opt = $('<option>').val(opcoes[index]).text(opcoes[index+1]);
     $('#planos').append(opt);
     });*/
    //console.log(opcoes);
    var count = 0;
    for (k in opcoes) {
        count++;
    }
    for (var i = 0; i < count; i += 2) {
        var opt = $('<option>').val(opcoes[i]).text(opcoes[i + 1]);
        $('#planos').append(opt);
        //console.log("Opcao:"+i+" "+opcoes[i]);
        //console.log("Opcao:"+i+" "+opcoes[i+1]);
    }
}


//Ecluindo médico

jQuery(function ($) {
    $('.btnRemoveMedico').on("click", function (e) {
        e.preventDefault();
        var nomemed = $(this).closest('tr').find('.nomemedico').text();
        var id_medico = $(this).closest('form').find('.idmed').val();
        var simounao = confirm("Deseja realmente excluir o médico: " + nomemed + "?");
        if (simounao) {
            var funcionou = removeMed(id_medico);
        }
        location.reload();
    });
});

function removeMed(id_medico) {
    var retorno = "";
    carregando(true);
    $.ajax({
        type: 'POST',
        url: 'includes/exclui-medico.php',
        async: false, // não achei método alternativo
        data: 'id=' + id_medico,
        success: function (response) {
            //console.log("Sucesso no envio da solicitação Ajax");
            //console.log(response);
            carregando(true);
            retorno = response;
        },
        error: function (response) {
            //console.log("Erro na Solicitação Ajax");
            //console.log(response);
            retorno = false;
        },
        complete: function (response) {
            //console.log("Solicitação Ajax Completada");
            //console.log(response);
            carregando(false);
        }

    });
    return retorno;

}


//-------------------------------------------------------------------------------------------------------
//Código Relacionado a Pacientes
//-------------------------------------------------------------------------------------------------------

//Função para o Campo data, ao digitar completa com / e impedir que ultrapasse dd/mm/aaaa além de aceitar apenas numeros
jQuery(function ($) {
    $("#datetimepickerdtnasc").keypress(function (e) {

        if (document.all) { // Internet Explorer
            var tecla = event.keyCode;
            //alert("ie");
        } else { //Outros Browsers
            var tecla = e.which;
            //alert(tecla);
        }

        if (tecla >= 47 && tecla < 58) { // numeros de 0 a 9 e "/"
            var data = $(this).val();
            //alert(data.length);
            if (data.length == 2 || data.length == 5) {
                data += '/';
                $(this).val(data);
            } else if (data.length > 9) {
                return false;
            }
        } else if (tecla == 8 || tecla == 0) { // Backspace, Delete e setas direcionais(para mover o cursor, apenas para FF)
            return true;
        } else {
            return false;
        }
    });
});


//Função para o Campo Telefone, acrescentar (ddd) e aceitar apenas numeros
jQuery(function ($) {
    $("#tel").keypress(function (e) {

        if (document.all) { // Internet Explorer
            var tecla = event.keyCode;
            //alert("ie");
        } else { //Outros Browsers
            var tecla = e.which;
            //alert(tecla);
        }

        if (tecla >= 48 && tecla < 58) { // numeros de 0 a 9 e "/"
            var tel = $(this).val();
            //alert(data.length);
            if (tel.length == 0) {
                tel = '(' + tel;
                $(this).val(tel);
            } else if (tel.length == 3) {
                tel += ')';
                $(this).val(tel);
            } else if (tel.length == 8) {
                tel += '-';
                $(this).val(tel);
            } else if (tel.length == 13) {
                tel = tel.replace("-", "");
                tel = tel.substr(0, 9) + "-" + tel.substr(9);
                $(this).val(tel);
            } else if (tel.length > 13) {
                return false;
            }
        } else if (tecla == 8 || tecla == 0) { // Backspace, Delete e setas direcionais(para mover o cursor, apenas para FF)
            return true;
        } else {
            return false;
        }
    });
});

//Função para excluir paciente

jQuery(function ($) {
    $('.excluipac').on("click", function (e) {
        e.preventDefault();
        var nomepac = $(this).closest('tr').find('.nomepaciente').text();
        var id_paciente = $(this).closest('tr').find('.idpac').val();
        var simounao = confirm("Deseja realmente excluir o paciente: " + nomepac + "?");
        if (simounao) {
            var funcionou = removePac(id_paciente);
        }
        location.reload();
    });
});

function removePac(id) {
    var retorno = "";
    carregando(true);
    $.ajax({
        type: 'POST',
        url: 'includes/paciente-exclusao.php',
        async: false, // não achei método alternativo
        data: 'id='+id,
        success: function (response) {
            console.log("Sucesso no envio da solicitação Ajax");
            console.log(response);
            carregando(true);
            retorno = response;
        },
        error: function (response) {
            console.log("Erro na Solicitação Ajax");
            console.log(response);
            retorno = false;
        },
        complete: function (response) {
            console.log("Solicitação Ajax Completada");
            console.log(response);
            carregando(false);
        }

    });
    return retorno;

}


jQuery(function ($) {
    $('.alterapac').on("click", function (e) {
        e.preventDefault();
        var nomepac = $(this).closest('tr').find('.nomepaciente').text();
        var id_paciente = $(this).closest('tr').find('.idpac').val();
        var simounao = confirm("Deseja realmente alterar o paciente: " + nomepac + "?");
        if (simounao) {
            //window.location("www.utopiastudio.com.br/rafael/cmcc/altera-paciente.php?id="+id_paciente);
            window.location.href = "http://utopiastudio.com.br/rafael/cmcc/alterar-paciente.php?id="+id_paciente;
        }
    });
});






//-------------------------------------------------------------------------------------------------------
//Código Relacionado a Planos
//-------------------------------------------------------------------------------------------------------

jQuery(function ($) {
    $('.excluiplano').on("click", function (e) {
        e.preventDefault();
        var nomeplano = $(this).closest('tr').find('.nome-plano').text();
        var id_plano = $(this).closest('tr').find('.idplano').val();
        var simounao = confirm("Deseja realmente excluir o plano: " + nomeplano + "?");
        if (simounao) {
            var funcionou = removePlano(id_plano);
        }
        location.reload();
    });
});

function removePlano(id) {
    var retorno = "";
    carregando(true);
    $.ajax({
        type: 'POST',
        url: 'includes/plano-exclusao.php',
        async: false, // não achei método alternativo
        data: 'id='+id,
        success: function (response) {
            //console.log("Sucesso no envio da solicitação Ajax");
            //console.log(response);
            carregando(true);
            retorno = response;
        },
        error: function (response) {
            //console.log("Erro na Solicitação Ajax");
            //console.log(response);
            retorno = false;
        },
        complete: function (response) {
            //console.log("Solicitação Ajax Completada");
            //console.log(response);
            carregando(false);
        }

    });
    return retorno;

}


jQuery(function ($) {
    $('.alteraplano').on("click", function (e) {
        e.preventDefault();
        var nomeplano = $(this).closest('tr').find('.nome-plano').text();
        var id_plano = $(this).closest('tr').find('.idplano').val();
        var simounao = confirm("Deseja realmente alterar o plano: " + nomeplano + "?");
        if (simounao) {
            //window.location("www.utopiastudio.com.br/rafael/cmcc/altera-paciente.php?id="+id_paciente);
            window.location.href = "http://utopiastudio.com.br/rafael/cmcc/alterar-plano.php?id="+id_plano;
        }
    });
});