<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User Contact US Message Model
 */

class Messagemodel extends CI_Model
{	

	private $table = 'tbl_message';
	private $id = 'message_id';
	private $name = 'name';
	private $email = 'email';
	private $subject = 'subject';
	private $message = 'message';
	private $del_status = 'del_status';
	
	function __construct()
	{
		parent::__construct();
	}
	public function get_all()
	{
		$query = $this->db->order_by($this->id, 'desc')->where_not_in($this->del_status,1)->get($this->table);
		if($this->db->affected_rows()>0)
			return $query->result();
		return FALSE;
	}
	
	public function soft_delete($id){
		$query = $this->db->set($this->del_status,1)->where($this->id,$id)->update($this->table);
		if($this->db->affected_rows()>0)
			return TRUE;
		return FALSE;
	}

	public function insert($array){
		$array[$this->del_status] = 0;
		$query = $this->db->insert($this->table,$array);
		if ($query) 
			return TRUE;
		return FALSE;
	}
}



 ?>