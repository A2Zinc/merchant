
        <div class="container-fluid mt20">
               <div class="row">
                 <div class="col-md-12">
                       <div class="customcard">
                            <div class="customcardheader">
                              <div class="row">
                                <div class="col-md-2">
                                  <p>Add New User</p>
                                </div>
                                <div class="col-md-10">
                                  <div id="message"></div>
                                </div>
                              </div>
                          </div>

                        <form action="" method="post" class="add_user" autocomplete="off">
                           <!-- cardheader -->
                           <div class="customcardbody ">
                             <div class="container mb25">
                              <p class="formheader">Basic Information</p>
                                 <div class="row">

                                     <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="customcardlabel" for="">First Name <span>*</span></label>
                                          <input type="text" class="form-control customcardinput" id="fname" name="first_name" aria-describedby="" placeholder="Please enter your First Name"  onkeypress="return onlyAlphabets(event,this);">
                                          <span class="errors" id="fname_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="customcardlabel">Last Name <span>*</span></label>
                                          <input type="text" class="form-control customcardinput" id="lname" name="last_name" aria-describedby="" placeholder="Please enter your Last Name"  onkeypress="return onlyAlphabets(event,this);">
                                          <span class="errors" id="lname_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="customcardlabel">Nick Name </label>
                                          <input type="text" class="form-control customcardinput" id="nname" name="nick_name" aria-describedby="" placeholder="Please enter your Nick Name"  onkeypress="return onlyAlphabets(event,this);">
                                          <span class="errors" id="nick_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel">Phone Number <span>*</span></label>
                                          <input type="tel" class="form-control customcardinput phoneInput" id="mobile" name="phone_no" aria-describedby=""  placeholder="Please enter your Phone Number" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                          <span class="errors" id="mob_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel">Email <span>*</span></label>
                                          <input type="text" class="form-control customcardinput" id="email" name="email" aria-describedby="" placeholder="Please enter your Email" onkeyup="ValidateEmail();">
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
                                          <label class="customcardlabel" for="">Username <span>*</span></label>
                                          <label class=" text-secondary" style="font-size:10px;">(Numeric field only) <span>*</span></label>
                                          <input type="tel" class="form-control customcardinput" id="user_name" name="username" aria-describedby="" placeholder="Please enter Username" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4">
                                          <span class="errors" id="uname_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel">Role <span>*</span></label>
                                          <select class="form-control customcardinput" id="role" name="role">
                                            <option>-- Select --</option>
                                            <?php foreach($front_role as $userrole){ ?>
                                              <option value="<?=$userrole['id']?>"><?=$userrole['role_name']?></option>
                                            <?php } ?>
                                          </select>
                                         <span class="errors" id="role_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel">Password <span>*</span></label>
                                          <label class=" text-secondary" style="font-size:10px;">(Numeric field only) <span>*</span></label>
                                          <input type="password" class="form-control customcardinput" id="password" name="password" aria-describedby="" placeholder="Please enter your Password" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4">
                                          <span class="errors" id="pass_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel">Confirm Password <span>*</span></label>
                                          <label class=" text-secondary" style="font-size:10px;">(Numeric field only) <span>*</span></label>
                                          <input type="password" class="form-control customcardinput" id="cnf_password" name="cnf_password" aria-describedby="" placeholder="Please re-enter your Password" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4">
                                          <span class="errors" id="cpass_err" style="color:red; font-size:14px"></span>
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
                                              <label class="customcardlabel" for="">Date of Birth <span>*</span></label>
                                              <input type="text" class="form-control customcardinput inputDate" id="dob" name="dob" aria-describedby="" placeholder="mm-dd-yyyy" style="background: #fff;">
                                              <span class="errors" id="dob_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Gender <span>*</span></label>
                                              <select class="form-control customcardinput" id="gender" name="gender" >
                                                <option>-- Select --</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                              </select>
                                              <span class="errors" id="gen_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Martial Status <span>*</span></label>
                                              <select class="form-control customcardinput" id="marital" name="marital_status">
                                                <option>-- Choose Option --</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="separated">Separated</option>
                                                <option value="widowed">Widowed</option>
                                              </select>
                                              <span class="errors" id="marital_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Blood Group <span>*</span></label>
                                              <select class="form-control customcardinput" id="blood_group" name="blood_group">
                                                <option>-- Choose Option --</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O-">O-</option>
                                                <option value="O+">O+</option>
                                              </select>
                                              <span class="errors" id="blood_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Guardian Name <span>*</span></label>
                                              <input type="text" class="form-control customcardinput" id="gurdian_name" name="gurdian_name" aria-describedby="" placeholder="Please enter your Guardian Name"  onkeypress="return onlyAlphabets(event,this);">
                                              <span class="errors" id="gurn_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="customcardlabel">Guardian Phone Number <span>*</span></label>
                                            <input type="tel" class="form-control customcardinput phoneInput" id="gurdian_phone" name="gurdian_phone" aria-describedby="" placeholder="Please enter your Guardian Phone Number" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                            <span class="errors" id="gurph_err" style="color:red; font-size:14px"></span>
                                          </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Permanent Address <span>*</span></label>
                                              <input type="text" class="form-control customcardinput" id="per_address" name="permanent_address" aria-describedby="" placeholder="Please enter your Permanent Address">
                                              <span class="errors" id="padrs_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Current Address <span>*</span></label>
                                              <input type="text" class="form-control customcardinput" id="cur_address" name="current_address" aria-describedby="" placeholder="Please enter your Current Address">
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
                                              <label class="customcardlabel" for="">Account Holder’s Name <span>*</span></label>
                                              <input type="text" class="form-control customcardinput" id="holder_name" name="account_holder_name" aria-describedby="" placeholder="Please enter Account Holder’s Name">
                                              <span class="errors" id="acch_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Account Number <span>*</span></label>
                                              <input type="text" class="form-control customcardinput" id="acc_no" name="account_number" aria-describedby="" placeholder="Please enter your Account Number">
                                              <span class="errors" id="acn_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Bank Name <span>*</span></label>
                                              <input type="text" class="form-control customcardinput" id="bank" name="bank_name" aria-describedby="" placeholder="Please enter your Bank Name">
                                              <span class="errors" id="bn_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Bank Identifier Code <span>*</span></label>
                                            <input type="text" class="form-control customcardinput" id="bank_code" name="bank_identifier_code" aria-describedby="" placeholder="Please enter your Bank Identifier Code">
                                            <span class="errors" id="bni_err" style="color:red; font-size:14px"></span>
                                          </div>
                                       </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Branch, Tax Payer  ID <span>*</span></label>
                                              <input type="text" class="form-control customcardinput" id="branch" name="branch_name" aria-describedby="" placeholder="Please enter your Branch, Tax Payer  ID">
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
                                              <label for="exampleFormControlSelect1" style="color:red;">Department <span>*</span></label>
                                              <select class="form-control customcardinput" id="department" name="department">
                                                <option>-- Select Department --</option>
                                                <?php foreach($department as $d) { ?>
                                                <option value="<?=$d['id']?>"><?=$d['department_name']?></option>
                                                <?php } ?>
                                              </select>
                                              <span class="errors" id="department_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleFormControlSelect1" style="color:red;">Designation <span>*</span></label>
                                              <select class="form-control customcardinput" id="designation" name="designation">
                                                <option>-- Select Designation --</option>
                                                <?php foreach($designation as $d) { ?>
                                                <option value="<?=$d['id']?>"><?=$d['designation_name']?></option>
                                                <?php } ?>

                                              </select>
                                              <span class="errors" id="designation_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>

                                     </div>
                                 </div>
                           </div>
                           <!-- cardbody -->
                           <div class="customcardfooter">
                              <div style="text-align: center;">
                                  <a href="<?=base_url('User/manage_user')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                  <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Add</button>
                              </div>
                           </div>
                        </form>
                       </div>
                 </div>
               </div>
         </div>
    </div>

