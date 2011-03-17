<?php

class Load {

 private $vars = array();
 private $load;

 public function __set($index, $data)
 {
	$this->vars[$index] = $data;
 }

 public function __get($index)
 {
	return $this->vars[$index];
 }
 
 public function view($view) 
 {
	$view = explode("/", $view);
	if(empty($view[1])) {
		$controller = 'index';
	} else {
		$controller = $view[1];
	}
	$path = BASE_PATH . '/system/views/' . $view[0] . '/'.$controller.'.php';
	if (file_exists($path) == false){
		$path = BASE_PATH . '/system/views/404/index.php';
	}
	foreach ($this->vars as $key => $value){
		$$key = $value;
	}
	include BASE_PATH . '/system/themes/default/' . 'index.php';
 }

}
