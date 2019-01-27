<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Contact Controller
 */
class Contact extends MY_Controller
{

/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/
	public $master_path 	= 'backend/dashboard';		//set view master page 
	public $content_path 	= 'backend/contact';		//set view partial page 
	public $redirect 		= 'ContactCrud';			//set redirect after set flash data
	public $name			= 'Contact';				//set insert/update message
	public function set_model(){						//set model name as model
			$this->load->model('Contactmodel','model');
	}
/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/


	function __construct(){
		parent::__construct();
		if (!$this->Usermodel->is_user_loged_in()){
				redirect('Login/admin/?logged_in_first');
			}
			//user only access in notice.
			$this->Usermodel->is_user_redir();

			$this->set_model();
	}

	public function preview_all(){	
		$data['allFetchData'] = $this->model->get_all();
		$this->set_data_view($this->name,'all',$data);
	}

	public function create(){	
		if($this->form_validation->run('create_contact_rule') == TRUE):
				$data = $this->input->post();
				unset($data['submit']);
				$data = $this->security->xss_clean($data);
				 return $this->set_flash_redir($this->model->insert($data),
				 							$this->name." Created Successfully",
				 							"Failed to Create!");
		else:
			$this->preview_all();
		endif;
	}




	public function soft_delete($id){
		$res = $this->model->soft_delete($id);
		return $this->set_flash_redir($res,"Delete Successfully","Delete Failed");
	}



	public function edit($id){
			$data['allFetchData'] = $this->model->findOrFail($id);
			$this->set_data_view('Edit '.$this->name,'edit',$data);
	}

	public function update($id){			
			if($this->form_validation->run('create_contact_rule') == TRUE):
				$data = $this->input->post();
				unset($data['submit']);
				$data = $this->security->xss_clean($data);
				return $this->set_flash_redir($this->model->update($id,$data),
				 							$this->name." Updated Successfully",
				 							"Failed to Update!");
			else:
			 	$this->edit($id);
			endif;
	}



}

 ?>