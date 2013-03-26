<?php
$response = isset($_GET['r']) ? $_GET['r'] : 'plain';
header("Content-type: text/{$response}; charset=utf-8");
set_include_path('.');
require 'Zend/Loader.php';
Zend_Loader::registerAutoload();

