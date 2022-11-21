<div class="container-fluid mt20">
  <div class="row">
    <div class="col-md-12">
      <div class="customcard">
        <div class="customcardheader">
          <div class="row">
            <div class="col-md-2">              
                <p><?php print $title; ?></p>
            </div>
            <div class="col-md-10">
              <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <?php echo $this->session->flashdata('success'); ?>
                  <!--Msg-->
                </div>
              <?php } elseif ($this->session->flashdata('error')) { ?>
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
        <form action="<?= base_url('Cterminal/add_store_terminal_db') ?>" method="post" id="edit-terminal" name="edit-terminal">
            <input type="hidden" name="terminalid" value="<?= $_GET['terminalid'] ?>">          
            <div class="customcardbody ">
              <div class="container mb25">                
                <p class="formheader">Terminal Information</p>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="customcardlabel" for="">Merchant</label>
                            <select class="form-control customcardinput generate_license" name="merchant_id" id="merchant_id">
                                <option value=""> - Select - </option>
                                <?php
                                    if(!empty($merchant_list)) {
                                        foreach ($merchant_list as $key_m => $value_m) {
                                ?>
                                    <option value="<?php print $value_m["id"]; ?>"><?php print $value_m["name"]; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                            <span class="errors" id="merchant_id_err" style="color:red; font-size:14px"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="customcardlabel" for="">Store</label>
                            <select class="form-control customcardinput generate_license" name="store_id" id="store_id">
                                <option value=""> - Select - </option>
                            </select>
                            <span class="errors" id="store_id_err" style="color:red; font-size:14px"></span>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="customcardlabel" for="">Terminal ID</label>
                            <input type="number" class="form-control customcardinput" id="terminal_id" name="terminal_id" aria-describedby="" placeholder="Please enter Terminal ID" onkeypress="return onlyAlphabets(event,this);" value="">
                            <span class="errors" id="terminal_id_err" style="color:red; font-size:14px"></span>
                        </div>
                    </div>                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="customcardlabel" for="">Mac Address</label>
                            <input type="text" class="form-control customcardinput" id="mac_address" name="mac_address" aria-describedby="" placeholder="Please enter Mac Address" onkeypress="return onlyAlphabets(event,this);" value="">
                            <span class="errors" id="mac_address_err" style="color:red; font-size:14px"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="customcardlabel" for="">License Key</label>
                            <input type="text" name="license_key" id="license_key" class="form-control customcardinput" aria-describedby="" placeholder="License Key" value="" readonly="readonly">
                        </div>
                    </div>

                </div>
              </div>
            </div>
            <!-- container -->

            </div>
            <!-- cardbody -->
            <div class="customcardfooter">
              <div style="text-align: center;">
                <a href="<?= base_url('Cterminal/manage_store_terminal') ?>" type="button" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Add</button>
              </div>
            </div>
            </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  $('#btnSave').click(function() {
    var submition = true;

    if ($('#merchant_id').val() == '') {
        $("#merchant_id_err").html("Please select Merchant").show();
        return false;
    }

    if ($('#store_id').val() == '') {
        $("#store_id_err").html("Please select Store").show();
        return false;
    }

    if ($('#terminal_id').val() == '') {
        $("#terminal_id_err").html("Please enter Terminal ID").show();
        return false;
    }

    if ($('#mac_address').val() == '') {
        $("#mac_address_err").html("Please enter Mac Address").show();
        return false;
    }    

    if (submition) {
      $("#edit-terminal").submit();
    }
    return false;
  });

    $(document).on("change","#merchant_id",function() {
        var merchant_id = $(this).val();
        get_store_basedon_merchant(merchant_id);
    });
    function get_store_basedon_merchant(merchant_id=0,store_id=0) {
        $.ajax ({
            type: "POST",
            dataType: "json",
            url: '<?php echo base_url('Cterminal/get_store_basedon_merchant'); ?>',
            data: {
                merchant_id: merchant_id,
                store_id: store_id
            },
            cache: false,
            success: function(data) {
                if(data.status == 1) {
                    $("#store_id").html(data.html);
                }
            }
        });
    }

    $(document).on("change",".generate_license",function() {

        var merchant_id = $("#merchant_id").val();
        var store_id    = $("#store_id").val();

        $.ajax ({
            type: "POST",
            dataType: "json",
            url: '<?php echo base_url('Cterminal/generate_license'); ?>',
            data: {
                merchant_id: merchant_id,
                store_id: store_id
            },
            cache: false,
            success: function(data) {
                if(data.status == 1) {
                    $("#license_key").val(data.license_key);
                } else {
                    $("#license_key").val("");
                }
            }
        });
        
    });
    
</script>

<style type="text/css">
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0; 
    }
</style>