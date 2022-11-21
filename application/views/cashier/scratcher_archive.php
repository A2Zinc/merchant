<style>
  #tbl_archiveScratcher{
      max-height: 84%;
      width:105%;
  }
  #tbl_archiveScratcher_length{
    display: none!important;
  }

  table {
    display: flex !important;
    flex-flow: column;
    width: 100%;
    height: 70vh;
    overflow-x: scroll;
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

  table.dataTable tbody tr {
    border: none !important;
  }

  table.dataTable tbody > tr:last-child > td {
      border-bottom: 2px solid #dddddd;
  }

  .product-select{
  background-color:#cfd4da;
  }

  @media screen and (min-width: 1024px) {
      #vcheckbox{width: 1.1%;padding-left:20px;}
      #vName{width: 15.1%;}
      #vPoint{width: 8.8%;}
      #vBalance{width: 10.2%;}
      #vEmail{width: 7.7%;}
      #vPhone{width: 3.9%;}
      #vQty{width: 9.5%;}
  }
    @media only screen and (min-width: 1440px) {

        #vcheckbox{width: 1.1%;padding-left:29px;}
        #vName{width: 15.1%;}
        #vPoint{width: 9.2%;}
        #vBalance{width: 10.5%;}
        #vEmail{width: 8.2%;}
        #vPhone{width: 4%;}
        #vQty{width: 10%;}
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
                <div style="margin:0.5em auto">
                    <a href="<?=base_url('cashier/scratcher_inventory')?>"><button class="bckbtn">
                    <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="" >
                    </button> </a>
               </div>
            <div>
            <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" class="mobileimg"></a>
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
                <h5 class="">Archive Scratcher</h5>
            </div>
       </div>
      <div class="row">
            <div class="col-md-12">
                <div class="customcard pt-2">
                    <div style="width: 50%;position: absolute;padding-left:.5em;z-index: 500;">
                        <button name="delete_all" id="delete_all2" class="btn btn-danger" style="height: 38px;"><i class="fa fa-trash"></i>
                        </button>&nbsp;
                        <button id="refresh" class="btn btn-success" style="height: 38px;">Clear
                        </button>
                    </div>
                    <div>
                        <div class="">
                            <div class="">
                                <table class="table table-sm cell-border" id="tbl_archiveScratcher">
                                    <thead class="headsec">
                                        <tr>
                                            <th class="text-white " id="vcheckbox" ><input type="checkbox" class="select_all delete_checkbox" value="delete_all" /></th>
                                            <th class="text-white " id="vName">Scratcher Name</th>
                                            <th class="text-white " id="vPoint">UPC</th>
                                            <th class="text-white " id='vBalance'>Supplier</th>
                                            <th class="text-white " id='vEmail'>Scratcher Value</th>
                                            <th class="text-white text-center " id='vPhone'>Bin</th>
                                            <th class="text-white " id='vQty'>Quantity for Inventory</th>
                                            <th class="text-white text-center ">Status</th>
                                            <th class="text-white text-center ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($archive as $a) { ?>
                                       <tr>
                                           <td style='width: 3%;' class="text-center "><input type="checkbox" class="delete_checkbox" value="<?=$a['product_id']?>" /></td>
                                           <td style='width: 16%;' class=""><?= $a['product_name']?></td>
                                           <td style='width: 10%;' class=""><?= $a['case_UPC']?></td>
                                           <td style='width: 11.5%;' class=""><?= $a['supplier']?></td>
                                           <td style='width: 9%;' class="text-center "><?='$ '.number_format($a['onsale_price'],2)?></td>
                                           <td style='width: 5%;' class="text-center "><?php echo 'Bin '.$a['bin'];?></td>
                                           <td style='width: 11%;' class="text-center "><?= $a['quantity']?></td>
                                           <td  class="text-center ">
                                             <?php if($a['scratcher_status'] == 0){ ?>
                                                <select class="form-control change_scratcher_status " data-status="0" name="scratcher_status"><option value="0" selected>Active</option><option value="2">Inactive</option><option value="1">Expired</option></select>
                                            <?php }elseif($a['scratcher_status'] == 1){ ?>
                                                <select class="form-control change_scratcher_status " data-status="1" name="scratcher_status"><option value="0">Active</option><option value="2">Inactive</option><option value="1" selected>Expired</option></select>
                                            <?php }else{ ?>
                                                <select class="form-control change_scratcher_status " data-status="2" name="scratcher_status"><option value="0" selected>Active</option><option value="2" selected>Inactive</option><option value="1">Expired</option></select>
                                            <?php } ?>
                                        </td>
                                           <td  class=" dt-center">
                                             <a href="<?=base_url()?>cashier/scratcher_inventory_edit?id=<?=$a['product_id']?>"><button type="button" class="btn  btn-style simScratcher ">Edit</button></a>
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
    <input type="hidden" value="<?=$bins[0]->id?>" id="available_bin" >

    <div class="modal" id="archive_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
          <div class="modal-header custommodalheader">
            <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle" style="padding-left: 34%;">Update Bin No</h5>
            <button type="button" class="close clearBin" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
          </div>

          <form action="" method="post" autocomplete="off" class="custom-key">
            <div class="modal-body modalscroll">
              <div class="container">
                <div class="row">
                  <input type="hidden" value="" id="old_status">
                  <input type="hidden" id="scratcherIDD" value="" name="scratcherIDD">
                  <div class="col-md-12 ">
                    <div class="form-group">
                        <label class="customcardlabel">BIN #*</label>
                        <select  style="margin: 0!important;" class="form-control customcardinput mt-2 validate48" name="archive_bin" id="archive_bin">
                          <option>--Select BIN--</option>
                          <?php foreach($bins as $b){?>
                            <option value="<?=$b->value?>"><?=$b->bins?></option>
                          <?php } ?>
                        </select>
                        <span class="errors" id="bin_name_err1" style="color:red; font-size:14px"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div style="text-align: center;">
                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="activate_scratcher">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

<script src="<?=base_url()?>assets/cashier/js/inventory_js/archive_scratcher_js.js"></script>
