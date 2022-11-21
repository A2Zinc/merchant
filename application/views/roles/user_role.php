      <div class=" container-fluid mt20">
        <div class="row">
          <div class="col-md-12">
            <div class="customcard">
              <div >
                <div class="usercardheader">
                  <div class="col-md-1">
                    <p>Roles</p>
                  </div>
                  <div class="col-md-10">
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
                      <button data-toggle="modal" data-target="#addRole" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">Add 
                        
                            <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                            </svg>
    
                      </button>
                    
               </div>
               <div class="customcardbody ">
                <table class="table table-striped" id="tbl_role">
                    <thead>
                      <tr>
                        <th>Sr. No.</th>
                        <th scope="col">Roles</th>
                        <th style="text-align: center;" scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; if(!empty($role)){ foreach($role as $r){?>
                      <tr>
                        <td><?=$i?></td>
                        <td><?=$r['role_name']?></td>
                       
                        <td style="text-align: center;">
                            
                            <button  type="button" data-id="<?php echo $r['id'];?>" class="btn btn-outline-dark alluserbtn editRecord" data-toggle="modal" data-target="#editRole">Edit 
                              <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0)">
                              <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                              </g>
                              <defs>
                              <clipPath id="clip0">
                              <rect width="21" height="21" fill="white"/>
                              </clipPath>
                              </defs>
                              </svg>
                              </button>
                            <button data-id="<?php echo $r['id'];?>" type="button" class="btn btn-outline-dark alluserbtn deleteRecord" data-toggle="modal" data-target="#deleteModal">Delete 
                              <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                              </svg>
                              </button>
                          </td>
                      </tr>
                      <?php $i++; } } ?>
                    
  
                    </tbody>
                  </table>
                  <!-- modal -->
                  <!-- Modal -->

               </div>
               
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>


     <!-- Modal -->
     <form action="<?=base_url('User/insert_role')?>" method="post">
<div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      
      <div class="modal-content">
        <div class="modal-header custommodalheader">
          <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Add a new role</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body modalscroll">
            <div class="form-group">
                <label class="rolllabel">Role</label>
                <input type="text" class="form-control customcardinput" name="role_name" id="role_name" aria-describedby="" placeholder="Please enter your Role" onkeypress="return onlyAlphabets(event,this);">
                <span class="errors" id="rname_err" style="color:red; font-size:14px"></span>
              </div>
            <p class="rolepermision">Permissions</p> 
            <?php foreach ($module as $value) { ?>
              <?php if($value['Module_name'] != 'Customers') {?>
               <fieldset class="scheduler-border">
                <legend class="scheduler-border"><?=$value['Module_name']?> level</legend>
                <div class="control-group">
                    <!-- <label class="control-label input-label" for="startTime">Start :</label> -->
                    <div class="controls bootstrap-timepicker">
                        <div class="invisible-checkboxes">
                            <input type="hidden" name="Module_id[]" value="<?=$value['id']?>"/>
                            <input type="checkbox" name="<?=$value['id'].'_all'; ?>" value="1" id="<?=$value['id'].'_r1'; ?>"/>
                            <label class="checkbox-alias" for="<?=$value['id'].'_r1'; ?>">Select All</label>

                            <input type="checkbox" name="<?=$value['id'].'_add'; ?>" value="1" id="<?=$value['id'].'_r2'?>"/>
                            <label style="margin-left: 22%;" class="checkbox-alias" for="<?=$value['id'].'_r2'?>">Add</label>
                            <input type="checkbox" name="<?=$value['id'].'_view'; ?>" value="1" id="<?=$value['id'].'_r3'?>"/>
                            <label class="checkbox-alias" for="<?=$value['id'].'_r3'?>">View</label>
                            <input type="checkbox" name="<?=$value['id'].'_edit'; ?>" value="1" id="<?=$value['id'].'_r4'?>"/>
                            <label class="checkbox-alias" for="<?=$value['id'].'_r4'?>">Edit</label>
                            <input type="checkbox" name="<?=$value['id'].'_delete'; ?>" value="1" id="<?=$value['id'].'_r5'?>"/>
                            <label class="checkbox-alias" for="<?=$value['id'].'_r5'?>">Delete</label>
                        </div>
                    </div>
                </div>
            </fieldset>
          <?php } ?>
             <?php } ?>
        </div>
        <div class="modal-footer">
            <div style="text-align: center;">
                <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnADD">Add</button>
            </div>

        </div>
      </div>
      
    </div>
  </div>
