<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Header_note Controller
 */
class Header_note extends MY_controller
{
	
/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/
	public $master_path 	= 'backend/dashboard';		//set view master page 
	public $content_path 	= 'backend/header_notes';	//set view partial page 
	public $redirect 		= 'Notes';			//set where to redirect after set flash data
	public $name			= 'Note';					//set insert/update message
	public function set_model(){						//set model name as model
			$this->load->model('Header_notemodel','model');
	}
/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/	function __construct(){
		parent::__construct();
		if (!$this->Usermodel->is_user_loged_in()){
				redirect('Login/admin/?logged_in_first');
			}
		$this->set_model();
	}

	public function preview_all(){
		$data['noteFetchData'] = $this->model->get_all();
		$this->set_data_view($this->name,'show',$data);
	}

	public function get_note_by_position(){

		$position = $this->input->get('note_position');
		$row = $this->model->findOrFail($position);
		echo json_encode($row);
	}


	public function update(){
		
		$this->form_validation->set_rules('position', 'Position', 'required');
		$this->form_validation->set_rules('note_des', 'Description', 'required');
		if($this->form_validation->run() == TRUE):
			$post = $this->input->post();
			return $this->set_flash_redir($this->model->update($post),
				 							$post['note_position']." Updated Successfully",
				 							"Failed to Update!");

		else:
			$this->preview_all();
		endif;
		
		
	}

}


?>