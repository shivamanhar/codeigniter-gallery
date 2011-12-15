<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front_page extends CI_Controller {


	public function index()
	{
		//$this->load->model('Home_model');
		//$data['records'] = $this->Home_model->getAll();
		//$data['main_content'] = 'home_view';
		$this->load->view('front_page_view');		
	}
	

}

