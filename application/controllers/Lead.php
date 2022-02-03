<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lead extends CI_Controller {
	
	function __construct() {

		parent::__construct();


		$this->load->model('Lead_model','lead');
		$this->load->model('Merchant_model','merchant');
		$this->load->model('Stores','store');
		$this->load->model('Gen_settingm');
		$this->load->library('super_auth'); 
		if (!$this->super_auth->is_logged() ){
            redirect('Login');
        }
		

	}
    //Default index page loading

	public function move_to_merchant(){

		$lead_id=$this->input->post('lead_id');
		$lead_details=(array)$this->lead->get($lead_id);
		
		 $selected_keys=['name','email','address','city','state','tin','mobile_no','company_name','industry_type','locations','industry_sub_type'];
        $lead=array_intersect_key($lead_details,array_flip($selected_keys));
     	$merchant_id=$this->merchant->insert($lead);
		$this->db->insert('user_login',
            [
                'name'    =>    $lead['name'],
                'username'    =>    $lead['email'],
                'password'    =>    md5('admin!@#'),
                'user_type'     => 2,
                'merchant_id' => $merchant_id
        ]
        );
        echo json_encode('success');

	}
	public function index(){

		$getlogo = $this->Gen_settingm->get_logo_favicon();
        $logo_data = array( 'sitelogo' => $getlogo['logo'], 'sitefavicon' => $getlogo['favicon']);

		$data = array(
			'title' 			=> display('lead'),
			"leads"			=> $this->lead->get_all()

		);
		$content = $this->parser->parse('lead/list',$data,true);
		$this->template->full_super_admin_html_view($content);
	}
	public function add(){

		$getlogo = $this->Gen_settingm->get_logo_favicon();
        $logo_data = array( 'sitelogo' => $getlogo['logo'], 'sitefavicon' => $getlogo['favicon']);


		$data = array(
			'title' 			=> 'Add lead',
		);

		$content = $this->parser->parse('lead/add',$data,true);
		$this->template->full_super_admin_html_view($content);
	}
	public function edit($lead_id){

		$getlogo = $this->Gen_settingm->get_logo_favicon();
        $logo_data = array( 'sitelogo' => $getlogo['logo'], 'sitefavicon' => $getlogo['favicon']);


		$data = array(
			'lead'			=> $this->lead->get($lead_id),
			'title' 			=> 'Edit lead',

		);

		$content = $this->parser->parse('lead/add',$data,true);
		$this->template->full_super_admin_html_view($content);
	}
	public function save(){
		$this->form_validation->set_rules('lead[name]', display('store_name'), 'trim|required');
        $this->form_validation->set_rules('lead[address]', display('store_address'), 'trim|required');

        if ($this->form_validation->run() == FALSE) {
           echo json_encode("Fields are required");
        } 
        else {
			$lead=$_POST['lead'];
			$lead_id=$this->lead->insert($lead);
			echo json_encode("success"); 
		}
	}
	public function update($lead_id){
		$lead=$_POST['lead'];
		// $add_terminals=$_POST['add_terminal'];
		// $delete_terminals=$_POST['delete_terminal'];
		// $edit_terminals=$_POST['edit_terminal'];
		$this->lead->update($lead,$lead_id);
		// $this->lead->insert_terminals($add_terminals,$lead_id);
		// $this->lead->update_terminals($edit_terminals);
		// $this->lead->delete_terminals($delete_terminals);
		echo json_encode("success");

	}
	public function delete(){
		$lead_id=$_POST['lead_id'];
		$this->lead->delete($lead_id);
		echo json_encode("success");
	}

}