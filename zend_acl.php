<?php require 'ini.php';

echo Zend_Version::VERSION . PHP_EOL;

class Kitty implements Zend_Acl_Resource_Interface
{
	public $color = 'branco';
	public function getResourceId()
	{
		return 'Cat';
	}
}
class Satanas implements Zend_Acl_Resource_Interface
{
	public $color = 'preto';
	public function getResourceId()
	{
		return 'BlackCat';
	}
}

class AssertGatoPreto implements Zend_Acl_Assert_Interface
{
	public function assert(Zend_Acl $acl, Zend_Acl_Role_Interface $role = null, Zend_Acl_Resource_Interface $resource = null, $privilege = null)
	{
		return $resource->color === 'preto';
	}
}
 
$acl = new Zend_Acl();

# Roles
$admin = new Zend_Acl_Role('Admin');
$oreiaSeca = new Zend_Acl_Role('Oreia');
$manageador = new Zend_Acl_Role('Manager');

$acl->addRole($oreiaSeca);
$acl->addRole($manageador);
$acl->addRole($admin, array($manageador));

# Resources
$products = new Zend_Acl_Resource('Product');
$kitty = new Kitty();
$satanas = new Satanas();

# Adding to ACL
$acl->add( $products );
$acl->add( $kitty );
$acl->add( $satanas, $kitty );

$acl->allow( $admin, $products );
//$acl->allow( null, $satanas, 'KILLITWITHFIRE', new AssertGatoPreto() );
$acl->allow( null, $kitty, 'KILLITWITHFIRE', new AssertGatoPreto() );
$acl->deny( $oreiaSeca, $kitty, 'KILLITWITHFIRE' );


print_r( $acl );

echo PHP_EOL . 'Admin > Products: ';
echo ($acl->isAllowed( $admin, $products ) ? 'yes' : 'no');

echo PHP_EOL . 'Admin > Kitty: ';
echo ($acl->isAllowed( $admin, $kitty ) ? 'yes' : 'no');

echo PHP_EOL . 'Admin > Kitty > KILLITWITHFIRE: ';
echo ($acl->isAllowed( $admin, $kitty, 'KILLITWITHFIRE' ) ? 'yes' : 'no');

echo PHP_EOL . 'Admin > El gato negro > KILLITWITHFIRE: ';
echo ($acl->isAllowed( $admin, $satanas, 'KILLITWITHFIRE' ) ? 'yes' : 'no');

echo PHP_EOL . 'Oreia Seca > Kitty > KILLITWITHFIRE: ';
echo ($acl->isAllowed( $oreiaSeca, $kitty, 'KILLITWITHFIRE' ) ? 'yes' : 'no');

