<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Role Model 
 */
class Rolemodel extends CI_Model
{
	private $table = 'tbl_roles';
	private $id = 'role_id';
	private $name = 'role_name';
	private $created_at = 'created_at';



	public function get_user_roles()
	{
		$query = $this->db->get($this->table)->result();
		if($query)
			return $query;
		return FALSE;
	}
	public function get_role_byID($roleid)
	{	$query = $this->db->where($this->id,$roleid)->get($this->table);
		if($this->db->affected_rows()>0)
			return $query->row();
		return FALSE;
	}

	public function not_get_this_role_ByID($roleid)
	{
		$query = $this->db->where_not_in($this->id,$roleid)->get($this->table);
		if($query){
			return $query->result();
		}
		return FALSE;
	}










}
















?>