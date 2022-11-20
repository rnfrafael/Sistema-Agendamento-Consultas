<?php

/*
 * Este programa está licenciado por Rafael Fontenele
 */

/**
 * Description of ConsultaDAO
 *
 * @author Rafael Fontenele
 */
class ConsultaDAO {

    //put your code here
    private $conexao;

    function __construct(PDO $conexao) {
        $this->conexao = $conexao;
    }

    public function insere(Consulta $consulta) {
        try {
            $sql = "INSERT INTO consultas (id_paciente,id_medico,primeiravez,hora,data) VALUES (?,?,?,?,?)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $consulta->getId_paciente());
            $stmt->bindValue(2, $consulta->getId_medico());
            $stmt->bindValue(3, $consulta->getPrimeiravez());
            $stmt->bindValue(4, $consulta->getHora());
            $stmt->bindValue(5, $consulta->getData());
            $stmt->execute();
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
        }
        return $this->conexao->lastInsertId();
    }

    public function horarios(Consulta $consulta) {
        try{
            $sql = "SELECT TIME_FORMAT(hora, '%H:%i') as hora FROM consultas WHERE id_medico = ? AND data = ?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $consulta->getId_medico());
            $stmt->bindValue(2, $consulta->getData());
            $stmt->execute();
            $retorno = array();
            while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
                $retorno[] = $res['hora'];
            }
        } catch (Exception $ex) {
            echo "Erro: ".$ex->getMessage();
            return false;
        }
        return $retorno;
    }
    
    public function listaTodas() {
        try{
            $sql = "SELECT * FROM consultas ORDER BY data ASC, hora ASC";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $retorno = array();
            while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
                $consulta = new Consulta();
                $consulta->setId($res['id']);
                $consulta->setId_paciente($res['id_paciente']);
                $consulta->setId_medico($res['id_medico']);
                $consulta->setPrimeiravez($res['primeiravez']);
                $consulta->setHora($res['hora']);
                $consulta->setDataPHP($res['data']);                
                $retorno[] = $consulta;
            }
        } catch (Exception $ex) {
            echo "Erro: ".$ex->getMessage();
            return false;
        }
        return $retorno;
    }
    
}
