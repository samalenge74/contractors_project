<?php

class Dropdowns extends CI_Model{

    public function master_sites()
    {
        $id = array('');
        $name = array('CHOOSE ONE');

        $this->db->distinct();
        $this->db->select('MASTER_SITE_NAME');
        $this->db->from('DRA_TENROX_INTEGRATION.dbo.vContractorsPortalDropdowns');
        $query = $this->db->get();
        $result = $query->result();

        for ($i = 0; $i < count($result); $i++)
        {
          array_push($id, $result[$i]->MASTER_SITE_NAME);
          array_push($name, $result[$i]->MASTER_SITE_NAME);

        }

        return array_combine($id, $name);
    }

    public function contractor_department($site)
    {
        $id = array('');
        $name = array('CHOOSE ONE');
        $site = urldecode($site);

        $this->db->distinct();
        $this->db->select('DEPARTMENT_NAME');
        $this->db->from('DRA_TENROX_INTEGRATION.dbo.vContractorsPortalDropdowns');
        $this->db->where('MASTER_SITE_NAME', $site);
        $query = $this->db->get();
        $result = $query->result();

        for ($i = 0; $i < count($result); $i++)
        {
          array_push($id, $result[$i]->DEPARTMENT_NAME);
          array_push($name, $result[$i]->DEPARTMENT_NAME);

        }

        return array_combine($id, $name);
    }

    public function contractor_functional_group_names($site, $department)
    {
        $id = array('CHOOSE');
        $name = array('CHOOSE ONE');
        $site = urldecode($site);
        $department = urldecode($department);
        if ($department == "ECI") {$department = "E, C & I";}

        $this->db3->distinct();
        $this->db3->select('FUNCTIONAL_GROUP_NAME');
        $this->db3->from('HRDATA.dbo.DRA_TENROX_vEMPLOYEE_DATA_ALL');
        $this->db3->where('MASTER_SITE_NAME', $site);
        $this->db3->Like('FUNCTIONAL_GROUP_NAME', $department);
        $query = $this->db3->get();
        $result = $query->result();

        for ($i = 0; $i < count($result); $i++)
        {
          array_push($id, $result[$i]->FUNCTIONAL_GROUP_NAME);
          array_push($name, $result[$i]->FUNCTIONAL_GROUP_NAME);

        }

        return array_combine($id, $name);
    }

	public function departments($site)
	{

        $site = urldecode($site);
        $this->db->select('DEPARTMENT_NAME');
        $this->db->from('DRA_TENROX_INTEGRATION.dbo.vContractorsPortalDropdowns');
        $this->db->where('MASTER_SITE_NAME', $site);
        $query = $this->db->get();
        $result = $query->result();

       return json_encode($result);
	}

    public function department_code($site, $department)
    {
        $site = urldecode($site);
        $department = urldecode($department);
        if ($department == "ECI") {$department = "E, C & I";}
        if($department == "UNDEFINED"){
            return ""; 
        }else{
            $this->db->select('DEPARTMENT_CODE');
            $this->db->from('DRA_TENROX_INTEGRATION.dbo.vContractorsPortalDropdowns');
            $this->db->where('MASTER_SITE_NAME', $site);
            $this->db->where('DEPARTMENT_NAME', $department);
            $query = $this->db->get();
            $result = $query->row();
            
            return $result->DEPARTMENT_CODE;
        }

        
    }

    public function functional_group_names($site, $department)
	{
		$site = urldecode($site);
        $department = urldecode($department);
        if ($department == "ECI") {$department = "E, C & I";}
        $this->db3->distinct();
        $this->db3->select('FUNCTIONAL_GROUP_NAME');
        $this->db3->from('HRDATA.dbo.DRA_TENROX_vEMPLOYEE_DATA_ALL');
        $this->db3->where('MASTER_SITE_NAME', $site);
        $this->db3->Like('FUNCTIONAL_GROUP_NAME', $department);
        $query = $this->db3->get();
        $result = $query->result();

        return json_encode($result);
	}
	
	public function line_managers()
    {
        $this->db3->distinct();
        $this->db3->Select('Code, FirstName, LastName, EmailAddress');
        $this->db3->from('HRData.dbo.EmployeeCodes');
        $query = $this->db3->get();
        $result = $query->result();

        $array = array();

        foreach ($query->result_array() as $row)
        {
            $array[] = $row['FirstName'].' '.$row['LastName'];
        }

        return json_encode($array);
    }

}


?>
