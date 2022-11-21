<style type="text/css">
	body{
		background: #fff;
	}
	.mailtemplate_list th{
		color:#000;font-weight:bold;font-size:17px;
	}
		.mailtemplate_list td{
		color:#000;font-size:17px;
	}

	.mailtemplate-contaniner .alluserbtn {
    padding: 4px;
    padding-left: 1px;
    padding-right: 4px;
    padding-bottom: 10px;    
	}

	.mailtemplate-contaniner h3 {
    font-size: 18px;
    padding: 15px 0;
    padding-bottom: 9px;
    border-bottom: 1px solid #d4d4d4;
}

.mailtemplate-contaniner .row.scrolldiv {
    overflow: scroll !important;
    height: 400px;
}
</style>
<div class="container mailtemplate-contaniner ">
<div class="row" >
	<div class="col-sm-12 customcardheader align-items-center" style="display:flex;align:center;">
	    <p class="w-100 dynamic_font_header1">Report Scheduler</p>
	</div>
</div>	
<div class="row scrolldiv" >
	<div class="mailtemplate_form col-sm-12">
		<h3 class="dynamic_font_header2"><span style='font-weight: bold;' class="formtype">Add</span> Schedule</h3>
		<form class="mailtemplate-form" method="post">
			
			<div class="row">
				<input type="hidden" name="id" class="t_id tempalte_fields"><br>		
			</div>

			<div class="row">
				<div class="col-sm-12">
					<input type="text" required="" name="template[title]" class="use-keyboard-input form-control t_title tempalte_fields dynamic_font_size" placeholder="title"><br>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<textarea  name="template[message]" required="" class="form-control t_message tempalte_fields dynamic_font_size" placeholder="message"></textarea></br>
			</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					<select name="template[cron_frequncy_type]"  class="form-control t_cron_frequncy_type tempalte_fields dynamic_font_size">
						<option value="daily">Daily</option>
						<option value="weekly">Weekly</option>
						<option value="monthly">Monthly</option>
						<option value="twice-month">twice in a Month</option>
					</select><br>
				</div>


				<div class="col-sm-4" style="display: none;">
					<select name="template[frequency]"   class="use-keyboard-input form-control t_frequency tempalte_fields dynamic_font_size">
						
					</select><br>
				</div>

				<div class="col-sm-1">at</div>
				<div class="col-sm-3">
					<input type="time" name="template[time]" required="" class="form-control t_time tempalte_fields dynamic_font_size" placeholder="To"><br>
				</div>
				
			</div>

			<div class="row">	
				<div class="col-sm-6">
				<select name="template[report_type]" required="" class="form-control t_report_type tempalte_fields dynamic_font_size">
					<option value="">Select Report</option>
					<?php $report_type_options=[
						"shift" => "Shift",
						"payout-s" => "Payout-Scratcher",
						"payout-e" => "Payout-Employee",
						"payout-v" => "Payout-Vendor",
						"timesheet" => "Timesheet",
						"card_transaction" => "Card Transaction",
						"audit_log" => "Audit Log",
						"scratcher_sales" => "Scratcher Sales",
						"inventory" => "Inventory"

					];
					foreach ($report_type_options as $key => $value) {
						echo '<option value="'.$key.'">'.$value.'</option>';
					}
					?>
				</select><br>
				</div>
				<div class="col-sm-6">
				<select name="template[report_period]" required="" class="form-control t_report_period tempalte_fields dynamic_font_size">
					<option value="">Select Report Period</option>
					<option value="current_day">Current Day</option>
					<option value="last_day">Last Day</option>
					<option value="current_week">Current Week</option>
					<option value="last_week">Last Week</option>
					<option value="current_month">Current Month</option>
					<option value="last_month">Last Month</option>
				</select><br>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<input type="text" name="template[to]" required="" class="use-keyboard-input form-control t_to tempalte_fields dynamic_font_size" placeholder="To">
				</div>
				<div class="col-sm-6">
					<input type="text" name="template[cc]"  class="use-keyboard-input form-control t_cc tempalte_fields dynamic_font_size" placeholder="cc"><br>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<select name="template[status]" class="form-control col-sm-12 t_status tempalte_fields dynamic_font_size">
						<option value="0">Active</option>
						<option value="1">Pause</option>
					</select><br>
				</div>
			</div>
			<input type="submit" name="submit" value="Submit" class="save-template btn btn-success dynamic_font_size">
			<button class="cleartemplate btn btn-info dynamic_font_size">Clear</button>
		</form>
	</div>

	<div class="mailtemplate_list  col-sm-12 ">
		<h3 class="dynamic_font_size">Schedule List</h3>
		<div class="table-responsive">
			<table class="table table-striped ">
				<thead>
					<tr>
						<th class="dynamic_font_size">Title</th>
						<th class="dynamic_font_size">Type</th>
						<th class="dynamic_font_size">Frequency</th>
						<!-- <th>To</th> -->
						<th class="dynamic_font_size">Status</th>
						<th class="dynamic_font_size">Action</th>
					</tr>			
				</thead>
				<tbody class="dynamic_font_size"></tbody>
			</table>
		</div>
	</div>
