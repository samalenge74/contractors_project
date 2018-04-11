<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class ResetPassword extends CI_Controller { 

	 function __construct()
		 {
		   parent::__construct();
		   $this->load->model('User','',TRUE);
		 }

	 function index()
	 {
	   //This method will have the credentials validation
	   $this->load->library('form_validation');

	   $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_email');

	   if($this->form_validation->run() == FALSE)
	   {
	     //Field validation failed.  User redirected to login page
	     $this->load->view('index');
	   }
	   else
	   {
	     //Go to private area
	     redirect('Contractors/Contractors/index', 'refresh');
	   }

	 }

	 function check_email($password)
	 {
	   //Field validation succeeded.  Validate against database
		 
	   $email = $this->input->post('email');

	   //query the database
	   $result = $this->User->check_email_address($email);
           
	   if($result)
	   {
	     $password = get_random_password();
	     $r = $this->User->reset_password($email, $password);
	     if($r){

	     	$config = array();
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'smtp.draglobal.com';
			$config['smtp_port'] = 25;
			$this->email->initialize($config);
			 
			$this->email->set_newline("\r\n");

	     	$from_email = 'no_reply@draglobal.com';
	     	$to_email = $email;
	     	$this->email->from($from_email, 'Password Reset');
	     	$this->email->to($to_email);
	     	$this->email->subject('DRA Contractors Portal New Password');
	     	$this->email->message('Good day \r\n \r\n New Password : ' .$password. '\r\n \r\n DRA Contractors Portal');
	     	if($this->email->send())
	     	{
	     		$this->form_validation->set_message('check_email', 'Password reset successful, an email has been sent containing the new password!');
	     		return false;
	     	}else{
	     		$this->form_validation->set_message('check_email', 'Password reset successful, an email has been sent containing the new password!');
	     	}
	     	
	     }else{
	     	$this->form_validation->set_message('check_email', 'Password reset failed, please try again!');
	     	return false;
	     }
	   }
	   else
	   {
	     $this->form_validation->set_message('check_email', 'Invalid email address');
	     return false;
	   }
	 }

	 function get_random_password($chars_min=6, $chars_max=8, $use_upper_case=false, $include_numbers=false, $include_special_chars=false)
	    {
	        $length = rand($chars_min, $chars_max);
	        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
	        if($include_numbers) {
	            $selection .= "1234567890";
	        }
	        if($include_special_chars) {
	            $selection .= "!@\"#$%&[]{}?|";
	        }
	                                
	        $password = "";
	        for($i=0; $i<$length; $i++) {
	            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];            
	            $password .=  $current_letter;
	        }                
	        
	      return $password;
	    }

	}
?>
