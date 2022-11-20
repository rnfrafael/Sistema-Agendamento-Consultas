<?php

/*
 * Este programa está licenciado por Rafael Fontenele
 */
require_once "Plano.php";

class PlanoDAO {

    private $conexao;

    function __construct(PDO $conexao) {
        $this->conexao = $conexao;
    }

    public function listatodos() {
        $retorno = array();
        try {
            $sql = "SELECT * FROM plano";
            $st = $this->conexao->prepare($sql);
            $st->execute();
            while ($plano_atual = $st->fetch(PDO::FETCH_ASSOC)) {
                $plano = new Plano($plano_atual['nome']);
                $plano->setId($plano_atual['id']);
                $retorno[] = $plano;
            }
        } catch (Exception $ex) {
            echo "Ocorreu um erro na query:Código " . $ex->getCode() . "  Mensagem: " . $ex->getMessage();
        }
        return $retorno;
    }

    public function buscaPlanoMedico($id_medico) {
        $retorno = array();
        try {
            $sql = "SELECT id_plano FROM medicosplanos WHERE id_medico = ?";
            $p_sql = $this->conexao->prepare($sql);
            $p_sql->bindValue(1, $id_medico);
            $p_sql->execute();
            while ($id_plano_atual = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                $retorno[] = $this->buscaNomePlano($id_plano_atual['id_plano']);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $retorno;
    }

    public function buscaNomePlano($id_plano) {
        try {
            $sql = "SELECT nome FROM plano WHERE id = ?";
            $p_sql = $this->conexao->prepare($sql);
            $p_sql->bindValue(1, $id_plano);
            $p_sql->execute();
            $res = $p_sql->fetch(PDO::FETCH_ASSOC);
            $retorno = new Plano($res['nome']);
            $retorno->setId($id_plano);
            return $retorno;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function insere(Plano $plano) {
        try {
            $sql = "INSERT INTO plano (nome) VALUES (?)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $plano->getNome());
            $stmt->execute();
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
            return false;
        }
        return true;
    }

    public function removePlano($id) {
        try {
            $sql = "DELETE FROM plano WHERE id=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return true;
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
            return false;
        }
    }
    
    public function buscaPlano($id) {
        try {
            $sql = "SELECT * FROM plano WHERE id=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $plano_atual = $stmt->fetch(PDO::FETCH_ASSOC);
            //$medico = new Medico($res['nome']);
            $plano = new Plano($plano_atual['nome']);
            $plano->setId($id);
            return $plano;
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
            return false;
        }
    }
    
    public function alteraPlano(Plano $plano) {
        try {
            $sql = "UPDATE plano SET nome=? WHERE id=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $plano->getNome());
            $stmt->bindValue(2, $plano->getId());
            $res = $stmt->execute();
            return $res;
        } catch (Exception $ex) {
            echo "ERRO: " . $ex->getMessage();
            return false;
        }
    }

}
