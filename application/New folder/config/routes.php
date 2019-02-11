<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	= 'Adminlogin';
$route['404_override'] 			= 'Adminlogin/error';
$route['translate_uri_dashes'] 	= FALSE;




 

/*===========Admin Login=============*/
$route['admin/login'] 		= 	"Adminlogin";
$route['admin_login'] 		= 	"Adminlogin/admin_login_data_check";

/*===========  Dash board Route List ==============*/

$route['order/dashboard'] 		= 'Admindashboard/sale_dashboard';
$route['purchase/dashboard'] 	= 'Admindashboard/purchase_dashboard';
$route['account/dashboard'] 	= 'Admindashboard/accounts_dashboard';
$route['hr_payroll/dashboard'] 	= 'Admindashboard/hr_payroll_dashboard';
$route['report/dashboard'] 	= 'Admindashboard/reports_dashboard';
$route['administration/dashboard'] 	= 'Admindashboard/administration_dashboard';
$route['titu/dashboard']            =   'Admindashboard/titu_dashboard';

$route['order/details/list'] = 'Car/car_list_info';
$route['order/details/profile/(:any)']  ='Car/order_car_profile_details/$1';
$route['purchase/details/profile/(:any)']  ='Car/purchase_car_profile_details/$1';
$route['car/search'] = 'Car/car_search_method';
$route['car/reg/submit'] = 'Registration/car_reg_store';
$route['reg/doc/delete/(:any)'] = 'Registration/car_reg_doc_delete/$1';
$route['download_images/(:any)'] = 'Car/download_car_all_image/$1';


// =====================Admin Panel================
// =====================Admin Panel================

/****************************************************************************************************/
/************************************* Sales Module Route List **************************************/

/*========Customer Route List=========*/
$route['customers'] 				= 	"Customer/index";
$route['customer/insert'] 			= 	"Customer/insert_customer";
$route['customer/store'] 			= 	"Customer/store_customer_info";
$route['customer/edit/(:any)']		=	'Customer/edit_customer_info/$1';
$route['customer/update/(:any)']	=	'Customer/update_customer_info/$1';
$route['customer/delete/(:any)']	=	'Customer/delete_customer_info/$1';
$route['get_fb_url']                =   'Customer/fb_url_pop_up_page';
$route['customer/order/insert'] 	=	'Customer/customer_order_insert_page';
$route['customer/order/store'] 		=	'Customer/customer_order_store';

/*========Order CRUD Route list=========*/
$route['order/list'] 			= 	"Order/index";
$route['order/pending/list'] 	= 	"Order/order_pending_list";
$route['order/onprocess/list'] 	= 	"Order/order_onprocess_list";

$route['order/insert'] 			= 	"Order/insert_order_info";
$route['order/store'] 			= 	"Order/store_order_info";
$route['order/edit/(:any)']		=	'Order/edit_order_info/$1';
$route['order/view/(:any)']		=	'Order/view_order_info/$1';
$route['order/update/(:any)']	=	'Order/update_order_info/$1';
$route['order/delete/(:any)']	=	'Order/delete_order_info/$1';
$route['order/delivery/show/(:any)']='Order/show_order_deliery_info/$1';
$route['order/deliver/(:any)']	=	'Order/order_delivery/$1';
$route['find/customer/(:any)']	=	'Customer/find_customer_info/$1';

$route['new_customer/order/(:any)'] =   'Customer/new_customer_order_insert/$1';
$route['old_customer/order/(:any)'] =   'Order/old_customer_order_insert/$1';

$route['ready/car/sale']		=	'Order/ready_car_sale_page';
$route['ready/car/order/(:any)']=	'Order/ready_car_order_page/$1';
$route['ready/car/purchase/(:any)']=	'Order/ready_car_purchase_page/$1';
$route['order/purchase/marge']	= 	'Order/order_purchase_car_marge';

$route['find/unpurchase_order/(:any)']  =   'Order/find_unperchase_order/$1';
$route['find/order_details/(:any)']  =   'Order/find_order_details/$1';
$route['find/purchase_details/(:any)']  =   'Order/find_purchase_details/$1';

