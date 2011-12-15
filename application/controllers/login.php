<?php

class Login extends CI_Controller {
	
	function index()
	{
		$this->load->view('login_view');		
	}
	
	function validate_credentials()
	{		
		$this->load->model('user_model');
		$query = $this->user_model->validate();
		
		if($query) // if the user's credentials validated...
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('admin');
		}
		else // incorrect username or password
		{
			$this->index();
		}
	}	
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

}