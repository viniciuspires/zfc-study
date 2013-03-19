<?php require 'ini.php';

$db = Zend_Db::factory('Pdo_Mysql', array(
	'host'     => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'dbname'   => 'zend_auth',
));

$table = $db->quoteIdentifier("users");
$statement = $db->query( "SELECT * FROM {$table} WHERE id = :id", array(':id' => 1) );
// FETCH_LAZY, FETCH_COLUMN, FETCH_ASSOC
while( $row = $statement->fetch( Zend_Db::FETCH_OBJ ) ) {
	print_r( $row );
}
