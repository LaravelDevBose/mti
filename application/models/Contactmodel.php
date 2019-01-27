<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Contact Model
 */

class Contactmodel extends CI_Model
{	

	private $table = 'tbl_contact_us';
	private $id = 'contact_id';
	private $phone = 'contact_phone';
	private $email = 'contact_email';
	private $location = 'contact_location';
	private $del_status = 'del_status';
	
	function __construct()
	{
		parent::__construct();
	}
	public function get_all()
	{
		$query = $this->db->order_by($this->id, 'desc')->where_not_in($this->del_status,1)->get($this->table)->result();
		if($query)
			return $query;
		return FALSE;
	}
	
	public function soft_delete($id){
		$this->db->set($this->del_status,1)->where($this->id,$id)->update($this->table);
		if($this->db->affected_rows()>0)
			return TRUE;
		return FALSE;
	}

	public function insert($array){
		$query = $this->db->insert($this->table,$array);
		if($query)
			return TRUE;
		return FALSE;
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

	public function get_last_contact_row(){
		$query = $this->db->order_by($this->id,'desc')->where_not_in($this->del_status,1)->get($this->table);
		if($this->db->affected_rows()>0){
			return $query->row();
		}
		return False;
	}
}



 ?>