</form>

  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
         <form class="delete-Role" method="post" action="<?php echo base_url('User/delete_role'); ?>">
            <div class="modal-body modalscroll">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 mt-2 mb-3 ">
                   <center><img src="<?=base_url()?>assets/images/sign.png " class="img-fluid"></center>
                   <h5 class="text-center">Are you sure to delete this record ?</h5>

                  </div>
                      <input type="hidden" name="role_id" id="delete_id" class="form-control">
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
     <form action="<?=base_url('User/update_role')?>" method="post" id="edit-role">
<div class="modal fade" id="editRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      
      <div class="modal-content">
        <div class="modal-header custommodalheader">
          <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Update role</h5>
        </div>
        <div class="modal-body modalscroll">
            <div class="form-group">
                <label class="rolllabel">Role</label>
                <input type="hidden" name="Role_id" id="edit_role_id" class="form-control customcardinput">
                <input type="text" class="form-control customcardinput" name="role_name" id="edit_role_name" aria-describedby="" placeholder="Please enter your Role" onkeypress="return onlyAlphabets(event,this);">
                <span class="errors" id="rnam_err" style="color:red; font-size:14px"></span>
              </div>
            <p class="rolepermision">Permissions</p> 
            <?php foreach ($module as $value) { ?>
              <?php if($value['Module_name'] != 'Customers') {?>
               <fieldset class="scheduler-border">
                <legend class="scheduler-border"><?=$value['Module_name']?> level</legend>
                <div class="control-group">
                    <div class="controls bootstrap-timepicker">
                        <div class="invisible-checkboxes">
                            <input type="hidden" name="Module_id[]" value="<?=$value['id']?>"/>
                            <input type="checkbox" name="<?=$value['id'].'_all'; ?>" id="<?=$value['id'].'_r11'; ?>" value="1"/>
                            <label class="checkbox-alias" for="<?=$value['id'].'_r11'; ?>">Select All</label>
                            <input type="checkbox" name="<?=$value['id'].'_add'; ?>"  id="<?=$value['id'].'_r12'?>" value="1"/>
                            <label style="margin-left: 22%;" class="checkbox-alias" for="<?=$value['id'].'_r12'?>">Add</label>
                            <input type="checkbox" name="<?=$value['id'].'_view'; ?>" id="<?=$value['id'].'_r13'?>" value="1"/>
                            <label class="checkbox-alias" for="<?=$value['id'].'_r13'?>">View</label>
                            <input type="checkbox" name="<?=$value['id'].'_edit'; ?>" id="<?=$value['id'].'_r14'?>" value="1"/>
                            <label class="checkbox-alias" for="<?=$value['id'].'_r14'?>">Edit</label>
                            <input type="checkbox" name="<?=$value['id'].'_delete'; ?>" id="<?=$value['id'].'_r15'?>" value="1"/>
                            <label class="checkbox-alias" for="<?=$value['id'].'_r15'?>">Delete</label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <?Php } ?>
             <?php } ?>
        </div>
        <div class="modal-footer">
            <div style="text-align: center;">
                <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnEdit">Update</button>
            </div>

        </div>
      </div>
      
    </div>
  </div>
