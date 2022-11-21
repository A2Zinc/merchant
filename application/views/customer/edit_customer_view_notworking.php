<div class="container-fluid mt20">
             <div class="row">
               <div class="col-md-12">
                     <div class="customcard">
                         <div class="customcardheader">
                              <div class="row">
                                <div class="col-md-2">
                                   <?php if(isset($_GET['customerid'])){ ?>
                                  <p>Update customer</p>
                                   <?php } else { ?>
                                    <p>Add new customer</p>
                                   <?php } ?>
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
                          <?php if(isset($_GET['customerid'])) {?>
                          <form action="<?=base_url('Ccustomer/update_customer')?>" method="post" id="add-customer" name="edit-customer">
                            <input type="hidden" name="customer_id" value="<?=$_GET['customerid']?>">
                          <?php }else{ ?>
                          <form action="<?=base_url('Ccustomer/insert_customer')?>" method="post" id="add-customer" name="add-customer"> 
                         <?php } ?>
                         <div class="customcardbody ">
                           <div class="container mb25">
                           <?php //echo $customerdata['customer_id'];DCJNGJQ9WWHLGV4?>
                            <p class="formheader">Basic Information</p>
                               <div class="row">
                                   
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">First Name</label>
                                        <input type="text" class="form-control customcardinput" id="fname" name="first_name" aria-describedby="" placeholder="Please enter customer's First Name"  onkeypress="return onlyAlphabets(event,this);" value="<?= isset($customerdata['first_name']) ? $customerdata['first_name'] : '' ;?>">
                                          <span class="errors" id="fname_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">Last Name</label>
                                        <input type="text" class="form-control customcardinput" id="lname" name="last_name" aria-describedby="" placeholder="Please enter customer's Last Name"  onkeypress="return onlyAlphabets(event,this);" value="<?= isset($customerdata['last_name']) ? $customerdata['last_name'] : '' ;?>" >
                                          <span class="errors" id="lname_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">Phone Number</label>
                                        <input type="tel" class="form-control customcardinput" id="mobile" name="phone_no" aria-describedby=""  placeholder="Please enter customer's Phone Number" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?= isset($customerdata['customer_mobile']) ? $customerdata['customer_mobile'] : '' ;?>">
                                          <span class="errors" id="mob_err" style="color:red; font-size:14px"></span>
                                      </div>
                                      <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_active" value="1" <?= isset($customerdata['is_active']) ? 'checked' : '' ;?>>
                                        <label class="form-check-label customcardlabel checklabel filled-in" for="exampleCheck1">Is Active?</label>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">Email</label>
                                        <input type="email" class="form-control customcardinput" id="email" name="email" aria-describedby="" placeholder="Please enter customer's Email" onkeyup="ValidateEmail();" value="<?= isset($customerdata['customer_email']) ? $customerdata['customer_email'] : '' ;?>">
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
                                        <input type="text" class="form-control customcardinput" id="address1" name="address_1" aria-describedby="" placeholder="Please enter customer's Address Line 1" value="<?= isset($customerdata['customer_address_1']) ? $customerdata['customer_address_1'] : '' ;?>">
                                        <span class="errors" id="add1_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">Address Line 2</label>
                                        <input type="text" class="form-control customcardinput" id="address2" name="address_2" aria-describedby="" placeholder="Please enter customer's Address Line 2" value="<?= isset($customerdata['customer_address_2']) ? $customerdata['customer_address_2'] : '' ;?>">
                                        <span class="errors" id="add2_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">Country</label>
                                        <select class="form-control customcardinput" id="country" name="country">
                                          
                                          <?php 
                                              
                                          foreach($country as $c){
                                            
                                              echo '<option value="'.$c->id.'" ';
                                              if($customerdata['country'] == $c->id) echo " selected";
                                              echo '>'.$c->name.'</option>';
                                          }?>
                                        </select>
                                        <span class="errors" id="country_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">State</label>
                                        <select class="form-control customcardinput" id="state" name="state">
                                          <?php 
                                            if(isset($customerdata['state']))
                                            {
                                              foreach($states as $s){
                                              
                                                echo '<option value="'.$s->iso2.'" ';
                                                if($customerdata['state'] == $s->iso2)
                                                echo " selected";
                                                echo '>'.$s->name.'</option>';
                                            }}
                                            else
                                              {
                                                echo '<option>-- Select State --</option>';
                                              }
                                          ?>
                                        </select>
                                        <span class="errors" id="state_err" style="color:red; font-size:14px"></span>
                                        
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">City </label>
                                        <input type="text" class="form-control customcardinput" id="city" name="city" aria-describedby="" placeholder="Please enter customer's City" value="<?= isset($customerdata['city']) ? $customerdata['city'] : '' ;?>">
                                        <span class="errors" id="city_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">Zip Code </label>
                                        <input type="tel" class="form-control customcardinput" id="zipcode" name="zipcode" aria-describedby="" placeholder="Please enter customer's Zip Code" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?= isset($customerdata['zip']) ? $customerdata['zip'] : '' ;?>">
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
                                <a href="<?=base_url('Ccustomer/manage_customer')?>" type="button" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <?php if(isset($_GET['customerid'])){ ?>
                                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Update</button>
                                <?php }else{ ?>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Add</button>
                              <?php } ?>
                            </div>
                         </div>
                         </form>
                     </div>
               </div>
             </div>
       </div>

