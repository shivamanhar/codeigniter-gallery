<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Albums extends CI_Controller {


	public function index()
	{
		$this->load->model('Home_model');
		$data['records'] = $this->Home_model->getAll();
		$data['main_content'] = 'albumList_view';
		$data['name']='Album List';
		$this->load->view('includes/template', $data);		
	}
	
	public function album()
	{
		$this->load->model('Album_model');
		$data['images']=$this->Album_model->getImages();
		$data['main_content'] = 'album_view';
		$data['name']=$this->Album_model->getAlbumName();
		$this->load->view('includes/template', $data);
	}
}

