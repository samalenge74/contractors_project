<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contractors extends CI_Controller {


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
	   $this->load->model('dropdowns/Dropdowns','', TRUE);

	 }

	public function index()
	{
		if($this->session->userdata('logged_in')){


			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['full_name'];
			$data['user_type'] = $session_data['user_type'];
			$data['countContractors'] = $this->Contractors_Model->count_contractors();
			$data['countUsers'] = $this->Contractors_Model->count_users();
			$data['contractors'] = $this->Contractors_Model->contractors();
			$data['executionLogs'] = $this->Logs_Model->get_execution_logs();
			$data['countErrors'] = $this->Logs_Model->count_error_logs();
			$data['countWarnings'] = $this->Logs_Model->count_warning_logs();
			$data['warningLogs'] = $this->Logs_Model->get_warning_logs();


			//$data['usertype'] = $session_data['usertype'];
			//$data['loginCount'] = $session_data['loginCount'];
			$this->load->view('Templates/header', $data);
			$this->load->view('templates/sideMenu', $data);
			$this->load->view('Contractors/contractors', $data); //Main Dashboard
			$this->load->view('Templates/footer');
		}else{
			//If no session, redirect to login page
                    redirect('index', 'refresh');
		}
	}

	public function addContractors()
	{
		if($this->session->userdata('logged_in')){


			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['full_name'];
			$data['user_type'] = $session_data['user_type'];
			$data['email_address'] = $session_data['username'];
			$data['master_sites'] = $this->Dropdowns->master_sites(); 
			$data['line_managers'] = $this->Contractors_Model->line_managers();
			$data['countContractors'] = $this->Contractors_Model->count_contractors();
			$data['countUsers'] = $this->Contractors_Model->count_users();
			$data['executionLogs'] = $this->Logs_Model->get_execution_logs();
			$data['countErrors'] = $this->Logs_Model->count_error_logs();
			$data['countWarnings'] = $this->Logs_Model->count_warning_logs();
			$data['warningLogs'] = $this->Logs_Model->get_warning_logs();


			//$data['usertype'] = $session_data['usertype'];
			//$data['loginCount'] = $session_data['loginCount'];
			$this->load->view('Templates/header', $data);
			$this->load->view('templates/sideMenu', $data);
			$this->load->view('Contractors/addContractor', $data); //Main Dashboard
			$this->load->view('Templates/footer');
		}else{
			//If no session, redirect to login page
                    redirect('index', 'refresh');
		}
	}

	public function editContractor($id)
	{
		if($this->session->userdata('logged_in')){


			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['full_name'];
			$data['user_type'] = $session_data['user_type'];
			$data['email_address'] = $session_data['username'];
			$data['contractor'] = $this->Contractors_Model->contractor($id);
			$details = $this->Contractors_Model->contractor($id);
			$data['master_sites'] = $this->Dropdowns->master_sites(); 
			$data['countContractors'] = $this->Contractors_Model->count_contractors();
			$data['countUsers'] = $this->Contractors_Model->count_users();
			$data['departments'] = $this->Dropdowns->contractor_department($details[0]->MASTER_SITE_NAME); 
			$data['functional_group_names'] = $this->Dropdowns->contractor_functional_group_names($details[0]->MASTER_SITE_NAME, $details[0]->EMPLOYEE_GROUP_NAME);
			$data['line_managers'] = $this->Contractors_Model->line_managers();
			$data['executionLogs'] = $this->Logs_Model->get_execution_logs();
			$data['countErrors'] = $this->Logs_Model->count_error_logs();
			$data['countWarnings'] = $this->Logs_Model->count_warning_logs();
			$data['warningLogs'] = $this->Logs_Model->get_warning_logs();


			//$data['usertype'] = $session_data['usertype'];
			//$data['loginCount'] = $session_data['loginCount'];
			$this->load->view('Templates/header', $data);
			$this->load->view('templates/sideMenu', $data);
			$this->load->view('Contractors/editContractor', $data); //Main Dashboard
			$this->load->view('Templates/footer');
		}else{
			//If no session, redirect to login page
                    redirect('index', 'refresh');
		}
	}

	public function viewContractor($id)
	{
		if($this->session->userdata('logged_in')){


			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['full_name'];
			$data['user_type'] = $session_data['user_type'];
			$data['email_address'] = $session_data['username'];
			$data['contractor'] = $this->Contractors_Model->contractor($id);
			$details = $this->Contractors_Model->contractor($id);
			$data['master_sites'] = $this->Dropdowns->master_sites(); 
			$data['countContractors'] = $this->Contractors_Model->count_contractors();
			$data['countUsers'] = $this->Contractors_Model->count_users();
			$data['departments'] = $this->Dropdowns->contractor_department($details[0]->MASTER_SITE_NAME); 
			$data['functional_group_names'] = $this->Dropdowns->contractor_functional_group_names($details[0]->MASTER_SITE_NAME, $details[0]->EMPLOYEE_GROUP_NAME);
			$data['line_managers'] = $this->Contractors_Model->line_managers();
			$data['executionLogs'] = $this->Logs_Model->get_execution_logs();
			$data['countErrors'] = $this->Logs_Model->count_error_logs();
			$data['countWarnings'] = $this->Logs_Model->count_warning_logs();
			$data['warningLogs'] = $this->Logs_Model->get_warning_logs();


			//$data['usertype'] = $session_data['usertype'];
			//$data['loginCount'] = $session_data['loginCount'];
			$this->load->view('Templates/header', $data);
			$this->load->view('templates/sideMenu', $data);
			$this->load->view('Contractors/viewContractor', $data); //Main Dashboard
			$this->load->view('Templates/footer');
		}else{
			//If no session, redirect to login page
                    redirect('index', 'refresh');
		}
	}
	
	
    public function line_managers()
    {
    	$data = $this->Dropdowns->line_managers();
		
		echo $data;
    }

	public function departments($sites){
		$data = $this->Dropdowns->departments($sites);
		echo $data;
	}

	public function functional_group_names($site, $department){
		$data = $this->Dropdowns->functional_group_names($site, $department);
		echo $data;
	}

	public function department_code($site, $department){
		$data = $this->Dropdowns->department_code($site, $department);
		echo json_encode($data);
	}

	public function contractors(){
		$data = $this->Contractors_Model->contractors();
		echo json_encode($data);
	}


}


?>
