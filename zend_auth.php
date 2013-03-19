<?php require 'ini.php';

echo Zend_Version::VERSION . PHP_EOL;

class FileStorage implements Zend_Auth_Storage_Interface
{
	/* Must return true if storage is empty, false otherwise
	or throw a Zend_Auth_Storage_Exception if can't say if it's empty */
    public function isEmpty() {
        return file_get_contents('teste.txt') == '';
    }
    /* Must return the contents from the storage and throws
    Zend_Auth_Storage_Exception if can't read storage */
    public function read() {
        return file_get_contents('teste.txt');
    }

    /**
     * Writes $contents to storage
     *
     * @param  mixed $contents
     * @throws Zend_Auth_Storage_Exception If writing $contents to storage is impossible
     * @return void
     */
    public function write($contents) {
        $handle = fopen('teste.txt', 'w');
        fwrite($contents, $handle);
        fclose($handle);
    }

    /**
     * Clears contents from storage
     *
     * @throws Zend_Auth_Storage_Exception If clearing contents from storage is impossible
     * @return void
     */
    public function clear() {
        $handle = fopen('teste.txt', 'w');
        fwrite('', $handle);
        fclose($handle);
    }
}

// $auth->setStorage( new FileStorage() );

$user = 'admin';
$passwd = 'batatinha quando nasce se esparrama pelo chão';

$options = array(
    'host'    =>'localhost',
    'username'=>'root',
    'password'=>'root',
    'dbname'  =>'zend_auth'
);
$dbAdapter = new Zend_Db_Adapter_Pdo_Mysql( $options );

$adapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

$adapter->setTableName('user');

$adapter->setIdentityColumn('login');
$adapter->setCredentialColumn('password');


$adapter->setIdentity($user);
$adapter->setCredential($passwd);

$adapter->setCredentialTreatment('md5(?)');

// Auth is singleton, no __construct, no __clone by outside. Just getInstance.
$auth = Zend_Auth::getInstance();

$result = $auth->authenticate( $adapter );

$messages = $result->getMessages();

foreach ( $messages as $message ) {
    echo "[{$result->getCode()}] - {$message} (identity: {$result->getIdentity()})";
}