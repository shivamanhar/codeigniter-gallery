<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}

	function index()
	{
		$this->load->model('Admin_model');
		$data['records'] = $this->Admin_model->getAll();
		$data['main_content'] = 'admin_view';
		$this->load->view('includes/admin_template', $data);		
	}
	
	function create()
	{
		$this->load->model('Admin_model');
		$data = array(
			'name' => $this->input->post('name'),
			'slug' => url_title($this->input->post('name'))
		);
		
		$this->Admin_model->add_record($data);
		$this->index();
	}
	
	function delete()
	{
		$this->load->model('Admin_model');
		$this->Admin_model->delete_row();
		$this->index();
	}
	
	function update()
	{
		$this->load->model('Admin_model');
		$data = array(
			'albumID' => $this->input->post('albumID'),
			'name' => $this->input->post('name'),
			'slug' => url_title($this->input->post('name'))	
		);
		
		$this->Admin_model->update_record($data);
		redirect('/admin/edit/'.$data['albumID']);
	}	
	
	function edit()
	{
		$this->load->model('Admin_model');
		
		if ($this->input->post('upload')) {
			$this->Admin_model->do_upload();
		}
		
		$data['images']=$this->Admin_model->getImages();
		$data['main_content'] = 'edit_view';
		$data['qstring']=$this->uri->segment(3);
		//$data['name']=str_replace("-"," ",$this->uri->segment(3));
		$data['name']=$this->Admin_model->getAlbumName();
		$this->load->view('includes/admin_template', $data);
	}
	
	function deleteImage()
	{
		$this->load->model('Admin_model');
		$this->Admin_model->delete_image();
		redirect('/admin/edit/'.$this->uri->segment(3));
	}
	
	function editImage()
	{
		$this->load->model('Admin_model');
		$data = array(
			'imageID' => $this->input->post('imageID'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description')
		);
		$this->Admin_model->updateImage($data);
		$this->load->view('editImage_view',$data);
	}
	
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You don\'t have permission to access this page.';
			echo anchor("login","Login");	
			die();		
			//$this->load->view('login_form');
		}		
	}
	
	function menu() {
		$this->load->model('Menu_model');
		$data['menus']=$this->Menu_model->getMenu();
		$data['main_content']=('menu_view');
		$this->load->view('includes/admin_template', $data);
	}
	
	function addLink($id){
		$this->load->model('Menu_model');
		$data=array("menuID"=>$id);
		$this->Menu_model->addLink($data);
		redirect('/admin/menu/');
	}
	
	function updateMenu() {
		$this->load->model('Menu_model');
		
		//print_r($_POST);
		$menuData=array();
		
		foreach($_POST as $key => $value)
		{
			if(strstr($key,"menu_")){
				$a = explode("_",$key);
				$menuData['id']=$a[1];
				$menuData['title']=$value;
				$this->Menu_model->updateMenu($menuData);
			}	
			
			if(strstr($key,"menuLink_")){
				$a = explode("_",$key);
				$menuData['id']=$a[1];
				$menuData['link']=$value;
				$this->Menu_model->updateMenu($menuData);
			}	
			
			if(strstr($key,"link_")){
				$linkData = array();
				$a = explode("_",$key);
				$linkData['id'] = $a[1];
				$linkData['link'] = $value;
				$linkData['title'] = $this->input->post('linkTitle_'.$a[1]);
				$this->Menu_model->updateLink($linkData);
			}
					
			
		}//end foreach post
		redirect('/admin/menu/');
	}//end updateMenu


	function deleteMenu($id){
		$this->load->model('Menu_model');
		$this->Menu_model->deleteMenu($id);
		redirect('/admin/menu/');
	}

	function deleteLink($id){
		$this->load->model('Menu_model');
		$this->Menu_model->deleteLink($id);
		redirect('/admin/menu/');
	}
	
	function addMenu(){
		$this->load->model('Menu_model');
		$data['title']=$this->input->post('title');	
		$this->Menu_model->addMenu($data);
		redirect('/admin/menu/');
	}


}