<link rel="stylesheet" href="<?=base_url()?>assets/flatpickr/flatpickr.min.css">
<script src="<?=base_url()?>assets/flatpickr/flatpickr.js"></script>
<script type="text/javascript">
  //only use datepicker  //id bhi use kar sakte hai
    $(".inputDate").flatpickr({
        enableTime: false,
        dateFormat: "m-d-Y",
        minDate: "1.1.1950",  //dateformat using m.d.y
        maxDate: "1.1.Y",
        "locale": {
            "firstDayOfWeek": 1 // set start day of week to Monday
        }
    });
  $(document).ready(function() {
    var email_state = false;
    var username_state = false;

    $('#email').on('blur', function(){
          var email = $('#email').val();
          $.ajax({
              url: '<?=base_url("User/check_email");?>',
              type: 'post',
              data: {email: email},
              success: function(response){
                 console.log(response);
                  if (response == 'fail' ) {
                    email_state = false;
                    $("#email_err").html("This Email is already exist").show();
                  }else if (response == 'success') {
                    email_state = true;
                    $("#email_err").html("").show();
                  }
              }
          });
    });

    $('#user_name').on('blur', function(){
        var username = $('#user_name').val();
        $.ajax({
            url: '<?=base_url("User/check_username");?>',
            type: 'post',
            data: {username: username},
            success: function(response){
                if (response == 'fail' ) {
                  username_state = false;
                  $("#uname_err").html("This Username is already exist").show();
                }else if (response == 'success') {
                  username_state = true;
                  $("#uname_err").html("").show();
                }
            }
        });
    });


    $('#btnSave').on('click', function(){
         var email_id = $('#email').val();
            if($('#fname').val() == '') {
                $("#fname_err").html("Please enter your First Name").show();
                return false;
            }
            if($('#lname').val() == '') {
                $("#lname_err").html("Please enter your Last Name").show();
                return false;
            }
            if($('#mobile').val().length != 14 ){
                $("#mob_err").html("Please enter correct Phone No.").show();
                return false;
            }
            if(email_id== " "){
                $("#email_err").html("Please enter your Email").show();
                return false;
            }
            if(ValidateEmail(email_id) == false){
              $("#email_err").html("Please enter valid Email").show();
              return false;
            }
            if(email_state == false){
              $("#email_err").html("This Email is already exist").show();
              return false;
            }
            if($('#user_name').val()== " "){
                $("#uname_err").html("Please enter your Username").show();
                return false;
            }
            if(username_state == false){
              $("#uname_err").html("This Username is already exist").show();
              return false;
            }
            if($('#role').val()== '-- Select --'){
                $("#role_err").html("Please select your Role").show();
                return false;
            }
            if($('#password').val() == ''){
                $("#pass_err").html("Please enter your Password").show();
                return false;
            }
            if($('#password').val().length != 4){
                $("#pass_err").html("Password should not be less than 4 digits").show();
                return false;
            }
            if($('#cnf_password').val() == ''){
                $("#cpass_err").html("Please enter your Confirm Password").show();
                return false;
            }
            if($('#password').val() != $('#cnf_password').val()){
                $("#cpass_err").html("Password mismatch").show();
                return false;
            }else{
              $("#cpass_err").html("").show();
            }
            if($('#dob').val() == ''){
                $("#dob_err").html("Please select your Date of Birth").show();
                return false;
            }
            if($('#gender').val() == '-- Select --'){
                $("#gen_err").html("Please select your Gender").show();
                return false;
            }
            if($('#marital').val() == '-- Choose Option --'){
                $("#marital_err").html("Please select your Marital Status").show();
                return false;
            }
            if($('#blood_group').val() == '-- Choose Option --'){
                $("#blood_err").html("Please select your Blood Group").show();
                return false;
            }
            if($('#gurdian_name').val() == ''){
                $("#gurn_err").html("Please enter your Guardian Name").show();
                return false;
            }
            if($('#gurdian_phone').val() == '' || $('#gurdian_phone').val().length != 14){
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
            if($('#department').val() == '-- Select Department --'){
                $("#department_err").html("Please select Department").show();
                return false;
            }
            if($('#designation').val() == '-- Select Designation --'){
                $("#designation_err").html("Please select Designation").show();
                return false;
            }

            if(email_state == true && username_state == true) {
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?=base_url("User/insert_user");?>',
                data: $('.add_user').serialize(),
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
                  $('.add_user')[0].reset();
                  setTimeout( function (){
                    $('#message').fadeOut('slow');
                    window.location = '<?=base_url("User/manage_user")?>';
                  },1600);

                },

            });
            return false;
          }

      });


 });

