<style>
    .tooltips {
      position: relative;
      /* display: inline-block; */
      border-bottom: 1px dotted black;
    }

    .tooltips .tooltipstext {
      visibility: hidden;
      width: 400px;
      /* width: 358px; */
      background-color: #555;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      position: absolute;
      z-index: 1;
      bottom: 125%;
      left: 50%;
      /* margin-left: -60px; */
      margin-left: -201px;
      opacity: 0;
      transition: opacity 0.3s;
      z-index: 9999;
    }

    .tooltips .tooltipstext::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #555 transparent transparent transparent;
    }

    .tooltips:hover .tooltipstext {
      visibility: visible;
      opacity: 1;
    }

    .btn-backWrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 50px;
      height: 50px;
      margin-top: 5px;
    }

    @media screen and (min-width: 1024px) {
        #delete_all2 {
          position: fixed;
          right: 2%;
          top: 10.5%;
        }

        #vcheckbox{width: 1%;background:#ec4d4d;}
        #vCoupon{width: 15%;}
        #vStart{width: 8%;}
        #vEnd{width: 7.8%;}
        #vDetails{width: 37%;}

    }
      @media only screen and (min-width: 1440px) {
        #delete_all2 {
          position: fixed;
          right: 2%;
          top: 10.5%;
        }

        #vcheckbox{width: 1.2%;background:#ec4d4d;}
        #vCoupon{width: 16%;}
        #vStart{width: 8.1%;}
        #vEnd{width: 8.3%;}
        #vDetails{width: 39.5%;}
    }

    table.dataTable tbody tr {
      border: none !important;
    }

    table.dataTable tbody > tr:last-child > td {
        border-bottom: 2px solid #dddddd;
    }

</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard_demo.css">

<body class="signback1">
<div class="containermain2">
<div class="row m">
            <!-- <div class="col-md-8  col-xs-4 col-sm-6"> -->
            <div class="logobar ">
              <?php if(file_exists(base_url().$this->session->sitelogo) === 1){ ?>
                <img src="<?php echo base_url().$this->session->sitelogo; ?>" class="dem sitelogo">
              <?php }else{?>
                <img src="<?php echo base_url('assets/images/Liquor-011.png'); ?>" class="dem sitelogo">
              <?php }?>
            </div>
            <!-- </div> -->


                <div class="gg">
                    <a href="<?=base_url('cashier/coupon')?>">
                        <button class="bckbtn btn-backWrapper" id="btncoupon">
                        <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                      </button>
                    </a>
                <div>
                  <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" class="mobileimg "></a>
                </div>
            <!-- </div> -->

            <!-- <div class="col-md-3 col-xs-6 col-sm-6"> -->
                <div class="mainscreen">
                  <a href="<?php echo base_url(); ?>cashier">
                   <p class="maindes">MAIN SCREEN</p>
                  </a>

                </div>
            </div>

        </div>
</div>

<!-- main-content -->



        <div class=" container-fluid mt20">

            <div class="row mb-3 align-items-center">
                  <div class="col-md-8">
                      <h5 class="">Inactive Coupons</h5>
                  </div>
                  <div class="col-md-2 text-right">
                    <button name="delete_all" id="delete_all2" class="btn btn-danger trash" style="height: 38px;"><i class="fa fa-trash"></i>
                    </button>
                  </div>
            </div>

         <div class="row">
             <div class="col-md-12">
                 <div class="customcard">
                     <div>
                         <div class="">
                             <div class="">
                                 <table class="table table-sm inactive_table cell-border" id="tbl_coupon_archive">
                                     <thead class="headsec">
                                         <tr class="rowsec">
                                           <tr>
                                              <th class="text-center" id="vcheckbox"><input type="checkbox" class="select_all delete_checkbox" value="" /></th>
                                              <th class="text-white " id="vCoupon">Coupon Code</th>
                                              <th class="text-white text-center " id="vStart">Start Date</th>
                                              <th class="text-white text-center " id="vEnd">Expiry Date</th>
                                              <th class="text-white " id="vDetails">Coupon Details</th>
                                              <th class="text-white text-center ">Action</th>
                                          </tr>
                                     </thead>
                                     <tbody>
                                      <?php foreach ($archive as $c) { ?>
                                      <tr>
                                          <td style='width: 0.3%;' class="text-center "><input type="checkbox" class="delete_checkbox" value="<?=$c['coupon_id']?>" /></td>
                                          <td style='width: 8%;'class=""><?= $c['coupon_name']?></td>
                                          <td style='width: 4%;' class="text-center "><?=date('m-d-Y', strtotime($c['start_date']))?></td>
                                          <td style='width: 4%;' class="text-center "><?=date('m-d-Y', strtotime($c['end_date']))?></td>
                                          <td style='width: 20%;' class=""><?php if(strlen($c['coupon_details']) > 40 ){ echo substr($c['coupon_details'], 0, 40) . '...<a class="tooltips"><b>Read More</b><span class="tooltipstext">'.wordwrap($c['coupon_details'],55,"<br>\n").'</span></a>'; }else{ echo $c['coupon_details'];}?></td>
                                          <td style='width: 6%;' class=" dt-center"><button type="button" class="btn  btn-style changeStatus " style="width: 85px;" data-id="<?=$c['coupon_id'] ?>" data-expiry="<?=date('m-d-Y',strtotime($c['end_date']))?>" >Activate</button></a></td>
                                      </tr>
                                      <?php } ?>
                                     </tbody>
                                 </table>
                                 <!-- modal -->

                             </div>

                         </div>

                     </div>
                 </div>
             </div>

         </div>

    </div>
</div>

<style>

table {
  display: flex !important;
  flex-flow: column;
  width: 100%;
  height: 70vh;
  overflow: scroll;
    border-collapse: collapse;
}
thead {
  flex: 0 0 auto !important;
}
tbody {
  flex: 1 1 auto !important;
  display: block;
  overflow-y: auto;
  overflow-x: hidden;
}
table tr {
  border-left: 1px solid #F1F1F1;
  border-right: 1px solid #F1F1F1;
  border-top: 1px solid #F1F1F1;
    border-bottom: 1px solid #F1F1F1;
}
table td {
    border-left: 1px solid #F1F1F1;
    border-right: 1px solid #F1F1F1;

}
tr {
  width: 100%;
  display: table !important;
  table-layout: fixed !important;
}
 tr:hover{
     background:#F1F1F1;
 }

 thead tr:hover{
     background:#EC4D4D;
 }

thead th{
  position: sticky !important;
  top: 0;
  color: white;
}

.product-select{
background-color:#cfd4da;
}

</style>

<div class="modal" id="expiry_date_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle" style="padding-left: 34%;">New Expiry Date</h5>
        <button type="button" class="close clearReorder" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <form action="" method="post" autocomplete="off" class="custom-key">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="couponIdd" value="" name="coupon_id">
                  <!-- <label class="rolllabel">Custom Key Name: *</label> -->
                  <input style="font-size: 20px;" type="text" class="form-control validate43 mb-2 inputDate flatpickr-input active" name="start_date" id="start_date" placeholder="mm-dd-yyyy" value="" >

                  <span class="errors" id="expirys_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
            <!-- <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button> -->
            <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="activate_coupon">Submit</button>
          </div>

        </div>

      </form>
    </div>
  </div>
</div>

<link rel="stylesheet" href="<?= base_url() ?>assets/flatpickr/flatpickr.min.css">
<script src="<?= base_url() ?>assets/flatpickr/flatpickr.js"></script>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
<script src="<?=base_url()?>assets/cashier/js/loyalty_js/archive_coupon_js.js"></script>
