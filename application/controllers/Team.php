<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Team Controller
 */
class Team extends MY_Controller
{
/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/
	public $master_path 	= 'backend/dashboard';		//set view master page 
	public $content_path 	= 'backend/team';			//set view partial page 
	public $redirect 		= 'Team';					//set redirect after set flash data
	public $name			= 'Team';					//set insert/update message
	public $modelname		= 'Teammodel';				//set model name

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
		$this->load->model($this->modelname,'model');
	}

	public function preview_all(){
		$data['allFetchData'] = $this->model->get_all();
		$this->set_data_view($this->name,'all',$data);
	}


	public function create(){	
		$config['upload_path']          = './uploads/team';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('team_name', 'Name', 'required');
		$this->form_validation->set_rules('team_designation', 'Designation', 'required');

		if($this->form_validation->run() == TRUE && $this->upload->do_upload('team_image') == TRUE):
			$data = $this->input->post();
			unset($data['submit']);

			$img_data = $this->upload->data();	
			$data['team_image'] = $img_data['raw_name'].$img_data['file_ext'];
			return $this->set_flash_redir($this->model->insert($data),
				$this->name." Created Successfully",
				"Failed to Create!");
			
		else:
			$data['allFetchData'] = $this->model->get_all();
			$data['error'] = $this->upload->display_errors();
			$this->set_data_view($this->name,'all',$data);
		endif;
	}


	public function soft_delete($id){
		$condition = $this->model->soft_delete($id);
		$this->set_flash_redir($condition,$this->name." Deleted Successfully!!","Failed to Delete");
	}


	public function edit($id){

		$data['allFetchData'] = $this->model->findOrFail($id);
		$this->set_data_view('Edit '.$this->name,'edit',$data);
	}


	public function update($id,$img_name){

		$config['upload_path']          = './uploads/team';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('team_name', 'Name', 'required');
		$this->form_validation->set_rules('team_designation', 'Designation', 'required');

		if($this->form_validation->run() == TRUE):
			if(!isset($_FILES['team_image']) || $_FILES['team_image']['error'] == UPLOAD_ERR_NO_FILE ):
					
				$data = $this->input->post();
				unset($data['submit']);
				return $this->set_flash_redir($this->model->update($id,$data),
				 							$this->name." Updated Successfully",
				 							"Failed to Update!");
			else:
				if($this->upload->do_upload('team_image') == TRUE):
					$data = $this->input->post();
					unset($data['submit']);

					$img_data = $this->upload->data();	
					$data['team_image'] = $img_data['raw_name'].$img_data['file_ext'];
					unlink('uploads/team/'.$img_name);
					return $this->set_flash_redir($this->model->update($id,$data),
					 							$this->name." Updated Successfully",
					 							"Failed to Update!");
				else:
					$data['allFetchData'] = $this->model->findOrFail($id);
					$data['error'] = $this->upload->display_errors();
					$this->set_data_view('Edit '.$this->name,'edit',$data);
				endif;
			endif;
		else:
			$this->edit($id);
		endif;
	}


}

?>