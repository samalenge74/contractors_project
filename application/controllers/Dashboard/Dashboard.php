<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


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
	   $this->load->model('Contractors/Contractors_Model','', TRUE); // call this in every single controller
	  
	 }
 
	public function index()
	{	
		if($this->session->userdata('logged_in')){


            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
			$data['user_type'] = $session_data['user_type'];
           	$data['countContractors'] = $this->Contractors_Model->count_contractors(); // call this in every single controller

            //$data['usertype'] = $session_data['usertype'];
            //$data['loginCount'] = $session_data['loginCount'];
             

            $this->load->view('Templates/header', $data);
            $this->load->view('templates/sideMenu', $data);
            $this->load->view('Dashboard/dashboard', $data); //Main Dashboard
            $this->load->view('Templates/footer');
		}else{
			//If no session, redirect to login page
            redirect('index', 'refresh');
		}
	}


 	public function logout()
	 {
	 	$session_data = $this->session->userdata('logged_in');
	 	$this->User->logout_log($session_data['session_id'], date("Y-m-d H:i:s"));
	   	$this->session->unset_userdata('logged_in');
	   	session_destroy();

	   	redirect('index', 'refresh');
	 }

	 public function change_password()
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
	 
	 public function add_user()
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

	
	public function update_user_password()
	{
		$session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
		$username = $data['username'];
		$password = $_GET['txtNewPassword'];
		$this->User->updatePassword( $username, $password);
	}


}
?>
