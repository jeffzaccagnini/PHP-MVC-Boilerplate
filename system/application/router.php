<?php

class Router {

 private $load;
 public $route_arr = array();
 private $path;
 private $args = array();
 public $file;
 public $controller;
 public $action; 

 function __construct($load) {
	$this->load = $load;
 }
 
 function set_path($path) {
	 
	if (is_dir($path) == false){
		throw new Exception ('Invalid controller path: `' . $path . '`');
	}
 	$this->path = $path;
}

 public function loader()
 {
	$this->get_controller();
	if (is_readable($this->file) == false){
		$this->file = $this->path.'/404.php';
        $this->controller = 'error404';
	}
	include $this->file;
	$class = $this->controller . 'Controller';
	$controller = new $class($this->load);
	if (is_callable(array($controller, $this->action)) == false){
		$action = 'index';
	} else {
		$action = $this->action;
	}
	$controller->$action();
 }
 private function get_controller() {

	$route = (empty($_GET['rt'])) ? '' : $_GET['rt'];
	if (empty($route)){
		$route = 'index';
	} else {
		$route_arr = explode('/', $route);
		$this->controller = $route_arr[0];
		if(isset($route_arr[1])){
			$this->action = $route_arr[1];
		}
	}
	if (empty($this->controller)){
		$this->controller = 'index';
	}
	if (empty($this->action)){
		$this->action = 'index';
	}
	$this->file = $this->path .'/'. $this->controller . '.php';
 }

}

?>
