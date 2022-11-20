<?php

/* 
 * Este programa está licenciado por Rafael Fontenele
 */

function autoload($class) {
    require_once $_SERVER['DOCUMENT_ROOT']."/rafael/cmcc/includes/class/{$class}.php";
    //require_once "includes/class/{$class}.php";
}

spl_autoload_register("autoload"); 