<?php
	
	Class User extends CI_Model {

		// Read data using username and password
		public function login($username, $password) {

			$condition = "EMAIL_ADDRESS =" . "'" . $username . "' AND " . "Password =" . "'" . $password . "'";
			$this->db->select('*');
			$this->db->from('DRA_TENROX_INTEGRATION.dbo.DRA_TENROX_SUPPORT_USERS');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		// public function updatePassword($username, $password)
		// {
		// 	$this->db->set('Password', $password);
		// 	$this->db->where('EmailAddress', $username);
		// 	$this->db->update('users');
		// }

		public function login_log($time, $session_id, $user_id) {

			$data = array(
				'LOGGIN_TIME' => $time,
				'SESSION_ID' => $session_id,
				'USER_RECORD_UID' => $user_id
			);

			$this->db->insert('DRA_TENROX_INTEGRATION.dbo.DRA_CONTRACTORS_LOGIN_LOGS', $data);
		}

		public function logout_log($session_id, $time){
			$data = array(
				'LOGOUT_TIME' => $time
			);
			$this->db->where('SESSION_ID', $session_id);
			$this->db->update('DRA_TENROX_INTEGRATION.dbo.DRA_CONTRACTORS_LOGIN_LOGS', $data);
		}

		public function check_email_address($email){

			$condition = "EMAIL_ADDRESS =" . "'" . $email . "'";
			$this->db->select('*');
			$this->db->from('DRA_TENROX_INTEGRATION.dbo.DRA_TENROX_SUPPORT_USERS');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if($query->num_rows() == 1){
				return true;

			}else{
				return false;
			}

		}

		public function reset_password($email, $password){
			$data = array(
				'PASSWORD' => $password
			);
			$this->db->where('EMAIL_ADDRESS', $email);
			$this->db->update('DRA_TENROX_INTEGRATION.dbo.DRA_TENROX_SUPPORT_USERS', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		public function add_user($email, $password, $fname, $utype){
			$data = array(
				'EMAIL_ADDRESS' => $email,
				'PASSWORD' => $password,
				'FULL_NAME' => $fname,
				'USER_TYPE' => $utype
			);
			
			$this->db->insert('DRA_TENROX_INTEGRATION.dbo.DRA_TENROX_SUPPORT_USERS', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}

	}

?>