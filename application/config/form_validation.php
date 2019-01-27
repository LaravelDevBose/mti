<?php 
$config = [

		'create_user_rule'	=>[

							[
								'field' => 'first_name',
								'label'	=> 'First Name',
								'rules'	=>	'required'
							],
							[
								'field' => 'last_name',
								'label'	=> 'Last Name',
								'rules'	=>	'required'
							],
							[
								'field' => 'user_name',
								'label'	=> 'Username',
								'rules'	=>	'required'
							],
							[
								'field' => 'user_email',
								'label'	=> 'Email',
								'rules'	=>	'required'
							],
							[
								'field' => 'user_password',
								'label'	=> 'Password',
								'rules'	=>	'required'
							],
							[
								'field' => 'role_id',
								'label'	=> 'Role Type',
								'rules'	=>	'required'
							],

		],
		'update_user_rule'	=>[

							[
								'field' => 'first_name',
								'label'	=> 'First Name',
								'rules'	=>	'required'
							],
							[
								'field' => 'last_name',
								'label'	=> 'Last Name',
								'rules'	=>	'required'
							],
							[
								'field' => 'user_name',
								'label'	=> 'Username',
								'rules'	=>	'required'
							],
							[
								'field' => 'user_email',
								'label'	=> 'Email',
								'rules'	=>	'required'
							],
							[
								'field' => 'user_password',
								'label'	=> 'Password',
								'rules'	=>	'required|min_length[8]'
							],
							[
								'field' => 'role_id',
								'label'	=> 'Role Type',
								'rules'	=>	'required'
							],

		],
		'get_message_rule' =>[
							[
								'field' => 'name',
								'label'	=> 'Name',
								'rules'	=> 'required'
							],
							[
								'field' => 'email',
								'label'	=> 'Email',
								'rules'	=> 'required|valid_email'
							],
							[
								'field' => 'subject',
								'label'	=> 'Subject',
								'rules'	=> 'required'
							],
							[
								'field' => 'message',
								'label'	=> 'Message',
								'rules'	=> 'required'
							],

		],
		'create_contact_rule'=>[

							[
								'field' => 'contact_phone',
								'label'	=> 'Phone Number',
								'rules'	=> 'required|numeric|min_length[11]'
							],
							[
								'field' => 'contact_email',
								'label'	=> 'Email',
								'rules'	=> 'required|valid_email'	
							],
							[
								'field' => 'contact_location',
								'label'	=> 'Location',
								'rules'	=> 'required'	
							],
		],


];
 ?>