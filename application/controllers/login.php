<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 
	public function index()
	{
		
		
			$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required|callback_login_check'); 
					if ($this->form_validation->run() == FALSE)
					{
						 
						$this->load->view('login');
					
						}
					else{
				$roleid=$this->session->userdata('roleid');	
						if($roleid==1){
								redirect('dashboard', 'refresh');
						}
						
							redirect('exam/designer','refresh');
						
					}
					
		
		
		
	}
	
	
	//login password checking

	public function login_check($password)
	{

		//Field validation succeeded.  Validate against database		
		$login_flag=FALSE;
		$login_active_flag=FALSE;
		$username = $this->input->post('username');
		
		//query the database
		//$sql="SELECT username,password FROM tbl_staffs WHERE username='$username' AND PASSWORD='$password'";
		//$result = $this->login_db->get_results($sql);
		$login['table']='tbl_staffs';
		$login['where']['username']=$username;
		$login['where']['password']=$password;
		$count = total_rows($login);
		$flag=1;
		if($count == 0)
		{
			$flag=0;
			$logincan['table']='candidate';
			$logincan['where']['username']=$username;
			$logincan['where']['password']=$password;
			$count = total_rows($logincan);
		}
		if($count)
		{
		  $login_flag=TRUE;
		}
		else
		{
		  $this->form_validation->set_message('login_check', 'Invalid Track Id or password');
		  return FALSE;
		  $login_flag=FALSE;

		}
		
		if($login_flag=TRUE)
		{
			if($flag==1){
			$sql="SELECT staff_id,username,staff_code,roleid,DOJ,first_name,SYSDATE() currentdate FROM tbl_staffs where username='$username' ";
			$result = $this->login_db->get_results($sql);
			if($result)
			{
			  $sess_array = array();
			  foreach($result as $row)
			  {
				  $login_time = $row->currentdate;
				  
				  $sess_array = array(
					  'userid' => $row->staff_id,
					  'username' => $row->username,
					  'dateof_join' => $row->DOJ,
					  'login_time' => $row->currentdate,
					  'name' => $row->first_name,
					  'roleid' => $row->roleid
					);
				$this->session->set_userdata($sess_array);
				
			  }
			  $login_active_flag=TRUE;
			  
			}
		}
		else{
			$sql="SELECT candidate_id,username,first_name FROM candidate where username='$username' ";
			$result = $this->login_db->get_results($sql);
			if($result)
			{
			  $sess_array = array();
			  foreach($result as $row)
			  {
				  //$login_time = $row->currentdate;
				  
				  $sess_array = array(
					  'userid' => $row->candidate_id,
					  'username' => $row->username,
					  'name' => $row->first_name
					);
				$this->session->set_userdata($sess_array);
				
			  }
			  $login_active_flag=TRUE;
			  
			}
			
		}
			
			if($login_active_flag=TRUE)
			{			
			  return TRUE;
			}
			else
			{
			  $this->form_validation->set_message('login_check', 'Invalid Track Id (User is expired / Disabled');
			  return FALSE;
			}			
		}
	}	
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
