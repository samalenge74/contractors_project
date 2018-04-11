		<div id="ex1" class="modal">
		  <div class="box-body">
			  <!-- Data table to display contractors -->
			  <table class="table table-hover table-bordered table-striped display managers" id="tblLineManagers" name = "tblLineManagers">  
				<thead>
				  <th>Name</th>
				  <th>Email</th>
				</thead>
				<tbody>
				  <?php

					if(sizeof($line_managers) > 0){
					  foreach ($line_managers as $row) {
						  echo "<tr>";
						  echo "<td>" . $row->LastName . " " . $row->FirstName . "</td>";
						  echo "<td>" . $row->EmailAddress . "</td>";
						  echo "</tr>";
					  }
					}

				  ?>
				</tbody>
				<tfoot>
				  <th>Name</th>
				  <th>Email</th>
				</tfoot>
			  </table>
			  <p><label id="line_manager_name"></label></p>
			  <p><label id="line_manager_email_address"></label></p>
			  
			  <a href="#" rel="modal:close">Close</a>
			</div>
		</div>
		
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
			  <b>Version</b> 1.0.0
			</div>
			<strong>Copyright &copy; 2018 <a href="http://raven.mu">Power By Raven</a>.</strong> All rights
			reserved.
		</footer>
	
		<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
		<script>
		  $.widget.bridge('uibutton', $.ui.button);
		</script>
		<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>JS/jquery-migrate-3.0.0.min.js"></script>
		<script src="<?php echo base_url(); ?>bower_components/moment/moment.js"></script>
		<script src="<?php echo base_url(); ?>JS/popper.js"></script>
		
		<script src="<?php echo base_url(); ?>bower_components/raphael/raphael.min.js"></script>
		<script src="<?php echo base_url(); ?>bower_components/morris.js/morris.min.js"></script>
		<script src="<?php echo base_url(); ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<script src="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<script src="<?php echo base_url(); ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
		<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<script src="<?php echo base_url(); ?>bower_components/jquery-slimScroll/jquery.slimscroll.min.js"></script>
		<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
		<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
		<script src="<?php echo base_url(); ?>dist/js/pages/dashboard.js"></script>
		<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
				
		<!-- Data Tables -->
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
		<script src="<?php echo base_url(); ?>JS/DataTables/DataTables.js"></script>
		<script src="<?php echo base_url(); ?>JS/Functions.js"></script>
		<script src="<?php echo base_url(); ?>JS/sweetalert2.all.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
		<script type="text/javascript">
			$(window).load(function() {
		// Animate loader off screen
				$(".se-pre-con").fadeOut("slow");;
			});
		</script>
						
	</body>
</html>