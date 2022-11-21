<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Add new customer start -->
<div class=" container-fluid mt20">
    <div class="row ">
        <div class="col-md-12 ">
            <div class="customcard">
                <div>
                    <div class="usercardheader">
                        <p>General Settings <span class="text-secondary">(Manage website general setting)</span></p>

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

                    <?php echo form_open_multipart('Cgen_setting/update_setting', array('class' => 'form-vertical', 'id' => 'validate')) ?>
                    <div class="panel-body">

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label">Logo </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="logo" id="logo" type="file">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6">
                                <img src="<?php echo base_url() . $setting_detail['logo']; ?>" class="img img-responsive" height="100" width="100">
                                <input name="old_logo" type="hidden" value="<?= $setting_detail['logo'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="favicon" class="col-sm-3 col-form-label">Favicon</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="favicon" id="favicon" type="file">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="favicon" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6">
                                <img src="<?php echo base_url() . $setting_detail['favicon']; ?>" class="img img-responsive" height="50" width="50">
                                <input name="old_favicon" type="hidden" value="<?= $setting_detail['favicon'] ?>">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Name <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="2" class="form-control" name="name" value="<?= $setting_detail['name'] ?>" placeholder="Name" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Mobile No<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="number" tabindex="3" class="form-control" name="mobile" name="mobile" value="<?= $setting_detail['mobile'] ?>" placeholder="Mobile No" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Address<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <textarea class="form-control input-description" tabindex="1" id="adress" name="address" placeholder="Address" required><?= $setting_detail['address'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Email <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="email" tabindex="3" class="form-control" value="<?= $setting_detail['email'] ?>" name="email" placeholder="Email" required />
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Website <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="url" tabindex="3" class="form-control" value="<?= $setting_detail['website'] ?>" name="website" placeholder="Website" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pay_period" class="col-sm-3 col-form-label">Pay Period <i class="text-danger">*</i></label>
                            <div class="col-sm-6">

                                <input type="radio" name="pay_period" value="1" <?php echo ($setting_detail['pay_period'] == 1) ? "checked" : ""; ?> /> Weekly
                                <input type="radio" name="pay_period" value="2" <?php echo ($setting_detail['pay_period'] == 2) ? "checked" : ""; ?> /> Fortnightly (Bi-weekly)
                                <input type="radio" name="pay_period" value="3" <?php echo ($setting_detail['pay_period'] == 3) ? "checked" : ""; ?> /> Twice-a-month
                                <input type="radio" name="pay_period" value="4" <?php echo ($setting_detail['pay_period'] == 4) ? "checked" : ""; ?> /> Monthly

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pay_date" class="col-sm-3 col-form-label">Pay Day<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select name="pay_date" class="form-control" id="pay_date">
                                    <?php if ($setting_detail['pay_period'] == 1 || $setting_detail['pay_period'] == 2) { ?>

                                        <option value="1" <?php echo ($setting_detail['pay_date'] == '1') ? "selected" : ""; ?>>
                                            same day</option>
                                        <option value="2" <?php echo ($setting_detail['pay_date'] == '2') ? "selected" : ""; ?>>next day</option>
                                        <option value="3" <?php echo ($setting_detail['pay_date'] == '3') ? "selected" : ""; ?>>next business day</option>

                                    <?php } else if ($setting_detail['pay_period'] == 4) { ?>
                                        <option value="1" <?php echo ($setting_detail['pay_date'] == '1') ? "selected" : ""; ?>>
                                            Last working day</option>
                                        <option value="2" <?php echo ($setting_detail['pay_date'] == '2') ? "selected" : ""; ?>>Last business day</option>
                                        <option value="3" <?php echo ($setting_detail['pay_date'] == '3') ? "selected" : ""; ?>>Last calendar day</option>
                                        <option value="4" <?php echo ($setting_detail['pay_date'] == '4') ? "selected" : ""; ?>>
                                            First working day of next month</option>
                                        <option value="5" <?php echo ($setting_detail['pay_date'] == '5') ? "selected" : ""; ?>>First business day of next month</option>
                                        <option value="6" <?php echo ($setting_detail['pay_date'] == '6') ? "selected" : ""; ?>>First calendar day of next month</option>
                                    <?php } else { ?>
                                        <option value="1">--Select--</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label"><?php echo "App URL" ?> </label>
                            <div class="col-sm-6">
                                <input type="url" tabindex="3" class="form-control" value="<?= $setting_detail['apps_url'] ?>" name="apps_url" placeholder="<?php echo display('website') ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label"><?php echo "Instagram URL" ?> </label>
                            <div class="col-sm-6">
                                <input type="url" tabindex="3" class="form-control" value="<?= $setting_detail['instagram_url'] ?>" name="instagram_url" placeholder="Instagram URL" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label"><?php echo "Twitter URL" ?> </label>
                            <div class="col-sm-6">
                                <input type="url" tabindex="3" class="form-control" value="<?= $setting_detail['twitter_url'] ?>" name="twitter_url" placeholder="Twitter URL" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label"><?php echo "Facebook URL" ?></label>
                            <div class="col-sm-6">
                                <input type="url" tabindex="3" class="form-control" value="<?= $setting_detail['facebook_url'] ?>" name="facebook_url" placeholder="<?php echo "Facebook URL" ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="language" class="col-sm-3 col-form-label">Language </label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="2" class="form-control" name="language" value="<?= $setting_detail['language'] ?>" placeholder="Language" />
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="secret_key" class="col-sm-3 col-form-label">Secret Key</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="secret_key" id="secret_key" type="text" placeholder="Secret Key" value="<?= $setting_detail['secret_key'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label"><?php echo "Meta Title" ?></label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="2" class="form-control" name="Meta_Title" value="<?= $setting_detail['Meta_Title'] ?>" placeholder="<?php echo "Meta Title" ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label"><?php echo "Meta Key" ?></label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="2" class="form-control" name="Meta_Key" value="<?= $setting_detail['Meta_Key'] ?>" placeholder="<?php echo "Meta Key" ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label"><?php echo "Meta Description" ?></label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="2" class="form-control" name="Meta_Desc" value="<?= $setting_detail['Meta_Desc'] ?>" placeholder="<?php echo "Meta Description" ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Tax <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="2" class="form-control" name="tax" value="<?= $setting_detail['tax'] ?>" placeholder="Tax" required onkeypress="return isNumberKey(this, event);" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">CRV</label>
                            <div class="col-sm-6" id="crvdiv">
                                <div id="crv_value_size1">
                                    <label for="bank_name" class="col-form-label text-danger">Value</label>
                                    <input type="number" class="addvalue" name="crv_value[]" value="<?= $setting_detailCRV[0]['crv_value'] ?>" placeholder="Value" id="crv_value1" />
                                    <label for="bank_name" class="col-form-label text-danger">Size</label>
                                    <input type="number" class="addvalue" name="crv_size[]" value="<?= $setting_detailCRV[0]['crv_size'] ?>" placeholder="Size" id="crv_size1" />


                                    <?php if ($setting_detailCRV && count($setting_detailCRV) > 1) {

                                        for ($i = 1, $j = 2; $i < count($setting_detailCRV); $i++, $j++) {
                                    ?>
                                            <div id="crv_value_size<?= $j ?>" class="control-group">
                                                <label for="bank_name" class="col-form-label text-danger">Value</label>
                                                <input type="number" class="addvalue" name="crv_value[]" value="<?= $setting_detailCRV[$i]['crv_value'] ?>" placeholder="Value" id="crv_value<?= $j ?>" />
                                                <label for="bank_name" class="col-form-label text-danger">Size</label>
                                                <input type="number" class="addvalue" name="crv_size[]" value="<?= $setting_detailCRV[$i]['crv_size'] ?>" placeholder="Size" id="crv_size<?= $j ?>" />
                                                <input type='button' value='Remove' id='removeButton<?= $i ?>' class="removeButton btn" style="margin-left:-0.3em">

                                        <?php   }
                                    } ?>

                                            </div>

                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type='button' value='Add More' id='addButton' class="btn">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit" id="add-customer" class="btn btn-success btn-large" name="add-customer" value="<?php echo "Save Changes" ?>" />
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- general setting end -->

<script type="text/javascript">
    $('input[type=radio][name=pay_period]').on('change', function() {
        //alert($(this).val());
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?= base_url("Cgen_setting/get_paydate"); ?>',
            data: {
                'payperiodid': $(this).val(),
            },
            async: false,
            dataType: 'JSON',
            success: function(data) {

                //$("#definedate").remove(); 
                $("#pay_date").empty().append(data.definedatehtml);
                console.log(data.definedatehtml);

            },
            error: function(data) {
                alert("error");
            }
        });
    });
