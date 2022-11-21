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
@media screen and (min-width: 1024px) {
  #delete_all2 {
    position: fixed;
    right: 2%;
  }

  #archive_all {
    position: fixed;
    right: 7%;
  }

  .loyal {
    position: fixed;
    right: 16%;
  }
  #vcheckbox {
    width: 1.5%;background:#ec4d4d;
  }
  /* #vCoupon{width: 16.6%;}
      #vStart{width: 7.7%;}
      #vEnd{width: 7.7%;}
      #vDetails{width: 34.2%;} */
}
@media only screen and (min-width: 1440px) {
  #delete_all2 {
    position: fixed;
    right: 2%;
  }
  #archive_all {
    position: fixed;
    right: 5.2%;
  }

  .loyal {
    position: fixed;
    right: 11.1%;
  }
  #vcheckbox {
    width: 1.5%;background:#ec4d4d;
  }
  /* #vCoupon{width: 17%;}
      #vStart{width: 8%;}
      #vEnd{width: 8%;}
      #vDetails{width: 38.3%;} */
}
#tbl_promotion {
  max-height: 77%;
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
                <div class="logobar ">
                  <?php if(file_exists(base_url().$this->session->sitelogo) === 1){ ?>
                    <img src="<?php echo base_url().$this->session->sitelogo; ?>" class="dem sitelogo">
                  <?php }else{?>
                    <img src="<?php echo base_url('assets/images/Liquor-011.png'); ?>" class="dem sitelogo">
                  <?php }?>
                </div>
                <div class="gg">
                    <div>
                      <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" class="mobileimg "></a>
                    </div>
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
                      <h5 class="">Promotion Management</h5>
                      <a href="<?=base_url('cashier/loyalty')?>">
                          <button class="" style="background: #E4E4E4;border-color: #E4E4E4; color: #000000;border-radius: 0;height: 56px;width: 231px;outline: none;">Customer / Loyalty Management</button>
                      </a>
                      <a href="<?=base_url('cashier/coupon')?>">
                          <button class="" style="background: #E4E4E4;border-color: #E4E4E4; color: #000000;border-radius: 0;height: 56px;width: 161px;outline: none;">Coupon Management</button>
                      </a>
                      <button class="" style="height: 38px; background: #EC4D4D;border-color: #EC4D4D; color: #ffffff;border-radius: 0;height: 56px;width: 179px;outline: none;">Promotion Management</button>
                  </div>
                  <a href="<?=base_url(); ?>cashier/createpromotion">
                    <button type="button" class="btn btn-success loyal" <?php if(empty($this->session->userdata["admindata"]) && $this->data['create_promotion'] == 0){echo 'disabled'; }else{ echo '';} ?>>Create Promotion</button>
                  </a>
                  <a href="<?php echo base_url(); ?>cashier/promotionArchive" >
                      <button class="btn btn-success" id="archive_all">Archive</button>
                  </a>
                  <div class="col-md-2 text-right">
                    <button <?php if(empty($this->session->userdata["admindata"]) && $this->data['delete_promotion'] == 0){echo 'disabled'; }else{ echo '';} ?> name="delete_all" id="delete_all2" class="btn btn-danger trash" style="height: 38px;"><i class="fa fa-trash"></i>
                    </button>
                  </div>
            </div>

         <div class="row">
             <div class="col-md-12">
                 <div class="customcard">
                     <div>
                         <div class="">
                             <div class="">
                                 <table class="table table-sm cell-border" id="tbl_promotion">
                                     <thead class="headsec">
                                         <tr class="rowsec">
                                           <tr>
                                              <th class="text-center" id="vcheckbox"><input type="checkbox" class="select_all delete_checkbox1" value="" /></th>
                                              <th class="text-white " id="vCoupon">Promotion Code</th>
                                              <th class="text-white text-center " id="vStart">Start Date</th>
                                              <th class="text-white text-center " id="vEnd">Expiry Date</th>
                                              <th class="text-white " id="vDetails">Promotion Details</th>
                                              <th class="text-white text-center ">Status</th>
                                              <th class="text-white text-center ">Action</th>
                                          </tr>
                                     </thead>
                                     <tbody>
                                      <?php foreach ($promotion as $c) { ?>
                                      <tr>
                                          <td style='width: 2.5%;' class="text-center"><input type="checkbox" class="delete_checkbox" value="<?=$c['coupon_id']?>" /></td>
                                          <td class=""><?= $c['coupon_name']?></td>
                                          <td  class="text-center "><?=date('m-d-Y', strtotime($c['start_date']))?></td>
                                          <td  class="text-center "><?=date('m-d-Y', strtotime($c['end_date']))?></td>
                                          <td class=""><?php if(strlen($c['coupon_details']) > 43 ){ echo substr($c['coupon_details'], 0, 43) . '...<a class="tooltips"><b>Read More</b><span class="tooltipstext">'.wordwrap($c['coupon_details'],55,"<br>\n").'</span></a>'; }else{ echo $c['coupon_details'];}?></td>
                                          <td  class="text-center "><?php if($c['end_date'] >= date('Y-m-d')){ echo 'Active'; }else{ echo 'Expired'; } ?></td>
                                          <td  class=" dt-center"><a href="<?=base_url()?>cashier/edit_promotion?id=<?=$c['coupon_id']?>"><button type="button" class="btn  btn-style " <?php if(empty($this->session->userdata["admindata"]) && $this->data['edit_promotion'] == 0){echo 'disabled'; }else{ echo '';} ?>>Edit</button></a></td>
                                      </tr>
                                      <?php } ?>
                                     </tbody>
                                 </table>
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
<script src="<?=base_url()?>assets/cashier/js/loyalty_js/promotion_js.js"></script>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
