<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User Model 
 */
class Usermodel extends CI_Model
{
	private $table = 'tbl_users';
	private $id = 'user_id';
	private $fname = 'first_name';
	private $lname = 'last_name';
	private $username = 'user_name';
	private $useremail = 'user_email';
	private $userpass = 'user_password';
	private $role_id = 'role_id';
	private $is_active = 'is_active';
	private $created_at = 'created_at';
	private $del_status = 'del_status';


	public function is_user_loged_in()
	{	
		return $this->session->userdata('user_id') != FALSE;
	}
	
	public function is_user_redir(){
		if($this->session->userdata('role') != 1)
			redirect('Notice');
	}

	public function get_all()
	{
		$query = $this->db->order_by($this->id, 'desc')->where_not_in($this->del_status,1)->get($this->table)->result();
		return $query;
	}

	
	public function insert($array){

		$array[$this->is_active]=1;
		$query = $this->db->insert($this->table,$array);
		if($query)
			return TRUE;
		return FALSE;
	}

	public function soft_delete($id)
	{
		$query = $this->db->set($this->del_status,1)->where($this->id,$id)->update($this->table);
		if($this->db->affected_rows()>0)
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
		$array[$this->is_active]=1;
		$query = $this->db->where($this->id,$id)->update($this->table,$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function user_login_data_check($username,$password)
	{
		$query = $this->db->where([$this->username=>$username,
								   $this->userpass=>$password
								  ])
						  ->get($this->table);

		if ($query->num_rows()){
			
			if($query->row()->del_status == 0){
				return $query->row();
			}else {
				return FALSE;
			}

		}else{
			return FALSE;
		}
	}


	// User and Role Table INNER JOIN Data
	public function get_join_data(){
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_roles','tbl_roles.role_id = tbl_users.role_id','inner');
		$this->db->order_by('user_id','desc');
		$this->db->where_not_in('del_status',1);
		$query = $this->db->get();
		return $query->result();
	}

	public function find_join_data($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_roles','tbl_roles.role_id = tbl_users.role_id','inner');
		$this->db->where('user_id',$id);
		$query = $this->db->get();
		if($query)
			return $query->row();
		return FALSE;
	}


}
















?>