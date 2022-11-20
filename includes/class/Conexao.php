<?php

class Conexao extends PDO {

    //public static $instance;
    private $host = "mysql:host=mysql.utopiastudio.com.br;";
    private $user = "utopiastudio";
    private $password = "0012300";
    private $database = "dbname=utopiastudio;";
    private $charset = "charset=utf8";
    public $link;

    function __construct() {

        try {
            if ($this->link == null) {
                $con = parent::__construct($this->host . $this->database . $this->charset, $this->user, $this->password);
                //var_dump($con);
                parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->link = $con;
                return $this->link;
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    /* public static function getInstance() {
      if (!isset(self::$instance)) {
      try {
      self::$instance = new PDO("mysql:host=mysql.hostinger.com.br;dbname=u550151642_cmcc;charset=utf8", "u550151642_cmcc", "0012300");
      self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (Exception $ex) {
      echo "Erro: " . $ex->getMessage();
      }
      }
      } */

    /* public function __destruct() {
      if ($this->link != null) {
      $this->link = null;
      }
      } */

//Código ainda para analisar o uso do self::
    /* public static function getInstance() { 
      if (!isset(self::$instance)) {
      self::$instance = new PDO('mysql:host=localhost;dbname=minhabasededados', 'root', 'vertrigo', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);

      }
      return self::$instance;
      } */
}