</div>

</div>
<script type="text/javascript">
	$(document).ready(function(){
		get_template_list();
		$('body').on('change','.t_report_type',function(){
			set_report_periods($(this).val());
		})
		$('body').on('click','.tempalte-edit',function(e){
			e.preventDefault();
			var id=$(this).data('id');
			$.ajax({
				type: 'POST',
		        url: '<?=base_url("cashier/Cashier/ajax_mail_template")?>',
		        data: {id: id},
		        dataType: "json",
		        beforeSend: function(){
            		$("#overlay,.loader").show();
        		},
		        success: function(data) {
		        	$("#overlay,.loader").hide();
		        	frequncy_dropdown(data.cron_frequncy_type);
		        	set_report_periods(data.report_type);
		      		$.each( data, function( key, value ) {
					  $('.t_'+key).val(value);
					});	
					$('.formtype').html('Edit');
				  	$('.scrolldiv').animate({
				        scrollTop: $(".mailtemplate-form").offset().top
				  	}, 2000);	

		      	}  
			})
		})
		$('.cleartemplate').click(function(e){
			e.preventDefault();
			$('.tempalte_fields').each(function(index){
      			$(this).val('');
      			$('.formtype').html('Add');
      		});
		});
		$('.t_cron_frequncy_type').change(function(){
			var type= $(this).val();
			frequncy_dropdown(type);
		})
		$('.mailtemplate-form').submit(function(e){
			e.preventDefault();


			$.ajax({
				type: 'POST',
		        url: '<?=base_url("cashier/Cashier/ajax_save_mail_template")?>',
		        data: $('.mailtemplate-form').serialize(),
		        dataType: "json",
		        beforeSend: function(){
            		$("#overlay,.loader").show();
        		},
		        success: function(data) {
		        	$("#overlay,.loader").hide();
		        	get_template_list();
		        	 swal({
			            title: "Success!",
			            text: "Successfully submitted",
			            icon: "success",
			            buttons: false,
			            timer: 2500,
			          });
		      		$('.tempalte_fields').each(function(index){
		      			$(this).val('');
		      		});
		      		$('.formtype').html('Add');
		      	}  
			})
		})

		$('body').on('click','.tempalte-delete',function(e){
			var id=$(this).data('id');
			e.preventDefault();
			swal({
			        title: "Are you sure?",
			        text: "You will not be able to recover this",
			        type: "warning",
			        showCancelButton: true,
			        confirmButtonColor: "#DD6B55",
			        confirmButtonText: "Yes, delete it!",
			        cancelButtonText: "No, cancel plx!",
			        closeOnConfirm: false,
			        closeOnCancel: false 
			    }).then((willDelete) =>  {
			        if (willDelete) {
			           $.ajax({
							type: 'POST',
					        url: '<?=base_url("cashier/Cashier/ajax_delete_mail_template")?>',
					        data: { id: id },
					        dataType: "json",
					        beforeSend: function(){
			            		$("#overlay,.loader").show();
			        		},
					        success: function(data) {
		        				$("#overlay,.loader").hide();
					        	get_template_list();
					        	 swal({
						            title: "Success!",
						            text: "Successfully Deleted",
						            icon: "success",
						            buttons: false,
						            timer: 2500,
						          });
					      		$('.tempalte_fields').each(function(index){
					      			$(this).val('');
					      		});
					      	}  
						})
			        } else {
			            swal("Cancelled", "", "error");
			        }
			    });
			
			
		})

		
		function set_report_periods(stype){
			$('.t_report_period option').show()
			$.ajax({
				type: 'POST',
		        url: '<?=base_url("cashier/Cashier/not_available_periods_by_report")?>',
		        data: {report_type: stype},
		        dataType: "json",
		        beforeSend: function(){
            		$("#overlay,.loader").show();
        		},
		        success: function(data) {
		        	$("#overlay,.loader").hide();
		        	$.each( data, function( key, value ) {
		        		$('.t_report_period option[value="' + value + '"]').hide();
		        	})

		      	}  
			})
		}

		function frequncy_dropdown(type){
			switch(type){
				case "daily":
				$('.t_frequency').parent().hide();
				break;
				case "monthly":
				$('.t_frequency').parent().show();
				$('.t_frequency').html('');
				for(var i=1;i<31; i++){
					$('.t_frequency').append("<option value='"+i+"'>Day "+i+"</option>");
				}
				break;
				case "weekly":
				$('.t_frequency').parent().show();
				$('.t_frequency').html('');
				var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
				for(var i=0;i<7; i++){
					$('.t_frequency').append("<option value='"+i+"'>"+days[i]+"</option>");
				}
				break;
			}
		}
		function get_template_list(){
			$.ajax({
				type: 'ajax',
		        method: 'post',
		        url: '<?=base_url("cashier/Cashier/ajax_mail_template_list")?>',
		        // async: false,
		        success: function(data) {
		      		$('.mailtemplate_list tbody').html(data);
		      					
		      	}  
			})
		}	
	})
</script>
