<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {


	public function view($page = 'home')
	{
				
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->model('Menu_model');
		$data['title'] = ucfirst($page); // Capitalize the first letter
		//$data['menu'] = $this->Menu_model->showMenuList(1);
		
		$this->load->view('includes/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('includes/footer', $data);
	
	}
	

}

