<?php

/*
 * Este programa está licenciado por Rafael Fontenele
 */

/**
 * Description of HorariosDAO
 *
 * @author Rafael Fontenele
 */
require_once "Horarios.php";

class HorariosDAO {

    //put your code here
    private $conexao;

    function __construct(PDO $conexao) {
        $this->conexao = $conexao;
    }

    public function buscaHorario(Horarios $horario) {
        try {
            $sql = "SELECT * FROM horarios WHERE id_medico=? AND dia_semana_id=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $horario->getIdMedico());
            $stmt->bindValue(2, $horario->getDiasSemanaIdIndice());
            $stmt->execute();
            $horarios = new Horarios();
            while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $horarios->setDiasSemanaId($res['dia_semana_id']);
                $horarios->setDiasSemana($res['dia_semana']);
                $horarios->setStep($res['step']);
                $horarios->setHoraInicial($res['hora_inicial']);
                $horarios->setHoraFinal($res['hora_final']);
                $horarios->setIdMedico($res['id_medico']);
            }
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
            return false;
        }
        return $horarios;
    }

    public function diasSemana($idMedico) {
        try {
            $sql = "SELECT dia_semana_id FROM horarios WHERE id_medico=?";
            $p_sql = $this->conexao->prepare($sql);
            $p_sql->bindValue(1, $idMedico);
            $p_sql->execute();
            $diasemana = new Horarios();
            while ($dia_atual = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                $diasemana->setDiasSemanaId($dia_atual['dia_semana_id']);
                //print_r($res);
            }
        } catch (Exception $ex) {
            echo "Ocorreu um erro na query:Código " . $ex->getCode() . "  Mensagem: " . $ex->getMessage();
        }
        return $diasemana;
    }

}
