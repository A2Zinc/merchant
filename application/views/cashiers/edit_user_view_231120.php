
        <div class="container-fluid mt20">
               <div class="row">
                 <div class="col-md-12">
                       <div class="customcard">
                           	<div class="customcardheader">
                           		<div class="row">
	                           		<div class="col-md-2">
	                           			<p>Update user</p>
	                           		</div>
	                           		<div class="col-md-10">
	                           			<div id="message"></div>
	                           		</div>
                           		</div>                                
                         	</div>
                        <form action="" mathod="post" class="update_user"> 
                           <!-- cardheader -->
                           <div class="customcardbody ">
                             <div class="container mb25">
                              <p class="formheader">Basic Information</p>
                                 <div class="row">
                                     
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel" for="">First Name</label>
                                          <input type="text" class="form-control customcardinput" id="fname" name="first_name" aria-describedby="" value="<?= isset($user['first_name']) ? $user['first_name'] : '' ;?>"   onkeypress="return onlyAlphabets(event,this);">
                                          <span class="errors" id="fname_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel">Last Name</label>
                                          <input type="text" class="form-control customcardinput" id="lname" name="last_name" value="<?= isset($user['last_name']) ? $user['last_name'] : '' ;?>" aria-describedby=""  onkeypress="return onlyAlphabets(event,this);">
                                          <span class="errors" id="lname_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel">Phone Number</label>
                                          <input type="tel" class="form-control customcardinput" id="mobile" name="phone_no" aria-describedby=""  value="<?= isset($user['phone_no']) ? $user['phone_no'] : '' ;?>"  maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                          <span class="errors" id="mob_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel">Email</label>
                                          <input type="text" class="form-control customcardinput" id="email" name="email" aria-describedby=""  value="<?= isset($user['email']) ? $user['email'] : '' ;?>" onkeyup="ValidateEmail();">
                                          <span class="errors" id="email_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- container -->
                             <div class="container  mb25">
                              <p class="formheader">Login & Role</p>
                                 <div class="row">
                                     
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel" for="">User Name</label>
                                          <input type="text" class="form-control customcardinput" id="user_name" name="username" aria-describedby="" value="<?= isset($user['username']) ? $user['username'] : '' ;?>" >
                                          <span class="errors" id="uname_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel">Role</label>
                                          <select class="form-control customcardinput" id="role" name="role">
                                            <option value="<?=$user['role']?>" selected><?php if($user['role'] == 2){?> Shop Manager  <?php }elseif($user['role'] == 3){?> Sales Man <?php }elseif($user['role'] == 4){?> Store Keeper <?php }elseif($user['role'] == 5){?> Customer <?php } ?> </option>
                                                <?php if($user['role'] == '2'){ ?>
                                                <option value="3">Sales Man</option>
                                                <option value="4">Store Keeper</option>
                                                <option value="5">Customer</option>
                                                <?php }elseif($user['role'] == '3'){ ?>
                                                <option value="2">Shop Manager</option>
                                                <option value="4">Store Keeper</option>
                                                <option value="5">Customer</option>
                                                <?php }elseif($user['role'] == '4'){ ?>
                                                <option value="2">Shop Manager</option>
                                                <option value="3">Sales Man</option>
                                                <option value="5">Customer</option>
                                                <?php }elseif($user['role'] == '5'){ ?>
                                                <option value="2">Shop Manager</option>
                                                <option value="3">Sales Man</option>
                                                <option value="4">Store Keeper</option>
                                                <?php } ?>
                                          </select>
                                        </div>
                                     </div>
                                 </div>
                             </div>
                              <!-- container -->
                              <div class="container  mb25">
                                  <p class="formheader">More Information</p>
                                     <div class="row">
                                         
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel" for="">Date Of Birth</label>
                                              <input type="date" class="form-control customcardinput" id="dob" name="dob" aria-describedby="" value="<?= isset($user['date_of_birth']) ? $user['date_of_birth'] : '' ;?>" max="<?php echo date("Y-m-d", strtotime("yesterday")); ?>">
                                              <span class="errors" id="dob_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Gender</label>
                                              <select class="form-control customcardinput" id="gender" name="gender" >
                                                <option value="<?=$user['gender']?>" selected><?=$user['gender']?></option>
                                                <?php if($user['gender'] == 'Male') { ?>
                                                <option value="Female">Female</option>
                                                <?php }else{ ?>
                                                <option value="Male">Male</option>
                                                <?php } ?>
                                              </select>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Marital Status</label>
                                              <select class="form-control customcardinput" id="marital" name="marital_status">
                                                <option value="<?=$user['marital_status']?>" selected ><?=ucfirst($user['marital_status'])?></option>
                                                <?php if($user['marital_status'] == 'single') { ?>
                                                <option value="married">Married</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="separated">Separated</option>
                                                <option value="widowed">Widowed</option>
                                                <?php }elseif($user['marital_status'] == 'married') { ?>
                                                <option value="single">Single</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="separated">Separated</option>
                                                <option value="widowed">Widowed</option>
                                                <?php }elseif($user['marital_status'] == 'divorced') { ?>            <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="separated">Separated</option>
                                                <option value="widowed">Widowed</option>
                                                <?php }elseif($user['marital_status'] == 'separated') { ?>            <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="widowed">Widowed</option>
                                                <?php }elseif($user['marital_status'] == 'widowed') { ?>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="separated">Separated</option>
                                               <?php } ?> 
                                              </select>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Blood Group</label>
                                              <select class="form-control customcardinput" id="blood_group" name="blood_group">
                                                <option value="<?=$user['blood_group']?>" selected ><?=$user['blood_group']?></option>
                                          <?php if($user['blood_group'] == 'A+') { ?>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O-">O-</option>
                                                <option value="O+">O+</option>
                                          <?php }elseif($user['blood_group'] == 'A-') { ?>
                                                <option value="A+">A+</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O-">O-</option>
                                                <option value="O+">O+</option>
                                          <?php }elseif($user['blood_group'] == 'AB+') { ?>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O-">O-</option>
                                                <option value="O+">O+</option>
                                          <?php }elseif($user['blood_group'] == 'AB-') { ?>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O-">O-</option>
                                                <option value="O+">O+</option>
                                          <?php }elseif($user['blood_group'] == 'B+') { ?>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B-">B-</option>
                                                <option value="O-">O-</option>
                                                <option value="O+">O+</option>
                                          <?php }elseif($user['blood_group'] == 'B-') { ?>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="O-">O-</option>
                                                <option value="O+">O+</option>
                                          <?php }elseif($user['blood_group'] == 'O-') { ?>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                          <?php }elseif($user['blood_group'] == 'O+') { ?>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O-">O-</option>
                                                
                                          <?php } ?>      
                                              </select>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Guardian Name</label>
                                              <input type="text" class="form-control customcardinput" id="gurdian_name" name="gurdian_name" value="<?= isset($user['gurdian_name']) ? $user['gurdian_name'] : '' ;?>" aria-describedby="" onkeypress="return onlyAlphabets(event,this);" >
                                              <span class="errors" id="gurn_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="customcardlabel">Guardian Phone Number</label>
                                            <input type="tel" class="form-control customcardinput" id="gurdian_phone" name="gurdian_phone" value="<?= isset($user['gurdian_phone']) ? $user['gurdian_phone'] : '' ;?>" aria-describedby="" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                            <span class="errors" id="gurph_err" style="color:red; font-size:14px"></span>
                                          </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Permanent Adress</label>
                                              <input type="text" class="form-control customcardinput" id="per_address" name="permanent_address" value="<?= isset($user['permanent_address']) ? $user['permanent_address'] : '' ;?>" aria-describedby="">
                                              <span class="errors" id="padrs_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Current Adress</label>
                                              <input type="text" class="form-control customcardinput" id="cur_address" name="current_address" value="<?= isset($user['current_address']) ? $user['current_address'] : '' ;?>" aria-describedby="">
                                              <span class="errors" id="cadrs_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                     </div>
                                 </div>
                                 <!-- container -->
                                 <div class="container  mb25">
                                  <p class="formheader">Bank Details</p>
                                     <div class="row">
                                         
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel" for="">Account Holder’s Name</label>
                                              <input type="text" class="form-control customcardinput" id="holder_name" name="account_holder_name" value="<?= isset($user['account_holder_name']) ? $user['account_holder_name'] : '' ;?>" aria-describedby="" >
                                              <span class="errors" id="acch_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Account Number</label>
                                              <input type="text" class="form-control customcardinput" id="acc_no" name="account_number" value="<?= isset($user['account_number']) ? $user['account_number'] : '' ;?>" aria-describedby="" >
                                              <span class="errors" id="acn_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Bank Name</label>
                                              <input type="email" class="form-control customcardinput" id="bank" name="bank_name" aria-describedby="" value="<?= isset($user['bank_name']) ? $user['bank_name'] : '' ;?>" >
                                              <span class="errors" id="bn_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Bank Identifier Code</label>
                                              <input type="text" class="form-control customcardinput" id="bank_code" name="bank_identifier_code" aria-describedby="" value="<?= isset($user['bank_identifier_code']) ? $user['bank_identifier_code'] : '' ;?>">
                                              <span class="errors" id="bni_err" style="color:red; font-size:14px"></span>
                                            </div>
                                       </div>
                                    
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Branch, Tax Payer  ID</label>
                                              <input type="email" class="form-control customcardinput" id="branch" name="branch_name" aria-describedby="" value="<?= isset($user['branch_name']) ? $user['branch_name'] : '' ;?>">
                                              <span class="errors" id="bch_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                        
                                        
                                        
                                     </div>
                                 </div>
                                 <!-- container -->
                                 <div class="container  mb25">
                                  <p class="formheader">HRMS Information</p>
                                     <div class="row">
                                         
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleFormControlSelect1">Department</label>
                                              <select class="form-control customcardinput" id="exampleFormControlSelect1">
                                                <option>Please select Department</option>
                                               
                                              </select>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleFormControlSelect1">Designation</label>
                                              <select class="form-control customcardinput" id="exampleFormControlSelect1">
                                                <option>Please select Designation</option>
                                               
                                              </select>
                                            </div>
                                         </div>
                                    
                                     </div>
                                 </div>
                           </div>
                           <!-- cardbody -->
                           <input type="hidden" name="user_id" id="user_id" value="<?= isset($user['user_id']) ? $user['user_id'] : '' ;?>"class="form-control">

                           <div class="customcardfooter">
                              <div style="text-align: center;">
                                  <a href="<?=base_url('User/manage_user')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Update</button>
                              </div>
                           </div>
                        </form>     
                       </div>
                 </div>
               </div>
         </div>
    </div>

