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
          <table class="table table-hover table-bordered table-striped display" id="tblExecutionLogs" name = "tblExecutionLogs">  
            <thead>
              <th>Database Name</th>
              <th>Procedure Name</th>
              <th>Execution Start Datetime</th>
              <th>Execution End Datetime</th>
              <th>Execution Time</th>
              <th>Execution Status</th>
              <th>Execution Text</th>
              <th>User Name</th>
              <th>Record Timestamp</th>
            </thead>
            <tbody>
              <?php
                if(sizeof($executionLogs) > 0) {
                  foreach ($executionLogs as $log){
                    echo "<tr>";
                      echo "<td allign = 'Left'>".$log->DATABASE_NAME. "</td>";
                      echo "<td allign = 'Left'>".$log->PROCEDURE_NAME. "</td>";
                      echo "<td allign = 'Left'>".$log->EXECUTION_START_DATETIME. "</td>";
                      echo "<td allign = 'Left'>".$log->EXECUTION_END_DATETIME. "</td>";
                      echo "<td allign = 'Left'>".$log->EXECUTION_TIME. "</td>";
                      echo "<td allign = 'Left'>".$log->EXECUTION_STATUS. "</td>";
                      echo "<td allign = 'Left'>".$log->EXECUTION_TEXT. "</td>";
                      echo "<td allign = 'Left'>".$log->USER_NAME. "</td>";
                      echo "<td allign = 'Left'>".$log->RECORD_TIMESTAMP. "</td>";
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



 