<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * User Contact Us Message Controller
 */
class Message extends MY_Controller
{
	
/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/
	public $master_path 	= 'backend/dashboard';		//set view master page 
	public $content_path 	= 'backend/message';		//set view partial page 
	public $redirect 		= 'Message';				//set where to redirect after set flash data
	public $name			= 'Message';					//set insert/update message
	public function set_model(){						//set model name as model
			$this->load->model('Messagemodel','model');
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
			$this->set_model();
	}

	public function preview_all(){
		$data['allFetchData'] = $this->model->get_all();
		$this->set_data_view($this->name,'all',$data);
	}

	public function soft_delete($id){
		$condition = $this->model->soft_delete($id);
		$this->set_flash_redir($condition,$this->name." Deleted Successfully!!","Failed to Delete");
	}




}



	




?>