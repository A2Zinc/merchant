<style>
  @media screen and (min-width: 1024px) {
  #delete_all {
    position: fixed;
    right: 2%;
  }
  .loyal {
    position: fixed;
    right: 7%;
  }

  #vcheckbox {
    width: 1%;
    background:#ec4d4d;
  }
  /* #vName{width: 21.2%;}
    #vPoint{width: 6.7%;}
    #vBalance{width: 6.7%;}
    #vEmail{width: 17.2%;}
    #vPhone{width: 13.8%;} */
}
@media only screen and (min-width: 1440px) {
  #delete_all {
    position: fixed;
    right: 2%;
  }
  .loyal {
    position: fixed;
    right: 5.2%;
  }

  #vcheckbox {
    width: 1%;
    background:#ec4d4d;
  }
  /* #vName{width: 22.5%;}
    #vPoint{width: 7.5%;}
    #vBalance{width: 7.5%;}
    #vEmail{width: 18.2%;}
    #vPhone{width: 15.2%;} */
}
#tbl_loyalty {
  max-height: 77%;
}

table.dataTable tbody tr {
  border: none !important;
}

table.dataTable tbody > tr:last-child > td {
  border-bottom: 2px solid #dddddd;
}
</style>
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
                      <h5 class="">Customer / Loyalty Management</h5>
                          <button class="" style="background: #EC4D4D;border-color: #EC4D4D; color: #ffffff;border-radius: 0;height: 56px;width: 231px;outline: none;">Customer / Loyalty Management</button>
                      <a href="<?=base_url('cashier/coupon')?>">
                          <button class="" style="background: #E4E4E4;border-color: #E4E4E4; color: #000000;border-radius: 0;height: 56px;width: 161px;outline: none;">Coupon Management</button>
                      </a>
                      <a href="<?=base_url('cashier/promotion')?>">
                          <button class="" style="background: #E4E4E4;border-color: #E4E4E4; color: #000000;border-radius: 0;height: 56px;width: 179px;outline: none;">Promotion Management</button>
                      </a>
                  </div>
                  <a href="<?=base_url(); ?>cashier/create_customer">
                    <button type="button" class="btn btn-success loyal " <?php if(empty($this->session->userdata["admindata"]) && $this->data['add_customer'] == 0){echo 'disabled'; }else{ echo '';} ?>>Add Customer</button>
                  </a>&nbsp;
                  <div class="col-md-2 text-right">
                    <button <?php if(empty($this->session->userdata["admindata"]) && $this->data['delete_customer'] == 0){echo 'disabled'; }else{ echo '';} ?> name="delete_all" id="delete_all" class="btn btn-danger trash " style="height: 38px;"><i class="fa fa-trash"></i>
                    </button>
                  </div>
            </div>
         <div class="row">
             <div class="col-md-12">
                 <div class="customcard">
                     <div>
                         <div class="">
                             <div class="">
                                 <table class="table table-sm cell-border" id="tbl_loyalty">
                                     <thead class="headsec">
                                         <tr class="rowsec">
                                           <tr>
                                              <th class="text-center" id="vcheckbox"><input type="checkbox" class="select_all delete_checkbox" value="" /></th>
                                              <th class="text-white " id="vName" style=";">Name</th>
                                              <th class="text-white text-center " id="vPoint" style="">Points</th>
                                              <th class="text-white text-center " id="vBalance" style="">Balance</th>
                                              <th class="text-white " id="vEmail" style="">Email-Id</th>
                                              <th class="text-white text-center " id="vPhone" style="">Phone number</th>
                                              <th class="text-white text-center ">Action</th>
                                          </tr>
                                     </thead>
                                     <tbody>
                                       <?php foreach ($customer as $u) {
                                        $pointdata = $this->Cashier_model->get_customer_point_data($u['customer_mobile']);
                                        $points = $pointdata['data']->tot_redeem_point;
                                        $balance = $pointdata['account_balance'];
                                      ?>
                                      <tr>
                                          <td style='width: 30px;' class="text-center "><input type="checkbox" class="delete_checkbox1" value="<?=$u['customer_id']?>" /></td>
                                          <td class=""><?= $u['first_name'] ?> <?= $u['last_name'] ?></td>
                                          <td  class="text-center "><?=$points?></td>
                                          <td  class="text-center ">$ <?=$balance?></td>
                                          <td style="word-wrap: break-word;" class=""><?= $u['customer_email'] ?></td>
                                          <td class="text-center "><?=$u['customer_mobile']?></td>
                                          <td  class=" dt-center ">
                                            <a href="<?=base_url()?>cashier/edit_customer?id=<?=$u['customer_id'] ?>">
                                              <button type="button" class="btn  btn-style " <?php if(empty($this->session->userdata["admindata"]) && $this->data['update_customer'] == 0){echo 'disabled'; }else{ echo '';} ?>>Edit</button>
                                            </a>
                                          </td>
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard_demo.css">


<script src="<?=base_url()?>assets/cashier/js/loyalty_js/loyalty_js.js"></script>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>