/****************************************************************************************************/
/************************************* Purchase Module Route List ***********************************/

/*========Supplier Route List=========*/
$route['supplier/insert'] 			= 	"Supplier/insert_supplier";
$route['supplier/store'] 			= 	"Supplier/store_supplier_info";
$route['supplier/edit/(:any)']		=	'Supplier/edit_supplier_info/$1';
$route['supplier/update/(:any)']	=	'Supplier/update_supplier_info/$1';
$route['supplier/delete/(:any)']	=	'Supplier/delete_supplier_info/$1';
$route['find/supplier/(:any)']		=	'Supplier/find_supplier_info/$1';


/*========purchase CRUD Route list=========*/
$route['purchase/list'] 			= 	"Purchase/index";
$route['purchase/insert'] 			= 	"Purchase/insert_purchase_info";
$route['purchase/insert/(:any)'] 	= 	"Purchase/insert_purchase_info/$1";
$route['purchase/store'] 			= 	"Purchase/store_purchase_info";
$route['purchase/edit/(:any)']		=	'Purchase/edit_purchase_info/$1';
$route['purchase/view/(:any)']		=	'Purchase/view_purchase_info/$1';
$route['purchase/update/(:any)']	=	'Purchase/update_purchase_info/$1';
$route['purchase/delete/(:any)']	=	'Purchase/delete_purchase_info/$1';
$route['find/car_info/(:any)']		= 	'Purchase/find_car_info/$1';

$route['pricing/purchase/(:any)']	=	'Purchase_pricing/purchase_pricing_insert/$1';

$route['pricing/list']			=	'Purchase_pricing/pricing_list_view';
$route['pricing/entry']			=	'Purchase_pricing/insert_pricing_info';
$route['car/price/entry/(:any)']=	'Purchase_pricing/insert_car_pricing_info/$1';
$route['pricing/store']			=	'Purchase_pricing/store_pricing_info';
$route['pricing/view/(:any)']	=	'Purchase_pricing/view_pricing_details/$1';
$route['pricing/edit/(:any)']	=	'Purchase_pricing/edit_pricing_info/$1';
$route['pricing/update/(:any)']	=	'Purchase_pricing/update_pricing_info/$1';
$route['pricing/delete/(:any)/(:any)']	=	'Purchase_pricing/delete_pricing_info/$1/$2';
$route['find/purchase_car/info/(:any)']	 =	'Purchase/find_purchase_car_info/$1';


$route['car/images_insert/page']      =   'Car/car_images_insert_page';
$route['car/images/store']            =   'Car/car_images_store';
$route['car/images/view/(:any)']      =   'Car/car_images_view_page/$1';
$route['car/images/edit/(:any)']      =   'Car/car_images_edit_page/$1';
$route['car/images/update/(:any)']    =   'Car/car_images_update/$1';
$route['car/images/delete/(:any)']    =   'Car/car_images_delete/$1';
$route['car/image/delete/(:any)']     =   'Car/car_image_delete/$1';
$route['find/car/purchase_info/(:any)']      =   'Car/find_car_purchase_info_for_image/$1';
$route['cover/images/store']            =   'Car/cover_image_upload';

/*======= Car Location Traking =======*/
$route['transport/status'] 			= 'Transport/transport_car_status_view';
$route['trans/status/chnage/(:any)']= 'Transport/transport_car_status_change_page/$1';
$route['trans/status/update']		= 'Transport/transport_car_status_update';

$route['transport/head']			= 'Transport/transport_head_view';
$route['trans/head/store'] 			= 'Transport/transport_head_store';
$route['trans/head/edit/(:any)'] 	= 'Transport/transport_head_edit/$1';
$route['trans/head/update/(:any)'] 	= 'Transport/transport_head_update/$1';
$route['trans/head/delete/(:any)'] 	= 'Transport/transport_head_delete/$1';


/****************************************************************************************************/
/************************************* Accounts Module Route List ***********************************/

