     
      <div class=" container-fluid mt20">
        <div class="row">
          <div class="col-md-12">
            <div class="customcard">
              <div >
                <div class="usercardheader">
                  <div class="col-md-2">
                    <p>All Brand</p>
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
                      <button   data-toggle="modal" data-target="#addModal" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">Add Brand
                        
                      <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                      </svg>
    
                        </button>
                    
               </div>
               <div class="customcardbody ">
                <table class="table table-striped" id="tbl_brand">
                    <thead>
                      <tr>
                        <th scope="col">Brand name</th>
                        <th scope="col">Description</th>
                        <th style="text-align: center;" scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($brand as $b){ ?> 
                        
                          <tr>
                            <td>
                              <?=$b['brand_name']?>
                            </td>
                            <td>
                              <?=$b['description']?>
                            </td>
                            <td style="text-align: center;">
                        
                                <button type="button" data-id="<?php echo $b['brand_id'];?>" class="btn btn-outline-dark alluserbtn editRecord" data-toggle="modal" data-target="#editModal">Edit 
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
                            
                           
                                <button type="button" data-id="<?php echo $b['brand_id'];?>" class="btn btn-outline-dark alluserbtn deleteRecord">Delete 
                                    <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                    </svg>
                              </button>
                          </td>
                          </tr>

                          

                        <?php }?>
                      
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


      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <form action="<?=base_url('Cproduct/insert_brand')?>" method="post">
      <div class="modal-content">
        <div class="modal-header custommodalheader">
          <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Add a new brand</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="customcardlabel">Brand name: </label>
                  <input type="text" class="form-control customcardinput" id="brand" name="brand_name" aria-describedby="" placeholder="Please enter your Brand name" onkeypress="return onlyAlphabets(event,this);">
                  <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="customcardlabel customcardlabel" for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" id="description" rows="4" name="description"></textarea>
                  <span class="errors" id="disp_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <div style="text-align: center;">
                <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Add</button>
            </div>

        </div>
      </div>
    </form>
    </div>
  </div>



  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
         <form class="delete-Role" method="post" action="<?php echo base_url('Cproduct/delete_brand'); ?>">
            <div class="modal-body modalscroll">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 mt-2 mb-3 ">
                   <center><img src="<?=base_url()?>assets/images/sign.png " class="img-fluid"></center>
                   <h5 class="text-center">Are you sure to delete this record ?</h5>

                  </div>
                      <input type="hidden" name="brand_id" id="delete_id" class="form-control">
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


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <form action="<?=base_url('Cproduct/update_brand')?>" method="post">
      <div class="modal-content">
        <div class="modal-header custommodalheader">
          <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Update brand</h5>
          <input type="hidden" name="brand_id" id="edit_brand_id" class="form-control customcardinput">
        </div>
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="customcardlabel">Brand name: </label>
                  <input type="text" class="form-control customcardinput" id="editBrand" name="brand_name" aria-describedby="" placeholder="Please enter your Brand name" onkeypress="return onlyAlphabets(event,this);">
                  <span class="errors" id="bname_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="customcardlabel customcardlabel" for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" id="editDescription" rows="4" name="description"></textarea>
                  <span class="errors" id="disp2_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <div style="text-align: center;">
                <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnUpdate">Update</button>
            </div>

        </div>
      </div>
    </form>
    </div>
  </div>



<script type="text/javascript">
    
    $('#tbl_brand').on('click', '.deleteRecord', function() {
        var delete_id = $(this).data('id');
        $('#delete_id').val(delete_id);
        $('#deleteModal').modal('show');
    });

    $('#tbl_brand').on('click', '.editRecord', function() { 
         var brand_id = $(this).data('id');
         $.ajax({
         type: 'ajax',
         method: 'post',
         url : '<?=base_url("Cproduct/getBrandById")?>',
         data : {brand_id : brand_id},
         dataType : 'json', 
         success : function(data){  
            console.log(data);
            $('#edit_brand_id').val(data.brand_id); 
            $('#editBrand').val(data.brand_name);    
            $('#editDescription').val(data.description);     
         }
       });
    });


    $('#btnSave').click(function(){
        if($('#brand').val() == ''){
            $("#name_err").html("Please enter Brand Name").show();
            return false;
        }

    });

      $('.customcardinput').bind('change', function() {
        if($('#brand').val() == ''){
            $("#name_err").html("Please enter Brand Name").show();
            return false;
        }else{
            $("#name_err").html("").show();
        }
     });


      $('#btnUpdate').click(function(){
        if($('#editBrand').val() == ''){
            $("#bname_err").html("Please enter Brand Name").show();
            return false;
        }

      });

      $('#editBrand').bind('change', function() {
        if($('#editBrand').val() == ''){
            $("#bname_err").html("Please enter Brand Name").show();
            return false;
        }else{
            $("#bname_err").html("").show();
        }
     });

     $('#brand').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            $("#name_err").html("Only alphabets allowed").show();
            return false;
        }else{
            $("#name_err").html("").show();

        }
     }); 

     // $('#description').on('keypress', function() {
     //    var regex = new RegExp("^[a-zA-Z ]+$");
     //    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
     //    if (!regex.test(key)) {
     //        $("#disp_err").html("Only alphabets allowed").show();
     //        return false;
     //    }else{
     //        $("#disp_err").html("").show();

     //    }
     // }); 

     $('#editBrand').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            $("#bname_err").html("Only alphabets allowed").show();
            return false;
        }else{
            $("#bname_err").html("").show();

        }
     }); 

     //  $('#editDescription').on('keypress', function() {
     //    var regex = new RegExp("^[a-zA-Z ]+$");
     //    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
     //    if (!regex.test(key)) {
     //        $("#disp2_err").html("Only alphabets allowed").show();
     //        return false;
     //    }else{
     //        $("#disp2_err").html("").show();

     //    }
     // }); 

  </script>