<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	
	function __construct() {
		parent::__construct();

		$this->load->library('super_auth'); 
		
        if (!$this->super_auth->is_logged() ){
            redirect('Login');
        }
		$this->load->model('Merchant_model','merchant');
		


	}

	function index(){

		$stores=$this->db->where(['merchant_id' => $this->session->userdata('merchant_id')])->from('store_set')->get()->result();
		$temp=$this->db;
		foreach ($stores as $key => $value) {
			$dbconfig=$this->dbconfigs($value->store_db);
	        $db=$this->load->database($dbconfig,TRUE);
			$store_data=$this->store_dashboard($db);
			$store_data['store_db']=$value->store_db;
			$store_data['store_name']=$value->store_name;
			$grand_data[$value->store_id]=$store_data;
			
		 } 

		$data['allreports']=$grand_data;
		$content = $this->parser->parse('include/super_admin_home',$data,true);
		$this->template->full_super_admin_html_view($content);

	}
	function best_selling_product(){
		$type=$this->input->post('period');
		$store_db=$this->input->post('store_db');
		$dbconfig=$this->dbconfigs($store_db);
		$db=$this->load->database($dbconfig,TRUE);
      	$this->db=$db;
		

		$best_selling_products		= $this->Reports->best_selling_products($type);
		foreach ($best_selling_products as $key => $value) {
		echo "<tr>
		<td>".$value['product_name']."</td>
		<td>".$value['sale_count']."</td>	
		</tr>";
					# code...
		}

	}

	function store_dashboard($db){
		$this->db=$db;
		$super_db=$this->dbconfigs('super_admin');
      
		$total_customer 	= $this->Customers->count_customer();
		$total_product 		= $this->Products->count_product();
		$total_suppliers 	= $this->Suppliers->count_supplier();
		$total_sales 		= $this->Invoices->count_invoice();
		$total_store_invoice= $this->Invoices->total_store_invoice();
		$total_purchase 	= $this->Purchases->count_purchase();

		$this->Accounts->accounts_summary(1);
		$total_expese 		= $this->Accounts->sub_total;
		$monthly_sales_report = $this->Reports->monthly_sales_report();
		$sales_report 		= $this->Reports->todays_total_sales_report();
		$purchase_report 	= $this->Reports->todays_total_purchase_report();
		$discount_report 	= $this->Reports->todays_total_discount_report();
		$grand_total_sales	= $this->Reports->grand_total_sales_report();
		$terminals			= $this->Reports->terminals();
		$user_report		= $this->Reports->user_report();
		$best_selling_products		= $this->Reports->best_selling_products();
		$last_sales				=	$this->Reports->last_sales();
		
//		$currency_details 	= $this->Soft_settings->retrieve_currency_info();

		$data = array(
			'title' 			=> display('dashboard'),
			'total_customer' 	=> $total_customer,
			'total_product' 	=> $total_product,
			'total_suppliers' 	=> $total_suppliers,
			'total_sales' 		=> $total_sales,
			'total_purchase' 	=> $total_purchase,
			'total_store_invoice' 	=> $total_store_invoice,
			'sales_amount' 		=> number_format($sales_report[0]['total_sale'], 2, '.', ','),
			'purchase_amount' 	=> number_format($purchase_report[0]['total_purchase'], 2, '.', ','),
			'discount_amount' 	=> number_format($discount_report[0]['total_discount'], 2, '.', ','),
			'total_expese' 		=> $total_expese,
			'monthly_sales_report' => $monthly_sales_report,
			'currency' 			=> $currency_details[0]['currency_icon'],
			'grand_total_sales' => $grand_total_sales,
			'terminals'			=> $terminals,
			'user_report'		=> $user_report,
			'best_selling_products' =>$best_selling_products,
			'last_sales'			=> $last_sales
//			'position' 			=> $currency_details[0]['currency_position'],
		);
		return $data;
	}
	function dbconfigs($dname){
		$dbconfig = array(
            'dsn'   => '',
		    'hostname' => '104.43.252.46',
    		'username' => 'swazeiCentral',
    		'password' => 'swazeiCentral@123',
            'database' => $dname,
            'dbdriver' => 'mysqli',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => (ENVIRONMENT !== 'production'),
            'cache_on' => FALSE,
            'cachedir' => '',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
            'swap_pre' => '',
            'encrypt'  => FALSE,
            'compress' => FALSE,
            'autoinit' => TRUE,//ci version 2.x
            'stricton' => FALSE,
            'failover' => array(),
            'save_queries' => TRUE
        );
        return $dbconfig;
	}
    //Default index page loading
}
