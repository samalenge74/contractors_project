 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add a Contractor
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
          <h3 class="box-title">New Contractor</h3>
          <div class="box-tools pull-right">
            <div class="box-tools pull-right">
              <a href='<?php echo site_url("Contractors/Contractors"); ?>' id='Dashboard' name='Dashboard' class='btn btn-success btn-circle' title='View Contractors'>View Contractors</a>
            </div>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button> -->
          </div>
        </div>
        <div class="box-body">
          <p class="validation_errors"><?php echo validation_errors(); ?></p>
          <span class="label label-info"><?php echo $this->session->flashdata('reponse_add'); ?></span>
          <span class="label label-warning"><?php echo $this->session->flashdata('reponse_add_no'); ?></span>
          <?php echo form_open('Contractors/addContractor'); ?></span>
          <div class = "form-group">
            <fieldset>
              <legend>Contractor Details</legend>
              <div class = "row">
                <div class = "col-md-6">
                  <label for="EMP_FIRST_NAME">First Name</label>
                  <input type="text" class="form-control" id = "txtFirstName" name = "txtFirstName" placeholder="First Name" required>
                </div>
                <div class = "col-md-6">
                  <label for="EMP_LAST_NAME">Last name</label>
                  <input type="text" class="form-control" id = "txtLastName" name = "txtLastName" placeholder="Last Name" required>
                </div>
                
              </div>
                      
              <div class = "row">
                <div class = "col-md-6">
                  <label for="CONTRACT_NUM">Contract Number</label>
                  <input type="text" class="form-control" id = "txtConNum" name = "txtConNum" placeholder="Contract Number" required>
                </div>
                <div class = "col-md-6">
                  <label for="EMP_CD">Employee Code</label>
                  <input type="text" class="form-control" id = "txtEmpCD" name = "txtEmpCD" placeholder="Employee Code" readonly>
                </div>
              </div>
                      
              <div class = "row">
                <div class = "col-md-6">
                  <label for="EMP_EMAIL">Employee Email Address</label>
                  <input type="Email" class="form-control" id = "txtEmpEmail" name = "txtEmpEmail" placeholder="Email Address" required>
                </div>
                <div class = "col-md-6">
                   <label for="EMP_GRP">Employee Hire Date</label>
                   <input type="text" class="form-control" id = "txtEmpHD" name = "txtEmpHD" placeholder="Employee Hire Date" required>
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
                  <input type="text" class="form-control txtEOC" id = "txtEOC" name = "txtEOC" placeholder="Employee Overhead Code" required>
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
                    <input type="text" class="form-control" id = "txtEmpLM" name = "txtEmpLM" placeholder="Use the search Icon above" required>
                </div>       
              </div>
                        
              <div class = "row">
                <div class = "col-md-6">
                  <label for="LINE_MGR_EMAIL">Contractor requested by</label>
                  <input type="text" class="form-control" id = "txtCRB" name = "txtCRB" value="<?= $email_address; ?>" required>
                </div>
                <div class = "col-md-6">
                  <label for="LINE_MGR_EMAIL">Line Manager Email</label>
                  <input type="Email" class="form-control" id = "txtEmpLME" name = "txtEmpLME" placeholder="Line Manager Email" required>
                </div>
              </div>
            </fieldset>       
            
            <hr>
            <div class="row">
              <div class = "col-md-6">
                <button type="submit" class="btn btn-success pull-left" data-dismiss="modal" id="btnSave" name="btnSave">Add Contractor</button>
								<input type="hidden" class="form-control" id = "txtMode" name = "txtMode" value="add">  
              </div>
              <div class = "col-md-6">
                <!-- <span class="label label-info"><?php echo $this->session->flashdata('reponse_add'); ?></span>
                <span class="label label-warning"><?php echo $this->session->flashdata('reponse_add_no'); ?></span> -->
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
