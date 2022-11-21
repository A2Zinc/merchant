
        <div class="container-fluid mt20">
               <div class="row">
                 <div class="col-md-12">
                       <div class="customcard">
                           	<div class="customcardheader">
                           		<div class="row">
	                           		<div class="col-md-3">
	                           			<p>Add New Supplier</p>
	                           		</div>
	                           		<div class="col-md-9">
	                           			<div id="message"></div>
	                           		</div>
                           		</div>                                
                         	</div>
                        
                        <form action="" method="post" class="add_supplier" autocomplete="off"> 
                           <!-- cardheader -->
                           <div class="customcardbody">
                             <div class="container mb25">
                              <p class="formheader">Basic Information</p>
                                 <div class="row">
                                     
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel" for="">Supplier Name *</label>
                                          <input type="text" class="form-control customcardinput" id="fname" name="supplier_name" aria-describedby="" placeholder="Enter Supplier Name">
                                          <span class="errors" id="fname_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel">Contact Number *</label>
                                          <input type="tel" class="form-control customcardinput phoneInput" id="mobile" name="mobile" aria-describedby=""  placeholder="Enter Contact Number" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                          <span class="errors" id="mob_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel">Email *</label>
                                          <input type="text" class="form-control customcardinput" id="email" name="email" aria-describedby="" placeholder="Enter Email" onkeyup="ValidateEmail();">
                                          <span class="errors" id="email_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Address *</label>
                                              <input type="text" class="form-control customcardinput" id="address" name="address" aria-describedby="" placeholder="Enter Supplier Address">
                                              <span class="errors" id="adrs_err" style="color:red; font-size:14px"></span>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Supplier Details</label>
                                              <input type="text" class="form-control customcardinput" name="details" aria-describedby="" placeholder="Enter Supplier Details">
                                              <span class="errors" id="deta_err" style="color:red; font-size:14px"></span>
                                          </div>
                                    </div>

                                     <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Category</label>
                                              <div>
                                              <select id="supp_category" multiple="multiple" class="form-control customcardinput" name="supplier_cat[]">
                                                 <?php 
                                                      foreach ($category as $c) {?>
                      <option value="<?=$c['category_id']?>" <?php if($c['category_id']==$product->category_id){echo 'selected';}?>>
                                                        <?=$c['category_name']?></option>
   
                                                <?php } ?>
                                              </select>

                                          </div> 
                                          </div>
                                          </div>

                                    
                             </div>


                           </div> 
                           <div class="container  mb25">
                                  <p class="formheader">Supplier Contact Person Details</p>
                                     <div class="row">
                                         
                                         <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="customcardlabel" for="">Supplier Contact Person Name</label>
                                              <input type="text" class="form-control customcardinput" id="cname" name="contact_name" aria-describedby="" placeholder="Enter Supplier Contact Person Name"  onkeypress="return onlyAlphabets(event,this);">
                                              <span class="errors" id="sname_err" style="color:red; font-size:14px"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="customcardlabel">Supplier Contact Person Email</label>
                                              <input type="text" class="form-control customcardinput" id="cemail" name="contact_email" aria-describedby="" placeholder="Enter Supplier Contact Person Email" onkeyup="ValidateCEmail();">
                                              <span class="errors" id="semail_err" style="color:red; font-size:14px"></span>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="customcardlabel">Supplier Contact Person Contact No</label>
                                                <input type="tel" class="form-control customcardinput phoneInput" id="cmobile" name="contact_no" aria-describedby=""  placeholder="Enter Supplier Contact Person Contact No" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="errors" id="smob_err" style="color:red; font-size:14px"></span>
                                              </div>
                                           </div>
                                    
                                     </div>
                                 </div>                          
                           <!-- cardbody -->
                           <div class="customcardfooter">
                              <div style="text-align: center;">
                                  <a href="<?=base_url('Cproduct/manage_supplier')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                  <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Add</button>
                              </div>
                           </div>
                        </form>     
                       </div>
                 </div>
               </div>
         </div>
    </div>