//Collection Entry Route List
$route['collections'] 				= 'Collection/collection_entry_page';
$route['collection/store'] 			= 'Collection/collection_entry_store';
$route['collection/store/print'] 	= 'Collection/collection_entry_store_print';
$route['collection/view/(:any)'] 	= 'Collection/collection_entry_view/$1';
$route['collection/edit/(:any)'] 	= 'Collection/collection_entry_edit/$1';
$route['collection/update/(:any)'] 	= 'Collection/collection_entry_update/$1';
$route['collection/delete/(:any)'] 	= 'Collection/delete_collection_data/$1';
$route['find/customer/chassis_no/(:any)']	= 'Collection/find_order_info/$1';
$route['find/order/due_amount/(:any)'] = 'Collection/find_order_due_amount/$1';
$route['collection/print/(:any)'] 	= 'Collection/collection_print/$1';

//payment Route List
$route['payment'] 					= 'Payment/payment_entry_page';
$route['payment/store'] 			= 'Payment/payment_entry_store';
$route['payment/edit/(:any)'] 		= 'Payment/payment_entry_edit/$1';
$route['payment/update/(:any)'] 	= 'Payment/payment_entry_update/$1';
$route['payment/delete/(:any)'] 	= 'Payment/delete_payment_data/$1';
$route['find/chassis_no/(:any)']	= 'Payment/find_order_info/$1';
$route['find/payment/lc/(:any)'] 	= 'Payment/find_payment_lc/$1';
$route['find/purchase_info/(:any)'] = 'Payment/find_purchase_info_by_supplier/$1';

//Office Payment Route List
$route['office_payment']			= 'Payment/office_payment_entry_page';
$route['office_payment/store']		= 'Payment/office_payment_store';
$route['office_payment/edit/(:any)']		= 'Payment/office_payment_edit/$1';
$route['office_payment/update/(:any)']		= 'Payment/office_payment_update/$1';
$route['office_payment/delete/(:any)']		= 'Payment/office_payment_delete/$1';

//Other Income Entry Route List
$route['account/other_income']		= 'Account/other_income_page';
$route['other_income/store']		= 'Account/other_income_store';
$route['other_income/edit/(:any)'] 	= 'Account/other_income_edit/$1';
$route['other_income/update/(:any)']= 'Account/other_income_update/$1';
$route['other_income/delete/(:any)']= 'Account/delete_other_income/$1';

/*========== Bank Transtaction Route =============*/
$route['bank_trans/page']			=	'Bank_transaction/bank_trans_page';
$route['bank_trans/store']			=	'Bank_transaction/bank_trans_store';
$route['bank_trans/edit/(:any)']	=	'Bank_transaction/bank_trans_edit/$1';
$route['bank_trans/update/(:any)']	=	'Bank_transaction/bank_trans_update/$1';
$route['bank_trans/delete/(:any)']	=	'Bank_transaction/bank_trans_delete/$1';


$route['account/balance_sheet']     = 'Account/balance_sheet';


$route['check/pending/list'] 	=	'Check/check_pendaing_date_list';
$route['check/reminder/list'] 	=	'Check/check_reminder_date_list';
$route['check/paid/list'] 		=	'Check/check_paid_date_list';
$route['check/entry'] 			=	'Check/check_entry_page';
$route['check/store'] 			=	'Check/check_date_store';
$route['check/view/(:any)'] 	=	'Check/check_view_page/$1';
$route['check/edit/(:any)'] 	=	'Check/check_edit_page/$1';
$route['check/update/(:any)'] 	=	'Check/check_update_info/$1';
$route['check/delete/(:any)'] 	=	'Check/check_delete_info/$1';

$route['insurance/list'] 			= 'Insurance/view_insurance_list';
$route['insurance/insert'] 			= 'Insurance/insert_insurance_list';
$route['insurance/store'] 			= 'Insurance/store_insurance_list';
$route['insurance/view/(:any)'] 	= 'Insurance/view_insurance_list';
$route['insurance/edit/(:any)'] 	= 'Insurance/edit_insurance_list';
$route['insurance/update/(:any)'] 	= 'Insurance/update_insurance_list';
$route['insurance/delete/(:any)'] 	= 'Insurance/delete_insurance_list';


