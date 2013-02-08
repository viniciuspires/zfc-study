<?php
require 'Zend/Loader.php';
Zend_Loader::registerAutoload();

echo Zend_Version ::VERSION;

$acl = new Zend_Acl();

# Roles
$admin = new Zend_Acl_Role('Admin');
$oreiaSeca = new Zend_Acl_Role('Oreia');
$manageador = new Zend_Acl_Role('Manager');

$acl->addRole($oreiaSeca);
$acl->addRole($manageador);

$acl->addRole($admin, array('Oreia', $manageador));

# Resources
$products = new Zend_Acl_Resource('Product');

$acl->add( $products );


Zend_Debug::dump( $acl );