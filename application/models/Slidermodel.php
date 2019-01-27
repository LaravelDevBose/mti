<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Slider Model
 */

class Slidermodel extends CI_Model
{	

	private $table = 'tbl_slider';
	private $id = 'slider_id';
	private $title = 'slider_title';
	private $tag = 'slider_tag';
	private $image_path = 'slider_image_path';
	
	function __construct()
	{
		parent::__construct();
	}
	public function get_all()
	{
		$query = $this->db->order_by($this->id, 'desc')->get($this->table)->result();
		if($query)
			return $query;
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
}



 ?>