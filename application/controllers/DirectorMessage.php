<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * director Message Controller
 */
class DirectorMessage extends MY_controller
{
	
/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/
	public $master_path 	= 'backend/dashboard';		//set view master page 
	public $content_path 	= 'backend/director_message';		//set view partial page 
	public $redirect 		= 'Director';				//set where to redirect after set flash data
	public $name			= 'Director Message';		//set insert/update message
	public function set_model(){						//set model name as model
			$this->load->model('Directormodel','model');
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
		//user only access in notice.
		//$this->Usermodel->is_user_redir();
		$this->set_model();
	}

	public function preview_director(){
		$data['allFetchData'] = $this->model->get_last_row();
		$this->set_data_view($this->name,'show_director_mess',$data);
	}

	public function update($id,$img_name){

		$config['upload_path']          = './uploads/director/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('director_title', 'Title', 'required');
		$this->form_validation->set_rules('director_des', 'Description', 'required');

		if($this->form_validation->run() == TRUE):
			if(!isset($_FILES['director_image']) || $_FILES['director_image']['error'] == UPLOAD_ERR_NO_FILE ):
					
				$data = $this->input->post();
				unset($data['submit']);
				return $this->set_flash_redir($this->model->update($id,$data),
				 							$this->name." Updated Successfully",
				 							"Failed to Update!");
			else:
				if($this->upload->do_upload('director_image') == TRUE):
					$data = $this->input->post();
					unset($data['submit']);

					$img_data = $this->upload->data();	
					$data['director_image_path'] = $img_data['raw_name'].$img_data['file_ext'];
					unlink('uploads/director/'.$img_name);
					return $this->set_flash_redir($this->model->update($id,$data),
					 							$this->name." Updated Successfully",
					 							"Failed to Update!");
				else:
					$data['allFetchData'] = $this->model->findOrFail($id);
					$data['error'] = $this->upload->display_errors();
					$this->set_data_view($this->name,'show_director_mess',$data);
				endif;
			endif;
		else:
			$data['allFetchData'] = $this->model->findOrFail($id);
			$this->set_data_view($this->name,'show_director_mess',$data);
		endif;
	}

}


?>