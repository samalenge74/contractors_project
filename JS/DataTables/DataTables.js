$(document).ready(function() {
	
    $('table.contractors').DataTable({
    	dom: 'Bfrtip',
        buttons:[
            
            {
                extend:    'excelHtml5',
                text:      '<button class="btn btn-success"><i class="fa fa-file-excel-o print_icon"></i></button>',
                titleAttr: 'Excel'
            },
            
            {
                extend:    'pdfHtml5',
                text:      '<button class="btn btn-success"><i class="fa fa-file-pdf-o print_icon"></i></button>',
                titleAttr: 'PDF'
            }
        ],
     //    "scrollY": 500,
    	// "scrollX":true
    });
	
	var managers = $('table.managers').DataTable({
		"pageLength": 5
	});
	var array_manager = new Array();
	var string = "";
	
	$('table.managers').on( 'click', 'tr', function () {
		var data = managers.row(this).data()
		$('label#line_manager_name').text("Line Manager Name: "+data[0]);
		$('label#line_manager_email_address').text("Email Address: "+data[1]);
		$('input#txtEmpLM').val(data[0]);
		$('input#txtEmpLME').val(data[1]);
	});
	
	$('input#txtLastName').change(function(){
		
		
		var con_num = $('input#txtConNum').val();
		var digit = $('input#txtLastName').val();
		var val = '';
		if (con_num != ""){
			digit = digit.substring(0, 3);
			val = digit+con_num;
			val = val.toUpperCase();
			$('input#txtEmpCD').val(val);
		}else{
			$('input#txtEmpCD').val('');
		}
	});
	
	$('input#txtConNum').change(function(){
		
		var digit = $('input#txtLastName').val();
		var con_num = $('input#txtConNum').val();
		var val = '';
		if (digit != ""){
			digit = digit.substring(0, 3);
			val = digit+con_num;
			val = val.toUpperCase();
			$('input#txtEmpCD').val(val);
		}else{
			$('input#txtEmpCD').val('');
		}
	});

	$('select.txtMasterSite').on('change', function(){
		var site = $(this).val();
		var mode = $('#txtMode').val();
		var url = '';
		if(mode == 'add'){
			url = 'departments/'+site;
		}else{
			url = '../departments/'+site;
		}
			
		if(site){
			$.ajax({
				url: url,
				type: "GET",
				dataType: "json",
				success:function(data){
					
					if(data.length == 0){
						$('select.txtEmpGRP').html('<option value="UNDEFINED">No departments available.</option>');
					}else{
						$('select.txtEmpGRP').html('<option value="">Choose a department</option>');
						$.each(data, function(key, value){
							$('select.txtEmpGRP').append('<option value="'+ value.DEPARTMENT_NAME +'">'+ value.DEPARTMENT_NAME +'</option>');
						});
					}
				}
			});
		}else{
			$('select.txtEmpGRP').empty();
		}
	});

	$('select.txtEmpGRP').on('change', function(){
		var department = $(this).val();
		if (department == "E, C & I") 
			{department = "ECI";}
		var site = $('select.txtMasterSite').val();
		var mode = $('#txtMode').val();
		var url1 = '';
		var url2 = '';
		if(mode == 'add'){
			url1 = 'department_code/'+site+'/'+department;
		}else{
			url1= '../department_code/'+site+'/'+department;
		}
		if(mode == 'add'){
			url2 = 'functional_group_names/'+site+'/'+department;
		}else{
			url2= '../functional_group_names/'+site+'/'+department;
		}
		if(department != 'CHOOSE'){
			$.ajax({
				url: url1,
				type: "GET",
				dataType: "json",
				success:function(data){
					
					$('input.txtEOC').val(data);
				}
			});
			$.ajax({
				url: url2,
				type: "GET",
				dataType: "json",
				success:function(data){
					if(data.length == 0){
						$('select.txtFGN').html('<option value="UNDEFINED">No Functional Group Name available.</option>');
					}else{
						$('select.txtFGN').html('<option value="">Choose a department</option>');
						$.each(data, function(key, value){
							$('select.txtFGN').append('<option value="'+ value.FUNCTIONAL_GROUP_NAME +'">'+ value.FUNCTIONAL_GROUP_NAME +'</option>');
						});
					}
				}
			});
		}else{
			$('input.txtEOC').val('');
			$('select.txtFGN').empty();
		}
	});

});

