<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{	
/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/
	public $master_path 	= 'backend/dashboard';		//set view master page 
	public $content_path 	= 'backend/user';			//set view partial page 
	public $redirect 		= 'Users';					//set redirect path after set flash data
	public $name			= 'User';					//set insert/update message/title
	public function set_model(){						//set model name as model
			$this->load->model('Usermodel','model');
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
	
	public function index(){
		$this->set_data_view('Dashboard','../partials/dashboard_content');		
	}

	public function preview_all(){	
		$data = [
			'roles'			=> $this->Rolemodel->get_user_roles(),
			// 'allFetchData'	=> $this->model->get_all(),
			'allFetchData'	=> $this->model->get_join_data(),
		];
		$this->set_data_view($this->name,'all',$data);
	}

	public function create(){
		
		if($this->form_validation->run('create_user_rule') == TRUE):
			$post = $this->input->post();
			$post['user_password'] 	=	md5($post['user_password']);
			$post['created_at']		=	date('Y-m-d H:i:s');
			unset($post['submit']);
			$post = $this->security->xss_clean($post);
			 return $this->set_flash_redir($this->model->insert($post),
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
		$data = [
			'roles'			=> $this->Rolemodel->get_user_roles(),
			// 'userFetchData'	=> $this->model->findOrFail($id),
			'userFetchData'	=> $this->model->find_join_data($id),
		];

		// $this->p_r($data['userFetchData']);

		$this->set_data_view('Edit '.$this->name,'edit',$data);

	}

	public function update($id){
		if($this->form_validation->run('update_user_rule') == TRUE):
			$post = $this->input->post();
			$post['user_password'] = md5($post['user_password']); 
			$post['created_at'] = date('Y-m-d H:i:s');
			unset($post['submit']);
			$post = $this->security->xss_clean($post);
			 return $this->set_flash_redir($this->model->update($id,$post),
			 							$this->name." Updated Successfully",
			 							"Failed to Update!");
		else:
		 	$this->edit($id);
		endif;
	}

}






?>