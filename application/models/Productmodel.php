<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *Product Model
 */

class Productmodel extends CI_Model
{	

	private $table = 'tbl_product';
	private $id = 'id';
	private $title = 'title';
	private $des = 'des';
	private $img = 'img';
	private $company_id = 'c_id';
	private $status = 'status';
	
	function __construct()
	{
		parent::__construct();
	}
	public function get_all()
	{
		$query = $this->db->order_by($this->id, 'desc')->where_not_in($this->status,1)->get($this->table);
		if($query)
			return $query->result();
		return FALSE;
	}
	public function product_name()
	{
		$query = $this->db->select('id,title')->order_by($this->id, 'desc')->where_not_in($this->status,1)->get($this->table);
		if($query)
			return $query->result();
		return FALSE;
	}

	public function get_limit($l)
	{
		$query = $this->db->order_by($this->id, 'desc')->where_not_in($this->status,1)->limit($l)->get($this->table);
		if($query)
			return $query->result();
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
	

	public function get_product_by_companyID($id)
	{
		$query = $this->db->order_by($this->id, 'desc')->where('c_id',$id)->where_not_in($this->status,1)->get($this->table);
		if($query)
			return $query->result();
		return FALSE;
	}

	// public function get_join_data(){
	// 	$query = $this->db->select('*')
	// 					  ->from('tbl_company')
	// 					  ->join('tbl_product','tbl_product.c_id = tbl_company.id')
	// 					  ->get();
	// 	if($query)
	// 		return $query->result();
	// 	return FALSE;

	// }
}



 ?>