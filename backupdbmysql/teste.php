<?php

require_once 'backup.php';

$teste = new DatabaseDump('sql811.main-hosting.eu','u573038527_cmcc','0012300Qw','u573038527_cmcc');

//$file = fopen('teste.sql', 'w');

$teste->dump('alosom.sql');