<script type="text/javascript">
  $(document).ready(function() {

      $('#btnSave').click(function(){
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
            if($('#user_name').val()== " "){
                $("#uname_err").html("Please enter your Username").show();
                return false;
            }
            if($('#role').val()== " "){
                $("#role_err").html("Please enter your Role").show();
                return false;
            }
            if($('#dob').val() == ''){
                $("#dob_err").html("Please select your Date of Birth").show();
                return false;
            }
            if($('#gurdian_name').val() == ''){
                $("#gurn_err").html("Please enter your Guardian Name").show();
                return false;
            }
            if($('#gurdian_phone').val() == '' || $('#gurdian_phone').val().length != 10){
                $("#gurph_err").html("Please enter correct Phone Number").show();
                return false;
            }
            if($('#per_address').val() == ''){
                $("#padrs_err").html("Please enter your Permanent Address").show();
                return false;
            }
            if($('#cur_address').val() == ''){
                $("#cadrs_err").html("Please enter your Current Address").show();
                return false;
            }

            if($('#holder_name').val() == ''){
                $("#acch_err").html("Please enter Account Holder Name").show();
                return false;
            }
            if($('#acc_no').val() == ''){
                $("#acn_err").html("Please enter your Account Number").show();
                return false;
            }
            if($('#bank').val() == ''){
                $("#bn_err").html("Please enter your Bank Name").show();
                return false;
            }
            if($('#bank_code').val() == ''){
                $("#bni_err").html("Please enter your Bank Identifier Code").show();
                return false;
            }
            if($('#branch').val() == ''){
                $("#bch_err").html("Please enter your Branch, Tax Payer  ID").show();
                return false;
            }
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?=base_url("User/update_user");?>',
                data: $('.update_user').serialize(),
                async: false,
                dataType: 'json',
                success: function(data){  
                 console.log(data);                  
                    $('#message').html('');
	              	if(data.status=='success'){
		                $('#message').append(
		                  '<div class="alert alert-success alert-dismissable">'+
		                    '<button type="button" class="close" data-dismiss="alert">'+
		                        '<span aria-hidden="true">&times;</span>'+
		                        '<span class="sr-only">Close</span>'+
		                    '</button>'+
		                    data.message+
		                  '</div>'
		                );
		            }else{
		                $('#message').append(
		                  '<div class="alert alert-danger alert-dismissable">'+
		                    '<button type="button" class="close" data-dismiss="alert">'+
		                        '<span aria-hidden="true">&times;</span>'+
		                        '<span class="sr-only">Close</span>'+
		                    '</button>'+
		                    data.message+
		                  '</div>'
		                );
		            }	
                  $('.update_user')[0].reset();
                 	setTimeout( function (){
                 		$('#message').fadeOut('slow');
                    window.location.reload();
                 	},2000);              
                },

            });
            return false;
        });

  });    
