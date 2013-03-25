<?php require 'ini.php';

$form = new Zend_Form();
$form->setAction('zend_form.php')
	 ->setMethod('post');

$usuario = new Zend_Form_Element_Text('usuario');
$usuario->addValidator(new Zend_Validate_Alnum())
		->addValidator('NotEmpty')
		->setRequired(true)
		->addFilter(new Zend_Filter_StringToLower());

$email = new Zend_Form_Element_Text('email');
$email->addFilter(new Zend_Filter_StripTags())
	  ->addValidator(new Zend_Validate_EmailAddress());

$enviar = new Zend_Form_Element_Button('enviar');


$form->addElement($usuario)
	 ->addElement($email)
	 ->addElement('password','senha', array(
			'validators' => array(
				'alnum',
				'NotEmpty'
			),
			'required'=>true,
			'filters'=>array('StringToLower')
	 	)
	 )
	 ->addElement($enviar);

print_r($form);

// button
// hidden
// image
// radio
// reset
// submit
// password
// text
// textarea
// checkbox / multiCheckbox
// select (regular, multiselect)



class MyForm extends Zend_Form
{
	public function init()
	{

	}
}