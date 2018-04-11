<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	 {
	   parent::__construct();

	   $this->load->model('User','', TRUE);
	   $this->load->model('Logs/Logs_Model','', TRUE);
	   $this->load->model('Contractors/Contractors_Model','', TRUE);

	 }

	public function index()
	{
		//This method will have the credentials validation
	   $this->load->library('form_validation');

	   $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
	   $this->form_validation->set_rules('oldpass', 'Old Password', 'trim|required');
	   $this->form_validation->set_rules('newpass', 'New Password', 'trim|required');
	   $this->form_validation->set_rules('renewpass', 'Re-enter New Password', 'trim|required|callback_password_match');
	   	   

	   if($this->form_validation->run() == FALSE)
	   {
		    $session_data = $this->session->userdata('logged_in');
	        $data['name'] = $session_data['full_name'];
			$data['user_type'] = $session_data['user_type'];
	       	$data['countContractors'] = $this->Contractors_Model->count_contractors(); // call this in every single 
			$data['countUsers'] = $this->Contractors_Model->count_users();
	        $this->load->view('Templates/header', $data);
	        $this->load->view('templates/sideMenu', $data);
	        $this->load->view('password/change_password', $data); 
	        $this->load->view('Templates/footer');
	   }
	   else
	   {
	     //Go to private area

	   	   	$email = $this->input->post('email');	
		   	$password = $this->input->post('newpass');
		    
	   		$result = $this->User->reset_password($email, $password);

	     	if($result)
	     	{
	     		$this->session->set_flashdata('response','Password successfully updated.');
	     	}else{
	     		$this->session->set_flashdata('response_no','Password was not updated. Please try again!');
	     	}
	   }

	 }

	public function callback_password_match()
    {
        if ($this->input->post('newpass') != $this->input->post('renewpass'))  {
            $this->form_validation->set_message('callback_password_match', 'Passwords do not match.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
}

?>
