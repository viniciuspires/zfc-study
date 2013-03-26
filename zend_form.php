<?php require 'ini.php';

$form = new Zend_Form();
$form->setAction('zend_form.php?r=html')
	 ->setMethod('post');

// hidden
$hidden = new Zend_Form_Element_Hidden('id');
$hidden->setValidators(array(
			new Zend_Validate_NotEmpty(),
			new Zend_Validate_Int()
		))
	   ->setLabel('Id?')
	   ->setValue(345);

// text
$text = new Zend_Form_Element_Text('email');
$text->setLabel('E-mail:')
	 ->addFilter(new Zend_Filter_StripTags())
	 ->addFilter(new Zend_Filter_StringToLower())
	 ->addValidator(new Zend_Validate_EmailAddress())
	 ->setRequired(true);

// textarea
$textarea = new Zend_Form_Element_Textarea('comentario');
$textarea->setLabel('Comentário:')
		 ->setRequired(true)
		 ->addFilter(new Zend_Filter_StripTags());

// select (regular, multiselect)
$select = new Zend_Form_Element_Select('selecione');
$select->setLabel('Sexo:')
	   ->addValidator(new Zend_Validate_NotEmpty())
	   ->setMultiOptions(array(null=>'Selecione','Sim','Talvez',-1=>'Tou com dor de cabeça'));

// radio
$radio = new Zend_Form_Element_Radio('raido');
$radio->setLabel('Sexo:')
	   ->setMultiOptions(array('Masculino','Feminino'));

// checkbox
$check = new Zend_Form_Element_Checkbox('batata');
$check->setLabel("Gors'de Batata?");

//  multiCheckbox
$multicheck = new Zend_Form_Element_MultiCheckbox('gorsd');
$multicheck->setLabel('Gosta de...')
	  ->setMultiOptions(array(
	  	'Batata?',
		'Xtudá?',
		'Bala?',
		'Bola-gato?'
	  ));

// image
$image = new Zend_Form_Element_Image('img');
$image->setLabel('Batata?')
	  ->setImage('http://3.bp.blogspot.com/-dB-dGo5eboU/TqS6rcOghCI/AAAAAAAAGrg/6BMrNFjhHY4/s1600/batata.jpg');

// button
$button = new Zend_Form_Element_Button('butt');
$button->setLabel('Butt-on');

// submit
$submit = new Zend_Form_Element_Submit('enviar');
$submit->setLabel('Enviar');

// reset
$reset = new Zend_Form_Element_Reset('reseter');
$reset->setLabel('Limpar');


// Adding elements to forms
$form->addElement($hidden)
	 ->addElement($text)
	 ->addElement($textarea)
	 ->addElement($select)
	 ->addElement($radio)
	 ->addElement($check)
	 ->addElement($multicheck)
	 ->addElement($image)
	 ->addElement('password','senha', array(	// password
			'validators' => array(
				'alnum',
				'NotEmpty'
			),
			'label'=>'Senha:',
			'required'=>true,
			'filters'=>array('StringToLower')
	 	)
	 )
	 ->addElement($button)
	 ->addElement($submit)
	 ->addElement($reset);

if ( !empty($_POST) ) {
	echo $form->isValid($_POST) ? 'Tá válido' : 'Não tá válido não';
	$form->populate($_POST);
}


echo $form->render( new Zend_View() );