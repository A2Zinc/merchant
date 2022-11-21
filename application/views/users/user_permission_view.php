<style>
ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;

}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */
  transform: rotate(90deg);
}

.nested {
  display: none;
}

.active {
  display: block;
}
</style>
<div class="container-fluid mt20">
       <div class="row">
         <div class="col-md-12">
               <div class="customcard">
                        <div class="customcardheader">
                            <div class="row">
                                <div class="col-md-3">
                                        <p>Update Permisssions</p>
                                </div>
                                <div class="col-md-9">
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

                <form action="<?=base_url('User/update_user_permission')?>" method="post" class="" autocomplete="off">
                   <!-- cardheader -->
                   <input type="hidden" name="user_id" value="<?php echo isset($roledata->user_id) ? $roledata->user_id : '' ;?>" >
                   <div class="customcardbody ">

                     <!-- container -->
                    <div class="container  mb25">

                        <?php $arr4 = isset($roledata->pos_rights) ? explode(',',$roledata->pos_rights) : ''; ?>
                        <ul id="myUL">
                            <li><span class="caret"><label class="customcardlabel">POS Terminal</label></span>
                                    <input type="checkbox" class="pos_check ml-3" name="all" >
                                    <label class="customcardlabel mr-2">All</label>
                                <ul class="nested ml-5 active" id="POS">
                                    <li><input type="checkbox" class="check" name="pos_rights[]" value="A" <?php foreach($arr4 AS $a){echo $a=='A' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Shift Report</label></li>
                                    <li><input type="checkbox" class="check" name="pos_rights[]" value="B" <?php foreach($arr4 AS $a){echo $a=='B' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Custom Price</label></li>
                                    <li><input type="checkbox" class="check" name="pos_rights[]" value="C" <?php foreach($arr4 AS $a){echo $a=='C' ? 'checked' : '';}?>>
                                    <label class="customcardlabel">Print Receipt</label></li>
                                    <li><input type="checkbox" class="check" name="pos_rights[]" value="D" <?php foreach($arr4 AS $a){echo $a=='D' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Coupon</label></li>
                                    <li><input type="checkbox" class="check" name="pos_rights[]" value="E" <?php foreach($arr4 AS $a){echo $a=='E' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Cash Drop</label></li>
                                    <li><input type="checkbox" class="check" name="pos_rights[]" value="F" <?php foreach($arr4 AS $a){echo $a=='F' ? 'checked' : '';}?>>
                                    <label class="customcardlabel">Refund</label></li>
                                    <li><input type="checkbox" class="check" name="pos_rights[]" value="G" <?php foreach($arr4 AS $a){echo $a=='G' ? 'checked' : '';}?>>
                                    <label class="customcardlabel">Payout</label></li>
                                    <li><input type="checkbox" class="check" name="pos_rights[]" value="H" <?php foreach($arr4 AS $a){echo $a=='H' ? 'checked' : '';}?>>
                                    <label class="customcardlabel">Add Custom Product</label></li>
                                </ul>
                            </li>
                        </ul>
                        <?php $arr5 = isset($roledata->reports_rights) ? explode(',',$roledata->reports_rights) : ''; ?>
                        <ul id="myUL">
                            <li><span class="caret"><label class="customcardlabel">Reports</label></span>
                                    <input type="checkbox" class="report_check ml-3" name="all">
                                    <label class="customcardlabel mr-2">All</label>
                                <ul class="nested ml-5 active" id="REPORTS">
                                    <li><input type="checkbox" class="check1" name="reports_rights[]" value="A" <?php foreach($arr5 AS $a){echo $a=='A' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Sales</label></li>
                                    <li><input type="checkbox" class="check1" name="reports_rights[]" value="B" <?php foreach($arr5 AS $a){echo $a=='B' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Market Place</label></li>
                                    <li><input type="checkbox" class="check1" name="reports_rights[]" value="C" <?php foreach($arr5 AS $a){echo $a=='C' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">HRMS</label></li>
                                    <li><input type="checkbox" class="check1" name="reports_rights[]" value="D" <?php foreach($arr5 AS $a){echo $a=='D' ? 'checked' : '';}?>>
                                    <label class="customcardlabel">E-Orders</label></li>
                                </ul>
                            </li>
                        </ul>

                        <?php $arr6 = isset($roledata->inventory_rights) ? explode(',',$roledata->inventory_rights) : ''; ?>
                        <ul id="myUL">
                            <li><span class="caret"><label class="customcardlabel">Inventory</label></span>
                                    <input type="checkbox" class="inventory_check ml-3" name="all">
                                    <label class="customcardlabel mr-2">All</label>
                                    <ul class="nested ml-5 active" id="INVENTORY">
                                        <li><input type="checkbox" class="check2" name="inventory_rights[]" value="A" <?php foreach($arr6 AS $a){echo $a=='A' ? 'checked' : '';}?>>
                                        <label class="customcardlabel mr-2">Add Product</label></li>
                                        <li><input type="checkbox" class="check2" name="inventory_rights[]" value="B" <?php foreach($arr6 AS $a){echo $a=='B' ? 'checked' : '';}?>>
                                        <label class="customcardlabel mr-2">Update Product</label></li>
                                        <li><input type="checkbox" class="check2" name="inventory_rights[]" value="C" <?php foreach($arr6 AS $a){echo $a=='C' ? 'checked' : '';}?>>
                                        <label class="customcardlabel">Delete Product</label></li>
                                        <li><input type="checkbox" class="check2" name="inventory_rights[]" value="D" <?php foreach($arr6 AS $a){echo $a=='D' ? 'checked' : '';}?>>
                                        <label class="customcardlabel mr-2">Add Supplier</label></li>
                                        <li><input type="checkbox" class="check2" name="inventory_rights[]" value="E" <?php foreach($arr6 AS $a){echo $a=='E' ? 'checked' : '';}?>>
                                        <label class="customcardlabel mr-2">Update Supplier</label></li>
                                        <li><input type="checkbox" class="check2" name="inventory_rights[]" value="F" <?php foreach($arr6 AS $a){echo $a=='F' ? 'checked' : '';}?>>
                                        <label class="customcardlabel">Delete Supplier</label></li>
                                        <li><input type="checkbox" class="check2" name="inventory_rights[]" value="G" <?php foreach($arr6 AS $a){echo $a=='G' ? 'checked' : '';}?>>
                                        <label class="customcardlabel mr-2">Add Scratcher</label></li>
                                        <li><input type="checkbox" class="check2" name="inventory_rights[]" value="H" <?php foreach($arr6 AS $a){echo $a=='H' ? 'checked' : '';}?>>
                                        <label class="customcardlabel mr-2">Update Scratcher</label></li>
                                        <li><input type="checkbox" class="check2" name="inventory_rights[]" value="I" <?php foreach($arr6 AS $a){echo $a=='I' ? 'checked' : '';}?>>
                                        <label class="customcardlabel">Delete Scratcher</label></li>
                                        <li><input type="checkbox" class="check2" name="inventory_rights[]" value="J" <?php foreach($arr6 AS $a){echo $a=='J' ? 'checked' : '';}?>>
                                        <label class="customcardlabel mr-2">Update Custom Product</label></li>
                                        <li><input type="checkbox" class="check2" name="inventory_rights[]" value="K" <?php foreach($arr6 AS $a){echo $a=='K' ? 'checked' : '';}?>>
                                        <label class="customcardlabel mr-2">Delete Custom Product</label></li>
                                        <li><input type="checkbox" class="check2" name="inventory_rights[]" value="L" <?php foreach($arr6 AS $a){echo $a=='L' ? 'checked' : '';}?>>
                                        <label class="customcardlabel">Product-Upc Label</label></li>
                                </ul>
                            </li>
                        </ul>
                        <?php $arr7 = isset($roledata->loyalty_rights) ? explode(',',$roledata->loyalty_rights) : ''; ?>
                        <ul id="myUL">
                            <li><span class="caret"><label class="customcardlabel">Customer/Loyalty</label></span>
                                <input type="checkbox" class="loyalty_check ml-3" name="all">
                                <label class="customcardlabel mr-2">All</label>
                                <ul class="nested ml-5 active" id="LOYALTY">
                                    <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="A" <?php foreach($arr7 AS $a){echo $a=='A' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Add Customer</label></li>
                                    <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="B" <?php foreach($arr7 AS $a){echo $a=='B' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Update Customer</label></li>
                                    <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="C" <?php foreach($arr7 AS $a){echo $a=='C' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Delete Customer</label></li>
                                    <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="D" <?php foreach($arr7 AS $a){echo $a=='D' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Create Coupon</label></li>
                                    <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="E" <?php foreach($arr7 AS $a){echo $a=='E' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Update Coupon</label></li>
                                    <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="F" <?php foreach($arr7 AS $a){echo $a=='F' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Delete Coupon</label></li>
                                    <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="G" <?php foreach($arr7 AS $a){echo $a=='G' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Create Promotion</label></li>
                                    <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="H" <?php foreach($arr7 AS $a){echo $a=='H' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Update Promotion</label></li>
                                    <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="I" <?php foreach($arr7 AS $a){echo $a=='I' ? 'checked' : '';}?>>
                                    <label class="customcardlabel">Delete Promotion</label></li>
                                </ul>
                            </li>
                        </ul>
                        <?php $arr8 = isset($roledata->store_rights) ? explode(',',$roledata->store_rights) : ''; ?>
                        <ul id="myUL">
                            <li><span class="caret"><label class="customcardlabel">Store Functions</label></span>
                                <input type="checkbox" class="coupon_check ml-3" name="all">
                                <label class="customcardlabel mr-2">All</label>
                                <ul class="nested ml-5" id="COUPON">
                                    <li><input type="checkbox" class="check4" name="store_rights[]" value="A" <?php foreach($arr8 AS $a){echo $a=='A' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Custom Key Settings</label></li>
                                    <li><input type="checkbox" class="check4" name="store_rights[]" value="B" <?php foreach($arr8 AS $a){echo $a=='B' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">Employees</label></li>
                                    <li><input type="checkbox" class="check4" name="store_rights[]" value="C" <?php foreach($arr8 AS $a){echo $a=='C' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">General Settings</label></li>
                                    <li><input type="checkbox" class="check4" name="store_rights[]" value="D" <?php foreach($arr8 AS $a){echo $a=='D' ? 'checked' : '';}?>>
                                    <label class="customcardlabel">Label Editor</label></li>
                                    <li><input type="checkbox" class="check4" name="store_rights[]" value="E" <?php foreach($arr8 AS $a){echo $a=='E' ? 'checked' : '';}?>>
                                    <label class="customcardlabel">POS Categories</label></li>
                                    <li><input type="checkbox" class="check4" name="store_rights[]" value="F" <?php foreach($arr8 AS $a){echo $a=='F' ? 'checked' : '';}?>>
                                    <label class="customcardlabel">Roles</label></li>
                                    <li><input type="checkbox" class="check4" name="store_rights[]" value="G" <?php foreach($arr8 AS $a){echo $a=='G' ? 'checked' : '';}?>>
                                    <label class="customcardlabel">System Settings</label></li>
                                    <li><input type="checkbox" class="check4" name="store_rights[]" value="H" <?php foreach($arr8 AS $a){echo $a=='H' ? 'checked' : '';}?>>
                                    <label class="customcardlabel">Tax Settings</label></li>
                                </ul>
                            </li>
                        </ul>
                        <?php $arr9 = isset($roledata->hrms_rights) ? explode(',',$roledata->hrms_rights) : ''; ?>
                        <ul id="myUL">
                            <li><span class="caret"><label class="customcardlabel">HRMS</label></span>
                                <input type="checkbox" class="hrms_check ml-3" name="all">
                                <label class="customcardlabel mr-2">All</label>
                                <ul class="nested ml-5 active" id="HRMS">
                                    <li><input type="checkbox" class="check5" name="hrms_rights[]" value="A" <?php foreach($arr9 AS $a){echo $a=='A' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">View Leave Requests</label></li>
                                    <li><input type="checkbox" class="check5" name="hrms_rights[]" value="B" <?php foreach($arr9 AS $a){echo $a=='B' ? 'checked' : '';}?>>
                                    <label class="customcardlabel mr-2">View Cash Advance Requests</label></li>
                                    <li><input type="checkbox" class="check5" name="hrms_rights[]" value="C" <?php foreach($arr9 AS $a){echo $a=='C' ? 'checked' : '';}?>>
                                    <label class="customcardlabel">New Leave Request</label></li>
                                    <li><input type="checkbox" class="check5" name="hrms_rights[]" value="D" <?php foreach($arr9 AS $a){echo $a=='D' ? 'checked' : '';}?>>
                                    <label class="customcardlabel">New Cash Advance Request</label></li>
                                </ul>
                            </li>
                        </ul>

                        <?php $arr1 = isset($roledata->submit_timecard_rights) ? explode(',',$roledata->submit_timecard_rights) : ''; ?>
                        <ul id="myUL">
                            <li><span class="caret"><label class="customcardlabel">Submit Timecard</label></span>
                                <input type="checkbox" class="timecard_check ml-3" name="submit_timecard_rights" value="A" <?php foreach($arr1 AS $a){echo $a=='A' ? 'checked' : '';}?>>
                                <label class="customcardlabel mr-2">All</label>
                                <!--<ul class="nested ml-5 active">
                                    <input type="checkbox" class="check" name="hrms_rights[]" value="A">
                                    <label class="customcardlabel mr-2">Leave Approved</label>
                                    <input type="checkbox" class="check" name="hrms_rights[]" value="B">
                                    <label class="customcardlabel mr-2">Request Leave</label>
                                    <input type="checkbox" class="check" name="hrms_rights[]" value="C">
                                    <label class="customcardlabel">Cash Advance Request</label>
                                </ul>                            -->
                            </li>
                        </ul>
                        <?php $arr2 = isset($roledata->e_order_rights) ? explode(',',$roledata->e_order_rights) : ''; ?>
                        <ul id="myUL">
                            <li><span class="caret"><label class="customcardlabel">E-Order</label></span>
                                <input type="checkbox" class="eorder-check ml-3" name="e_order_rights" value="A" <?php foreach($arr2 AS $a){echo $a=='A' ? 'checked' : '';}?>>
                                <label class="customcardlabel mr-2">All</label>
<!--                                <ul class="nested ml-5 active">
                                    <input type="checkbox" class="check" name="hrms_rights[]" value="A">
                                    <label class="customcardlabel mr-2">Leave Approved</label>
                                    <input type="checkbox" class="check" name="hrms_rights[]" value="B">
                                    <label class="customcardlabel mr-2">Request Leave</label>
                                    <input type="checkbox" class="check" name="hrms_rights[]" value="C">
                                    <label class="customcardlabel">Cash Advance Request</label>
                                </ul>                            -->
                            </li>
                        </ul>
                        <?php $arr3 = isset($roledata->market_place_rights) ? explode(',',$roledata->market_place_rights) : ''; ?>
                        <ul id="myUL">
                            <li><span class="caret"><label class="customcardlabel">Market Place</label></span>
                                <input type="checkbox" class="market-check ml-3" name="market_place_rights" value="A" <?php foreach($arr3 AS $a){echo $a=='A' ? 'checked' : '';}?>>
                                <label class="customcardlabel mr-2">All</label>
<!--                                <ul class="nested ml-5 active">
                                    <input type="checkbox" class="check" name="hrms_rights[]" value="A">
                                    <label class="customcardlabel mr-2">Leave Approved</label>
                                    <input type="checkbox" class="check" name="hrms_rights[]" value="B">
                                    <label class="customcardlabel mr-2">Request Leave</label>
                                    <input type="checkbox" class="check" name="hrms_rights[]" value="C">
                                    <label class="customcardlabel">Cash Advance Request</label>
                                </ul>                            -->
                            </li>
                        </ul>
                       </div>

                   </div>
                   <!-- cardbody -->
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

<script>
    $(document).ready(function(){
//        $(".POS").hide();
//        $(".HRMS").hide();
//        $(".REPORTS").hide();
//        $(".INVENTORY").hide();
//        $(".CUSTOMER").hide();
//        $(".COUPON").hide();
    $('.nested').addClass('active');

        $(".pos_check").click(function() {
            if($(this).is(":checked")) {
                $('.check').attr("checked", true);
            }else{
                $('.check').attr("checked", false);
            }
            $("#POS").show();
        });

        $(".report_check").click(function() {
            if($(this).is(":checked")) {

                $('.check1').attr("checked", true);
            }else{
                $('.check1').attr("checked", false);
            }
            $("#REPORTS").show();
        });

        $(".inventory_check").click(function() {

            if($(this).is(":checked")) {
                $('.check2').attr("checked", true);
            }else{
                $('.check2').attr("checked", false);
            }
            $("#INVENTORY").show();
        });

        $(".loyalty_check").click(function() {

            if($(this).is(":checked")) {
                $('.check3').attr("checked", true);
            }else{
                $('.check3').attr("checked", false);
            }
            $("#LOYALTY").show();
        });

        $(".coupon_check").click(function() {

            if($(this).is(":checked")) {
                $('.check4').attr("checked", true);
            }else{
                $('.check4').attr("checked", false);
            }
            $("#COUPON").show();
        });

        $(".hrms_check").click(function() {

            if($(this).is(":checked")) {
                $('.check5').attr("checked", true);
            }else{
                $('.check5').attr("checked", false);
            }
            $("#HRMS").show();
        });
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

    $('#btnSave').on('click', function() {
        var checkbox = document.querySelector('input[type="checkbox"]');


        if($('#fname').val() == ''){
            $("#fname_err").html("Please enter Front Role Name").show();
            return false;
        }


    });

</script>
<script>
var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");
  });
}

</script>
