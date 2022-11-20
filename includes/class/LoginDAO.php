<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginDAO
 *
 * @author rnfra
 */
require_once 'Login.php';

class LoginDAO {

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

    public function insere(Login $login) {
        try {
            $sql = "INSERT INTO logins (usuario,senha,nivel) VALUES (?,?,?)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $login->getUsuario());
            $stmt->bindValue(2, md5($login->getSenha()));
            $stmt->bindValue(3, $login->getNivel());
            $stmt->execute();
        } catch (Exception $ex) {
            echo "Ocorreu um erro na query:Código " . $ex->getCode() . "  Mensagem: " . $ex->getMessage();
            return false;
        }
        return $this->conexao->lastInsertId();
    }

    public function jaExiste(Login $login) {
        try {
            $sql = "SELECT * FROM logins WHERE usuario=?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $login->getUsuario());
            $res = $stmt->execute();
            if ($res) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Ocorreu um erro na query:Código " . $ex->getCode() . "  Mensagem: " . $ex->getMessage();
            return false;
        }
    }

    //put your code here
}
