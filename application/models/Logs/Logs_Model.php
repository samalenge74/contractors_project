<?php

class Logs_Model extends CI_Model{

	public function get_execution_logs()
	{
		$condition = "DATABASE_NAME = 'DRA_TENROX_INTEGRATION_PROD'";
		$this->db2->Select('*');
		$this->db2->from('DRA_APPLICATION_EXECUTION_LOG');
		$this->db->where($condition);
		$this->db2->order_by('EXECUTION_START_DATETIME desc');

		$query = $this->db2->get();
		return $query->result();
	}

	// error log information
	// Count number of errors
	public function count_error_logs()
	{
		$condition = "ERROR_RESOLVED = '0' AND DATABASE_NAME = 'DRA_TENROX_INTEGRATION_PROD'";
		$this->db2->Select('Count(1) as TOTAL');
		$this->db2->from('DRA_APPLICATION_ERROR_LOG');
		$this->db2->where($condition);
		
		$query = $this->db2->get();
		return $query->result();
	}

	public function get_error_logs()
	{
		$condition = "ERROR_RESOLVED = '0' AND DATABASE_NAME = 'DRA_TENROX_INTEGRATION_PROD'";
		$this->db2->Select('*');
		$this->db2->from('DRA_APPLICATION_ERROR_LOG');
		$this->db2->where($condition);
		$this->db2->order_by('ERROR_DATETIME desc');

		$query = $this->db2->get();
		return $query->result();
	}




	// warning logs information
	// count number of warnings
	public function count_warning_logs()
	{
		$condition = "WARNING_RESOLVED = '0' AND DATABASE_NAME = 'DRA_TENROX_INTEGRATION_PROD'";
		$this->db2->Select('Count(1) as TOTAL');
		$this->db2->from('DRA_APPLICATION_WARNING_LOG');
		$this->db2->where($condition);

		$query = $this->db2->get();
		return $query->result();
	}

	public function get_warning_logs()
	{
		$condition = "WARNING_RESOLVED = '0' AND DATABASE_NAME = 'DRA_TENROX_INTEGRATION_PROD'";
		$this->db2->Select('*');
		$this->db2->from('DRA_APPLICATION_WARNING_LOG');
		$this->db2->where($condition);
		$this->db2->order_by('WARNING_DATETIME desc');

		$query = $this->db2->get();
		return $query->result();
	}






}


?>
