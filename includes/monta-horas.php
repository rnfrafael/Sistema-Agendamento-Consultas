<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/rafael/cmcc/includes/autoload.php'; 

$conexao = new Conexao();
$horariosDAO = new HorariosDAO($conexao);
$horarios = new Horarios();
$consulta = new Consulta();
$consultaDAO = new ConsultaDAO($conexao);


$id_medico = $_POST['id'];
//Data no formato dd.mm.aaaa
$data = $_POST['data'];
//Recebe o dia da semana para procurar, 0 = Domingo e 6 = Sabado
$dia_semana_id = $_POST['diasemana'];

$consulta->setDataMYSQL($data);
$consulta->setId_medico($id_medico);



$horarios->setDiasSemanaId($dia_semana_id);
$horarios->setDataMYSQL($data);
$horarios->setIdMedico($id_medico);

//Retorna um objeto Horarios com as horas para montar os horários coisados

$horas_calendario = $horariosDAO->buscaHorario($horarios);

$tamanho = count($horas_calendario->getHoraInicial());
//$ret = var_dump($horas_calendario);
//echo json_encode($ret);
//echo json_encode($horas_calendario->getHoraInicial());

$retorno = array();

for ($j = 0; $j < $tamanho; $j++) {
    $hora_inicial = $horas_calendario->TransformaEmMinutos($horas_calendario->getHoraInicial()[$j]);
    $hora_final = $horas_calendario->TransformaEmMinutos($horas_calendario->getHoraFinal()[$j]);
    $step = $horas_calendario->getStep();
    for ($i = $hora_inicial; $i <= $hora_final;$i += $step) {
        if ($i == $hora_inicial) {
            //$retorno .= "'" . $calendário->TransformaEmHoras($i) . "'";
            $retorno[] = $horarios->TransformaEmHoras($i);
        } elseif ($i == $hora_final) {
            //$retorno .= "";
            break;
        } else {
            //$retorno .= ",'" . $calendário->TransformaEmHoras($i) . "'";
            $retorno[] = $horarios->TransformaEmHoras($i);
        }
    }
}   

//Horarios com consulta marcada
$horarios_a_remover = $consultaDAO->horarios($consulta);

//Retorno com os horarios da array Retorno sem os horarios da array Horarios a Remover
$retorno_temp = array_diff($retorno, $horarios_a_remover);

//Nova array criada para retorno final pois não achei opção a função array_diff 
//que acaba bugando código ajax
$retorno_final = array();
foreach($retorno_temp as $ret){
    $retorno_final[] = $ret;
}

//Envio do retorno_final para AJAX/JS
echo json_encode($retorno_final);