/****************************************************************************************************/
/************************************* HR & Payroll Module Route List *******************************/

/*========== Employee Route List ========*/
$route['employees']				='Employee/index';
$route['employee/insert']		='Employee/insert_employee_info';
$route['employee/store']		='Employee/store_employee_info';
$route['employee/view/(:any)']	='Employee/view_employee_info/$1';
$route['employee/edit/(:any)']	='Employee/edit_employee_info/$1';
$route['employee/update/(:any)']='Employee/update_employee_info/$1';
$route['employee/delete/(:any)']='Employee/delete_employee_info/$1';


$route['employee/month']		='Employee/month_insert_Page';
$route['month/store']			='Employee/store_sallary_month';
$route['month/edit/(:any)']		='Employee/edit_sallary_month/$1';
$route['month/update/(:any)']	='Employee/update_sallary_month/$1';
$route['month/delete/(:any)']	='Employee/delete_sallary_month/$1';

$route['employee/salary']		= 'Salary/salary_payment_page';
$route['salary/store']			= 'Salary/salary_payment_store';
$route['store/paid_salary/check'] = 'Salary/check_payable_amount';
$route['get/salary_range/(:any)'] = 'Employee/get_employee_salary/$1';
$route['salary/edit/(:any)']	= 'Salary/salary_payment_edit/$1';
$route['salary/update/(:any)']	= 'Salary/salary_payment_update/$1';
$route['salary/delete/(:any)']	= 'Salary/salary_payment_delete/$1';

$route['employee/salary/statement/page'] = 'Salary/salary_statement_page';
$route['month_wise/salary/(:any)'] = 'Salary/find_month_wise_salary/$1';

/****************************************************************************************************/
/************************************* Report Module Route List ********************************/


/*========== Report Route List ==========*/
$route['report/car/stock']					= 'Report/view_car_stock_report';

$route['report/full_report'] 				= 'Report/car_full_report';
$route['find/full_report/(:any)'] 			= 'Report/find_full_deatils_report/$1';

$route['report/order_wise/collection'] 		= 'Report/order_wise_collection_view';
$route['find/collection/order_wise/(:any)'] = 'Report/find_collection_order_wise/$1';

$route['report/due']						= 'Report/view_full_due_report';


$route['report/customer_order']				= 'Report/view_customer_order_report';
$route['find/customer_order/(:any)']		= 'Report/customer_wise_order_report/$1';

$route['report/delivery_order']				= 'Report/delivery_order_view';
$route['find/delivery_order']				= 'Report/date_wise_delivery_order';

$route['report/lc/car']					    = 'Report/view_lc_wise_car_report';
$route['find/car/(:any)']					= 'Report/find_car_by_lc/$1';

$route['report/collection']					= 'Report/view_collection_report';
$route['find/collection/by_date'] 			= 'Report/find_date_wise_collection';

$route['report/customer_wise/collection'] 	= 'Report/customer_wise_collection';
$route['find/collection/customer/(:any)'] 	= 'Report/find_collection_by_cus/$1';


$route['report/date_wise_payment'] 			= 'Report/payment_report_page';
$route['find/date_wise_payment/report'] 	= 'Report/find_date_to_date_payment';

$route['report/supplier_payment'] 			= 'Report/supplier_payment_report_page';
$route['find/supplier_payment/report/(:any)']= 'Report/find_supplier_payment/$1';


$route['report/office_payment'] 			= 'Report/office_payment_report_page';
$route['find/office_payment/report'] 		= 'Report/find_office_payment';

$route['report/salary/date_to_date'] 		= 'Report/salary_date_to_date_report';
$route['find/salary/date_to_date'] 			= 'Report/find_salary_date_to_date';

$route['report/salary/empl'] 				= 'Report/employee_wise_salary';
$route['find/salary/employee/(:any)'] 		= 'Report/find_employee_wise_salary/$1';

