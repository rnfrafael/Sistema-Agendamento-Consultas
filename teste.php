<?php require_once 'includes/cabecalho.php';
?>


<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/autoload.php'; 

$conexao = new Conexao();
$horariosDAO = new HorariosDAO($conexao);
$horarios = new Horarios();


$id_medico = 2;
//Data no formato dd/mm/aaaa
$data = $_POST['data'];
//Recebe o dia da semana para procurar, 0 = Domingo e 6 = Sabado
$dia_semana_id = 4;



$horarios->setDiasSemanaId($dia_semana_id);
$horarios->setDataMYSQL($data);
$horarios->setIdMedico($id_medico);

//Retorna um objeto Horarios com as horas para montar os horários coisados

$horas_calendario = $horariosDAO->buscaHorario($horarios);

$tamanho = count($horas_calendario->getHoraInicial());

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

$diff = array();

$diff[] = '08:00';
$diff[] = '09:00';
$diff[] = '10:00';
$diff[] = '11:00';
$diff[] = '14:20';
$diff[] = '14:00';
$diff[] = '14:40';

$diff2 = array_diff($retorno, $diff);

echo "<pre>";
var_dump($diff2);
echo "</pre>";

/*


  $hora_inicial = $horarios->TransformaEmMinutos($horarios->getHoraInicial());
  $hora_final = $horarios->TransformaEmMinutos($horarios->getHoraFinal());

  $step = $horarios->getStep();
  //$retorno = '';
  $retorno = array();

  for ($i = $hora_inicial; $i <= $hora_final;) {
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

  $i += $step;
  }

  echo json_encode($retorno);
  //echo $retorno;
  //echo json_encode($id_medico);
 */
?>



<?php /*
  require_once $_SERVER['DOCUMENT_ROOT']."/includes/class/Conexao.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/includes/class/PlanoDAO.php";

  $conexao = new Conexao();
  $planoDAO = new PlanoDAO($conexao);

  $planos = $planoDAO->buscaPlanoMedico('1');
  $retorno_ajax = "";
  $retorno = array();
  echo "<pre>";
  echo var_dump($planos);
  echo "</pre>";

  foreach ($planos as $plano_atual) {
  $retorno_ajax .= $plano_atual->getId().':'.$plano_atual->getNome();
  $retorno[] = $plano_atual->getId();
  $retorno[] = $plano_atual->getNome();
  //print_r($retorno_ajax);
  }

  echo "<pre>";
  echo var_dump($retorno_ajax);
  echo "</pre>";

  echo "<pre>";
  echo json_encode($retorno);
  echo "</pre>";


 */ ?>









<?php /*
  require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/class/Conexao.php";
  require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/class/MedicoDAO.php";
  require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/class/Calendario.php";

  $conexao = new Conexao();
  $medicoDAO = new MedicoDAO($conexao);
  $calendário = new Calendario();


  $id_medico = '1';


  $medico = $medicoDAO->buscaMedico($id_medico);

  $hora_inicial = $calendário->TransformaEmMinutos($medico->getHorai());
  $hora_final = $calendário->TransformaEmMinutos($medico->getHoraf());

  $step = $medico->getStep();
  $retorno = '';

  for ($i = $hora_inicial; $i <= $hora_final;) {
  if ($i == $hora_inicial) {
  $retorno .= "['" . $calendário->TransformaEmHoras($i) . "'";
  } elseif ($i == $hora_final) {
  $retorno .= "]";
  break;
  } else {
  $retorno .= ",'" . $calendário->TransformaEmHoras($i) . "'";
  }

  $i += $step;
  }

  //echo json_encode($retorno);
  //echo json_encode($retorno);
  //echo json_encode($id_medico);




  echo "<pre>";
  echo var_dump($retorno);
  echo "</pre>";













 */ ?>


<?php

/*
 * Este programa está licenciado por Rafael Fontenele
 */
/*


  require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/class/Conexao.php";
  require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/class/PlanoDAO.php";
  //Deve retornar um array contendo os dias em que o médico não atende
  //0 = Domingo 1 = Segunda ... 6 = Sábado

  $id_medico = 1;

  $conexao = new Conexao();
  $horariosDAO = new HorariosDAO($conexao);


  $diasSemana = $horariosDAO->diasSemana($id_medico);

  $retorno = $diasSemana->getDiasSemanaId();

  /*foreach($dias as $dia_atual){
  $retorno[] = $dia_atual;
  } */

/*

  echo json_encode($retorno);
  /*
  echo "<pre>";
  echo var_dump($retorno);
  echo "</pre>";
 */
?>

































<?php require_once 'includes/rodape.php'; ?>
