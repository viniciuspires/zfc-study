<?php require 'ini.php';

$test = Zend_Debug::dump( $_SERVER, 'Variaveis do Servidor', false );

echo $test;