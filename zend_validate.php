<?php require 'ini.php';

function val( Zend_Validate_Interface $validate, $valor ) {
	$resultado = $validate->isValid( $valor );

	$nomeValidator = str_replace('Zend_Validate_', '', get_class($validate) );

	echo "{$nomeValidator} (".($resultado?'VALID':'INVALID')."): '{$valor}'". PHP_EOL;

	if ( !$resultado ) {
		foreach ($validate->getMessages() as $id => $message) {
			echo "\t- Erro de validação ({$id}): {$message}" . PHP_EOL;
		}
	}
}

val(new Zend_Validate_Alnum(), 'dfskfjsmkfjsldfsj784387PAÇOCA' );
val(new Zend_Validate_Alpha(), 'fdksjfsli78778');
val(new Zend_Validate_Barcode_Ean13(),'9999999999994');
val(new Zend_Validate_Barcode_UpcA(),'000999999996');
$between = new Zend_Validate_Between( 0, 10, false );
val($between, 8);
val(new Zend_Validate_Ccnum(),1234123412342);
val(new Zend_Validate_Date('YYYY-MM-DD'),'2013-2-2');
// - Digits
val(new Zend_Validate_EmailAddress(), 'vinicius.costa.pires@gmail.com' );
$validatorChain = new Zend_Validate();
$validatorChain->addValidator(new Zend_Validate_Digits())
			->addValidator(new Zend_Validate_Float())
			->addValidator(new Zend_Validate_GreaterThan(6));
val($validatorChain, 5);
// - Float
// - GreaterThan
// - Hex
// - Hostname
// - InArray
// - Int
// - Ip
// - LessThan
// - NotEmpty
// - Regex
// - StringLength
