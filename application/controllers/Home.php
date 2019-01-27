<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	
	function __construct()
	{
		parent::__construct();
		$vars['contactUs'] 		= $this->Contactmodel->get_last_contact_row();
		$vars['products']	=	$this->Productmodel->get_all();
		$vars['events']		=	$this->Newsmodel->get_all();
		$vars['video']		= $this->Videomodel->last_video();
		$vars['production'] = $this->Servicemodel->get_all();
		$vars['galarys'] = $this->Gallerymodel->get_limit_gallery();
		$this->load->vars( $vars);

	}

	public function index()
	{	
		$data['title'] 	 = 'Home';
		$data['sliders'] = $this->Slidermodel->get_all();
		$data['about'] 	 = $this->Aboutmodel->get_last_row('about');
		$data['welcome'] = $this->Aboutmodel->get_last_row('welcome');
		$data['profile'] = $this->Aboutmodel->get_last_row('profile');
		$data['content'] = 'home/home_page';
		$this->load->view('frontend/master',$data);
	}

	public function product_page_view($id = Null)
	{
		$data['title'] = 'Home';
		$data['content'] = 'product/product';
		$data['product']	=	$this->Productmodel->findOrFail($id);
		$this->load->view('frontend/master',$data);
	}

	public function production_unit_view($id = Null){
		$data['title'] = 'Home';
		$data['content'] = 'production/production_page';
		$data['productio'] = $this->Servicemodel->findOrFail($id);
		$this->load->view('frontend/master',$data);
	}

	public function about_us_page()
	{
		$data['title'] = 'About Us';
		$data['content'] = 'aboutUs/aboutUs_page';
		$data['about'] 	 = $this->Aboutmodel->get_last_row('about');
		$this->load->view('frontend/master',$data);
	}

	public function profile_page()
	{
		$data['title'] = 'Home';
		$data['content'] = 'profile/profile_page';
		$data['profile'] = $this->Aboutmodel->get_last_row('profile');
		$this->load->view('frontend/master',$data);
	}

	public function galary_page()
	{
		$data['title'] = 'Home';
		$data['content'] = 'galary/galary_page';
		$data['galarys'] = $this->Gallerymodel->get_all();
		$this->load->view('frontend/master',$data);
	}

	public function news_event_page()
	{
		$data['title'] = 'Home';
		$data['content'] = 'event/events_page';
		$this->load->view('frontend/master',$data);
	}

	public function news_page($id = Null)
	{
		$data['title'] = 'Home';
		$data['content'] = 'event/event_page';
		$data['event']	=	$this->Newsmodel->findOrFail($id);
		$this->load->view('frontend/master',$data);
	}

	public function contact_us_page()
	{
		$data['title'] = 'Home';
		$data['content'] = 'contactUs/contactUs_page';
		$this->load->view('frontend/master',$data);
	}

}
