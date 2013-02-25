<?php
header('Content-type: text/plain; charset=UTF-8');

require 'Zend/Loader.php';
Zend_Loader::registerAutoload();

echo Zend_Version::VERSION . PHP_EOL;

$dbAdapter = new Zend_Db_Adapter_Pdo_Mysql(array(
	'host'     => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'dbname'   => 'zend_auth',
	'options'  => array(
		Zend_Db::AUTO_QUOTE_IDENTIFIERS => false
	)
));

class User extends Zend_Db_Table_Abstract
{
	protected $_name = 'users';
	protected $_primary = 'id';
	protected $_dependentTables = array('UserGroup');
}

class Group extends Zend_Db_Table_Abstract
{
	protected $_name = 'groups';
	protected $_primary = 'id';
	protected $_dependentTables = array('UserGroup');
}

class UserGroup extends Zend_Db_Table_Abstract
{
	protected $_name = 'users_x_groups';
	protected $_primary = array('group_id','user_id');

	protected $_referenceMap = array(
		'Group' => array(
			'columns'		=> 'group_id',
			'refTableClass' => 'Group',
			'refColumns'	=> 'id'
		),
		'User' => array(
			'columns'       => 'user_id',
			'refTableClass' => 'User',
			'refColumns'    => 'id'
		)
	);
}

$u  = new User( $dbAdapter );
$g  = new Group( $dbAdapter );
$ug = new UserGroup( $dbAdapter );

$user = $u->find(1)->current();

print_r( $user );