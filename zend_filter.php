<?php require 'ini.php';

define('SPACE', PHP_EOL.'============================='.PHP_EOL);

echo $string = "   Óia eu pai!! #acheiachavedochevete <b>aqui</b> na TERRA. > -123.213".PHP_EOL." FDSAfsad <script type='text/javascript'>";

$alnum = new Zend_Filter_Alnum();
echo SPACE.$alnum->filter( $string );

$alpha = new Zend_Filter_Alpha();
echo SPACE.$alpha->filter( $string );

$basename = new Zend_Filter_Basename( );
echo SPACE.$basename->filter( __DIR__.__FILE__ );

$digits = new Zend_Filter_Digits();
echo SPACE.$digits->filter( $string );

$dir = new Zend_Filter_Dir();
echo SPACE.$dir->filter( __FILE__ );

$htmlEntities = new Zend_Filter_HtmlEntities(null, 'UTF-8');
echo SPACE.$htmlEntities->filter( $string );

$int = new Zend_Filter_Int();
echo SPACE.$int->filter( '-1234.7afdasfads' );

$realpath = new Zend_Filter_RealPath();
echo SPACE.$realpath->filter(__DIR__.'/../');

$stringToLower = new Zend_Filter_StringToLower();
$stringToLower->setEncoding('UTF-8');
echo SPACE.$stringToLower->filter( $string );

$stringToUpper = new Zend_Filter_StringToUpper();
$stringToUpper->setEncoding('UTF-8');
echo SPACE.$stringToUpper->filter( $string );

$stringTrim = new Zend_Filter_StringTrim();
echo SPACE.$stringTrim->filter( $string );

$stripTags = new Zend_Filter_StripTags();
$stripTags->setTagsAllowed('b');
echo SPACE.$stripTags->filter( $string );

$filterChain = new Zend_Filter();
$filterChain->addFilter($stripTags)
			->addFilter($alpha)
			->addFilter($stringToUpper);

echo SPACE.$filterChain->filter( $string );

//$input = new Zend_Filter_Input();