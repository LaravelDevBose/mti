<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
*/

 
/*
| -------------------------------------------------------------------------
| ------------------------------Deafult Routing----------------------------
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/*
| -------------------------------------------------------------------------
| -----------------------------FrontEnd Routing----------------------------
| -------------------------------------------------------------------------
*/
$route['product/(:any)'] 			= 	'Home/product_page_view/$1';
$route['production_unit/(:any)']	= 	'Home/production_unit_view/$1';
$route['about_us']					=	'Home/about_us_page';
$route['profile']					=	'Home/profile_page';
$route['galary']					=	'Home/galary_page';
$route['news_events']				=	'Home/news_event_page';
$route['news/(:num)']				=	'Home/news_page/$1';
$route['contact_us']				= 	'Home/contact_us_page';

//Login Page Routing
$route['Login/admin'] 			= 'Login/preview_login_page';










/*
| -------------------------------------------------------------------------
| ------------------------------BackEnd Routing----------------------------
| -------------------------------------------------------------------------
*/

/*
*************Admin**************
*/
$route['Dashboard'] = 'Admin';

$route['Users'] = 'Admin/preview_all';

$route['Logout'] = 'Login/logout';

$route['CreateUser'] = 'Admin/create';

$route['DeleteUser/(:num)'] = 'Admin/soft_delete/$1';

$route['EditUser/(:num)'] = 'Admin/edit/$1';

$route['UpdateUser/(:num)'] = 'Admin/update/$1';


/*
*************About**************
*/

$route['About/(:any)'] = 'About/preview_about/$1';

$route['UpdateAbout/(:any)/(:any)'] = 'About/update/$1/$2';


/*
*************Header**************
*/

$route['Notes'] = 'Header_note/preview_all';

$route['Notes/Get'] = 'Header_note/get_note_by_position';

$route['UpdateNote'] = 'Header_note/update';


/*
*************Director Message**************
*/

$route['Director'] = 'DirectorMessage/preview_director';

$route['UpdateDirector/(:any)/(:any)'] = 'DirectorMessage/update/$1/$2';




/*
*************Service**************
*/

$route['Service'] = 'Service/preview_all'; 

$route['CreateService'] = 'Service/create';

$route['DeleteService/(:num)'] = 'Service/soft_delete/$1'; 

$route['EditService/(:num)'] = 'Service/edit/$1';

$route['UpdateService/(:num)'] = 'Service/update/$1'; 


/*
*************Company**************
*/

$route['Company'] = 'Company/preview_all'; 

$route['Company/Create'] = 'Company/create';

$route['Company/Delete/(:num)'] = 'Company/soft_delete/$1'; 

$route['Company/Edit/(:num)'] = 'Company/edit/$1';

$route['Company/Update/(:num)/(:any)'] = 'Company/update/$1/$2'; 

/*
*************Company**************
*/

$route['Product'] = 'Product/preview_all'; 

$route['Product/Create'] = 'Product/create';

$route['Product/Delete/(:num)'] = 'Product/soft_delete/$1'; 

$route['Product/Edit/(:num)'] = 'Product/edit/$1';

$route['Product/Update/(:num)/(:any)'] = 'Product/update/$1/$2'; 


/*
*************Award**************
*/

$route['Award'] = 'Award/preview_all'; 

$route['Award/Create'] = 'Award/create';

$route['Award/Delete/(:num)'] = 'Award/soft_delete/$1'; 

$route['Award/Edit/(:num)'] = 'Award/edit/$1';

$route['Award/Update/(:num)/(:any)'] = 'Award/update/$1/$2'; 

/*
*************Top Seller**************
*/

$route['Seller'] = 'Seller/preview_all'; 

$route['Seller/Create'] = 'Seller/create';

$route['Seller/Delete/(:num)'] = 'Seller/soft_delete/$1'; 

$route['Seller/Edit/(:num)'] = 'Seller/edit/$1';

$route['Seller/Update/(:num)/(:any)'] = 'Seller/update/$1/$2'; 


/*
*************Team**************
*/

$route['Team'] = 'Team/preview_all'; 

$route['Team/Create'] = 'Team/create';

$route['Team/Delete/(:num)'] = 'Team/soft_delete/$1'; 

$route['Team/Edit/(:num)'] = 'Team/edit/$1';

$route['Team/Update/(:num)/(:any)'] = 'Team/update/$1/$2'; 


/*
*************News**************
*/

$route['NewsCrud'] = 'News/preview_all';

$route['CreateNews'] = 'News/create';

$route['DeleteNews/(:num)'] = 'News/soft_delete/$1'; 

$route['EditNews/(:num)'] = 'News/edit/$1';

$route['UpdateNews/(:any)/(:any)'] = 'News/update/$1/$2'; 




/*
*************ContactCrud**************
*/

$route['ContactCrud'] = 'Contact/preview_all';

$route['CreateContactCrud'] = 'Contact/create';

$route['DeleteContactCrud/(:num)'] = 'Contact/soft_delete/$1'; 

$route['EditContactCrud/(:num)'] = 'Contact/edit/$1';

$route['UpdateContactCrud/(:num)'] = 'Contact/update/$1'; 


/*
*************Gallery**************
*/

$route['GalleryCrud'] = 'Gallery/preview_all';

$route['CreateGallery'] = 'Gallery/create';

$route['DeleteGallery/(:any)/(:any)'] = 'Gallery/hard_delete/$1/$2'; 

$route['EditGallery/(:num)'] = 'Gallery/edit/$1';

$route['UpdateGallery/(:any)/(:any)'] = 'Gallery/update/$1/$2'; 


/*
*************Video**************
*/

$route['VideoCrud'] = 'Video/preview_all';

$route['CreateVideo'] = 'Video/create';

$route['DeleteVideo/(:any)'] = 'Video/soft_delete/$1'; 

$route['EditVideo/(:num)'] = 'Video/edit/$1';

$route['UpdateVideo/(:any)'] = 'Video/update/$1'; 


/*
*************Slider**************
*/

$route['SliderCrud'] = 'Slider/preview_all';

$route['CreateSlider'] = 'Slider/create';

$route['DeleteSlider/(:any)/(:any)'] = 'Slider/hard_delete/$1/$2'; 

$route['EditSlider/(:num)'] = 'Slider/edit/$1';

$route['UpdateSlider/(:any)/(:any)'] = 'Slider/update/$1/$2'; 


/*
*************User Contact Us Message**************
*/

$route['GetMessage'] = 'Get_message/get_message';


/*
*************User Contact Us Message backend**************
*/

$route['Message'] = 'Message/preview_all';
$route['DeleteMessage/(:any)'] = 'Message/soft_delete/$1';


