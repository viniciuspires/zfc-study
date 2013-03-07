<?php
require 'Zend/Loader.php';
Zend_Loader::registerAutoload();

$db = Zend_Db::factory('Pdo_Mysql', array(
	'host'     => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'dbname'   => 'zend_auth',
));

$select = $db->select()
			 ->from(array('u'=>'users'), array('id', 'login'), 'zend_auth')
			 ->joinInner(array('ug'=>'users_x_groups'),'u.id = ug.user_id')
			 //->joinLeft->joinInner->joinCross->joinFull->joinNatural
			 ->where('u.password IS NOT NULL')
			 ->where('u.id = ?', 2 )
			 ->orWhere('u.login = ?', array('admin') )
			 ->group('u.password')
			 ->order('u.id DESC')
			 ->limit(10,20);

Zend_Debug::dump( $select );

echo $select;