<?php

//require_once 'includes/class/Conexao.class.php';

class PacienteDAO {
    /* public static $instance;

      public static function getInstance() {
      if (!isset(self::$instance)) {
      self::$instance = new DaoUsuario();
      }
      return self::$instance;
      } */

    private $conexao;

    function __construct(PDO $conexao) {
        $this->conexao = $conexao;
    }

    public function listaTodos() {
        try {
            $retorno = array();
            //$sql = "SELECT a.*, b.nome bnome FROM paciente a JOIN plano b ON b.id=a.plano_id";
            $sql = "SELECT * FROM paciente";
            $p_sql = $this->conexao->prepare($sql);
            $p_sql->execute();
            while ($paciente_atual = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                $paciente = new Paciente($paciente_atual['nome'], $paciente_atual['telefone'], $paciente_atual['plano_id']);
                $paciente->setId($paciente_atual['id']);
                $paciente->setEndereco($paciente_atual['endereco']);
                $paciente->setDataPHP($paciente_atual['datanasc']);
                $paciente->setEstadocivil($paciente_atual['estadocivil']);
                $paciente->setIdade($paciente_atual['idade']);
                $paciente->setId_medico($paciente_atual['medico_id']);
                $retorno[] = $paciente;
                //print_r($res);
            }
        } catch (Exception $ex) {
            echo "Ocorreu um erro na query:Código " . $ex->getCode() . "  Mensagem: " . $ex->getMessage();
        }
        return $retorno;
    }

    public function insere(Paciente $paciente) {
        $busca = $this->selecionaPaciente($paciente->getNome());
        if (!$busca) {
            try {
                $sql = "INSERT INTO paciente (nome, telefone, plano_id, medico_id, endereco, datanasc, estadocivil, idade) VALUES (?,?,?,?,?,?,?,?)";
                $p_sql = $this->conexao->prepare($sql);
                $p_sql->bindValue(1, $paciente->getNome());
                $p_sql->bindValue(2, $paciente->getTelefone());
                $p_sql->bindValue(3, $paciente->getPlano_id());
                $p_sql->bindValue(4, $paciente->getId_medico());
                $p_sql->bindValue(5, $paciente->getEndereco());
                $p_sql->bindValue(6, $paciente->getDatanasc());
                $p_sql->bindValue(7, $paciente->getEstadocivil());
                $p_sql->bindValue(8, $paciente->getIdade());
                $p_sql->execute();
            } catch (Exception $ex) {
                echo "Erro: " . $ex->getMessage();
                return false;
            }
            return $this->conexao->lastInsertId();
        } else {
            return $busca->getId();
        }
    }

    public function selecionaPaciente($nome) {
        try {
            $sql = "SELECT * FROM paciente WHERE nome=?";
            $p_sql = $this->conexao->prepare($sql);
            $p_sql->bindValue(1, $nome);
            $p_sql->execute();
            $res = $p_sql->fetch(PDO::FETCH_ASSOC);
            if (!$res) {
                return false;
            }
            $paciente = new Paciente($res['nome'], $res['telefone'], $res['plano_id']);
            $paciente->setId($res['id']);
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
            return false;
        }
        return $paciente;
    }

    public function removePaciente($id) {
        try {
            $sql = "DELETE FROM paciente WHERE id=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $a = $stmt->execute();
            return true;
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
            return false;
        }
    }

    public function alteraPaciente(Paciente $paciente) {
        try {
            $sql = "UPDATE paciente SET nome=?, telefone=?, plano_id=?, medico_id=?, endereco=?, datanasc=?, estadocivil=?, idade=? WHERE id=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $paciente->getNome());
            $stmt->bindValue(2, $paciente->getTelefone());
            $stmt->bindValue(3, $paciente->getPlano_id());
            $stmt->bindValue(4, $paciente->getId_medico());
            $stmt->bindValue(5, $paciente->getEndereco());
            $stmt->bindValue(6, $paciente->getDatanasc());
            $stmt->bindValue(7, $paciente->getEstadocivil());
            $stmt->bindValue(8, $paciente->getIdade());
            $stmt->bindValue(9, $paciente->getId());
            $res = $stmt->execute();
            return $res;
        } catch (Exception $ex) {
            echo "ERRO: " . $ex->getMessage();
            return false;
        }
    }
    
    public function buscaPaciente($id) {
        try {
            //$sql = "SELECT a.*, b.nome bnome FROM paciente a JOIN plano b ON b.id=a.plano_id";
            $sql = "SELECT * FROM paciente WHERE id=?";
            $p_sql = $this->conexao->prepare($sql);
            $p_sql->bindValue(1, $id);
            $p_sql->execute();
            while ($paciente_atual = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                $paciente = new Paciente($paciente_atual['nome'], $paciente_atual['telefone'], $paciente_atual['plano_id']);
                $paciente->setId($paciente_atual['id']);
                $paciente->setEndereco($paciente_atual['endereco']);
                $paciente->setDataPHP($paciente_atual['datanasc']);
                $paciente->setEstadocivil($paciente_atual['estadocivil']);
                $paciente->setIdade($paciente_atual['idade']);
                $paciente->setId_medico($paciente_atual['medico_id']);
                $retorno = $paciente;
                //print_r($res);
            }
        } catch (Exception $ex) {
            echo "Ocorreu um erro na query:Código " . $ex->getCode() . "  Mensagem: " . $ex->getMessage();
        }
        return $retorno;
    }

}
