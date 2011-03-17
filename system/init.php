<?php
 
 define('BASE_URL', $config['base_url']);

 require 'application/load.php';
 require 'application/controller.php';
 require 'application/router.php';
 
 /*** auto load model classes ***/
 function __autoload($class_name) 
 {
	$filename	= strtolower($class_name) . '.php';
    $file 		= BASE_PATH . '/models/' . $filename;
	
    if (file_exists($file) == false){
        return false;
    }
	include ($file);
 } 
 
 /*** a new registry object ***/
 $load = new Load;

?>