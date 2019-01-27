<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Slider Controller
 */
class Slider extends MY_Controller
{
/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/
	public $master_path 	= 'backend/dashboard';		//set view master page 
	public $content_path 	= 'backend/slider';		//set view partial page 
	public $redirect 		= 'SliderCrud';				//set where to redirect after set flash data
	public $name			= 'Slider';					//set insert/update message
	public function set_model(){						//set model name as model
			$this->load->model('Slidermodel','model');
	}
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
		//user only access in notice.
			// $this->Usermodel->is_user_redir();
			$this->set_model();
	}

	public function preview_all(){
		$data['allFetchData'] = $this->model->get_all();
		$this->set_data_view($this->name,'all',$data);
	}


	public function create(){	
		$config['upload_path']          = './uploads/slider/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$this->load->library('upload', $config);

		// $this->form_validation->set_rules('slider_title', 'Title', 'required');
		if($this->upload->do_upload('slider_image') == TRUE):
			$data = $this->input->post();
			unset($data['submit']);

			$img_data = $this->upload->data();	
			$data['slider_image_path'] = $img_data['raw_name'].$img_data['file_ext'];

			return $this->set_flash_redir($this->model->insert($data),
				$this->name." Created Successfully",
				"Failed to Create!");

		else:
			$data['allFetchData'] = $this->model->get_all();
			$data['error'] = $this->upload->display_errors();
			$this->set_data_view($this->name,'all',$data);
		endif;
	}







	public function hard_delete($id,$img_name){	
		$res = $this->model->hard_delete($id);

		if($res){
			unlink('uploads/slider/'.$img_name);
			$this->set_flash_redir($res,"Delete Successfully","Delete Failed");
		}
		else{
			return False;
		}
	}

	public function edit($id)
	{
		$data['allFetchData'] = $this->model->findOrFail($id);
		$this->set_data_view('Edit '.$this->name,'edit',$data);
	}


	public function update($id,$img_name){

		$config['upload_path']          = './uploads/slider/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$this->load->library('upload', $config);

		// $this->form_validation->set_rules('slider_title', 'Title', 'required');

		// if($this->form_validation->run() == TRUE):
			if(!isset($_FILES['slider_image']) || $_FILES['slider_image']['error'] == UPLOAD_ERR_NO_FILE ):
					
				$data = $this->input->post();
				unset($data['submit']);
				return $this->set_flash_redir($this->model->update($id,$data),
				 							$this->name." Updated Successfully",
				 							"Failed to Update!");
			else:
				if($this->upload->do_upload('slider_image') == TRUE):
					$data = $this->input->post();
					unset($data['submit']);

					$img_data = $this->upload->data();	
					$data['slider_image_path'] = $img_data['raw_name'].$img_data['file_ext'];
					unlink('uploads/slider/'.$img_name);
					return $this->set_flash_redir($this->model->update($id,$data),
					 							$this->name." Updated Successfully",
					 							"Failed to Update!");
				else:
					$data['allFetchData'] = $this->model->findOrFail($id);
					$data['error'] = $this->upload->display_errors();
					$this->set_data_view('Edit '.$this->name,'edit',$data);
				endif;
			endif;
		// else:
		// 	$this->edit($id);
		// endif;
	}


}

?>