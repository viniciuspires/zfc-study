<?php
// Loading autoloader LOL :D
require_once 'Zend/Loader.php';
Zend_Loader::registerAutoload(); 

// Auth is singleton, no __construct, no __clone by outside. Just getInstance.
$auth = Zend_Auth::getInstance();

class CustomStorage implements Zend_Auth_Storage_Interface
{
	/* Must return true if storage is empty, false otherwise
	or throw a Zend_Auth_Storage_Exception if can't say if it's empty */
    public function isEmpty() {

    }
    /* Must return the contents from the storage and throws
    Zend_Auth_Storage_Exception if can't read storage */
    public function read() {

    }

    /**
     * Writes $contents to storage
     *
     * @param  mixed $contents
     * @throws Zend_Auth_Storage_Exception If writing $contents to storage is impossible
     * @return void
     */
    public function write($contents) {

    }

    /**
     * Clears contents from storage
     *
     * @throws Zend_Auth_Storage_Exception If clearing contents from storage is impossible
     * @return void
     */
    public function clear() {

    }
}

$auth->setStorage( new CustomStorage() );


print_r($auth->getStorage());