/*
|--------------------------------------------------------------------------
| Initilize Every Controller 
|--------------------------------------------------------------------------
*/
	public $master_path 	= 'backend/dashboard';		//set view master page 
	public $content_path 	= 'backend/partials';		//set view partial page 
	public $redirect 		= 'ContactCrud';			//set where to redirect after set flash data
	public $name			= 'Contact';				//set insert/update message
	public function set_model(){						//set model name as model
			$this->load->model('Contactmodel','model');
	}
/*
|--------------------------------------------------------------------------
| Initilize Every Controller 
|--------------------------------------------------------------------------
*/