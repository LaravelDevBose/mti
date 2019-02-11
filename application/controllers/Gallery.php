<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Gallery Controller
 */
class Gallery extends MY_Controller
{
/*
|----------------------------------------------------------------------------------------
| Initilize Every Controller 
|----------------------------------------------------------------------------------------
*/
	public $master_path 	= 'backend/dashboard';		//set view master page 
	public $content_path 	= 'backend/gallery';		//set view partial page 
	public $redirect 		= 'GalleryCrud';			//set redirect after set flash data
	public $name			= 'Gallery';				//set insert/update message
	public function set_model(){						//set model name as model
			$this->load->model('Gallerymodel','model');
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
		//$this->Usermodel->is_user_redir();
		$this->set_model();
	}

	public function preview_all(){
		$data['allFetchData'] = $this->model->get_all();
		$this->set_data_view('Gallery','all',$data);
	}


	public function create(){	
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('gallery_title', 'Title', 'required');
		if($this->form_validation->run() == TRUE) {
		    if($this->input->post('gallery_type') == 'image'){
                if ($this->upload->do_upload('gallery_image') == TRUE) {
                    $data = $this->input->post();
                    unset($data['submit']);

                    $img_data = $this->upload->data();
                    $data['gallery_image_path'] = $img_data['raw_name'] . $img_data['file_ext'];
                    return $this->set_flash_redir($this->model->insert($data),
                        $this->name . " Created Successfully",
                        "Failed to Create!");
                }else{
                    $data['allFetchData'] = $this->model->get_all();
                    $data['error'] = $this->upload->display_errors();
                    $this->set_data_view('Gallery', 'all', $data);
                }
            }else{
                $data = $this->input->post();
                unset($data['submit']);
                return $this->set_flash_redir($this->model->insert($data),
                    $this->name . " Created Successfully",
                    "Failed to Create!");
            }

        }else {
            $data['allFetchData'] = $this->model->get_all();
            $data['error'] = $this->upload->display_errors();
            $this->set_data_view('Gallery', 'all', $data);
        }
	}


	public function hard_delete($id){
	    $info = $this->db->where('gallery_id', $id)->get('tbl_gallery')->row();

		$res = $this->model->hard_delete($id);

		if($res){
		    if($info->gallary_type == 'image'){
                $img_name = $info->gallery_image_path;
                unlink('uploads/'.$img_name);
            }

			$this->set_flash_redir($res,"Delete Successfully","Delete Failed");
		}
		else{
			return False;
		}
	}


	public function edit($id){

		$data['allFetchData'] = $this->model->findOrFail($id);
		$this->set_data_view('Edit Gallery','edit',$data);
	}


	public function update($id){

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('gallery_title', 'Title', 'required');

		if($this->form_validation->run() == TRUE) {

            if($this->input->post('gallery_type') == 'video'){
                $data = $this->input->post();
                unset($data['submit']);
                return $this->set_flash_redir($this->model->update($id, $data),
                    $this->name . " Updated Successfully",
                    "Failed to Update!");
            }else{
                $img_name = $this->input->post('old_path');
                if (!isset($_FILES['gallery_image']) || $_FILES['gallery_image']['error'] == UPLOAD_ERR_NO_FILE) {

                    $data = $this->input->post();
                    unset($data['submit']);
                    unset($data['old_path']);
                    return $this->set_flash_redir($this->model->update($id, $data),
                        $this->name . " Updated Successfully",
                        "Failed to Update!");
                }else {
                    if ($this->upload->do_upload('gallery_image') == TRUE):
                        $data = $this->input->post();
                        unset($data['submit']);
                        unset($data['old_path']);
                        $img_data = $this->upload->data();
                        $data['gallery_image_path'] = $img_data['raw_name'] . $img_data['file_ext'];
                        unlink('uploads/' . $img_name);
                        return $this->set_flash_redir($this->model->update($id, $data),
                            $this->name . " Updated Successfully",
                            "Failed to Update!");
                    else:
                        $data['allFetchData'] = $this->model->findOrFail($id);
                        $data['error'] = $this->upload->display_errors();
                        $this->set_data_view('Edit Gallery', 'edit', $data);
                    endif;
                }
            }
        }else{
            $this->edit($id);
        }
	}


}

?>