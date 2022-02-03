<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Merchant extends CI_Controller {
	
	function __construct() {

		parent::__construct();

		$this->load->model('Merchant_model','merchant');
		$this->load->model('Stores','store');
		$this->load->model('Gen_settingm');
		$this->load->library('super_auth'); 
		
        if (!$this->super_auth->is_logged() ){
            redirect('Login');
        }
		

	}
    //Default index page loading


	public function index(){


		$data = array(
			'title' 			=> display('merchant'),
			"merchants"			=> $this->merchant->get_all()

		);
		$content = $this->parser->parse('merchant/list',$data,true);
		$this->template->full_super_admin_html_view($content);
	}
	public function add(){



		$data = array(
			'title' 			=> 'Add Merchant',
		);

		$this->parser->parse('merchant/add',$data,true);
		$this->template->full_super_admin_html_view($content);
	}
	public function edit($merchant_id){


		$data = array(
			'merchant'			=> $this->merchant->get($merchant_id),
			'title' 			=> 'Edit Merchant'

		);
		$content = $this->parser->parse('merchant/add',$data,true);
		$this->template->full_super_admin_html_view($content);
	}
	public function save(){
		$this->form_validation->set_rules('merchant[name]', display('store_name'), 'trim|required');
        $this->form_validation->set_rules('merchant[address]', display('store_address'), 'trim|required');

        if ($this->form_validation->run() == FALSE) {
           echo json_encode("Fields are required");
        } 
        else {
			$merchant=$_POST['merchant'];
			$merchant_id=$this->merchant->insert($merchant);
			echo json_encode("success"); 
		}
	}
	public function update($merchant_id){
		$merchant=$_POST['merchant'];
		$add_terminals=$_POST['add_terminal'];
		$delete_terminals=$_POST['delete_terminal'];
		$edit_terminals=$_POST['edit_terminal'];
		$this->merchant->update($merchant,$merchant_id);
		// $this->merchant->insert_terminals($add_terminals,$merchant_id);
		// $this->merchant->update_terminals($edit_terminals);
		// $this->merchant->delete_terminals($delete_terminals);
		echo json_encode("success");

	}
	public function delete(){
		$merchant_id=$_POST['merchant_id'];
		$this->merchant->delete($merchant_id);
		echo json_encode("success");
	}

}