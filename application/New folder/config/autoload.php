<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','session', 'cart', 'email', 'form_validation','upload','image_lib');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'file', 'form', 'security', 'html');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('Admin_model','Customer_model','Order_model','LC_model','IE_head_model',
							'Employee_model','Account_model','Collection_model','SallaryMonth_model',
							'Salary_model','Supplier_model','Payment_model','Setting_model','Purchase_model',
							'Transport_model','Transport_head_model','Check_model','Agent_model','Company_model','Pricing_model',
                            'Bank_model','BankTransaction_model','Car_model','Registration_model','AccountHead_model','Voucher_model',
                            'Insurance_model','AgentBillPayment_model','InsuranceBill_model'
							);
