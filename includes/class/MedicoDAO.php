<?php

require_once 'Medico.php';

class MedicoDAO {

    private $conexao;

    function __construct(PDO $conexao) {
        $this->conexao = $conexao;
    }

    public function listaTodos() {
        try {
            $retorno = array();
            $sql = "SELECT * FROM medico";
            $p_sql = $this->conexao->prepare($sql);
            $p_sql->execute();
            while ($medico_atual = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                $medico = new Medico($medico_atual['nome']);
                $medico->setId($medico_atual['id']);
                $retorno[] = $medico;
            }
        } catch (Exception $ex) {
            echo "Ocorreu um erro na query:Código " . $ex->getCode() . "  Mensagem: " . $ex->getMessage();
        }
        return $retorno;
    }

    public function insere(Medico $medico) {
        try {
            $sql = "INSERT INTO medico (nome) VALUES (?)";
            $p_sql = $this->conexao->prepare($sql);
            $p_sql->bindValue(1, $medico->getNome());
            $p_sql->execute();
            $medico->setId($this->conexao->lastInsertId());
            $this->insereMedicoEPlano($medico);
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
            return false;
        }
        return true;
    }

    private function insereMedicoEPlano(Medico $medico) {
        try {
            foreach ($medico->getPlanos() as $plano_atual) {
                $sql = "INSERT INTO medicosplanos (id_medico,id_plano) VALUES (?,?)";
                $p_sql = $this->conexao->prepare($sql);
                $p_sql->bindValue(1, $medico->getId());
                $p_sql->bindValue(2, $plano_atual);
                $p_sql->execute();
            }
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
            return false;
        }
        return true;
    }

    public function buscaMedico($id) {
        try {
            $sql = "SELECT * FROM medico WHERE id=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $medico_atual = $stmt->fetch(PDO::FETCH_ASSOC);
            //$medico = new Medico($res['nome']);
            $medico = new Medico($medico_atual['nome']);
            $medico->setId($medico_atual['id']);
            return $medico;
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
            return false;
        }
    }

    public function buscaIdPlanos(Medico $medico) {
        try {
            $sql = "SELECT * from medicosplanos WHERE id_medico=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $medico->getId());
            $stmt->execute();
            while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $medico->setPlanos($res['id_plano']);
            }
        } catch (Exception $ex) {
            echo "ERRO: " . $ex->getMessage();
            return false;
        }
        return $medico;
    }

    public function alteraMedico(Medico $medico) {
        try {
            $sql = "UPDATE medico SET nome=? WHERE id=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $medico->getNome());
            $stmt->bindValue(2, $medico->getId());
            $res = $stmt->execute();
            $this->alteraPlanos($medico);
            return $res;
        } catch (Exception $ex) {
            echo "ERRO: " . $ex->getMessage();
            return false;
        }
    }

    private function alteraPlanos(Medico $medico) {
        try {
            $sql = "DELETE FROM medicosplanos WHERE id_medico={$medico->getId()}";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            foreach ($medico->getPlanos() as $plano_atual) {
                $sql2 = "INSERT INTO medicosplanos (id_plano , id_medico) VALUES ({$plano_atual},{$medico->getId()})";
                $stmt = $this->conexao->prepare($sql2);
                $stmt->execute();
            }
            return true;
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
            return false;
        }
    }

    public function removeMedico($id) {
        try {
            $sql = "DELETE FROM medico WHERE id=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $a = $stmt->execute();
            $sql2 = "DELETE FROM medicosplanos WHERE id_medico=?";
            $stmt = $this->conexao->prepare($sql2);
            $stmt->bindValue(1, $id);
            $b = $stmt->execute();
            if ($a and $b) {
                return true;
            }
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
            return false;
        }
    }

}

/* 
 * Este programa está licenciado por Rafael Fontenele
 */

