<?php include 'Zend/Loader.php';
Zend_Loader::registerAutoload();

class JavascriptFormatter implements Zend_Log_Formatter_Interface {
	public function format($event) {
		return "console.log('{$event['priorityName']}: {$event['message']}');";
	}
}

class JavascriptWriter extends Zend_Log_Writer_Abstract {
	private $_messages = array();

	protected function _write( $event ) {
		$this->_messages[] = $this->_formatter->format($event);
	}
	public function shutdown() {
		$messages = implode('', $this->_messages );
		echo "<script type='text/javascript'>{$messages}</script>";
	}
}
class CurseFilter implements Zend_Log_Filter_Interface {
	private $_badWords = array(
		'fuck',
		'damn',
		'bloody'
	);

	public function accept( $event ) {
		foreach ( $this->_badWords as $curse ) {
			if ( stripos($event['message'], $curse) !== false ) {
				return false;
			}
		}

		return true;
	}
}


// log file: log/log.log | php://output
$writer = new JavascriptWriter();
$writer->setFormatter( new JavascriptFormatter() );

$log = new Zend_Log( $writer );
$log->addFilter( new CurseFilter() );

$log->addPriority( 'BATATA', 8 );
$log->addPriority( 'GABRIEL_OLDMAN', 9 );
$log->addPriority( 'E se tiver espaços?', 10 );

$log->log('Acorda, maria bonita...', Zend_Log::ERR);
$log->batata( 'Potato shoes. ' );
$log->gabriel_oldman('Hell yes! 60 years old');
$log->crit( 'What the fuck happened?!' );

// Só pra documentar que o PHP tem problemas sérios de personalidade
$log->{'E se tiver espaços?'}( 'fdsfdsafas' );
// PS: Ô louco, meu. Quem sabe faz ao vivo.