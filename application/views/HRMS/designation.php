<div class="container-fluid mt20">
    <div class="row">
        <div class="col-md-12">
            <div class="customcard">
                <div>
                    <div class="usercardheader">
                        <div class="col-md-2">
                            <p>All Designation</p>
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
                            Add Designation

                            <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z"
                                />
                            </svg>
                        </button>
                    </div>
                    <div class="customcardbody">
                        <table class="table table-striped" id="tbl_designation">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Description</th>

                                    <th style="text-align: center;" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; if(!empty($designation)){ foreach ($designation as $d) {?>
                                <tr>
                                    <!-- <th scope="row"></th> -->
                                    <td><?=$i?></td>
                                    <td><?=$d['designation_name']?></td>
                                    <td><?=$d['description']?></td>

                                    <td style="text-align: center;">
                                        <button type="button" data-id="<?php echo $d['id'];?>" class="btn btn-outline-dark alluserbtn editRecord" data-toggle="modal" data-target="#editModal">
                                            Edit
                                            <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0)">
                                                    <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0">
                                                        <rect width="21" height="21" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button type="button" data-id="<?php echo $d['id'];?>" class="btn btn-outline-dark alluserbtn deleteRecord">
                                            Delete
                                            <svg class="delete" width="22" height="16" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <?php $i++; } } ?>
                            </tbody>
                        </table>
                        <!-- modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
       <form action="<?=base_url('Hrms/insert_designation')?>" method="post">
        <div class="modal-content">
            <div class="modal-header custommodalheader">
                <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Add a designation</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button> -->
            </div>
            <div class="modal-body modalscroll">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="customcardlabel" for="exampleFormControlSelect1 ">Designation:</label>
                                <input type="text" class="form-control customcardinput inputfile" id="designation" name="designation" aria-describedby="" placeholder="enter designation" onkeypress="return onlyAlphabets(event,this);"/>
                                <span class="errors" id="dpt_err" style="color:red; font-size:14px"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="customcardlabel" for="exampleFormControlTextarea1">Description: </label>
                                <textarea class="form-control inputfile" name="description" id="description" rows="3"></textarea>
                                <span class="errors" id="des_err" style="color:red; font-size:14px"></span>
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
         <form class="delete-Role" method="post" action="<?php echo base_url('Hrms/delete_designation'); ?>">
            <div class="modal-body modalscroll">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 mt-2 mb-3 ">
                   <center><img src="<?=base_url()?>assets/images/sign.png " class="img-fluid"></center>
                   <h5 class="text-center">Are you sure to delete this record ?</h5>

                  </div>
                      <input type="hidden" name="designation_id" id="delete_id" class="form-control">
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

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
       <form action="<?=base_url('Hrms/update_designation')?>" method="post">
        <div class="modal-content">
            <div class="modal-header custommodalheader">
                <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Update designation</h5>
                <input type="hidden" name="designation_id" id="edit_designation_id" class="form-control customcardinput">
            </div>
            <div class="modal-body modalscroll">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="customcardlabel" for="exampleFormControlSelect1 ">Designation:</label>
                                <input type="text" class="form-control customcardinput inputfile2" id="editDesignation" name="designation" aria-describedby="" placeholder="enter designation" onkeypress="return onlyAlphabets(event,this);"/>
                                <span class="errors" id="designation_err" style="color:red; font-size:14px"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="customcardlabel" for="exampleFormControlTextarea1">Description: </label>
                                <textarea class="form-control inputfile2" name="description" id="editDescription" rows="3"></textarea>
                                <span class="errors" id="desp_err" style="color:red; font-size:14px"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div style="text-align: center;">
                    <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                    <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm btnUpdate">Submit</button>
                </div>
            </div>
        </div>
      </form>
    </div>
</div>

<script>
    $('.btnADD').on('click', function() {
        if($('#designation').val() == ''){
            $("#dpt_err").html("Please enter Designation Name").show();
            return false;
        }
        if($('#description').val() == ''){
             $("#des_err").html("Please enter Description").show();
            return false;
        }
    });

    $('.inputfile').bind('change', function() {
        if($('#designation').val() == ''){
            $("#dpt_err").html("Please enter Designation Name").show();
            return false;
        }else{
            $("#dpt_err").html("").show();
        }
        if($('#description').val() == ''){
            $("#des_err").html("Please enter Description").show();
            return false;
        }else{
            $("#des_err").html("").show();
        }        
    });
    
    $('#designation').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z,& ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            $("#dpt_err").html("Only Alphabets and Special Characters , and & are allowed").show();
            return false;
        }else{
            $("#dpt_err").html("").show();

        }
    });

    $('#btnUpdate').click(function(){

        if($('#editDesignation').val() == ''){
            $("#designation_err").html("Please enter Designation Name").show();
            return false;
        }
        if($('#editDescription').val() == ''){
             $("#desp_err").html("Please enter Description").show();
            return false;
        }

    });


    $('.inputfile2').bind('change', function() {
        if($('#editDesignation').val() == ''){
            $("#Designation_err").html("Please enter Designation Name").show();
            return false;
        }else{
            $("#designation_err").html("").show();
        }
        if($('#editDescription').val() == ''){
             $("#desp_err").html("Please enter Description").show();
            return false;
        }else{
            $("#desp_err").html("").show();
        }        
    });

    $('#editDesignation').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z,& ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            $("#designation_err").html("Only Alphabets and Special Characters , and & are allowed").show();
            return false;
        }else{
            $("#designation_err").html("").show();

        }
     }); 


    $('#tbl_designation').on('click', '.editRecord', function() { 
         var designation_id = $(this).data('id');
         $.ajax({
         type: 'ajax',
         method: 'post',
         url : '<?=base_url("Hrms/getDesignationById")?>',
         data : {designation_id : designation_id},
         dataType : 'json', 
         success : function(data){  
            console.log(data);
            $('#edit_designation_id').val(data.id); 
            $('#editDesignation').val(data.designation_name);    
            $('#editDescription').val(data.description);     
         }
       });
    });

    $('#tbl_designation').on('click', '.deleteRecord', function() {
        var delete_id = $(this).data('id');
        $('#delete_id').val(delete_id);
        $('#deleteModal').modal('show');
    });
    
</script>