<script type="text/javascript">
      $('body').on('change', '#country', function(){
        var country_id = $('#country').val();

        if(country_id != ''){
          
            $.ajax
            ({
                url: "<?php echo base_url('Ccustomer/select_city_country_id')?>",
                data: {country_id:country_id},
                type: "post",
                success: function(data)
                {
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

    $('#btnSave').click(function(){
      //alert($(this).parents("form").attr("name"));
       var submition = true; 


            if($('#fname').val() == '') {
                $("#fname_err").html("Please enter your First Name").show();
                return false;
            }
            if($('#lname').val() == '') {
                $("#lname_err").html("Please enter your Last Name").show();
                return false;
            }

            if($('#mobile').val().length != 10 ){
                $("#mob_err").html("Please enter correct Mobile No.").show();
                return false;
            }

            if($('#mobile').val() != '' && $(this).parents("form").attr("name") == 'add-customer')
            {
              var mobile = $('#mobile').val();
                $.ajax({
                    url: '<?=base_url("Ccustomer/check_phno");?>',
                    type:'post',
                    data:{phno:mobile},
                    success:function(data){
                      console.log(data);
                        if(data=='success'){
                            $("#mob_err").html("").show();
                        }else{
                            submition = false;
                             $("#mob_err").html("This phone number is aleready exist").show();
                             
                            return false;
                        }
                    }
            });
            }

            if($('#email').val() == ''){
              $("#email_err").html("Please enter your email.").show();
              return false;
            }else
            {
                if($(this).parents("form").attr("name") == 'add-customer'){
                var email = $('#email').val();
                  $.ajax({
                      async: false,
                      url: '<?=base_url("Ccustomer/check_email");?>',
                      type:'post',
                      data:{email:email},
                      success:function(data){
                                               
                          if(data=='fail'){
                            submition =false;
                           
                            $("#email_err").html("This Email is aleready exist").show();
                               return false;
                          }
                      }
                  });
                }
            
             }

             if(submition)
             {
                $( "#add-customer" ).submit();
             }
             return false;

        });
</script>  
<script type="text/javascript">
    $('#mobile').on('change', function() {
        var mobile = $('#mobile').val();
        $.ajax({
            url: '<?=base_url("Ccustomer/check_phno");?>',
            type:'post',
            data:{phno:mobile},
            success:function(data){
              console.log(data);
                if(data=='success'){
                    $("#mob_err").html("").show();
                }else{
                     $("#mob_err").html("This phone number is aleready exist").show();
                    return false;
                }
            }
        });
    });


    $('#email').on('change', function() {
     
        var email = $('#email').val();
        $.ajax({
            url: '<?=base_url("Ccustomer/check_email");?>',
            type:'post',
            data:{email:email},
            success:function(data){
             // alert(data);
              console.log(data);
                if(data=='success'){
                    $("#email_err").html("").show();
                }else{
                     $("#email_err").html("This Email is aleready exist").show();
                    return false;
                }
            }
        });
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