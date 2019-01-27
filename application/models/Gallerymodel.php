<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Gallery Model
 */

class Gallerymodel extends CI_Model
{	

	private $table = 'tbl_gallery';
	private $id = 'gallery_id';
	private $title = 'gallery_title';
	private $image_path = 'gallery_image_path';
	
	function __construct()
	{
		parent::__construct();
	}
	public function get_all()
	{
		$query = $this->db->order_by($this->id, 'desc')->get($this->table);
			if($query)
			return $query->result();
		return FALSE;
	}
	
	public function hard_delete($id){

		$query = $this->db->where($this->id,$id)->delete($this->table);

		if ($this->db->affected_rows() == 1) {
			return $query;
		}else {
			return FALSE;
		}
	}

	public function insert($array){
		$query = $this->db->insert($this->table,$array);
		if($query){
			return True;
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
		if($this->db->affected_rows()>0){
			return True;
		}else{
			return FALSE;
		}
	}

	public function get_limit_gallery()
	{
		$query = $this->db->order_by($this->id, 'desc')->limit(8)->get($this->table)->result();
		if($this->db->affected_rows()>0)
			return $query;
		return FALSE;
	}
}



 ?>