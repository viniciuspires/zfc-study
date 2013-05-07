<?php include 'ini.php';

$registry = new Zend_Registry( array('indice'=>new stdClass()) );

Zend_Registry::setInstance( $registry );

print_r( Zend_Registry::get('indice') );