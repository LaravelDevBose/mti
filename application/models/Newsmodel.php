<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * News Model
 */
date_default_timezone_set('Asia/Dhaka');

class Newsmodel extends CI_Model
{	

	private $table = 'tbl_news';
	private $id = 'news_id';
	private $title = 'news_title';
	private $des = 'news_des';
	private $img = 'news_image_path';
	private $created_at = 'created_at';
	private $updated_at = 'updated_at';
	private $del_status = 'del_status';
	private $added_by = 'added_by';
	
	function __construct()
	{
		parent::__construct();
	}
	public function get_all()
	{
		$query = $this->db->order_by($this->id, 'desc')->where_not_in($this->del_status,1)->get($this->table);
		if($query)
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

		$array['added_by'] = $this->session->userdata('user_id');
		$array['created_at'] = date('Y-m-d H:i:s');
		$array['updated_at'] = date('Y-m-d H:i:s');

		$query = $this->db->insert($this->table,$array);
		if($query)
			return TRUE;
		return FALSE;;
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
	{	$array['updated_at'] = date('Y-m-d H:i:s');
		$query = $this->db->where($this->id,$id)->update($this->table,$data);
		if($this->db->affected_rows()>0)
			return TRUE;
		return FALSE;
	}

	function readMoreHelper($string,$char = 100) {

	if (strlen($string) > 100) {
       $stringCut = substr($string, 0, $char);
       $endPoint = strrpos($stringCut, ' ');
       $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
	}
	return $string; 

} 
}



 ?>