<?php

class Admin_model extends CI_Model {
	
	var $gallery_path;
	var $gallery_path_url;
	
	function Admin_model() {
		parent::__construct();
		
		$this->gallery_path = realpath(APPPATH . '../images');
		$this->gallery_path_url = base_url().'images/';
	}
	
	function getAll() {
		$q = $this->db->get('albums');
		
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
		return $data;
		}
	}
	
	function add_record($data) 
	{
		$this->db->insert('albums', $data);
		return;
	}
	
	function delete_row()
	{
		$this->db->where('albumID', $this->uri->segment(3));
		$this->db->delete('albums');
	}
	
	function delete_image()
	{
		$this->db->where('imageID', $this->uri->segment(4));
		$this->db->delete('images');
	}
	
	function update_record($data) 
	{
		$this->db->where('albumID', $data['albumID']);
		$this->db->update('albums', $data);
	}
	
	function updateImage($data) 
	{
		$this->db->where('imageID', $data['imageID']);
		$this->db->update('images', $data);
	}
	
	function getImages() 
	{
		$this->db->select('*');
		$this->db->from('images');
		$this->db->join('albums', 'albums.albumID=images.albumID', 'inner');
		$this->db->where("albums.albumID", $this->uri->segment(3));
		$q = $this->db->get();
		$data=array();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$path = $this->gallery_path_url .'thumbs/'. $row->filename;
				$imageID = $row->imageID;
				$title=$row->title;
				$description=$row->description;
				$imageData = array("path" => $path, "imageID" => $imageID, "title" => $title, "description" => $description);
				$data[]=$imageData;
			}
		}
		return $data;
	}
	
	function getAlbumName()
	{
		$this->db->where("albumID", $this->uri->segment(3));
		$q=$this->db->get('albums');
		$data="";
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data = $row->name;
			}
		}
		return $data;
		
	}
	
	function do_upload() {
		
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path,
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		
		if($image_data['is_image'])
		{
		
			$config = array(
				'source_image' => $image_data['full_path'],
				'new_image' => $this->gallery_path . '/thumbs',
				'maintain_ration' => true,
				'width' => 150,
				'height' => 100
			);
			
			
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			
			
			$data = array(
				'filename'=>$image_data['file_name'],
				'albumID'=>$this->uri->segment(3)
			);
			$this->db->insert('images', $data);
		}
	}
	
}