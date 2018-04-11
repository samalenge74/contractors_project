 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Line Managers
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
          <h3 class="box-title">Line Managers</h3>

          <!-- <div class="box-tools pull-right">
            <a href="<?php echo site_url('Contractors/Contractors/addContractors'); ?>" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add a Contractor</a>
          </div> -->
        </div>
        <div class="box-body">
          <!-- Data table to display contractors -->
          <table class="table table-hover table-bordered table-striped display" id="tblLineManagers" name = "tblContractors">  
            <thead>
              <th>Employee Code</th>
              <th>Name</th>
              <th>Email</th>
            </thead>
            <tbody>
              <?php

                if(sizeof($contractors) > 0){
                  foreach ($contractors as $row) {
                      echo "<tr>";
                      echo "<td>" . $row->Code . "</td>";
                      echo "<td>" . $row->FirstName . " " . $row->LastName . "</td>";
                      echo "<td>" . $row->EmailAddress . "</td>";
                      echo "</tr>";
                  }
                }

              ?>
            </tbody>
            <tfoot>
              <th>Employee Code</th>
              <th>Name</th>
              <th>Email</th>
            </tfoot>
          </table>
        </div>
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 