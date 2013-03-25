<?php require 'ini.php';

$filterRules = array('login'=>'Alnum');
$validateRules = array('email'=>'EmailAddress', 'login'=>'Alnum');

$filterInput = new Zend_Filter_Input( $filterRules, $validateRules );
$filterInput->setData( array('login'=>'abc123', 'email'=>'vinicius.costa.pires@gmail.com', 'ronaldo'=>true) );

echo 'ESCAPED: ';
print_r($filterInput->getEscaped());

echo 'UNESCAPED: ';
print_r($filterInput->getUnescaped());

echo 'UNKNOWN: ';
print_r($filterInput->getUnknown());