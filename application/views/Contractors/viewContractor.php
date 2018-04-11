<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Contractor Details
        <small></small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li>
          <a href="<?php echo site_url('Dashboard/Dashboard/index'); ?>">
          <i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li class="active">Add a contrcator</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

     <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $contractor->EMPLOYEE_FIRST_NAME . " " . $contractor->EMPLOYEE_LAST_NAME ." - "?><?php if($contractor->EMPLOYEE_EMPLOYMENT_STATUS == 1) echo "Active"; else echo 'Inactive';?></h3>

          <div class="box-tools pull-right">
            <a href='<?php echo site_url("Contractors/Contractors/editContractor/$contractor->PRIMARY_KEY"); ?>' id = 'edit' name ='edit' class='btn btn-warning btn-circle' title='Edit Contractor'>Edit <?= $contractor->EMPLOYEE_FIRST_NAME . " " . $contractor->EMPLOYEE_LAST_NAME ?> Details</a>
            <?php 
              if($status == 1){
                echo "<a href='" . site_url("Contractors/ManageContractors/delete/$contractor->PRIMARY_KEY") . "'id='delete' name='delete' class='btn btn-danger btn-circle' title='Terminate Contract' onClick='javascript:return confirm(\"Are you sure to you want to terminate the contract?\")'>Terminate ".$contractor->EMPLOYEE_FIRST_NAME . " " . $contractor->EMPLOYEE_LAST_NAME." Contract</a>";
              }else{
                echo "<a href='" . site_url("Contractors/ManageContractors/activate/$contractor->PRIMARY_KEY") . "'id='activate' name='activate' class='btn btn-primary btn-circle' title='Activate Contract' onClick='javascript:return confirm(\"Are you sure you want to activate the contract?\")'>Activate ".$contractor->EMPLOYEE_FIRST_NAME . " " . $contractor->EMPLOYEE_LAST_NAME." Contract</a>";
              }

            ?>
            <a href='<?php echo site_url("Contractors/Contractors"); ?>' id='Dashboard' name='Dashboard' class='btn btn-success btn-circle' title='View Contractors'>View Contractors</a>

          </div>
        </div>
        <div class="box-body">
            <form>
                    <div class = "form-group">
                      <fieldset>
                        <legend>Contractor Details</legend>
                        <div class = "row">
                          <div class = "col-md-6">
                            <label for="txtFirstName">First Name</label>
                            <input type="text" class="form-control" id = "txtFirstName" name = "txtFirstName" value="<?php if(isset($contractor->EMPLOYEE_FIRST_NAME)) echo $contractor->EMPLOYEE_FIRST_NAME; ?>" readonly>
                          </div>
                          <div class = "col-md-6">
                            <label for="txtLastName">Last name</label>
                            <input type="text" class="form-control" id = "txtLastName" name = "txtLastName" value="<?php if(isset($contractor->EMPLOYEE_LAST_NAME)) echo $contractor->EMPLOYEE_LAST_NAME; ?>" readonly>
                          </div>
                        </div>
                        <div class = "row">
                          <div class = "col-md-6">
                            <label for="txtConNum">Contract Number</label>
                            <input type="text" class="form-control" id = "txtConNum" name = "txtConNum" value="<?php if(isset($contractor->EMPLOYEE_CONTRACT_NUMBER)) echo $contractor->EMPLOYEE_CONTRACT_NUMBER; ?>" readonly>
                          </div>
                          <div class = "col-md-6">
                            <label for="txtEmpCD">Employee Code</label>
                            <input type="text" class="form-control" id = "txtEmpCD" name = "txtEmpCD" value="<?php if(isset($contractor->EMPLOYEE_CD)) echo $contractor->EMPLOYEE_CD; ?>" readonly>
                          </div>
                        </div>
                        <div class = "row">
                          <div class = "col-md-6">
                            <label for="txtEmpEmail">Employee Email Address</label>
                            <input type="Email" class="form-control" id = "txtEmpEmail" name = "txtEmpEmail" value="<?php if(isset($contractor->EMPLOYEE_EMAIL_ADDR)) echo $contractor->EMPLOYEE_EMAIL_ADDR; ?>" readonly>
                          </div>
                          <div class = "col-md-6">
                             <label for="txtEmpHD">Employee Hire Date</label>
                             <input type="text" class="form-control" id = "txtEmpHD" name = "txtEmpHD" value="<?php if(isset($contractor->EMPLOYEE_HIRE_DT)) echo $contractor->EMPLOYEE_HIRE_DT; ?>" readonly>
                          </div>
                        </div>
                      </fieldset> 
                      <hr> 
                      <fieldset>
                        <legend>Department Details</legend>
                        <div class="row">
                          <div class = "col-md-6">
                            <label for="txtMasterSite">Master Site name</label>
                            <input type="text" class="form-control" id = "txtMasterSite" name = "txtMasterSite" value="<?php if(isset($contractor->MASTER_SITE_NAME)) echo $contractor->MASTER_SITE_NAME; ?>" readonly>
                          </div>
                          <div class = "col-md-6">
                            <label for="txtActiveSite">Active Site name</label>
                            <input type="text" class="form-control" id = "txtActiveSite" name = "txtActiveSite" value="<?php if(isset($contractor->ACTIVE_SITE_NAME)) echo $contractor->ACTIVE_SITE_NAME; ?>" readonly>
                          </div>
                        </div>

                      <div class = "row">
                        <div class = "col-md-6">
                            <label for="txtEmpGRP">Department</label>
                            <input type="text" class="form-control" id = "txtEmpGRP" name = "txtEmpGRP" value="<?php if(isset($contractor->EMPLOYEE_GROUP_NAME)) echo $contractor->EMPLOYEE_GROUP_NAME; ?>" readonly>
                            
                          </div>
                        <div class = "col-md-6">
                          <label for="txtEOC">Employee Overhead Code</label>
                          <input type="text" class="form-control" id = "txtEOC" name = "txtEOC" value="<?php if(isset($contractor->EMPLOYEE_OVERHEAD_CD)) echo $contractor->EMPLOYEE_OVERHEAD_CD; ?>" readonly>
                        </div>
                      </div>
                      
                      <div class = "row">
                        <div class = "col-md-6">
                          <label for="txtFGN">Functional Group Name</label>
                          <input type="Email" class="form-control" id = "txtFGN" name = "txtFGN" value="<?php if(isset($contractor->FUNCTIONAL_GROUP_NAME)) echo $contractor->FUNCTIONAL_GROUP_NAME; ?>" readonly>
                          
                        </div>
                        <div class = "col-md-6">
                           <label for="txtEmpLM">Line Manager</label>
                            <input type="text" class="form-control" id = "txtEmpLM" name = "txtEmpLM" value="<?php if(isset($contractor->REPORTS_TO_EMPLOYEE_CD)) echo $contractor->REPORTS_TO_EMPLOYEE_CD; ?>" readonly>
                        </div>
                      </div>
                      
                      <div class = "row">
                        <div class = "col-md-6">
                          <label for="txtEmpLME">Line Manager Email</label>
                          <input type="Email" class="form-control" id = "txtEmpLME" name = "txtEmpLME" value="<?php if(isset($contractor->REPORTS_TO_EMAIL_ADDRESS)) echo $contractor->REPORTS_TO_EMAIL_ADDRESS; ?>" readonly>
                        </div>
                        <div class = "col-md-6">
                          <label for="txtCRB">Contractor requested by</label>
                          <input type="text" class="form-control" id = "txtCRB" name = "txtCRB" value="<?php if(isset($contractor->CONTRACTOR_REQUESTED_BY)) echo $contractor->CONTRACTOR_REQUESTED_BY; ?>" readonly>
                        </div>
                      </div>
                      </fieldset>
                      <hr>
                      
                    </div>
                </form>
                <div class="row">
                  <div class = "col-md-6">
                    
                  </div>
                </div>
      	</div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
