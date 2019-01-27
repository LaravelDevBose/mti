<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Company Model
 */

class Companymodel extends CI_Model
{	

	private $table = 'tbl_company';
	private $id = 'id';
	private $title = 'title';
	private $url = 'url';
	private $des = 'des';
	private $img = 'img';
	private $status = 'status';
	
	function __construct()
	{
		parent::__construct();
	}
	public function get_all()
	{
		$query = $this->db->order_by($this->id, 'desc')->where_not_in($this->status,1)->get($this->table);
		if($query->num_rows())
			return $query->result();
		return FALSE;
	}
	public function get_limit($l)
	{
		$query = $this->db->order_by($this->id, 'desc')->where_not_in($this->status,1)->limit($l)->get($this->table);
		if($query->num_rows())
			return $query->result();
		return FALSE;
	}
	public function get_last_row($type= Null)
	{
		$query = $this->db->order_by($this->id, 'desc')->get($this->table);
		if($query){
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	public function soft_delete($id){
		$query = $this->db->set($this->status,1)->where($this->id,$id)->update($this->table);
		if($this->db->affected_rows()>0)
			return TRUE;
		return FALSE;
	
	}

	public function insert($array){
		return $query = $this->db->insert($this->table,$array);
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

	public function get_not_where_not_in($id){
		$query = $this->db->order_by($this->id,'DESC')->where_not_in($this->id,$id)->where_not_in($this->status,1)->get($this->table);
		if($query->num_rows())
			return $query->result();
		return FLASE;
	}
}



 ?>