<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * About Model 
 */
class Aboutmodel extends CI_Model
{
	private $table = 'tbl_about';
	private $id = 'about_id';
	private $title = 'about_title';
	private $img = 'about_image_path';
	private $des = 'about_des';


	public function insert($array){
		$query = $this->db->insert($this->table,$array);
		if($query)
			return TRUE;
		return FALSE;
	}
	
	public function get_last_row($type= Null)
	{
		$query = $this->db->where('type', $type)->get($this->table);
		if($query){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function findOrFail($id)
	{
		$query = $this->db->where($this->id,$id)->get($this->table);
		if($this->db->affected_rows()>0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function update($id,$data)
	{
		$query = $this->db->where($this->id,$id)->update($this->table,$data);
		if($this->db->affected_rows()>0)
			return TRUE;
		return FALSE;
	}






}
















?>