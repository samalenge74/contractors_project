// AJAX call for autocomplete 
$(document).ready(function(){
	
	// //autocomplete
	$("#txtEmpLM").autocomplete({
		source: "line_managers",
		minLength: 3
	});
	
	
	$('#txtEmpHD').datepicker({
		format: 'dd/mm/yyyy',
		autoclose: true
	});
	                
});


