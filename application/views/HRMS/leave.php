<div class="container-fluid mt20">
    <div class="row">
        <div class="col-md-12">
            <div class="customcard">
                <div>
                    <div class="usercardheader">
                        <div class="col-md-2">
                            <p>All Leave</p>
                        </div>
                    <div class="col-md-8">
                    <?php if($this->session->flashdata('success')){ ?>
                        <div class="alert alert-success alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                          </button>
                          <?php echo $this->session->flashdata('success'); ?>
                          <!--Msg-->
                        </div>
                    <?php }elseif($this->session->flashdata('error')){ ?> 
                        <div class="alert alert-danger alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                          </button>
                          <?php echo $this->session->flashdata('error'); ?>
                          <!--Msg-->
                        </div>
                    <?php } ?>
                  </div>
                        <button data-toggle="modal" data-target="#addModal" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">
                            Apply Leave

                            <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z"
                                />
                            </svg>
                        </button>
                    </div>

                    <div class="customcardbody">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tbl_leave">
                                <thead>
                                    <tr>
                                        <th scope="col">Employee Username</th>
                                        <th scope="col">Employee Name</th>
                                        <!-- <th scope="col">Employee Id</th> -->
                                        <th scope="col">Leave Type</th>
                                        <th scope="col">Date Range</th>
                                        <th scope="col">Reason</th>
                                        <th scope="col">Remaining Leave</th>
                                        <th>Status</th>

                                        <th style="text-align: center;" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; if(!empty($leave)) { foreach ($leave as $l) {
                                        $ramaining = $this->Hrms_Model->empExits($l['employee_id'],$l['leaveType']);
                                        if(empty($l['leave_type'])){
                                            $dat = $ramaining['hours_requested'];
                                        }else{
                                            $dat = $ramaining['days_requested'];
                                        }
                                       
                                     ?>
                                        <tr>
                                        <!-- <th scope="row"></th> -->
                                        <td>#<?=$l['employee_id']?></td>
                                        <td><?=$l['first_name']?> <?=$l['last_name']?></td>
                                        <!-- <td><?=$l['employee_id']?></td> -->
                                        <td><?php if(!empty($l['leave_type'])){ echo $l['leave_type']; }else{ echo 'Accrued Leave';}?></td>
                                        <td><?=$l['start_date']?> — <?=$l['end_date']?></td>
                                        <td><?=$l['reason']?></td>
                                        <td class="text-center">
                                        <?php 
                                            if(empty($l['leave_type'])){
                                                if($l['status'] == 'Pending'){ 
                                                    echo $ramaining['maximum_hr']." Hours";
                                                }else{ 
                                                    echo($ramaining['maximum_hr'] - $dat)." Hours";
                                                } 
                                            }else{
                                                if($l['status'] == 'Pending'){ 
                                                    echo $ramaining['maximum_leaves']." Days";
                                                }else{
                                                echo ($ramaining['maximum_leaves']- $dat)." Days"; 
                                                }   
                                            }
                                        ?>

                                            </td>
                                        <td class="cursorpointer" data-toggle="modal" data-target="#status"><span class="badge greenbadge statusRecord" data-id="<?php echo $l['id'];?>"><?=$l['status']?></span></td>
                                        <td style="text-align: center;">
                                            <button data-toggle="modal" data-id="<?php echo $l['id'];?>" data-target="#activity" type="button" class="btn btn-outline-dark alluserbtn viewRecord">
                                                View Activity
                                                <svg class="eye" width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z"
                                                    />
                                                </svg>
                                            </button>
                                            <button type="button" data-id="<?php echo $l['id'];?>" class="btn btn-outline-dark alluserbtn deleteRecord">
                                                Delete
                                                <svg class="delete" width="22" height="16" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                     <?php $i++;} } ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal apply leave -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="<?=base_url('Hrms/insert_leave')?>" method="post">
            <div class="modal-content">
                <div class="modal-header custommodalheader">
                    <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Apply for a leave</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
                </div>
                <div class="modal-body modalscroll">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="customcardlabel" for=" ">Employee Name</label>
                                    <select style="width: 100%;" name="employee_id" class="form-control customcardinput js-example-basic-single inputfile" id="employee_id"> 
                                        <option>-- Select Employee --</option>
                                        <?php foreach ($employee as $e) { ?>
                                           <option value="<?=$e['user_id']?>"><?=$e['first_name']?> <?=$e['last_name']?></option>
                                        <?php }?>
                                    </select>
                                    <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label customcardlabel" for="date-of-birth">Start Date: * </label>
                                    <input type="date" name="start_date"  class="datepicker form-control inputfile" id="start_date" placeholder="Start Date" min="<?php echo date("Y-m-d"); ?>" />
                                    <span class="errors" id="start_err" style="color:red; font-size:14px"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label customcardlabel" for="date-of-birth">End Date: * </label>
                                    <input type="date" class="datepicker form-control inputfile" name="end_date" id="end_date" placeholder="End Date" min="<?php echo date("Y-m-d"); ?>"/>
                                    <span class="errors" id="end_err" style="color:red; font-size:14px"></span>
                                </div>
                            </div>
                            <span class="errors" id="date_err" style="color:red; font-size:14px;margin-left: 15px; margin-top: -10px;"></span>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="customcardlabel" for=" ">Leave Type</label>
                                    <select style="width: 100%;" name="leave_type" class="form-control customcardinput js-example-basic-single inputfile" id="leave_type">   
                                        <option>-- Select Leave Type --</option>
                                        <?php foreach ($leave_type as $t) { ?>
                                            <option value="<?=$t['id']?>"><?=$t['leave_type']?></option>
                                        <?php } ?>                                        
                                    </select>
                                    <span class="errors" id="leave_err" style="color:red; font-size:14px"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="customcardlabel" for=" ">Ramaining Leaves</label>
                                    <input type="text" name="remaing" class="form-control" id="remain" disabled="" />
                                    <span class="errors" id="r_err" style="color:red; font-size:14px"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="customcardlabel" for="exampleFormControlTextarea1">Reason</label>
                                    <textarea class="form-control inputfile" name="reason" id="reason" rows="3"></textarea>
                                    <span class="errors" id="notes_err" style="color:red; font-size:14px"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="text-align: center;">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                        <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm btnADD">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
         <form class="delete-Role" method="post" action="<?php echo base_url('Hrms/delete_leave'); ?>">
            <div class="modal-body modalscroll">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 mt-2 mb-3 ">
                   <center><img src="<?=base_url()?>assets/images/sign.png " class="img-fluid"></center>
                   <h5 class="text-center">Are you sure to delete this record ?</h5>

                  </div>
                      <input type="hidden" name="leave_id" id="delete_id" class="form-control">
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <div style="text-align: center;">
                  <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnDelete">Delete</button>
                </div>
    
            </div>
          </form>
        </div>
      </div>
    </div>


