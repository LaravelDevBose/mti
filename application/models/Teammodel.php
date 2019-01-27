<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *Team Model
 */

class Teammodel extends CI_Model
{	

	private $table = 'tbl_team';
	private $id = 'team_id';
	private $title = 'team_title';
	private $desig = 'team_designation';
	private $img = 'team_image';
	private $status = 'status';
	
	function __construct()
	{
		parent::__construct();
	}
	public function get_all()
	{
		$query = $this->db->order_by($this->id, 'desc')->where_not_in($this->status,1)->get($this->table)->result();
		if($query)
			return $query;
		return FALSE;
	}
	
	public function soft_delete($id){
		$query = $this->db->set($this->status,1)->where($this->id,$id)->update($this->table);
		if($this->db->affected_rows()>0)
			return TRUE;
		return FALSE;
	
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