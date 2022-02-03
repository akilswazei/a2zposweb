<?php 
class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();	
		$this->load->library('super_auth');
        $this->load->model('Stores');


	} 
	public function index()
	{
		// if ($this->auth->is_logged() )
		// {
		// 	$this->output->set_header("Location: ".base_url().'Admin_dashboard', TRUE, 302);	
		// }

		$data['stores']=$this->Stores->store_list(['filter_merchant_id' =>0]);
		$data['title'] = "Admin Login Area";
		$this->load->view('user/superadmin_login_form',$data);
	}


	public function do_login()
	{

		$error = '';
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$response=$this->super_auth->login($username, $password);
		if($response===False){
			redirect('Login?error=1');
		} else{
			$this->session->set_userdata('user_db_session','super_admin');	
			redirect('dashboard');
		}
	}

	public function switch_to_store()
	{
		$merchant_id=$this->session->userdata('merchant_id');
		$this->session->sess_destroy();
		# need to check store in merchant
		if(isset($merchant_id)){	
				#need to work on restrictions	
			redirect(base_url().'/Admin_dashboard/merchant_do_login/?username='.$_REQUEST['username'].'&merchant_id='.$merchant_id.'&user_db_session='.$_REQUEST['user_db_session']);
		} else{
			redirect(base_url().'/Login/logout');
		}

	}


	public function logout()
	{	
		$CI =& get_instance();
		$user_data = array(
				'sid_web','user_id' ,'user_type','user_name'
			);
        $CI->session->sess_destroy();
		redirect('Login');
	}

}