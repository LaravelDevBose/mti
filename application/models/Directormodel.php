<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Director Message Model 
 */
class Directormodel extends CI_Model
{
	private $table = 'tbl_director_mess';
	private $id = 'director_id';
	private $title = 'director_title';
	private $img = 'director_image_path';
	private $des = 'director_des';


	public function insert($array){
		$query = $this->db->insert($this->table,$array);
		if($query)
			return TRUE;
		return FALSE;
	}
	
	public function get_last_row()
	{
		$query = $this->db->get($this->table);
		if($this->db->affected_rows()>0){
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