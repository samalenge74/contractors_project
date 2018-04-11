 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New User Panel
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
	          <h3 class="box-title">Add User</h3>

	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	              <i class="fa fa-minus"></i></button>
	            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
	              <i class="fa fa-times"></i></button>
	          </div>
	        </div>
	        <div class="box-body">
	          	<p class="validation_errors"><?php echo validation_errors(); ?></p>
				<?php echo form_open('AddUser'); ?>
	                <div class = "form-group">
	                	<div class = "row">
		                    <div class = "col-md-6">
		                      <lable for="EMP_PK">Email Address</lable>
		                      <input type="email" class="form-control" id = "email" name = "email" placeholder="email address">
		                    </div>
	                    </div>
	                  	<div class = "row">
		                    <div class = "col-md-6">
		                      <lable for="EMP_PK">Password</lable>
		                      <input type="text" class="form-control" id = "pass" name = "pass" placeholder="Password">
		                    </div>
	                    </div>
	                  	
	                  	<div class = "row">
		                    <div class = "col-md-6">
		                      <lable for="EMP_LAST_NAME">Full Name</lable>
		                      <input type="text" class="form-control" id = "fname" name = "fname" placeholder="Full Name">
		                    </div>
	                    
	                  	</div>
		                
		                <div class = "row">
		                    <div class = "col-md-6">
		                      <lable for="CONTRACT_NUM">User Type</lable>
		                      <input type="text" class="form-control" id = "renewpass" name = "renewpass" placeholder="User Type">
		                    </div>
		                    
		                </div>
	                    <hr>
	                  	<div class="row">
	                  		<div class = "col-md-6">
	      					<button type="submit" class="btn btn-default pull-left" data-dismiss="modal" id="btnSave" name="btnSave">Submit</button>
	      					</div>
	      				</div>
	                </div>
	            </form>
	            <span class="label label-success"><?php echo $this->session->flashdata('response'); ?></span>
	            <span class="label label-danger"><?php echo $this->session->flashdata('response_no'); ?></span>
	        </div>
        <!-- /.box-body -->
        
      	</div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
