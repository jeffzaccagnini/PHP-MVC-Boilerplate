<?php

class error404Controller extends Controller {

 public function index() 
 {
	$this->load->title = 'Error';
	$this->load->blog_heading = 'This is the 404';
	$this->load->view('404');
 }

}

