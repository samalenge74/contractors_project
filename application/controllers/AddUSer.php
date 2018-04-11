<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddUser extends CI_Controller {


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

	   $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|check_email_address');
	   $this->form_validation->set_rules('pass', 'Password', 'trim|required');
	   $this->form_validation->set_rules('fname', 'Full Name', 'trim|required');
	   
	   if($this->form_validation->run() == FALSE)
	   {
		
		$session_data = $this->session->userdata('logged_in');
        $data['name'] = $session_data['full_name'];
        $data['user_type'] = $session_data['user_type'];
       	$data['countContractors'] = $this->Contractors_Model->count_contractors(); // call this in every single 
       	$data['countUsers'] = $this->Contractors_Model->count_users(); // call this in every single controller

        $this->load->view('Templates/header', $data);
        $this->load->view('templates/sideMenu', $data);
        $this->load->view('Dashboard/add_user', $data); 
        $this->load->view('Templates/footer');
	   }
	   else
	   {
	     //Go to private area

	   	   	$email = $this->input->post('email');	
		   	$password = $this->input->post('pass');
		   	$fname = $this->input->post('fname');
		   	$utype = $this->input->post('utype');
		    
	   		$result = $this->User->add_user($email, $password, $fname, $utype);

	     	if($result)
	     	{
	     		$this->session->set_flashdata('response','Password successfully updated.');
	     	}else{
	     		$this->session->set_flashdata('response_no','Password was not updated. Please try again!');
	     	}
	   }

	 }

	public function check_email_address()
    {
    	$result = $this->User->check_email_address($this->input->post('email'));
        if ($result)  {
            $this->form_validation->set_message('check_email_address', 'Email address already exists.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
}

?>
