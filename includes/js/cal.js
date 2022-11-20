/* 
 * Este programa está licenciado por Rafael Fontenele
 */

$.datetimepicker.setLocale('pt-BR');
var input_datas = function (id_medico) {
    var dias = JSON.parse(PegaDias(id_medico));
    $('#datetimepicker').datetimepicker({
        beforeShowDay: function (date) {
            var diasemana = date.getDay();
            for (var dia in dias) {
                if (diasemana == parseInt(dias[dia])) {
                    return [false];
                }
            }
        },
        timepicker: false,
        //mask: '39/19/9999',
        format: 'd/m/Y',
        disabledDates: ['2015/11/20'],
        //scrollInput:false,
        scrollMonth: false,
        onSelectDate: function (date) {
            $('#horapicker').show();
            var diasemana = date.getDay();
            var data = $('#datetimepicker').val();
            var horarios = PegaHorarios(id_medico, data, diasemana);
            var horas = JSON.parse(horarios);
            $('#datetimepicker2').data('xdsoft_datetimepicker').setOptions({
                allowTimes: horas
            });
        }
    });

};

var input_horas = function (id_medico) {
    $('#datetimepicker2').datetimepicker({
        datepicker: false,
        format: 'H:i'
    });
};

$('#datetimepickerdtnasc').datetimepicker({
    timepicker: false,
    //mask: '39/19/9999',
    format: 'd/m/Y'
});