$route['report/lc']							= 'Report/view_lc_report'; 
$route['report/customer']					= 'Report/view_customer_report'; 


/****************************************************************************************************/
/*********************************** Administration Module Route List *******************************/


/*========L/C CRUD Route list=========*/
$route['lc/list'] 			= 	"LC_controller/lc_list_view";
$route['lc/insert'] 		= 	"LC_controller/lc_insert_page";
$route['lc/store'] 			= 	"LC_controller/store_lc_info";
$route['lc/edit/(:any)']	=	'LC_controller/edit_lc_info/$1';
$route['lc/view/(:any)']	=	'LC_controller/viewt_lc_info/$1';
$route['lc/update/(:any)']	=	'LC_controller/update_lc_info/$1';
$route['lc/delete/(:any)']	=	'LC_controller/delete_lc_info/$1';

$route['find/chassis_no/(:any)'] = 'LC_controller/find_chassis_no/$1';
$route['find/purchase_info/(:any)'] = 'LC_controller/find_purchase_info/$1';
$route['store/lc/car_info'] = 'LC_controller/store_car_info_in_cart';
$route['cart/destroy']		= 'LC_controller/destroy_cart';
$route['lc/details/delete/(:any)'] = 'LC_controller/delete_lc_details/$1';
$route['car/lc_document']       = 'LC_controller/store_lc_document';
$route['car/doc/delete/(:any)']       = 'LC_controller/lc_doc_delete/$1';


/*========Income Expense Head CRUD Route list=========*/
$route['ie_head/insert'] 		= 	"IE_head";
$route['ie_head/store'] 		= 	"IE_head/store_ie_head_info";
$route['ie_head/edit/(:any)']	=	'IE_head/edit_ie_head_info/$1';
$route['ie_head/update/(:any)']	=	'IE_head/update_ie_head_info/$1';
$route['ie_head/delete/(:any)']	=	'IE_head/delete_ie_head_info/$1';

/*========= Bank Route List =========*/
$route['bank/insert']       =   'Bank/bank_create_page';
$route['bank/store']       =   'Bank/store_bank_info';
$route['bank/edit/(:any)']       =   'Bank/bank_info_edit/$1';
$route['bank/update/(:any)']       =   'Bank/update_bank_info/$1';
$route['bank/delete/(:any)']       =   'Bank/bank_info_delete/$1';
$route['find/bank_current_balance/(:any)'] = 'Bank/find_bank_current_balance/$1';

/*========== Agent Route List ============*/
$route['agent/insert'] 			= 	"Agent/agent_page_view";
$route['agent/store'] 			= 	"Agent/store_agent_info";
$route['agent/edit/(:any)']		=	'Agent/edit_agent_info/$1';
$route['agent/update/(:any)']	=	'Agent/update_agent_info/$1';
$route['agent/delete/(:any)']	=	'Agent/delete_agent_info/$1';

$route['insurance_entry']          =   'Insurance/insurance_entry_page';
$route['insurance_store']          =   'Insurance/insurance_store';
$route['insurance_edit/(:any)']    =   'Insurance/insurance_edit_page/$1';
$route['insurance_update/(:any)']  =   'Insurance/insurance_update/$1';
$route['insurance_delete/(:any)']  =   'Insurance/insurance_delete/$1';


$route['company/insert'] 		= 	"Company/company_page_view";
$route['company/store'] 		= 	"Company/store_company_info";
$route['company/edit/(:any)']	=	'Company/edit_company_info/$1';
$route['company/update/(:any)']	=	'Company/update_company_info/$1';
$route['company/delete/(:any)']	=	'Company/delete_company_info/$1';

/*======== Setting Route List ===========*/
$route['setting/insert']		= 'Setting/view_setting_page';
$route['company_info/store']	= 'Setting/store_or_update_conpany_info';

/*========Create Admin=========*/
$route['createAdmin'] 			=	"Admincreate/addAdminPage";
$route['saveAdmin'] 			=	"Admincreate/add_admin_data_check";
$route['listAdmin'] 			=	"Admincreate/listOfAdmin";
$route['editAdmin/(:any)'] 		=	"Admincreate/edit_admin/$1";
$route['AdminUpdate/(:any)'] 	=	"Admincreate/edit_admin_data_check/$1";
$route['deleteAdmin/(:any)'] 	=	"Admincreate/admin_delete/$1";

