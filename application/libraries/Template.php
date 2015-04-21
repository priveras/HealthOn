<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {

	public function load_template($view_file_name, $data_array=array()){
		$ci = & get_instance();
		$ci->load->view('html');
		$ci->load->view('header');
		$ci->load->view('menu');
		$ci->load->view($view_file_name,$data_array);
		$ci->load->view("footer");
	}

}