</form>
  


  <script type="text/javascript">
    
    $('#tbl_role').on('click', '.deleteRecord', function() {
        var delete_id = $(this).data('id');
        $('#delete_id').val(delete_id);
        $('#deleteModal').modal('show');
    });

    $('#tbl_role').on('click', '.editRecord1', function() {
            // event.preventDefault();  
            var role_id = $(this).data('id');
          // $("#8_r13").attr('checked','checked');
        $.post('<?php echo base_url("User/getroleById"); ?>', {role_id: role_id}, 
            function(response) {
                var data = response.trim();
                var array = JSON.parse(data);
                
                $.each(array, function(ind, val){
                    
                        var obj = val;
                        var module_id = '';
                        
                        $.each(obj, function(index, value){
                          

                          if(index == 'Module_id'){
                            module_id += value;
                          }
                       
                              switch(index){
                                case 'Admin_rights':
                                      if(value=='1'){
                                        $("#"+module_id+"_r11").attr('checked','checked');
                                      }                       
                                      break;
                                case 'Write_rights':
                                      if(value=='1'){
                                        $("#"+module_id+"_r12").attr('checked','checked');
                                      }
                                      break;
                                case 'Read_rights':
                                      if(value=='1'){
                                        $("#"+module_id+"_r13").attr('checked','checked');
                                      }
                                      break;
                                case 'Edit_rights':
                                      if(value=='1'){
                                        $("#"+module_id+"_r14").attr('checked','checked');
                                      }
                                      break;
                                case 'Delete_rights':
                                      if(value=='1'){
                                        $("#"+module_id+"_r15").attr('checked','checked');
                                      }
                                      break;
                                                  
                              }


                          });

                          $('#edit_role_id').val(val.Role_id);    
                          $('#edit_role_name').val(val.role_name);  

                });

                $('#editRole').modal('show');
            });     
        });


  </script>
  <script>
    
    $('#role_name').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            $("#rname_err").html("Only alphabets allowed").show();
            return false;
        }else{
            $("#rname_err").html("").show();

        }
    });

    $('#edit_role_name').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            $("#rnam_err").html("Only alphabets allowed").show();
            return false;
        }else{
            $("#rnam_err").html("").show();

        }
    });


    $('.btnADD').on('click', function() {
        if($('#role_name').val() == ''){
            $("#rname_err").html("Please enter Role Name").show();
            $("#role_name").focus();
            return false;
        }
    });


    $('.btnEdit').on('click', function() {
        if($('#edit_role_name').val() == ''){
            $("#rnam_err").html("Please enter Role Name").show();
            $("#edit_role_name").focus();
            return false;
        }
    });

    $('.customcardinput').bind('change', function() {
        if($('#role_name').val() == ''){
            $("#rname_err").html("Please enter Role Name").show();
            return false;
        }else{
            $("#rname_err").html("").show();
        }
    });


    $('.customcardinput').bind('change', function() {
        if($('#edit_role_name').val() == ''){
            $("#rnam_err").html("Please enter Role Name").show();
            return false;
        }else{
            $("#rnam_err").html("").show();
        }
    });
  </script>
  <script>
    $('#tbl_role').on('click', '.editRecord', function() {
       var role_id = $(this).data('id');
       $("#edit-role")[0].reset();
       $('#edit-role input:checkbox').removeAttr('checked');


       $.ajax({
         type: 'ajax',
         method: 'post',
         url : '<?=base_url("User/getroleById")?>',
         data : {role_id : role_id},
         dataType : 'json', 
         success : function(data){  
               console.log(data);          
              $.each(data, function(index, value){
                // console.log(value);

                  if(value.Admin_rights=='1'){
                      $("#"+value.Module_id+"_r11").attr('checked','checked');
                  }  
                  if(value.Write_rights=='1'){
                      $("#"+value.Module_id+"_r12").attr('checked','checked');
                  } 
                  if(value.Read_rights=='1'){
                      $("#"+value.Module_id+"_r13").attr('checked','checked');
                  }
                  if(value.Edit_rights=='1'){
                      $("#"+value.Module_id+"_r14").attr('checked','checked');
                  }
                  if(value.Delete_rights=='1'){
                      $("#"+value.Module_id+"_r15").attr('checked','checked');
                  }

              });

            $('#edit_role_id').val(data[0].Role_id);    
            $('#edit_role_name').val(data[0].role_name);  
         }
       });
    });
  </script>
  <script type="text/javascript">

 
    
    $('#addRole').on('click', 'input[name*="_all"]', function() {
       //alert("testing:"+$(this).attr('id').substr(0,1));
        var mod_id = $(this).attr('id').substr(0,1);
        var checked = $(this).is(":checked");

        if($(this).is(":checked"))
        {
          $('input[name="'+mod_id+'_add"]').attr('checked','checked');
          $('input[name="'+mod_id+'_view"]').attr('checked','checked');
          $('input[name="'+mod_id+'_edit"]').attr('checked','checked');
          $('input[name="'+mod_id+'_delete"]').attr('checked','checked');
        }
        else{
            $('input[name="'+mod_id+'_add"]').removeAttr('checked');
           $('input[name="'+mod_id+'_view"]').removeAttr('checked');
           $('input[name="'+mod_id+'_edit"]').removeAttr('checked');
           $('input[name="'+mod_id+'_delete"]').removeAttr('checked');
        }
       
             
    });

     $('#editRole').on('click', 'input[name*="_all"]', function() {
       // alert("testing:"+$(this).attr('id').substr(0,1));
        var mod_id = $(this).attr('id').substr(0,1);
        var checked = $(this).is(":checked");

        if($(this).is(":checked"))
        {
          $('input[name="'+mod_id+'_add"]').attr('checked','checked');
          $('input[name="'+mod_id+'_view"]').attr('checked','checked');
          $('input[name="'+mod_id+'_edit"]').attr('checked','checked');
          $('input[name="'+mod_id+'_delete"]').attr('checked','checked');
        }
        else{
            $('input[name="'+mod_id+'_add"]').removeAttr('checked');
           $('input[name="'+mod_id+'_view"]').removeAttr('checked');
           $('input[name="'+mod_id+'_edit"]').removeAttr('checked');
           $('input[name="'+mod_id+'_delete"]').removeAttr('checked');
        }
       
             
    });
    </script>