<!-- activity -->
<div class="modal fade" id="activity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header custommodalheader">
                <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">View Activity</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button> -->
            </div>
            <div class="modal-body modalscroll">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="df">
                                <p class="activity">Leave: <span id="start"></span></p>
                                <p class="activity marginleftauto">End date:<span id="end"></span></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Changed By</th>
                                        <th scope="col">Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- <th scope="row"></th> -->
                                        <td id="update"></td>
                                        <td id="action"></td>
                                        <td id="checked"></td>
                                        <td id="notes"></td>
                                    </tr>
                                    <!-- tr -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="text-align: center;">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                        <!-- <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm">Save</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal apply leave -->
<div class="modal fade" id="status" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="<?=base_url('Hrms/change_status')?>" method="post">
            <div class="modal-content">
                <div class="modal-header custommodalheader">
                    <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Change status of a Leave</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
                </div>
                <div class="modal-body modalscroll">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="customcardlabel" for=" ">Status</label>
                                    <select style="width: 100%;" name="status" class="form-control customcardinput js-example-basic-single" id="editStatus">
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="leave_id" id="status_id" class="form-control">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="customcardlabel" for="exampleFormControlTextarea1">Notes</label>
                                    <textarea class="form-control" id="editNotes" name="notes" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div style="text-align: center;">
                            <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                            <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm changeStatus">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">

    $('.btnADD').on('click', function() {
        if($('#employee_id').val() == '-- Select Employee --'){
            $("#name_err").html("Please select Employee").show();
            return false;
        }
        if($('#start_date').val() == ''){
             $("#start_err").html("Please select Start Date").show();
            return false;
        }
        if($('#end_date').val() == ''){
            $("#end_err").html("Please select End Date").show();
            return false;
        }
        if($('#end_date').val() < $('#start_date').val()){
            $("#date_err").html("End Date is less than Start Date, Please Select Correct Date").show();
            return false;
        }
        if($('#leave_type').val() == '-- Select Leave Type --'){
            $("#leave_err").html("Please select Leave Type").show();
            return false;
        }
        var start = new Date($('#start_date').val());
        var end = new Date($('#end_date').val());
        var diff = new Date(end - start);
        var remain = $('#remain').val();
        var days = (diff/1000/60/60/24) + 1;
        
        if(remain == ''){
            $("#date_err").html("").show();
            return false;
        }

        if( remain < days ){
            $("#date_err").html("Your Leaves is more than Remaining Leaves, Please select less than remaining leaves").show();
            return false;
        }
    
        
        if($('#reason').val() == ''){
            $("#notes_err").html("Please enter Reason").show();
            return false;
        }

        
        
    });

    $('.inputfile').bind('change', function() {
        if($('#employee_id').val() == '-- Select Employee --'){
            $("#name_err").html("Please select Employee").show();
            return false;
        }else{
            $("#name_err").html("").show();
        }
        if($('#start_date').val() == ''){
             $("#start_err").html("Please select Start Date").show();
            return false;
        }else{
            $("#start_err").html("").show();
        }
        if($('#end_date').val() == ''){
             $("#end_err").html("Please select End Date").show();
            return false;
        }else{
            $("#end_err").html("").show();
        } 
        if($('#end_date').val() < $('#start_date').val()){
            $("#date_err").html("End Date is less than Start Date, Please Select Correct Date").show();
            return false;
        }else{
          $("#date_err").html("").show();
        }
        if($('#leave_type').val() == '-- Select Leave Type --'){
            $("#leave_err").html("Please select Leave Type").show();
            return false;
        }else{
          $("#leave_err").html("").show();
        }
        var start = new Date($('#start_date').val());
        var end = new Date($('#end_date').val());
        var diff = new Date(end - start);
        var remain = $('#remain').val();
        var days = (diff/1000/60/60/24) + 1;
        if( remain < days){
            $("#date_err").html("Your Leaves is more than Remaining Leaves, Please select less than remaining leaves").show();
            return false;
        }else{
            $("#date_err").html('').show();
        }
        if($('#reason').val() == ''){
             $("#notes_err").html("Please enter Reason").show();
            return false;
        }else{
            $("#notes_err").html("").show();
        }        
    });

    $('#tbl_leave').on('click', '.statusRecord', function() { 
         var leave_id = $(this).data('id');
         $.ajax({
         type: 'ajax',
         method: 'post',
         url : '<?=base_url("Hrms/getLeaveById")?>',
         data : {leave_id : leave_id},
         dataType : 'json', 
         success : function(data){  
            console.log(data);
            $('#status_id').val(data.id);
            $('#editNotes').val(data.notes);
            $("#editStatus").val(data.status).trigger('change'); //for select   
         }
       });
    });

    $('#tbl_leave').on('click', '.viewRecord', function() { 
         var leave_id = $(this).data('id');
         $.ajax({
         type: 'ajax',
         method: 'post',
         url : '<?=base_url("Hrms/getLeaveById")?>',
         data : {leave_id : leave_id},
         dataType : 'json', 
         success : function(data){  
            console.log(data);
            //$('#status_id').val(data.id);
            $('#start').text(data.start_date);
            $('#end').text(data.end_date);
            $('#update').text(data.updated_at);

            if(data.status == 'Approved'){
                $('#action').text('Updated');
                $('#checked').text('Admin');
            }else if(data.status == 'Pending'){
                $('#action').text('Pending');
                $('#checked').text('--------');
            }else if(data.status == 'Canceled'){
                $('#action').text('Updated');
                $('#checked').text('Admin');
            }
            $('#notes').text(data.notes);
         }
       });
    });


    $('#leave_type').on('change', function() { 
        var employee_id = $('#employee_id').val();
        var leave_type =  $('#leave_type').val();
        $.ajax({
             type: 'ajax',
             method: 'post',
             url : '<?=base_url("Hrms/getRemainingLeaveById")?>',
             data : {employee_id : employee_id, leave_type: leave_type},
             async: false,
             dataType : 'json', 
             success : function(data){  
                console.log(data);
                
                var start = new Date($('#start_date').val());
                var end = new Date($('#end_date').val());
                var diff = new Date(end - start);
                days = (diff/1000/60/60/24) + 1;

                if(data.maximum != ''){
                    var ramin = $('#remain').val(data.maximum);  
                    if(ramin < days ){
                        $("#date_err").html("Your Leaves is more than Remaining Leaves, Please select less than remaining leaves").show();
                        return false;
                    }

                }
                if(data.maxLeave != ''){
                    var ramin =  $('#remain').val(data.maxLeave.max_leave);
                    if( ramin < days ){
                        $("#date_err").html("Your Leaves is more than Remaining Leaves, Please select less than remaining leaves").show();
                        return false;
                    }
                }

             }
           

       }); 
        $("#date_err").html("").show();
        return false;
    });
   
</script>
<script type="text/javascript">
     $('#tbl_leave').on('click', '.deleteRecord', function() {
        var delete_id = $(this).data('id');
        $('#delete_id').val(delete_id);
        $('#deleteModal').modal('show');
    });
</script>
