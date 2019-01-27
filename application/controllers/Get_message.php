<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * User Contact Us Get Message Controller
 */
class Get_message extends MY_Controller
{
	
/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/
	public $master_path 	= 'frontend/master';		//set view master page 
	public $content_path 	= 'frontend/contact';		//set view partial page 
	public $redirect 		= 'contact_us';	 			//set where to redirect after set flash data
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
			$this->set_model();
	}

	//message post get form user and save it to database.
	public function get_message(){
		// $this->p_r($this->input->post());
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('subject','Subject','required');
		$this->form_validation->set_rules('message','Message','required');

		if($this->form_validation->run() == TRUE):
			$data = $this->input->post();
			unset($data['submit']);
			$data = $this->security->xss_clean($data);
			$condition = $this->model->insert($data);
			$this->set_flash_redir($condition,"Your Message Send Successfully!!","Failed To Send Message");
		else:
			$this->set_flash_redir(False,"",validation_errors());
		endif;
	}

}



	




?>