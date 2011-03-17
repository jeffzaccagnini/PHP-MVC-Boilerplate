<?php

 error_reporting(E_ALL);
 
 $base_path = realpath(dirname(__FILE__));
 define ('BASE_PATH', $base_path);
 
 if (!file_exists('config.php')) {
	header('Location: install');
	exit;
 }
 require 'config.php';

 require 'system/init.php';

 $load->router = new router($load);

 $load->router->set_path (BASE_PATH . '/system/controllers');

 $load->router->loader();

?>
