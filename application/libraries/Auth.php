<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
	//Login....
	
	public function merchant_do_login($username,$password)
	{
		$CI =& get_instance();
		$CI->load->model('Users');
		$module_id = array();
		$result = $CI->Users->check_valid_user_by_store($username);
	
        if ($result)
		{
			$key = md5(time());
			$key = str_replace("1", "z", $key);
			$key = str_replace("2", "J", $key);
			$key = str_replace("3", "y", $key);
			$key = str_replace("4", "R", $key);
			$key = str_replace("5", "Kd", $key);
			$key = str_replace("6", "jX", $key);
			$key = str_replace("7", "dH", $key);
			$key = str_replace("8", "p", $key);
			$key = str_replace("9", "Uf", $key);
			$key = str_replace("0", "eXnyiKFj", $key);
			$sid_web = substr($key, rand(0, 3), rand(28, 32));
			$usertype = ($result[0]['user_type'] != '') ? $result[0]['user_type'] : '1';
			// Call Module tab
			$modrights = $CI->Users->get_module_rights($usertype);

			
			//print_r($modrights);
			
			foreach($modrights as $rights)
			{  
				array_push($module_id, $rights['module_id']) ;
			}
			//print_r($module_id);exit;


			
			// codeigniter session stored data			
			$user_data = array(
				'sid_web' 		=> $sid_web,
				'user_id' 		=> $result[0]['user_id'],
				'store_id' 		=> $result[0]['store_id'],
				'user_type' 	=> $usertype,
				//'user_type' 	=> $result[0]['user_type'],
				'user_name' 	=> $result[0]['first_name']." ".$result[0]['last_name'],
				'user_email' 	=> $result[0]['username'],
				'logo' 			=> $result[0]['logo'],
				'module_id' => $module_id,
				'module_data' => $modrights,
				'is_switch' => 'yes',
				
			);

			$merchant_id=$CI->input->get('merchant_id');
			if(isset($merchant_id)){
				$user_data['merchant_id']=$merchant_id;
			}

          	$CI->session->set_userdata($user_data);
           	return TRUE;
		}else{
			return FALSE;
        }
	}

	public function login($username,$password)
	{
		$CI =& get_instance();
		$CI->load->model('Users');
		$module_id = array();
		$result = $CI->Users->check_valid_user($username,$password);
	
        if ($result)
		{
			$key = md5(time());
			$key = str_replace("1", "z", $key);
			$key = str_replace("2", "J", $key);
			$key = str_replace("3", "y", $key);
			$key = str_replace("4", "R", $key);
			$key = str_replace("5", "Kd", $key);
			$key = str_replace("6", "jX", $key);
			$key = str_replace("7", "dH", $key);
			$key = str_replace("8", "p", $key);
			$key = str_replace("9", "Uf", $key);
			$key = str_replace("0", "eXnyiKFj", $key);
			$sid_web = substr($key, rand(0, 3), rand(28, 32));
			$usertype = ($result[0]['user_type'] != '') ? $result[0]['user_type'] : '1';
			// Call Module tab
			$modrights = $CI->Users->get_module_rights($usertype);

			
			//print_r($modrights);
			
			foreach($modrights as $rights)
			{  
				array_push($module_id, $rights['module_id']) ;
			}
			//print_r($module_id);exit;


			
			// codeigniter session stored data			
			$user_data = array(
				'sid_web' 		=> $sid_web,
				'user_id' 		=> $result[0]['user_id'],
				'store_id' 		=> $result[0]['store_id'],
				'user_type' 	=> $usertype,
				//'user_type' 	=> $result[0]['user_type'],
				'user_name' 	=> $result[0]['first_name']." ".$result[0]['last_name'],
				'user_email' 	=> $result[0]['username'],
				'logo' 			=> $result[0]['logo'],
				'module_id' => $module_id,
				'module_data' => $modrights
			);

          	$CI->session->set_userdata($user_data);
           	return TRUE;
		}else{
			return FALSE;
        }
	}
	//Check if is logged....
	public function is_logged()
	{
		$CI =& get_instance();
        if($CI->session->userdata('sid_web'))
		{
			return true;
		}
		return false;
	}
	//Logout....
	public function logout()
	{
		$CI =& get_instance();
		$user_data = array(
				'sid_web','user_id' ,'user_type','user_name'
			);
        $CI->session->sess_destroy();
		return true;
	}

	//Check for logged in user is Admin or not.
	public function is_admin()
	{
		$CI =& get_instance();
        if ($CI->session->userdata('user_type')== 1 || $CI->session->userdata('user_type')== 2 )
		{
			return true;
		}
		return false;
	}	

	//Check for logged in user is Admin or not.
	public function is_store()
	{
		$CI =& get_instance();
        if ($CI->session->userdata('user_type') == 4)
		{
			return true;
		}
		return false;
	}
	
	//Check admin auth
	function check_admin_auth($url='')
	{   
        if($url==''){$url = base_url().'admin';}
		$CI =& get_instance();
        if ((!$this->is_logged()) || (!$this->is_admin()))
		{ 
			$this->logout();
			$error = display('you_are_not_authorised');
			$CI->session->set_userdata(array('error_message'=>$error));
            redirect($url,'refresh'); exit;
        }
	}	

	//Check store auth
	function check_store_auth($url='')
	{   
        if($url==''){$url = base_url().'admin';}
		$CI =& get_instance();
        if ((!$this->is_logged()) || (!$this->is_store()))
		{ 
			$this->logout();
			$error = display('you_are_not_authorised');
			$CI->session->set_userdata(array('error_message'=>$error));
            redirect($url,'refresh'); exit;
        }
	}

	//Check admin and store auth
	function check_admin_store_auth($url='')
	{   
        if($url==''){$url = base_url().'admin';}
		$CI =& get_instance();
        if ((!$this->is_logged()) && (!$this->is_admin()) && (!$this->is_store()))
		{ 
			$this->logout();
			$error = display('you_are_not_authorised');
			$CI->session->set_userdata(array('error_message'=>$error));
            redirect($url,'refresh'); exit;
        }else{
            return true;
        }
	}	
	
	//This function is used to Generate Key
	public function generator($lenth)
	{
		$number=array("A","B","C","D","E","F","G","H","I","J","K","L","N","M","O","P","Q","R","S","U","V","T","W","X","Y","Z","1","2","3","4","5","6","7","8","9","0");
	
		for($i=0; $i<$lenth; $i++)
		{
			$rand_value=rand(0,34);
			$rand_number=$number["$rand_value"];
		
			if(empty($con))
			{ 
			$con=$rand_number;
			}
			else
			{
			$con="$con"."$rand_number";}
		}
		return $con;
	}

}
?>