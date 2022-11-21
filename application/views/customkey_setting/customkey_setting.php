<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Add new customer start -->
<style>
  .clear_key {
    position: absolute;
    right: 3%;
    top: 1%;
    color: #1b254b;
    font-size: 120%;
  }
</style>

<div class=" container-fluid mt20">
  <div class="row ">
    <div class="col-md-12 ">
      <div class="customcard">
        <div>
          <div class="usercardheader">
            <p>Custom Key Settings<span class="text-secondary">(Manage website custom key setting)</span></p>

          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <!-- Alert Message -->
    <?php
    $message = $this->session->userdata('message');
    if (isset($message)) {
    ?>

      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $message ?>
      </div>
    <?php
      $this->session->unset_userdata('message');
    }
    $error_message = $this->session->userdata('error_message');
    if (isset($error_message)) {
    ?>
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $error_message ?>
      </div>
    <?php
      $this->session->unset_userdata('error_message');
    }
    ?>

    <!-- New customer -->
    <div class="customcardbody" style="height:100%">
      <div class="col-sm-32">
        <div class="panel panel-bd lobidrag">

          <div class="panel-body">

            <div class="flexB2 ">

              <?php for ($i = 0; $i < 19; $i++) { ?>
                <div class="" style="display: contents;">
                 <button style="position:relative" type="button" data-name="<?= ($setting_detail[$i]['customkey_name']) ? $setting_detail[$i]['customkey_name'] : ''; ?>" data-value="<?= ($setting_detail[$i]['customkey_value']) ? $setting_detail[$i]['customkey_value'] : ''; ?>" data-is_taxable="<?= ($setting_detail[$i]['is_taxable']) ? $setting_detail[$i]['is_taxable'] : ''; ?>" id="custom_<?= $setting_detail[$i]['customkey_id'] ?>" class="cm3 open_popup" data-target="#myModal" value=""><?= ($setting_detail[$i]['customkey_name']) ? $setting_detail[$i]['customkey_name'] : 'Custom Key'; ?>
                <!-- <span class="clear_key" id="clear_<?= $setting_detail[$i]['customkey_id'] ?>">remove</span> -->
                    <span class="clear_key" id="clear_<?= $setting_detail[$i]['customkey_id'] ?>">x</span>
                  </button>

                </div>

                <!-- <a class="js-open-modal cm3" id="custom<?= $setting_detail[$i]['customkey_id'] ?>" href="#" data-modal-id="popup" customkeyId="<?= ($setting_detail[$i]['customkey_id']) ? $setting_detail[$i]['customkey_id'] : ''; ?>" customkeyName="<?= ($setting_detail[$i]['customkey_name']) ? $setting_detail[$i]['customkey_name'] : ''; ?>" customkey="<?= ($setting_detail[$i]['customkey_value']) ? $setting_detail[$i]['customkey_value'] : ''; ?>" customtax="<?= ($setting_detail[$i]['is_taxable']) ? $setting_detail[$i]['is_taxable'] : ''; ?>"><?= ($setting_detail[$i]['customkey_name']) ? $setting_detail[$i]['customkey_name'] : 'Custom Key'; ?> </a> -->
              <?php } ?>
            </div>

          </div>
        </div>
      </div>
  </section>

  <!-- Trigger the modal with a button -->


  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">


          <input type="hidden" value="" id="customkey_id_val" />
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="customcardlabel" for="">Name</label>
                <input class="form-control" type="text" id="customkey_name_txt" value="" placeholder="Name" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="customcardlabel" for="">Value</label>
                <input class="form-control" type="text" id="customkey_value_txt" value="" placeholder="Value" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="customcardlabel" for="">Taxable?</label>
                <input type="checkbox" class='cboxtaxclass' id="taxBoolean" name="taxable" value="taxable-true">
              </div>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="custom_price_save">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!----Modal Container End   ---->
  <style>


  </style>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <style type="text/css">
    .flexB2 {
      display: inline-flex;
      flex-wrap: wrap;
    }



    .cm3 {
      color: white;
      height: 11.1vh;
      width: 18%;
      padding: 2em;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 15px;

      border-radius: 8px;
      /* margin: 1% auto; */
      margin-right: 1%;
      margin-top: 1%;
      white-space: nowrap;

      background: linear-gradient(112.8deg, #eb8d1c 0%, #ffba67 135.75%);
      outline: none;
      border: transparent;

    }

    .cm3:active {
      background: linear-gradient(180deg, #1b254b 0%, rgba(27, 37, 75, 0) 100%);
      background: linear-gradient(0deg, #ff5c00 0%, #ff9900 100%);
    }
  </style>
  <script>
    jQuery(document).on("click", ".open_popup", function() {

      var id = $(this).attr('id').replace('custom_', '');
      var name = $(this).attr('data-name');
      var value = $(this).attr('data-value');
      var is_taxable = $(this).attr('data-is_taxable');

      //alert(name+'--'+value+'--'+is_taxable);
      $('#customkey_id_val').val(id);
      $('#customkey_name_txt').val(name);
      $('#customkey_value_txt').val(value);
      if (is_taxable == 1) {
        $('#taxBoolean').attr('checked', true);
      }

      $('#myModal').modal('show');

    });




    jQuery(document).on("click", "#custom_price_save", function() {

      var customkey_id = jQuery("#customkey_id_val").val();
      var misceleneous_name = jQuery("#customkey_name_txt").val();
      var custom_price_value = jQuery("#customkey_value_txt").val();

      var tax = 0;
      if (document.getElementById("taxBoolean").checked) {
        tax = 1;
      }


      if (custom_price_value.split(" ").join("") == "") {
        //alert("Price can not be blank.");
        swal({
          title: "Opps!",
          text: "Price can not be blank.",
          icon: "error",
          buttons: false,
          dangerMode: true,
        });
        return false;
      }

      if (misceleneous_name == "") {
        swal({
          title: "Opps!",
          text: "Name can not be blank.",
          icon: "error",
          buttons: false,
          dangerMode: true,
        });
        return false;
      }

      jQuery.ajax({
        type: "POST",
        url: "<?php base_url(); ?>Ccustomkey_setting/addcustomkey",
        async: false,
        data: {
          customkey_id: customkey_id,
          customkey_name: misceleneous_name,
          custom_price_value: custom_price_value,
          tax: tax,
        },
        success: function(data) {
          jQuery("#custom_" + customkey_id).text(misceleneous_name);
          jQuery("#custom_" + customkey_id).attr('data-name',misceleneous_name);
          jQuery("#custom_" + customkey_id).attr('data-value',custom_price_value);
          jQuery("#custom_" + customkey_id).attr('data-is_taxable',tax);

        },
        error: function() {


        },
      });


      $('#myModal').modal('hide');

    });

    jQuery(document).on("click", ".clear_key", function() {

      var customkey_id = jQuery(this).attr('id').replace('clear_','');

      jQuery.ajax({
        type: "POST",
        url: "<?php base_url(); ?>Ccustomkey_setting/removecustomkey",
        async: false,
        data: {
          customkey_id: customkey_id
        },
        success: function(data) {
          jQuery("#custom_" + customkey_id).text('Custom Key');
          jQuery("#custom_" + customkey_id).attr('data-name','');
          jQuery("#custom_" + customkey_id).attr('data-value','');
          jQuery("#custom_" + customkey_id).attr('data-is_taxable',0);
          swal({
          title: "",
          text: "Custom Key removed successfully !!",
          icon: "success",
          buttons: false,
          dangerMode: false,
          });
          return false;

        },
        error: function() {


        },
      });


      $('#myModal').modal('hide');

    });

    
  </script>