</script>

<script>
    $('.customcardinput').bind('change', function() {
      var email_id = $('#email').val();
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
            $("#mob_err").html("Please enter your Phone No.").show();
            return false;
        }else{
            $("#mob_err").html("").show();
        }
        if(email_id == ''){
            $("#email_err").html("Please enter your Email").show();
            return false;
        }else{
            $("#email_err").html("").show();
        }
        if(ValidateEmail(email_id) == false){
          $("#email_err").html("Please enter valid Email").show();
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
        if($('#role').val() == '-- Select --'){
            $("#role_err").html("Please select your Role").show();
            return false;
        }else{
            $("#role_err").html("").show();
        }
        if($('#password').val() == ''){
            $("#pass_err").html("Please enter your Password").show();
            return false;
        }else{
            $("#pass_err").html("").show();
        }
        if($('#password').val().length != 4){
            $("#pass_err").html("Password should not be less than 4 digits").show();
            return false;
        }else{
            $("#pass_err").html("").show();
        }
        if($('#cnf_password').val() == ''){
            $("#cpass_err").html("Please enter your Confirm Password").show();
            return false;
        }else{
            $("#cpass_err").html("").show();
        }
        
        if($('#password').val() != $('#cnf_password').val()){
            $("#cpass_err").html("Password mismatch").show();
            return false;
        }else{
          $("#cpass_err").html("").show();
        }
        if($('#dob').val() == ''){
            $("#dob_err").html("Please select your Date of Birth").show();
            return false;
        }else{
            $("#dob_err").html("").show();
        }
        if($('#gender').val() == '-- Select --'){
            $("#gen_err").html("Please select your Gender").show();
            return false;
        }else{
            $("#gen_err").html("").show();
        }

        if($('#marital').val() == '-- Choose Option --'){
            $("#marital_err").html("Please select your Marital Status").show();
            return false;
        }else{
            $("#marital_err").html("").show();
        }
        if($('#blood_group').val() == '-- Choose Option --'){
            $("#blood_err").html("Please select your Blood Group").show();
            return false;
        }else{
            $("#blood_err").html("").show();
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
        if($('#department').val() == '-- Select Department --'){
            $("#department_err").html("Please select Department").show();
            return false;
        }else{
            $("#department_err").html("").show();
        }

        if($('#designation').val() == '-- Select Designation --'){
            $("#designation_err").html("Please select Designation").show();
            return false;
        }else{
            $("#designation_err").html("").show();
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

    $('#nname').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            $("#nick_err").html("Only alphabets allowed").show();
            return false;
        }else{
            $("#nick_err").html("").show();

        }
    });
    
    $('#user_name').on('input', function() {
        if(!/^[0-9]+$/.test($("#user_name").val())) {
           $('#uname_err').html('Please enter only numeric digits').show();
            return false;
        }else{
           $('#uname_err').html('').show();
        }
    });

    $('#password').on('input', function() {
        if(!/^[0-9]+$/.test($("#password").val())) {
           $('#pass_err').html('Please enter only numeric digits').show();
            return false;
        }else{
           $('#pass_err').html('').show();
        }
    });

    $('#cnf_password').on('input', function() {
        if(!/^[0-9]+$/.test($("#cnf_password").val())) {
           $('#cpass_err').html('Please enter only numeric digits').show();
            return false;
        }else{
           $('#cpass_err').html('').show();
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
            $('#mob_err').html('Please enter your valid Phone No').show();
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

    $('#password').keyup(function() {
        $(this).val($(this).val().replace(/ +?/g, ''));
    });
    $('#cnf_password').keyup(function() {
        $(this).val($(this).val().replace(/ +?/g, ''));
    });

</script>
<script>
//always outside imp
    function ValidateEmail(email_id) {
        // var email_id = $("#email").val();
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!expr.test(email_id)) {
            $('#email_err').html('Please enter valid Email').show();
            return false;
        }else{
            $('#email_err').html("").show();
        }
    }
</script>
