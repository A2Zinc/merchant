<div class="container-fluid mt20">
             <div class="row">
               <div class="col-md-12">
                     <div class="customcard">
                         <div class="customcardheader">
                              <div class="row">
                                <div class="col-md-2">
                                  <p>Add new customer</p>
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
                              </div>  
                         </div>
                         <!-- cardheader -->
                         <form action="<?=base_url('Ccustomer/insert_customer')?>" method="post" id="add-customer">
                         <div class="customcardbody ">
                           <div class="container mb25">
                            <p class="formheader">Basic Information</p>
                               <div class="row">
                                   
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">First Name</label>
                                        <input type="text" class="form-control customcardinput" id="fname" name="first_name" aria-describedby="" placeholder="Please enter customer's First Name"  onkeypress="return onlyAlphabets(event,this);">
                                          <span class="errors" id="fname_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">Last Name</label>
                                        <input type="text" class="form-control customcardinput" id="lname" name="last_name" aria-describedby="" placeholder="Please enter customer's Last Name"  onkeypress="return onlyAlphabets(event,this);">
                                          <span class="errors" id="lname_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">Phone Number</label>
                                        <input type="tel" class="form-control customcardinput" id="mobile" name="phone_no" aria-describedby=""  placeholder="Please enter customer's Phone Number" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                          <span class="errors" id="mob_err" style="color:red; font-size:14px"></span>
                                      </div>
                                      <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_active" value="1">
                                        <label class="form-check-label customcardlabel checklabel filled-in" for="exampleCheck1">Is Active?</label>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">Email</label>
                                        <input type="text" class="form-control customcardinput" id="email" name="email" aria-describedby="" placeholder="Please enter customer's Email" onkeyup="ValidateEmail();">
                                        <span class="errors" id="email_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                               </div>
                           </div>
                           <!-- container -->
                           <div class="container  mb25">
                            <p class="formheader">Address</p>
                               <div class="row">
                                   
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Address Line 1</label>
                                        <input type="text" class="form-control customcardinput" id="address1" name="address_1" aria-describedby="" placeholder="Please enter customer's Address Line 1">
                                        <span class="errors" id="add1_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">Address Line 2</label>
                                        <input type="text" class="form-control customcardinput" id="address2" name="address_2" aria-describedby="" placeholder="Please enter customer's Address Line 2">
                                        <span class="errors" id="add2_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">Country</label>
                                        <select class="form-control customcardinput" id="country" name="country">
                                          <option>-- Select Country--</option>
                                          <?php foreach($country as $c){
                                              echo '<option value="'.$c->id.'">'.$c->name.'</option>';
                                          }?>
                                        </select>
                                        <span class="errors" id="country_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">State</label>
                                        <select class="form-control customcardinput" id="state" name="state">
                                          <option>-- Select State --</option>
                                        </select>
                                        <span class="errors" id="state_err" style="color:red; font-size:14px"></span>
                                        
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">City </label>
                                        <input type="text" class="form-control customcardinput" id="city" name="city" aria-describedby="" placeholder="Please enter customer's City">
                                        <span class="errors" id="city_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">Zip Code </label>
                                        <input type="tel" class="form-control customcardinput" id="zipcode" name="zipcode" aria-describedby="" placeholder="Please enter customer's Zip Code" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        <span class="errors" id="zip_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                               </div>
                           </div>
                            <!-- container -->
                            <div class="container  mb25">
                                <p class="formheader">Other settings</p>
                                   <div class="row">
                                       
                                       <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel" for="">Discount (amount)</label>
                                            <input type="tel" class="form-control customcardinput" id="discount" name="discount" aria-describedby="" placeholder="Please enter discount">
                                           <span class="errors" id="discount_err" style="color:red; font-size:14px"></span>
                                          </div>
                                       </div>
                                     
                                   </div>
                               </div>
                               <!-- container -->
                              
                         </div>
                         <!-- cardbody -->
                         <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href=<?=base_url('Ccustomer/manage_customer')?> type="button" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm">Add</button>
                            </div>
                         </div>
                         </form>
                     </div>
               </div>
             </div>
       </div>

<script type="text/javascript">
    $('#country').change(function(){
        var country = $('#country').val();

        if(country != ''){
            $.ajax({
                url:"<?php echo base_url(); ?>Ccustomer/fetchState",
                method:"POST",
                data:{country_id:country},
                success:function(data){
                    $('#state').html(data);
                }
            });
        }else{
            $('#state').html('<option value="">--Select State--</option>');
        }
    });

    $('#fname').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            $("#fname_err").html("Only alphabets allowed").show();
            return false;
        }else{
            $("#fname_err").html("").show();

        }
    });

    $('#lname').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            $("#lname_err").html("Only alphabets allowed").show();
            return false;
        }else{
            $("#lname_err").html("").show();

        }
    });
</script>   
<script>
//always outside imp
    function ValidateEmail() {
        var email_id = $("#email").val();
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!expr.test(email_id)) {
            $('#email_err').html('Please enter valid Email').show();
            return false;
        }else{
            $('#email_err').html("").show();
        }
    }
</script>  