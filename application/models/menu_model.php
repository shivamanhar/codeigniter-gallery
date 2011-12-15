<?php

class Menu_model extends CI_Model {
	

	function Menu_model() {
		parent::__construct();
	}
	
	function getMenu() {
		$q1 = $this->db->get('links');
		$links = array();
		if($q1->num_rows() > 0) {
			foreach ($q1->result() as $row) {
			    $links[] = array('id'=>$row->id,'title'=>$row->title, 'link'=>$row->link,'menuID'=> $row->menuID);
			}
		}
		$q2 = $this->db->get('menus');
		$menus=array();
		if($q2->num_rows() > 0) {
			foreach ($q2->result() as $row) {
				$menulinks=array();
				foreach($links as $link){
					if($link['menuID']==$row->id){
						$menulinks[]=$link;
					}
				}
				$menu[]=array('id'=>$row->id,'title'=> $row->title,'link'=>$row->link, 'links'=>$menulinks);
				$menus[] = $menu;
				$menu=array();
			}
		}
		return $menus;
		
	}
	
	function showMenuList($menuID) {
		$str = "<ul>";
		$this->db->where('menuID',$menuID);
		$q1 = $this->db->get('links');
		$links = array();
		if($q1->num_rows() > 0) {
			foreach ($q1->result() as $row) {
			    $str .= '<li>'.anchor("$row->link","$row->title").'</li>';
			}
		}
		$str .= "</ul>";
		return $str;
		
	}
	
	function addLink($data) {
		$this->db->insert('links', $data);
		return;
		
	}

	function updateMenu($data) {
		$this->db->where('id',$data['id']);
		$this->db->update('menus', $data);
	}
	
	function updateLink($data) {
		$this->db->where('id',$data['id']);
		$this->db->update('links',$data);
	}
	
	function deleteMenu($id) {
		$this->db->where('id',$id);
		$this->db->delete('menus');
	}
	
	function deleteLink($id) {
		$this->db->where('id',$id);
		$this->db->delete('links');
	}
	
	function addMenu($data) {
		$this->db->insert('menus',$data);
		return;
	}
	
}