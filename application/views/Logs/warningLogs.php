 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Execution Logs
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="<?php echo site_url('Dashboard/Dashboard/index'); ?>">
          <i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li class="active">Logs</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Executions</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <!-- Data table to display contractors -->
          <table class="table table-hover table-bordered table-striped display" id="tblWarningLogs" name = "tblWarningLogs">  
            <thead>
              <th>DATABASE_NAME</th>
              <th>PROCEDURE_NAME</th>
              <th>USER_NAME</th>
              <th>WARNING_DATETIME</th>
              <th>WARNING_MESSAGE</th>
            </thead>
            <tbody>
              <?php
                if(sizeof($warningLogs) > 0) {
                  foreach ($warningLogs as $log){
                    echo "<tr>";
                      echo "<td allign = 'Left'>".$log->DATABASE_NAME. "</td>";
                      echo "<td allign = 'Left'>".$log->PROCEDURE_NAME. "</td>";
                      echo "<td allign = 'Left'>".$log->USER_NAME. "</td>";
                      echo "<td allign = 'Left'>".$log->WARNING_DATETIME. "</td>";
                      echo "<td allign = 'Left'>".$log->WARNING_MESSAGE. "</td>";
                    echo "</tr>";
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



 