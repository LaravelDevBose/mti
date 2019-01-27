<?php

/**
 * Login Controller
 */
class Login extends MY_Controller
{
	

	public function preview_login_page()
	{
		if($this->session->userdata('user_id'))
			return redirect('Dashboard');
		$this->load->view('frontend/login_page');
	}

	public function user_login()
	{
		$this->form_validation->set_rules('loginUsername', 'Username', 'trim|min_length[3]');
		$this->form_validation->set_rules('loginPassword', 'Password', 'trim|min_length[5]');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run() == FALSE)
		{	

			$this->load->view('frontend/login_page');
		}
		else{

			$loginUsername = $this->input->post('loginUsername');
			$loginPassword = md5($this->input->post('loginPassword'));
			

			$this->load->model('Usermodel');
			$row = $this->Usermodel->user_login_data_check($loginUsername,$loginPassword);
			if ($row->user_id) {
				$this->session->set_userdata('user_id',$row->user_id);
				$this->session->set_userdata('fname',$row->first_name);
				$this->session->set_userdata('role',$row->role_id);
				return redirect('Dashboard');
			}else{

				$this->session->set_flashdata('login_failed', 'Invalid Username/Password.');
				return redirect('Login/admin');
			}
			
		}
	}

	public function logout(){
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('fname');
		$this->session->unset_userdata('role');
		$this->session->sess_destroy();

		return redirect('/');
	}
}


?>