</script>
<script>
    $('.customcardinput').bind('change', function() {
        if($('#fname').val() == ''){
            $("#fname_err").html("Please enter your First Name").show();
            return false;
        }else{
            $("#fname_err").html("").show();
        }
        if($('#lname').val() == ''){
           $("#lname_err").html("Please enter your Last Name").show();
            return false;
        }else{
            $("#lname_err").html("").show();
        }
        if($('#mobile').val() == ''){
            $("#mob_err").html("Please enter your Mobile No.").show();
            return false;
        }else{
            $("#mob_err").html("").show();
        }
        if($('#email').val() == ''){
            $("#email_err").html("Please enter your Email").show();
            return false;
        }else{
            $("#email_err").html("").show();
        }
        if($('#user_name').val() == ''){
            $("#uname_err").html("Please enter your Username").show();
            return false;
        }else{
            $("#uname_err").html("").show();
        }
        if($('#role').val() == ''){
            $("#role_err").html("Please enter your Role").show();
            return false;
        }else{
            $("#role_err").html("").show();
        }
        if($('#dob').val() == ''){
            $("#dob_err").html("Please select your Date of Birth").show();
            return false;
        }else{
            $("#dob_err").html("").show();
        }
        if($('#gurdian_name').val() == ''){
            $("#gurn_err").html("Please enter your Guardian Name").show();
            return false;
        }else{
            $("#gurn_err").html("").show();
        }

        if($('#gurdian_phone').val() == ''){
            $("#gurph_err").html("Please enter your Guardian Phone Number").show();
            return false;
        }else{
            $("#gurph_err").html("").show();
        }
        if($('#per_address').val() == ''){
            $("#padrs_err").html("Please enter your Permanent Address").show();
            return false;
        }else{
            $("#padrs_err").html("").show();
        }
        if($('#cur_address').val() == ''){
            $("#cadrs_err").html("Please enter your Current Address").show();
            return false;
        }else{
            $("#cadrs_err").html("").show();
        }
        if($('#holder_name').val() == ''){
            $("#acch_err").html("Please enter Account Holder Name").show();
            return false;
        }else{
            $("#acch_err").html("").show();
        }
        if($('#acc_no').val() == ''){
            $("#acn_err").html("Please enter your Account Number").show();
            return false;
        }else{
            $("#acn_err").html("").show();
        }
        if($('#bank').val() == ''){
            $("#bn_err").html("Please enter your Bank Name").show();
            return false;
        }else{
            $("#bn_err").html("").show();
        }
        if($('#bank_code').val() == ''){
            $("#bni_err").html("Please enter your Bank Identifier Code").show();
            return false;
        }else{
            $("#bni_err").html("").show();
        }
        if($('#branch').val() == ''){
            $("#bch_err").html("Please enter your Branch, Tax Payer  ID").show();
            return false;
        }else{
            $("#bch_err").html("").show();
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

    $('#gurdian_name').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            $("#gurn_err").html("Only alphabets allowed").show();
            return false;
        }else{
            $("#gurn_err").html("").show();

        }
    });
        
    $('#mobile').on('input', function() {
        if(!/^[0-9]+$/.test($("#mobile").val())) {
            $('#mob_err').html('Please enter your valid Mobile No').show();
            return false;   
        }else{
            $('#mob_err').html('').show();
        }
    });

    $('#gurdian_phone').on('input', function() {
        if(!/^[0-9]+$/.test($("#gurdian_phone").val())) {
            $('#gurph_err').html('Please enter your valid phone No').show();
            return false;   
        }else{
            $('#gurph_err').html('').show();
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