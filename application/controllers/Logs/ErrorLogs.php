<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorLogs extends CI_Controller { 


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
	   $this->load->model('Contractors/Contractors_Model','', TRUE); 
	   $this->load->model('Logs/Logs_Model','', TRUE);
	  
	 }
 
	public function index()
	{	
		if($this->session->userdata('logged_in')){


            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
			$data['countContractors'] = $this->Contractors_Model->count_contractors();
			$data['executionLogs'] = $this->Logs_Model->get_execution_logs();
			$data['countErrors'] = $this->Logs_Model->count_error_logs();
			$data['errorLogs'] = $this->Logs_Model->get_error_logs();
			$data['countWarnings'] = $this->Logs_Model->count_warning_logs();
            //$data['usertype'] = $session_data['usertype'];
            //$data['loginCount'] = $session_data['loginCount'];
             

            $this->load->view('Templates/header', $data);
            $this->load->view('templates/sideMenu', $data);
            $this->load->view('Logs/ErrorLogs', $data); //Main Dashboard
            $this->load->view('Templates/footer');
		}else{
			//If no session, redirect to login page
                    redirect('index', 'refresh');
		}
	}





	








	





}

?>