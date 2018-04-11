<div id="cover"></div>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contractors
        <small></small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li>
          <a href="<?php echo site_url('Dashboard/Dashboard/index'); ?>">
          <i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li class="active">Contrcators</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Current Contractors</h3>

          <div class="box-tools pull-right">
            <a href="<?php echo site_url('Contractors/Contractors/addContractors'); ?>" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add a Contractor</a>
          </div>
        </div>
        <p><span class="label label-info"><?php echo $this->session->flashdata('reponse_add'); ?></span></p>
        <p><span class="label label-warning"><?php echo $this->session->flashdata('reponse_add_no'); ?></span></p>
        <div class="box-body">
          <!-- Data table to display contractors -->
          <table class="table table-hover table-bordered table-striped display contractors" id="tblContractors" name = "tblContractors">  
            <thead>
              <th>Employee Code</th>
              <th>Name</th>
              <th>Email</th>
              <th>Requested By</th>
              <th>Status</th>
              <th>Actions</th>
            </thead>
            <tbody>
              <?php

                if(sizeof($contractors) > 0){
                  foreach ($contractors as $row) {
                      $status = $row->EMPLOYEE_EMPLOYMENT_STATUS;
                      if($status == 1) $status = "Active";
                      else $status = 'Inactive';
                      $link="";
                      $link .= "<a href='" . site_url("Contractors/Contractors/viewContractor/$row->PRIMARY_KEY") . "'id='view' name='view' class='btn btn-primary btn-circle' title='view'><i class='fa fa-eye'></i></a> | <a href='" . site_url("Contractors/Contractors/editContractor/$row->PRIMARY_KEY") . "'id='edit' name='edit' class='btn btn-warning btn-circle' title='edit'><i class='fa fa-edit'></i></a>";
                      echo "<tr>";
                      echo "<td>" . $row->EMPLOYEE_CD . "</td>";
                      echo "<td>" . $row->EMPLOYEE_LAST_NAME . ", " . $row->EMPLOYEE_FIRST_NAME . "</td>";
                      echo "<td>" . $row->EMPLOYEE_EMAIL_ADDR . "</td>";
                      echo "<td>" . $row->CONTRACTOR_REQUESTED_BY . "</td>";
                      echo "<td>" . $status . "</td>"; 
                      echo "<td>" . $link . "</td>"; 
                      echo "</tr>";
                  }
                }

              ?>
            </tbody>
            <tfoot>
              <th>Employee Code</th>
              <th>Name</th>
              <th>Email</th>
              <th>Requested By</th>
              <th>Status</th>
              <th>Actions</th>
            </tfoot>
          </table>
        </div>
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 