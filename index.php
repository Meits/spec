<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
//session_start();
include 'config.php';
header("Content-Type:text/html;charset=utf8");
function __autoload($file) {
	if(file_exists('controller'.DIRECTORY_SEPARATOR.$file.'.php')) {
		require_once 'controller'.DIRECTORY_SEPARATOR.$file.'.php';
	}
	else {
		require_once 'model'.DIRECTORY_SEPARATOR.$file.'.php'; 
	}
}
 
if(isset($_GET['option'])) {
	$class = strip_tags($_GET['option']);
	
	switch($class) {
		case 'view':
		$init = new View();
		break;
		
		case 'admin':
		$init = new Admin();
		break;
		
		case 'confirm':
		$init = new Confirm();
		break;
		
		case 'login':
		$init = new Login();
		break;
		
		case 'registration':
		$init = new Registration();
		break;
		
		case 'returnpas':
		$init = new Returnpas();
		break;
		
		default :
		$init = new Index();
		break;
	}
}
else {
	$init = new Index();
}

echo $init->get_body();

?>