</script>
<script type="text/javascript">
    function isNumberKey(txt, evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode == 46) {
            //Check if the text already contains the . character
            if (txt.value.indexOf('.') === -1) {
                return true;
            } else {
                return false;
            }
        } else {
            if (charCode > 31 &&
                (charCode < 48 || charCode > 57))
                return false;
        }
        return true;
    }
</script>
<!-- CRV Value and size fileds add/remove -->
<script type="text/javascript">
    var counter = $("input[name='crv_value[]']").length;

    $("#addButton").click(function() {

        var newTextBoxDiv = $(document.createElement('div')).attr("class", "control-group");
        newTextBoxDiv.after().html('<label class="col-form-label text-danger space-label">Value </label>' +
            '<input type="number" name="crv_value[]" id="crv_value' + counter + '" value="" class="addvalue" placeholder="Value "><label class="col-form-label text-danger space-label1">Size  </label>' +
            '<input type="number" name="crv_size[]" id="crv_size' + counter + '" value="" class="addvalue" placeholder="Size ">' +
            '<input type="button" value="Remove" id="removeButton' + counter + '" class="removeButton btn">');
        newTextBoxDiv.appendTo("#crvdiv");
        counter++;
    });

    $("body").on("click", ".removeButton", function() {
        $(this).parents(".control-group").remove();
    });
</script>


<style type="text/css">
    input[type="radio"] {
        margin-right: 3px;
        margin-left: 6px;
    }

    .addvalue {
        width: 130px;
        margin-left: 5px;
        margin-right: 5px;
    }

    .space-label {
        margin-right: 3px;
    }

    .space-label1 {
        margin-right: 5px;
    }

    #addButton,
    .removeButton {
        background: #D62127;
        color: White;
        padding: 0.150em .75em;


    }
</style>