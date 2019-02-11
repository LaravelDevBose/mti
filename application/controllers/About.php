<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * About Controller
 */
class About extends MY_controller
{
	
/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/
	public $master_path 	= 'backend/dashboard';		//set view master page 
	public $content_path 	= 'backend/about';		//set view partial page 
	public $redirect 		= '';					//set where to redirect after set flash data
	public $name			= '';					//set insert/update message
	public function set_model(){						//set model name as model
			$this->load->model('Aboutmodel','model');
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

	public function preview_about($type){
		$data['type'] = $type;
		$data['aboutFetchData'] = $this->model->get_last_row($type);
		$this->set_data_view($this->name,'show_about',$data);
	}

	public function update($id,$img_name){

		$config['upload_path']          = './uploads/about/';
		$config['allowed_types']        = 'jpg|png|jpeg|pdf';
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('about_title', 'Title', 'required');
		$this->form_validation->set_rules('about_des', 'Description', 'required');

		$this->redirect ='About/'.$this->input->post('type');
		$this->name =ucfirst($this->input->post('type'));

		if($this->form_validation->run() == TRUE):
            $pdf = $this->input->post('old_pdf');

			if(!isset($_FILES['about_image']) || $_FILES['about_image']['error'] == UPLOAD_ERR_NO_FILE ):
					
				$data = $this->input->post();
                if($this->upload->do_upload('about_pdf') == TRUE){
                    $pdf_data = $this->upload->data();
                        unlink('uploads/about/'.$pdf);
                    $data['pdf_path'] = $pdf_data['raw_name'].$pdf_data['file_ext'];
                }

				unset($data['submit']);
                unset($data['old_pdf']);
				return $this->set_flash_redir($this->model->update($id,$data),
				 							$this->name." Updated Successfully",
				 							"Failed to Update!");
			else:
				if($this->upload->do_upload('about_image') == TRUE):
					$data = $this->input->post();
					unset($data['submit']);
                    unset($data['old_pdf']);

					$img_data = $this->upload->data();	
					$data['about_image_path'] = $img_data['raw_name'].$img_data['file_ext'];
					unlink('uploads/about/'.$img_name);
                    if($this->upload->do_upload('about_pdf') == TRUE){
                        $pdf_data = $this->upload->data();
                        if(file_exists('uploads/about/'.$pdf)){
                            unlink('uploads/about/'.$pdf);
                        }

                        $data['pdf_path'] = $pdf_data['raw_name'].$pdf_data['file_ext'];
                    }

					return $this->set_flash_redir($this->model->update($id,$data),
					 $this->name." Updated Successfully","Failed to Update!");
				else:
					$data['aboutFetchData'] = $this->model->findOrFail($id);
					$data['error'] = $this->upload->display_errors();
					$this->set_data_view($this->name,'show_about',$data);
				endif;
			endif;
		else:
			$data['aboutFetchData'] = $this->model->findOrFail($id);
			$this->set_data_view($this->name,'show_about',$data);
		endif;
	}

}


?>