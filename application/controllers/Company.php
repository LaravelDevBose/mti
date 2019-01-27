<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Company Controller
*/
class Company extends MY_Controller
{

/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/
	public $name			= 'Company';				//set insert/update message
	public $modelname		= 'Companymodel';			//set model name

	public $master_path 	= 'backend/dashboard';		//set view master page 
	public $content_path 	= 'backend/company';		//set view partial page 
	public $redirect 		= 'Company';				//set redirect after set flash data
	
	public $create 			= 'Company/Create';			//set action route for create
	public $update 			= 'Company/Update';			//set action route for update
	public $edit 			= 'Company/Edit';			//set action route for edit
	public $delete 			= 'Company/Delete';			//set action route for delete

/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/

	function __construct()
	{
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
		$config['upload_path']          = './uploads/company/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('title', 'Name', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('des', 'Description', 'required');
		if($this->form_validation->run() == TRUE && $this->upload->do_upload('img') == TRUE):
			$data = $this->input->post();
			unset($data['submit']);

			$img_data = $this->upload->data();	
			$data['img'] = $img_data['raw_name'].$img_data['file_ext'];

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
		$res = $this->model->soft_delete($id);
		return $this->set_flash_redir($res,"Delete Successfully","Delete Failed");
	}



	public function edit($id){
			$data['allFetchData'] = $this->model->findOrFail($id);
			$this->set_data_view('Edit '.$this->name,'edit',$data);
	}

	public function update($id,$img_name){

		$config['upload_path']          = './uploads/company';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('title', 'Name', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('des', 'Description', 'required');

		if($this->form_validation->run() == TRUE):
			if(!isset($_FILES['img']) || $_FILES['img']['error'] == UPLOAD_ERR_NO_FILE ):
					
				$data = $this->input->post();
				unset($data['submit']);
				return $this->set_flash_redir($this->model->update($id,$data),
				 							$this->name." Updated Successfully",
				 							"Failed to Update!");
			else:
				if($this->upload->do_upload('img') == TRUE):
					$data = $this->input->post();
					unset($data['submit']);

					$img_data = $this->upload->data();	
					$data['img'] = $img_data['raw_name'].$img_data['file_ext'];
					unlink('uploads/company/'.$img_name);
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