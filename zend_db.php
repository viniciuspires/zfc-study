<?php require 'ini.php';

$db = new Zend_Db_Adapter_Pdo_Mysql(array(
	'host'     => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'dbname'   => 'zend_auth',
	'options'  => array(
		Zend_Db::AUTO_QUOTE_IDENTIFIERS => false
	)
));

print_r( $db->getConnection() );