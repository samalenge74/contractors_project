 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit a Contractor
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
          <p><span class="label label-info"><?php echo $this->session->flashdata('reponse_add'); ?></span></p>
          <p><span class="label label-warning"><?php echo $this->session->flashdata('reponse_add_no'); ?></span></p>
          <div class="box-tools pull-right">
            <div class="box-tools pull-right">
              <a href='<?php echo site_url("Contractors/Contractors"); ?>' id='Dashboard' name='Dashboard' class='btn btn-success btn-circle' title='View Contractors'>View Contractors</a>
            </div>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button> -->
          </div>
        </div>
        <div class="box-body">
                  	<p class="validation_errors"><?php echo validation_errors(); ?></p>
                    
                    <?php echo form_open('Contractors/ManageContractors/edit', array()); ?></span>
                    <div class = "form-group">
                      <fieldset>
                        <legend>Contractor Details</legend>
                          <div class = "row">
                            <div class = "col-md-6">
                              <label for="EMP_FIRST_NAME">First Name</label>
                              <input type="text" class="form-control" id = "txtFirstName" name = "txtFirstName" value="<?php if(isset($contractor->EMPLOYEE_FIRST_NAME)) echo $contractor->EMPLOYEE_FIRST_NAME; ?>" readonly>
                            </div>
                            <div class = "col-md-6">
                              <label for="EMP_LAST_NAME">Last name</label>
                              <input type="text" class="form-control" id = "txtLastName" name = "txtLastName" value="<?php if(isset($contractor->EMPLOYEE_LAST_NAME)) echo $contractor->EMPLOYEE_LAST_NAME; ?>" readonly>
                            </div>
                          </div>
                      
                          <div class = "row">
                            <div class = "col-md-6">
                              <label for="CONTRACT_NUM">Contract Number</label>
                              <input type="text" class="form-control" id = "txtConNum" name = "txtConNum" value="<?php if(isset($contractor->EMPLOYEE_CONTRACT_NUMBER)) echo $contractor->EMPLOYEE_CONTRACT_NUMBER;; ?>" readonly>
                            </div>
                            <div class = "col-md-6">
                              <label for="EMP_CD">Employee Code</label>
                              <input type="text" class="form-control" id = "txtEmpCD" name = "txtEmpCD" value="<?php if(isset($contractor->EMPLOYEE_CD)) echo $contractor->EMPLOYEE_CD; ?>" readonly>
                            </div>
                          </div>

                          <div class = "row">
                            <div class = "col-md-6">
                              <label for="EMP_EMAIL">Employee Email Address</label>
                              <input type="Email" class="form-control" id = "txtEmpEmail" name = "txtEmpEmail" value="<?php if(isset($contractor->EMPLOYEE_EMAIL_ADDR)) echo $contractor->EMPLOYEE_EMAIL_ADDR; ?>">
                            </div>
                            <div class = "col-md-6">
                               <label for="EMP_GRP">Employee Hire Date</label>
                               <input type="text" class="form-control" id = "txtEmpHD" name = "txtEmpHD" value="<?php if(isset($contractor->EMPLOYEE_HIRE_DT)) echo $contractor->EMPLOYEE_HIRE_DT; ?>">
                            </div>
                          </div>
                        </fieldset> 
                        <hr> 
                        <fieldset>
                          <legend>Department Details</legend>
                            <div class="row">
                              <div class = "col-md-6">
                                <label for="EMP_REGION">Master Site name</label>
                                <?php $attributes = 'class="form-control txtMasterSite" id="txtMasterSite" name="txtMasterSite" required'; echo form_dropdown('txtMasterSite', $master_sites, set_value('master_sites'), $attributes); ?>
                                                          
                              </div>
                              <div class = "col-md-6">
                                <label for="EMP_REGION">Active Site name</label>
                                <?php $attributes = 'class="form-control" id="txtActiveSite" name="txtActiveSite" required'; echo form_dropdown('txtActiveSite', $master_sites, set_value('master_sites'), $attributes); ?>
                              </div>
                              
                            </div>

                      <div class = "row">
                        <div class = "col-md-6">
                          <label for="EMP_GRP">Department</label>
                          <select class="form-control txtEmpGRP" id="txtEmpGRP" name="txtEmpGRP" required>
                            <option value=""> --Select Master Site First--</option>
                          </select>
                          
                        </div>
                        <div class = "col-md-6">
                          <label for="EMP_LOG_ON">Employee Overhead Code</label>
                          <input type="text" class="form-control txtEOC" id = "txtEOC" name = "txtEOC" value="<?php if(isset($contractor->EMPLOYEE_OVERHEAD_CD)) echo $contractor->EMPLOYEE_OVERHEAD_CD; ?>">
                        </div>
                        
                      </div>
                      
                      <div class = "row">
                        <div class = "col-md-6">
                          <label for="LINE_MGR_EMAIL">Functional Group Name</label>
                          <select class="form-control txtFGN" id="txtFGN" name="txtFGN">
                            <option value=""> --Select Department First--</option>
                          </select>
                        </div>
                        <div class = "col-md-6">
                           <label for="LINE_MGR_EMAIL">Line Manager</label> <a href="#ex1" rel="modal:open"><i class="fa fa-search"></i></a>
                            <input type="text" class="form-control" id = "txtEmpLM" name = "txtEmpLM" value="<?php if(isset($contractor->REPORTS_TO_EMPLOYEE_CD)) echo $contractor->REPORTS_TO_EMPLOYEE_CD; ?>">
                        </div>
                      </div>
                      <div class = "row">
                        <div class = "col-md-6">
                          <label for="LINE_MGR_EMAIL">Line Manager Email</label>
                          <input type="Email" class="form-control" id = "txtEmpLME" name = "txtEmpLME" value="<?php if(isset($contractor->REPORTS_TO_EMAIL_ADDRESS)) echo $contractor->REPORTS_TO_EMAIL_ADDRESS; ?>">
                        </div>
                        <div class = "col-md-6">
                          <label for="LINE_MGR_EMAIL">Contractor requested by</label>
                          <input type="text" class="form-control" id = "txtCRB" name = "txtCRB" value="<?php if(isset($contractor->CONTRACTOR_REQUESTED_BY)) echo $contractor->CONTRACTOR_REQUESTED_BY; ?>">
                        </div>
                      </div>
                      </fieldset>
                      <hr>
                      <div class="row">
                      	<div class = "col-md-6">
          				        <button type="submit" class="btn btn-success pull-left" data-dismiss="modal" id="btnSave" name="btnSave" onclick="return confirm('Are you sure you want to save the changes?')">Save Changes</button>
						              <input type="hidden" class="form-control" id = "txtID" name = "txtID" value="<?php if(isset($contractor->PRIMARY_KEY)) echo $contractor->PRIMARY_KEY; ?>"><input type="hidden" class="form-control" id = "txtMode" name = "txtMode" value="edit">&nbsp;&nbsp;
                        </div>
                         <div class = "col-md-6">
                          
                        </div>
          			      </div>
                    </div>
                    </form>
                  </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