$route['change_pass_page/(:any)'] 	= 	"Admincreate/change_pass_page/$1";
$route['access_page/(:any)'] 		= 	"AdminAccess/show_access_page/$1";
$route['define_access'] 			= 	"AdminAccess/define_access";


/************************ titu account route list ***************************/

$route['titu/voucher_list']             =   'Voucher/voucher_list_page';
$route['titu/voucher_pending_list']     =   'Voucher/voucher_pending_list';
$route['titu/voucher_active_list']      =   'Voucher/voucher_active_list';
$route['titu/voucher_entry']            =   'Voucher/voucher_entry_page';
$route['titu/voucher_store']            =   'Voucher/voucher_store';
$route['titu/voucher_store_print']      =   'Voucher/voucher_store_print';
$route['titu/voucher_view/(:any)']      =   'Voucher/voucher_view_page/$1';
$route['titu/voucher_edit/(:any)']      =   'Voucher/voucher_edit_page/$1';
$route['titu/voucher_update/(:any)']    =   'Voucher/voucher_update/$1';
$route['titu/voucher_delete/(:any)']    =   'Voucher/voucher_delete/$1';
$route['titu/voucher_approve/(:any)']   =  'Voucher/voucher_approve/$1';
$route['titu/voucher_print/(:any)']     =   'Voucher/voucher_print/$1';

$route['titu/transaction_list']         =   'TituController/transaction_list_page';

$route['titu/ac_head_entry']            =   'AccountHeader/account_head_page';
$route['titu/ac_head_store']            =   'AccountHeader/account_head_store';
$route['titu/ac_head_edit/(:any)']      =   'AccountHeader/account_head_store';
$route['titu/ac_head_update/(:any)']    =   'AccountHeader/account_head_store';
$route['titu/ac_head_delete/(:any)']    =   'AccountHeader/account_head_delete/$1';

$route['titu/trial_balance']            =   'TituController/trial_balance_page';
$route['titu/trial_balance/report']     =   'TituController/trial_balance_report';



$route['titu/agent_bill_entry']             =   'AgentBillPayment/agent_bill_entry_page';
$route['titu/agent_bill_payment']           =   'AgentBillPayment/agent_payment_entry_page';
$route['titu/agent_bill_payment_store']     =   'AgentBillPayment/agent_bill_payment_store';
$route['titu/agent_bill_edit/(:any)']       =   'AgentBillPayment/agent_bill_edit_page/$1';
$route['titu/agent_bill_update/(:any)']     =   'AgentBillPayment/agent_bill_update/$1';
$route['titu/agent_bill_delete/(:any)']     =   'AgentBillPayment/agent_bill_delete/$1';

$route['agent_due_amount/(:any)']           =   'AgentBillPayment/calculate_agent_due/$1';

$route['titu/insurance_bill_page']          =   'Insurance/insurance_bill_entry';
$route['titu/insurance_payment_page']       =   'Insurance/insurance_payment_entry';
$route['insurance_bill_payment_store']      =   'Insurance/insurance_bill_payment_insert';
$route['titu/insurance_bill_edit/(:any)']   =   'Insurance/insurance_bill_payment_edit/$1';
$route['titu/insurance_bill_update/(:any)'] =   'Insurance/insurance_bill_payment_update/$1';
$route['titu/insurance_bill_delete/(:any)'] =   'Insurance/insurance_bill_payment_delete/$1';
$route['titu/insurance_report_page']        =   'Insurance/insurance_report_page';
$route['company_due/(:any)']                =   'Insurance/calculate_insurance_due/$1';
$route['insurance_search_report']           =   'Insurance/insurance_search_report';

$route['titu/ledger']		= 	'TituController/ledger_page';
$route['titu/ledger_result']= 	'TituController/ledger_search_result';

