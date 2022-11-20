<?php

/* 
 * Este programa está licenciado por Rafael Fontenele
 */

try {
    $conexao = new PDO("mysql:host=mysql.hostinger.com.br;dbname=u550151642_cmcc;charset=utf8", "u550151642_cmcc", "0012300");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}