<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageContractors extends CI_Controller {


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

	public function edit()
	{
		//This method will have the credentials validation
	   $this->load->library('form_validation');

	   $this->form_validation->set_rules('txtEmpCD', 'Employee Code', 'trim|required');
	   $this->form_validation->set_rules('txtLastName', 'Last Name', 'trim|required');
	   $this->form_validation->set_rules('txtFirstName', 'First Name', 'trim|required');
	   $this->form_validation->set_rules('txtConNum', 'Contact Number', 'trim|required|is_natural');
	   $this->form_validation->set_rules('txtEmpEmail', 'Email Address', 'trim|required|valid_email');
	   $this->form_validation->set_rules('txtMasterSite', 'Master Site', 'trim|required|callback_mastersite_check');
	   $this->form_validation->set_rules('txtActiveSite', 'Active Site', 'trim|required|callback_activesite_check');
	   $this->form_validation->set_rules('txtEmpGRP', 'Department Name', 'trim|required|callback_dropdown_GRP');
	   $this->form_validation->set_rules('txtFGN', 'Functional Group Name', 'trim|required|callback_dropdown_FGN');
	   $this->form_validation->set_rules('txtEmpHD', 'Hire Date', 'trim|required');
	   $this->form_validation->set_rules('txtEmpLM', 'Line Manager', 'trim|required');
	   $this->form_validation->set_rules('txtEmpLME', 'Line Manager Email', 'trim|required|valid_email');
	   $this->form_validation->set_rules('txtCRB', 'Requested By', 'trim|required');
	   $this->form_validation->set_rules('txtEOC', 'Employee Overhead Code', 'trim|required');
	   

	   if($this->form_validation->run() == FALSE)
	   {
		    $session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['full_name'];
			$data['user_type'] = $session_data['user_type'];
			$data['email_address'] = $session_data['username'];
			$data['details'] = $this->Contractors_Model->contractor($this->input->post('txtEmpCD'));
			$details = $this->Contractors_Model->contractor($this->input->post('txtEmpCD'));
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
	   }
	   else
	   {
	     //Go to private area

	   	   $txtEmpPk = $this->input->post('txtEmpCD');
		   $txtEmpCD = $this->input->post('txtEmpCD');
		   $txtLastName = $this->input->post('txtLastName');
		   $txtFirstName = $this->input->post('txtFirstName');
		   $txtConNum = $this->input->post('txtConNum');
		   $txtEmpEmail = $this->input->post('txtEmpEmail');
		   $txtMasterSite = $this->input->post('txtMasterSite');
		   $txtActiveSite = $this->input->post('txtActiveSite');
		   $txtEmpGRP = $this->input->post('txtEmpGRP');
		   $txtFGN = $this->input->post('txtFGN');
		   $txtEmpHD = $this->input->post('txtEmpHD');
		   $txtEmpLM = $this->input->post('txtEmpLM');
		   $txtEmpLME = $this->input->post('txtEmpLME');
		   $txtCRB = $this->input->post('txtCRB');
		   $txtEOC = $this->input->post('txtEOC');

		   $sp = "dbo.DRA_UPDATE_CONTRACTOR_SP";

	   		$result = $this->Contractors_Model->exec_sp($sp, $txtEmpPk, $txtEmpCD , $txtLastName, $txtFirstName, $txtConNum, $txtEmpEmail, $txtMasterSite, $txtActiveSite, $txtEmpGRP, $txtFGN, $txtEmpHD, $txtEmpLM, $txtEmpLME, $txtCRB, $txtEOC);
			
	   		if($result){
	     		$this->session->set_flashdata('reponse_add', 'Contractor successfully updated.');
	     		redirect('Contractors/Contractors/editContractor/'. $txtEmpPk);
	   		}else{
	   			$this->session->set_flashdata('reponse_add_no', 'Contractor not updated.');
	   		}

	     	
	   }

	 }

	 public function delete($id)
	 {
	 	   $txtEmpPk = $id;
		   $txtEmpCD = "";
		   $txtLastName = "";
		   $txtFirstName = "";
		   $txtConNum = "";
		   $txtEmpEmail = "";
		   $txtMasterSite = "";
		   $txtActiveSite = "";
		   $txtEmpGRP = "";
		   $txtFGN = "";
		   $txtEmpHD = "";
		   $txtEmpLM = "";
		   $txtEmpLME = "";
		   $txtCRB = "";
		   $txtEOC = "";
		 	$details = $this->Contractors_Model->contractor($id);
		 	foreach ($details as $d) {
		 		$txtEmpCD = $d->EMPLOYEE_CD;
			   	$txtLastName = $d->EMPLOYEE_LAST_NAME;
			   	$txtFirstName = $d->EMPLOYEE_FIRST_NAME;
			   	$txtConNum = $d->EMPLOYEE_CONTRACT_NUMBER;
			   	$txtEmpEmail = $d->EMPLOYEE_EMAIL_ADDR;
			   	$txtMasterSite = $d->MASTER_SITE_NAME;
			   	$txtActiveSite = $d->ACTIVE_SITE_NAME;
			   	$txtEmpGRP = $d->EMPLOYEE_GROUP_NAME;
			   	$txtFGN = $d->FUNCTIONAL_GROUP_NAME;
			   	$txtEmpHD = $d->EMPLOYEE_HIRE_DT;
			   	$txtEmpLM = $d->REPORTS_TO_EMPLOYEE_CD;
			   	$txtEmpLME = $d->REPORTS_TO_EMAIL_ADDRESS;
			   	$txtCRB = $d->CONTRACTOR_REQUESTED_BY;
			   	$txtEOC = $d->EMPLOYEE_OVERHEAD_CD;
		 	}

		 	$sp = "dbo.DRA_TERMINATE_CONTRACTORS_SP";

	   		$result = $this->Contractors_Model->exec_sp($sp, $txtEmpPk, $txtEmpCD , $txtLastName, $txtFirstName, $txtConNum, $txtEmpEmail, $txtMasterSite, $txtActiveSite, $txtEmpGRP, $txtFGN, $txtEmpHD, $txtEmpLM, $txtEmpLME, $txtCRB, $txtEOC);
	   		
	   		if($result){
	     		$this->session->set_flashdata('reponse_add', 'Contractor successfully terminated.');
	     		redirect('Contractors/Contractors/viewContractor/'. $txtEmpPk);
	   		}else{
	   			$this->session->set_flashdata('reponse_add_no', 'Contractor not terminated.');
	   		}
	 }

	 public function activate($id)
	 {
	 	   $txtEmpPk = $id;
		   $txtEmpCD = "";
		   $txtLastName = "";
		   $txtFirstName = "";
		   $txtConNum = "";
		   $txtEmpEmail = "";
		   $txtMasterSite = "";
		   $txtActiveSite = "";
		   $txtEmpGRP = "";
		   $txtFGN = "";
		   $txtEmpHD = "";
		   $txtEmpLM = "";
		   $txtEmpLME = "";
		   $txtCRB = "";
		   $txtEOC = "";
		 	$details = $this->Contractors_Model->contractor($id);
		 	foreach ($details as $d) {
		 		$txtEmpCD = $d->EMPLOYEE_CD;
			   	$txtLastName = $d->EMPLOYEE_LAST_NAME;
			   	$txtFirstName = $d->EMPLOYEE_FIRST_NAME;
			   	$txtConNum = $d->EMPLOYEE_CONTRACT_NUMBER;
			   	$txtEmpEmail = $d->EMPLOYEE_EMAIL_ADDR;
			   	$txtMasterSite = $d->MASTER_SITE_NAME;
			   	$txtActiveSite = $d->ACTIVE_SITE_NAME;
			   	$txtEmpGRP = $d->EMPLOYEE_GROUP_NAME;
			   	$txtFGN = $d->FUNCTIONAL_GROUP_NAME;
			   	$txtEmpHD = $d->EMPLOYEE_HIRE_DT;
			   	$txtEmpLM = $d->REPORTS_TO_EMPLOYEE_CD;
			   	$txtEmpLME = $d->REPORTS_TO_EMAIL_ADDRESS;
			   	$txtCRB = $d->CONTRACTOR_REQUESTED_BY;
			   	$txtEOC = $d->EMPLOYEE_OVERHEAD_CD;
		 	}

		 	$sp = "dbo.DRA_ACTIVATE_CONTRACTOR_SP";

	   		$result = $this->Contractors_Model->exec_sp($sp, $txtEmpPk, $txtEmpCD , $txtLastName, $txtFirstName, $txtConNum, $txtEmpEmail, $txtMasterSite, $txtActiveSite, $txtEmpGRP, $txtFGN, $txtEmpHD, $txtEmpLM, $txtEmpLME, $txtCRB, $txtEOC);
	   		
	   		if($result){
	     		$this->session->set_flashdata('reponse_add', 'Contractor successfully Activated.');
	     		redirect('Contractors/Contractors/viewContractor/'. $txtEmpPk);
	   		}else{
	   			$this->session->set_flashdata('reponse_add_no', 'Contractor not activated.');
	   		}
	 }



	public function mastersite_check()
    {
        if ($this->input->post('txtMasterSite') === '' || $this->input->post('txtMasterSite') === 'CHOOSE')  {
            $this->form_validation->set_message('mastersite_check', 'Please choose a Master Site.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    public function activesite_check()
    {
        if ($this->input->post('txtActiveSite') === ''  || $this->input->post('txtMasterSite') === 'CHOOSE')  {
            $this->form_validation->set_message('activesite_check', 'Please choose an Active Site.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    public function dropdown_GRP()
    {
        if ($this->input->post('txtEmpGRP') === 'CHOOSE' || $this->input->post('txtEmpGRP') === '')  {
            $this->form_validation->set_message('dropdown_GRP', 'Please choose a department.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    public function dropdown_FGN()
    {
        if ($this->input->post('txtFGN') === 'CHOOSE' || $this->input->post('txtFGN') === '')  {
            $this->form_validation->set_message('dropdown_FGN', 'Please choose a Functional Group Name.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
	
	public function line_managers()
    {
    	echo $this->Dropdowns->line_managers();
    }
}

?>