<script type="text/javascript">
  $(document).ready(function(){
     var name_state = true;


      $('#fname').on('blur', function(){
          var supplier_name = $('#fname').val();
          $.ajax({
              url: '<?=base_url("Cproduct/check_supplier_name");?>',
              type: 'post',
              data: {supplier_name: supplier_name},
              success: function(response){

                  if (response == 'fail' ) {
                    name_state = false;
                    $("#fname_err").html("This Supplier Name is already exist").show();
                  }else if (response == 'success') {
                    name_state = true;
                    $("#fname_err").html("").show();
                  }
              }
          });
      });

      

    $('#btnSave').on('click', function(){
         var email_id = $('#email').val();
         var email = $('#cemail').val();
          if($('#fname').val() == '') {
              $("#fname_err").html("Please enter Supplier Name").show();
              return false;
          }
          if(name_state == false){
              $("#fname_err").html("This Supplier Name is already exist").show();
              return false;
          }
          if($('#mobile').val().length != 14 ){
              $("#mob_err").html("Please enter correct Mobile No.").show();
              return false;
          }
          if(email_id == ''){
              $("#email_err").html("Please enter Email").show();
              return false;
          }
          if(ValidateEmail(email_id) == false){
              $("#email_err").html("Please enter valid Email").show();
              return false;
          }
          if($('#address').val() == ''){
              $("#adrs_err").html("Please enter Supplier Address").show();
              return false;
          }
          if($('#cname').val() == ''){
            $("#sname_err").html("Please enter Supplier Contact Person Name").show();
              return false;
          }
          if(email == ''){
              $("#semail_err").html("Please enter Supplier Contact Person Email").show();
              return false;
          }
          if(ValidateCEmail(email) == false){
              $("#semail_err").html("Please enter valid Email").show();
              return false;
          }
          if($('#cmobile').val().length != 14 ){
              $("#smob_err").html("Please enter correct Supplier Contact Person Contact No.").show();
              return false;
          }


          if(name_state == true) {
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?=base_url("Cproduct/insert_supplier");?>',
                data: $('.add_supplier').serialize(),
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
                  $('.add_supplier')[0].reset();
                  setTimeout( function (){
                    $('#message').fadeOut('slow');
                    window.location = '<?=base_url('Cproduct/manage_supplier')?>';
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
        if($('#fname').val() == '') {
            $("#fname_err").html("Please enter supplier Name").show();
            return false;
        }else{
            $("#fname_err").html("").show();
        }
        if($('#mobile').val() == ''){
            $("#mob_err").html("Please enter Contact No.").show();
            return false;
        }else{
            $("#mob_err").html("").show();
        }
        if($('#email').val() == ''){
            $("#email_err").html("Please enter Email").show();
            return false;
        }else{
            $("#email_err").html("").show();
        }
        
        if($('#address').val() == ''){
            $("#adrs_err").html("Please enter Supplier Address").show();
            return false;
        }else{
            $("#adrs_err").html("").show();
        }

        if($('#cname').val() == '') {
            $("#sname_err").html("Please enter Supplier Contact Person Name").show();
            return false;
        }else{
            $("#sname_err").html("").show();
        }

        if($('#cemail').val() == ''){
            $("#semail_err").html("Please enter Supplier Contact Person Email").show();
            return false;
        }else{
            $("#semail_err").html("").show();
        }

        if($('#cmobile').val() == ''){
            $("#smob_err").html("Please enter Supplier Contact Person Contact No.").show();
            return false;
        }else{
            $("#smob_err").html("").show();
        }
        
    });
    
        
    $('#mobile').on('input', function() {
        if(!/^[0-9]+$/.test($("#mobile").val())) {
            $('#mob_err').html('Please enter valid Contact No').show();
            return false;   
        }else{
            $('#mob_err').html('').show();
        }
    });


    $('#cname').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            $("#sname_err").html("Only alphabets allowed").show();
            return false;
        }else{
            $("#sname_err").html("").show();

        }
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

    function ValidateCEmail(email) {
        // var email_id = $("#email").val();
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!expr.test(email)) {
            $('#semail_err').html('Please enter valid Email').show();
            return false;
        }else{
            $('#semail_err').html("").show();
        }
    }
</script>


<link href="<?php echo base_url() ?>/assets/style/hummingbird-treeview.css" rel="stylesheet" type="text/css">
<style>


.stylish-input-group .input-group-addon{
    background: white !important;
}
.stylish-input-group .form-control{
    //border-right:0;
    box-shadow:0 0 0;
    border-color:#ccc;
}
.stylish-input-group button{
    border:0;
    background:transparent;
}
.hummingbird-treeview ul:not(.hummingbird-base) {

    padding-left: 15px;
}


</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">      
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/style/bootstrap-multiselect.css" type="text/css">

  <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/core/bootstrap-multiselect.js"></script>
        <style type="text/css">
          .multiselect{
            width: 545px;
            height: 50px;
          }
        </style>
       
        <script type="text/javascript">
    $(document).ready(function() {
        $('#supp_category').multiselect();
    });
</script>