<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditContractor extends CI_Controller {


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
			$data['details'] = $this->Contractors_Model->contractor($this->input->post('txtID'));
			$data['line_managers'] = $this->Contractors_Model->line_managers();
			$data['countContractors'] = $this->Contractors_Model->count_contractors();
			$data['departments'] = $this->Dropdowns->departments(); 
			$data['functional_group_names'] = $this->Dropdowns->functional_group_names();
			$data['countUsers'] = $this->Contractors_Model->count_users();
			$data['executionLogs'] = $this->Logs_Model->get_execution_logs();
			$data['countErrors'] = $this->Logs_Model->count_error_logs();
			$data['countWarnings'] = $this->Logs_Model->count_warning_logs();
			$data['warningLogs'] = $this->Logs_Model->get_warning_logs();

			$this->load->view('Templates/header', $data);
			$this->load->view('templates/sideMenu', $data);
			$this->load->view('Contractors/editContractor', $data); //Main Dashboard
			$this->load->view('Templates/footer');
	   }
	   else
	   {
	     //Go to private area

	   	   $txtEmpPk = $this->input->post('txtConNum') . "-" . $this->input->post('txtEmpCD');
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
			var_dump($result);
			exit();
	   		if($result == 1){
	     		$this->session->set_flashdata('reponse_add', 'Contractor successfully updated.');
	     		redirect('Contractors/Contractors', 'refresh');
	   		}else{
	   			$this->session->set_flashdata('reponse_add_no', 'Contractor not updated.');
	   		}

	     	
	   }

	 }

	public function mastersite_check()
    {
        if ($this->input->post('txtMasterSite') === '')  {
            $this->form_validation->set_message('mastersite_check', 'Please choose a Master Site.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    public function activesite_check()
    {
        if ($this->input->post('txtActiveSite') === '')  {
            $this->form_validation->set_message('activesite_check', 'Please choose an Active Site.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    public function dropdown_GRP()
    {
        if ($this->input->post('txtEmpGRP') === 'CHOOSE')  {
            $this->form_validation->set_message('dropdown_GRP', 'Please choose a department.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    public function dropdown_FGN()
    {
        if ($this->input->post('txtFGN') === 'CHOOSE')  {
            $this->form_validation->set_message('dropdown_FGN', 'Please choose a Functional Group Name.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
}

?>
