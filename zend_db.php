<?php
header('Content-type: text/plain; charset=UTF-8');

require 'Zend/Loader.php';
Zend_Loader::registerAutoload();

$dbAdapter = new Zend_Db_Adapter_Pdo_Mysql(array(
	'host'     => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'dbname'   => 'db_gm_sisgm'
));

/*function camelcalize( $string )
{
	return str_replace(' ', '',
		ucwords(
			str_replace('_', ' ',
				strtolower($string)
			)
		)
	);
}

$classes = array();
foreach( $dbAdapter->listTables() as $table ) {
	if ( strpos($table, 'tb_') === 0 ) {
		$class = camelcalize( str_replace('tb_', '', $table) );

		$id = array_shift($dbAdapter->describeTable($table));

		eval('class '.$class.' extends Zend_Db_Table_Abstract {
			protected $_name = \''.$table.'\';
			protected $_primary = array(\''.$id['COLUMN_NAME'].'\');
		}');

		$classes[] = new $class( array( 'db'=>$dbAdapter ) );
	}
}*/