<?php

class Album_model extends CI_Model {
	
	var $gallery_path;
	var $gallery_path_url;
	var $thumb_path_url;
	
	function Album_model() {
		parent::__construct();
		
		$this->gallery_path = realpath(APPPATH . '../images');
		$this->gallery_path_url = base_url().'images/';
		$this->thumb_path_url =  $this->gallery_path_url. 'thumbs/';
	}
	
	function getImages() {
		$this->db->select('*');
		$this->db->from('images');
		$this->db->join('albums', 'albums.albumID=images.albumID', 'inner');
		$this->db->where("slug", $this->uri->segment(2));
		$q = $this->db->get();
		$data=array();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $imagePath = $this->gallery_path_url . $row->filename;
				$thumbPath = $this->thumb_path_url . $row->filename;
				$data[] = array('imagePath'=>$imagePath,'thumbPath'=>$thumbPath, 'title'=>$row->title, 'description'=>$row->description);
			}
		return $data;
		}
		
		
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
	
	
}