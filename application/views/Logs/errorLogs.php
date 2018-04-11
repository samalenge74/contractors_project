 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Error Logs
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
          <h3 class="box-title">Errors</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <!-- Data table to display contractors -->
          <table class="table table-hover table-bordered table-striped display" id="tblErrorLogs" name = "tblErrorLogs">  
            <thead>
              <th>DATABASE_NAME</th>
              <th>PROCEDURE_NAME</th>
              <th>USER_NAME</th>
              <th>ERROR_DATETIME</th>
              <th>ERROR_LINE</th>
              <th>ERROR_SEVERITY</th>
              <th>ERROR_CD</th>
              <th>ERROR_MESSAGE</th>
            </thead>
            <tbody>
              <?php
                if(sizeof($errorLogs) > 0) {
                  foreach ($errorLogs as $log){
                    echo "<tr>";
                      echo "<td allign = 'Left'>".$log->DATABASE_NAME. "</td>";
                      echo "<td allign = 'Left'>".$log->PROCEDURE_NAME. "</td>";
                      echo "<td allign = 'Left'>".$log->USER_NAME. "</td>";
                      echo "<td allign = 'Left'>".$log->ERROR_DATETIME. "</td>";
                      echo "<td allign = 'Left'>".$log->ERROR_LINE. "</td>";
                      echo "<td allign = 'Left'>".$log->ERROR_SEVERITY. "</td>";
                      echo "<td allign = 'Left'>".$log->ERROR_CD. "</td>";
                      echo "<td allign = 'Left'>".$log->ERROR_MESSAGE. "</td>";
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



 