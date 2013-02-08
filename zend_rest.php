<?php
require 'Zend/Loader.php';
Zend_Loader::registerAutoload();

echo Zend_Version::VERSION;

class My extends Zend_Rest_Controller {

	public function indexAction(){

	}
	public function getAction(){
		
	}
}