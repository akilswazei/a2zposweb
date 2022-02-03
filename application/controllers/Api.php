<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("./vendor/autoload.php");

class Api extends CI_Controller {

    public $mailchimp;
    function __construct() {

        parent::__construct();
        $this->load->model('Terminals');
        $this->load->model('Merchant_model','merchant');
        $this->load->model('Lead_model','lead');
        $this->load->library('lstore');
        $this->load->library('form_validation');
       $this->load->model('Stores');
       header('Content-Type: application/json');
       header("Access-Control-Allow-Origin: *");
       header("Access-Control-Allow-Headers: *");
       $this->mailchimp = new MailchimpMarketing\ApiClient();
       $this->mailchimp->setConfig([
          'apiKey' => '3ef6acf4ef34a1d723257dbc71f00537-us20',
          'server' => 'us20'
        ]);
    }


    public function merchants(){
        $data = array(
            'status'             => true,
            "merchants"         => $this->merchant->get_all()

        );
        echo json_encode($data);  
    }
    public function leads(){
        $data = array(
            'status'             => true,
            "leads"         => $this->lead->get_all()

        );
        echo json_encode($data);  

    }
    function terminal_verfication(){


        $this->form_validation->set_rules('merchant_id', display('merchant_id'), 'trim|required');
        $this->form_validation->set_rules('licence_key', display('licence_key'), 'trim|required');

        if ($this->form_validation->run() == FALSE) {
             echo json_encode(['status' => 0, 'store_data' => "merchant_id or licence_key is required"]);
             die;
        } else{
            $merchant_id=$this->input->post('merchant_id');
            $licence_key=$this->input->post('licence_key');
        
        }
        if($this->Terminals->check_terminal_exists($licence_key,$merchant_id)===false){
            echo json_encode(['status' => 0, 'store_data' => "merchant_id or licence_key is not valid"]);
        } else{
            $store_details=$this->Terminals->retrieve_stores_by_merchant_id($merchant_id);
            if($store_details==false){
                $status=0;
                $store_details=[];
            } else{
                $status=1;
            }
            echo json_encode(['status' => $status, 'store_data' => $store_details]);        

        }

    }
    function register_merchant(){
        $this->db->select('*');
        $this->db->from('tbl_mail_settings');
        $query = $this->db->get();
        $mail_settings= $query->row_array();
        $lead_id=date('ymdhis');
        $data=[

                'industry_type' =>$this->input->post('branch_group_1'),
                'locations' => json_encode($this->input->post('branch_1_answers')), #add
                'industry_sub_type' => json_encode($this->input->post('branch_1_answers')),
                'name' => $this->input->post('first_last_name'),
                'email' => $this->input->post('email'),
                'mobile_no' => $this->input->post('telephone'),
                'company_name' => $this->input->post('company_name'),
                'lead_id' => $lead_id

        ]; 
        $this->db->insert('lead',$data);




           $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => $mail_settings["smtp_host"],
          'smtp_port' => $mail_settings["smtp_port"],
          'smtp_user' => $mail_settings["smtp_username"],
          'smtp_pass' => $mail_settings["smtp_password"],
          'mailtype' => 'html',
          'charset' => 'utf-8',
          'wordwrap' => TRUE
        );

        $message = "Hello,";
        $message .= "Thanks,";
        $message .= "<br>LWT POS System";

        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($mail_settings["from_email"]);
        $this->email->to($data['email']);
        $this->email->subject("Thanks for registration");
        $this->email->message($message);
        $this->email->send();
       
        try{
            
            $this->mailchimp->lists->addListMember('98d95d1c39',['email_address' => $data['email'],"status" => "subscribed",
                "merge_fields" => [
                    "FNAME"=> $data['name'],
                    "MOBILE" => $data['mobile_no']
                ]
        ]);

        }
        catch(Exception $e){
            //echo $e->getMessage();
        }


