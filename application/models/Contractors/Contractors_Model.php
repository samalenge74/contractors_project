<?php

class Contractors_Model extends CI_Model{

	public function count_contractors()
	{
		$condition = "EMPLOYEE_TYPE = 'CONTRACTOR'";
		$this->db->Select('Count(1) as TOTAL');
		$this->db->from('DRA_TENROX_INTEGRATION.dbo.DRA_EMPLOYEE_DATA_MASTER');
		$this->db->where($condition);

		$query = $this->db->get();
		return $query->result();
	}
	
	public function count_users()
	{
		$this->db->Select('Count(RECORD_UID) as TOTAL');
		$this->db->from('DRA_TENROX_INTEGRATION.dbo.DRA_TENROX_SUPPORT_USERS');
		
		$query = $this->db->get();
		return $query->result();
	}

	public function contractors()
	{
		$condition = "EMPLOYEE_TYPE = 'CONTRACTOR'";
		$this->db->Select('*');
		$this->db->from('DRA_TENROX_INTEGRATION.dbo.DRA_EMPLOYEE_DATA_MASTER');
		$this->db->where($condition);

		$query = $this->db->get();
		return $query->result();
	}

	public function checkContractNumber($conNumber)
	{
		$this->db->Select('*');
		$this->db->from('DRA_TENROX_INTEGRATION.dbo.DRA_EMPLOYEE_DATA_MASTER');
		$this->db->where("EMPLOYEE_CONTRACT_NUMBER", $conNumber);
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			return true;
		}else{
			return false;
		}

	}

	public function exec_sp($sp, $parameter1, $parameter2, $parameter3, $parameter4, $parameter5, $parameter6, $parameter7, $parameter8, $parameter9, $parameter10, $parameter11, $parameter12, $parameter13, $parameter14, $parameter15)
	{
		
		return $this->db->query('EXEC ' . $sp . '?,?,?,?,?,?,?,?,?,?,?,?,?,?,?', array($parameter1, $parameter2, $parameter3, $parameter4, $parameter5, $parameter6, $parameter7, $parameter8, $parameter9, $parameter10, $parameter11, $parameter12, $parameter13, $parameter14, $parameter15));
	}

	public function contractor($id)
	{
		$this->db->Select('*');
		$this->db->from('DRA_TENROX_INTEGRATION.dbo.DRA_EMPLOYEE_DATA_MASTER');
		$this->db->where("PRIMARY_KEY", $id);

		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			return $row;
		}
		
	}

	public function line_managers()
	{
		$this->db3->Select('Code, FirstName, LastName, EmailAddress');
		$this->db3->from('HRData.dbo.EmployeeCodes');
		
		$query = $this->db3->get();
		return $query->result();
	}

}


?>
