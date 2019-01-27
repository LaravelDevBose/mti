<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Header note Model 
 */
class Header_notemodel extends CI_Model
{
	private $table = 'tbl_header_note';
	private $id = 'note_id';
	private $des = 'note_des';
	private $position = 'note_position';


	public function insert($array){
		$query = $this->db->insert($this->table,$array);
		if($query)
			return TRUE;
		return FALSE;
	}
	
		

	public function findOrFail($position)
	{
		$query = $this->db->where($this->position,$position)->get($this->table);
		if($this->db->affected_rows()>0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function update($post){
		unset($post['submit']);

		$query = $this->db->set('note_des',$post["note_des"])->where($this->position,$post['position'])->update($this->table);
		if($this->db->affected_rows()>0)
			return TRUE;
		return FALSE;
	}


	public function get_all()
	{
		$query = $this->db->order_by($this->id, 'desc')->get($this->table);
		if($query)
			return $query->result();
		return FALSE;
	}





}
















?>