        echo json_encode(["status" => "success","data" => json_encode($_POST)]);

    }
    function approved_merchant(){
        $merchant_id=date('ymdhis');
        $data=[

                'industry_type' =>$this->input->post('branch_group_1'),
                'locations' => json_encode($this->input->post('branch_1_answers')), #add
                'industry_sub_type' => json_encode($this->input->post('branch_1_answers')),
                'name' => $this->input->post('first_last_name'),
                'email' => $this->input->post('email'),
                'mobile_no' => $this->input->post('telephone'),
                'company_name' => $this->input->post('company_name'),
                'merchant_id' => $merchant_id

        ]; 
        $this->db->insert('merchant',$data);
        $this->db->insert('user_login',
            [
                'name'    =>    $this->input->post('first_last_name'),
                'username'    =>    $this->input->post('email'),
                'password'    =>    md5('admin!@#'),
                'user_type'     => 2,
                'merchant_id' => $merchant_id
        ]
        );
        echo json_encode(["status" => "success","data" => json_encode($_POST)]);
    }

    public function store_add() {
        #create table of database and switch according to store
        $databases=$this->db->where(['activated' => 0])->order_by('id','asc')->from('databases')->get()->result();
        $licence_key=$this->input->post('license_key');
        $data=array(            
            'merchant_id'       => $this->input->post('merchant_id'),
            'store_name'        => $this->input->post('store_name'),
            'store_email'       => $this->input->post('store_email'),
            'store_contact'     => $this->input->post('store_contact'),
            'store_url'         => $this->input->post('store_url'),
            'store_category'    => $this->input->post('store_category'),
            'store_address_1'   => $this->input->post('store_address_1'),
            'city'   => $this->input->post('city'),
            'state'   => $this->input->post('state'),
            'zipcode'   => $this->input->post('zipcode'),
            'store_country'   => $this->input->post('store_suite'),
            'store_suite'   => $this->input->post('store_suite'),
            'store_db'   => $databases[0]->name,
            'store_username'   => 'swazeiCentral',
            'store_password'    => 'swazeiCentral@123',
            'host'   => '104.43.252.46',

            );
        $check_terminal=$this->Terminals->check_terminal_exists($licence_key,$this->input->post('merchant_id'));

        if($check_terminal==false){
            echo json_encode(['status' => 0, 'store_data' => "merchant_id or licence_key is not valid"]);
            die;
        }
        $dbconfig =$this->dbconfigs($databases[0]->name);
        $db2=$this->load->database($dbconfig,TRUE);
        $db2->where(['user_id' => 1]);
        $db2->update('user_login',['password' => md5("admin!@#"), "username" => $this->input->post('store_email')]);
        
        $data = $this->security->xss_clean($data);
        
        $result=$this->Stores->store_add($data);
        $store_id=$this->db->insert_id();
        
        $this->db->where(['id' => $databases[0]->id]);
        $this->db->update('databases',['activated' => 0]);

        $this->db->where(['terminal_id' => $check_terminal['terminal_id']]);
        $this->db->update('terminal',['store_id' => $store_id]);
        
        if ($result) {
             $store_data=$this->db->from('store_set')->where(['store_id' => $store_id])->get()->result();
            $this->session->set_userdata(array('message' => "Store is Successfully Inserted"));
            echo json_encode(['status' => 1, 'store_data' => $store_data[0]]);
            exit;
        }else{
            $this->session->set_flashdata('error', "Something went Wrong");
            echo json_encode(['status' => 1, 'store_data' => 'Unexpected Error']);
            //redirect(base_url('superadmin/Cstore'));
        }
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

    public function store_update_api() {

        $store_id = $this->input->post('store_id');
        $data=array(
            'store_name'        => $this->input->post('store_name'),
            'store_address_1'   => $this->input->post('store_address_1'),
            'store_suite'       => $this->input->post('store_suite'),
            'city'              => $this->input->post('city'),
            'state'             => $this->input->post('state'),
            'zipcode'           => $this->input->post('zipcode'),
            'store_country'     => $this->input->post('store_country'),
            'store_contact'     => $this->input->post('store_contact'),
            'store_email'       => $this->input->post('store_email'),
        );
        
        $data = $this->security->xss_clean($data);
        $result=$this->Stores->store_update_api($data,$store_id);
        
        if ($result) {
             $store_data=$this->db->from('store_set')->where(['store_id' => $store_id])->get()->result();
            $this->session->set_userdata(array('message' => "Store is Successfully Updated"));
            echo json_encode(['status' => 1, 'store_data' => $store_data[0]]);
            exit;
        }else{
            $this->session->set_flashdata('error', "Something went Wrong");
            echo json_encode(['status' => 0, 'store_data' => 'Unexpected Error']);
        }
    }

    public function save_tax_information() {
        
        $merchant_id = $this->input->post('merchant_id');
        $licence_key = $this->input->post('license_key');        

        $data = array(
                    'tax_setting_others'        => $this->input->post('tax_setting_others')
                );

        $check_terminal=$this->Terminals->check_terminal_exists($licence_key,$merchant_id);
        if($check_terminal==false){
            echo json_encode(['status' => 0, 'store_data' => "merchant_id or licence_key is not valid"]);
            die;
        }

        $data = $this->security->xss_clean($data);

        $result=$this->Stores->save_tax_information($data);

        if ($result) {
            $tax_setting_data=$this->db->from('tax_setting')->get()->result();
            $this->session->set_userdata(array('message' => "Tax Information has been saved successfully."));
            echo json_encode(['status' => 1, 'tax_setting_data' => $tax_setting_data[0]]);
            exit;
        }else{
            $this->session->set_flashdata('error', "Something went Wrong");
            echo json_encode(['status' => 0, 'message' => 'Unexpected Error']);
            exit;
        }
    }

    public function save_card_processor_settings() {
        
        $merchant_id = $this->input->post('merchant_id');
        $licence_key = $this->input->post('license_key');        

        $data = array(
                'card_transaction_api_url'            => $this->input->post('card_transaction_api_url'),
                'card_transaction_uat_api_url'        => $this->input->post('card_transaction_uat_api_url'),
                'card_transaction_api_key'            => $this->input->post('card_transaction_api_key'),
                'card_transaction_auth_key'           => $this->input->post('card_transaction_auth_key'),
                'card_transaction_merchant_id'        => $this->input->post('card_transaction_merchant_id'),
                'card_transaction_assoc_merchant_id'  => $this->input->post('card_transaction_assoc_merchant_id'),
                'card_transaction_terminal_hsn_no'    => $this->input->post('card_transaction_terminal_hsn_no'),
                'card_transaction_username'           => $this->input->post('card_transaction_username'),
                'card_transaction_password'           => $this->input->post('card_transaction_password'),
                'CLOVER_APP_SECRET'                   => $this->input->post('CLOVER_APP_SECRET'),
                'CLOVER_APP_ID'                       => $this->input->post('CLOVER_APP_ID'),
                'CLOVER_ACCESS_TOKEN'                 => $this->input->post('CLOVER_ACCESS_TOKEN'),
                'CLOVER_MERCHANT_ID'                  => $this->input->post('CLOVER_MERCHANT_ID'),
                'active_transaction_type'             => $this->input->post('active_transaction_type')
            );

        $check_terminal=$this->Terminals->check_terminal_exists($licence_key,$merchant_id);
        if($check_terminal==false){
            echo json_encode(['status' => 0, 'store_data' => "merchant_id or licence_key is not valid"]);
            die;
        }

        $data = $this->security->xss_clean($data);

        $result=$this->Stores->save_card_processor_settings($data);

        if ($result) {
            $card_processor_settings_data=$this->db->from('card_transaction_setting')->get()->result();
            $this->session->set_userdata(array('message' => "Card Processor Settings has been saved successfully."));
            echo json_encode(['status' => 1, 'card_processor_settings_data' => $card_processor_settings_data[0]]);
            exit;
        }else{
            $this->session->set_flashdata('error', "Something went Wrong");
            echo json_encode(['status' => 1, 'card_processor_settings_data' => 'Unexpected Error']);
        }
    }

    public function save_cash_register_information() {
        
        $merchant_id = $this->input->post('merchant_id');
        $licence_key = $this->input->post('license_key');        

        $data = array(
                'start_cash'           => $this->input->post('start_cash'),
                'cash_register'        => $this->input->post('cash_register'),
                'cashback_fee'         => $this->input->post('cashback_fee')
            );

        $check_terminal=$this->Terminals->check_terminal_exists($licence_key,$merchant_id);
        if($check_terminal==false){
            echo json_encode(['status' => 0, 'store_data' => "merchant_id or licence_key is not valid"]);
            die;
        }

        $data = $this->security->xss_clean($data);

        $result=$this->Stores->save_cash_register_information($data);

        if ($result) {
            $web_setting_data=$this->db->from('web_setting')->get()->result();
            $this->session->set_userdata(array('message' => "Cash Register Information has been saved successfully."));
            echo json_encode(['status' => 1, 'web_setting_data' => $web_setting_data[0]]);
            exit;
        }else{
            $this->session->set_flashdata('error', "Something went Wrong");
            echo json_encode(['status' => 1, 'web_setting_data' => 'Unexpected Error']);
        }
    }
}