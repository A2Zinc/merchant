<style>
    .customcardheader1{
      border:none;
      padding-left: 0px;
    }
    .customcardlabel{
        color:#000 !important;
    }
    label{
        color:#000 !important;
    }

    .scrollForLabel{
        max-height: 500px;
        overflow: scroll;
    }
    .dynamic > img {
      height: 140px!important;
      width: 170px!important;
    }

    #mobileimg{
      padding-left: 10px;
      width: 60px;
      padding-top: 5px;
      height: 55px;
      margin-right: 20px;
    }
    .keyboard {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    padding: 5px 0;
    background:#18102f;
    box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
    user-select: none;
    transition: bottom 0.4s;
    z-index:999999999999999999999999999;
}

.keyboard--hidden {
    bottom: -100%;
}
.keyboard--hidden.numone {
    bottom: -100%;
}
.keyboard__keys {
    text-align: center;
}
.cd-keys{
    /* font-size:35px; */
}
.keyboard__key {
    height: 45px;
    width: 6%;
    max-width: 120px;
    margin: 3px;
    border-radius: 4px;
    border: none;
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff;
    font-size: 1.45rem;
    outline: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    vertical-align: top;
    padding: 0;
    -webkit-tap-highlight-color: transparent;
    position: relative;
}
.keyboard__key.numonekey{
    width: 125px;
     max-width: unset;
}
.keyboard__key:active {
    background: rgba(255, 255, 255, 0.12);
}

.keyboard__key--wide {
    width: 12%;
}

.keyboard__key--extra-wide {
    width: 36%;
    max-width: 500px;
}

.keyboard__key--activatable::after {
    content: '';
    top: 10px;
    right: 10px;
    position: absolute;
    width: 8px;
    height: 8px;
    background: rgba(0, 0, 0, 0.4);
    border-radius: 50%;
}

.keyboard__key--active::after {
    background: #08ff00;
}

.keyboard__key--dark {
    background: rgba(0, 0, 0, 0.25);
}
.keyboard__key.numonekey{
    width: 125px;
     max-width: unset;
}
.keyboard.numone{

    width: 405px;
 right: 0;
 left: unset;

    height: fit-content!important;
}
.moveup{
  bottom: 8em;
}

.keypad-btn-btn {
  font-size: 35px;
  background-color: lightgray;
  color: black;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 6px;
  font-weight: 600;
  height: 75px;
}

.keypad-btn-btn:active {
  background: gray;
}
.keypad-btn-btn2 {
  font-size: 20px;
  background-color: lightgray;
  color: black;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 6px;
  font-weight: 600;
  height: 75px;
}

.keypad-btn-btn2:active {
  background: gray;
}
.enterkeypad-btn-btn {
  all: unset;
  background-color: gray;
}
.enterkeypad-btn-btn {
  width: auto;
  background: transparent;
  border: none;

  color: black;
  font-weight: 600;
  font-size: 34px;
}
#mobileimg{
  padding-left: 10px;
  width: 60px;
  padding-top: 5px;
  height: 55px;
  margin-right: 20px;
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard_demo.css">

<?php $audit_data = $this->Cashier_model->get_inventory_audit($product['case_upc']);?>
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
               <a href="<?=base_url('cashier/inventory')?>"><button class="bckbtn">
                <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="" >
                </button> </a>
               </div>

               <div>
                 <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" id="mobileimg"></a>
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
    <div class="row mt-4">
        <div class="col-md-12">
              <h5 class="mainline ml-3 mt-3" >Inventory Management</h5>
         </div>
            </div>
            <div class="container-fluid mt20">
                <div class="row overflow" >
                  <div class="col-md-12">
                        <div class="customcard">
                          <div class="row" style="border-bottom: 1px solid #DBDBDB;">
                            <div class="col-md-8">
                              <div class="customcardheader1 " >
                                 <p class="mb-0 ml-5"> Update Product (UPC #<?php echo $product['case_upc'];?>)<?php if(!empty($audit_data)){ ?></br><span class="small" style="color:darkred;">Last Updated by <?php echo $audit_data->first_name.' '.$audit_data->last_name;?> on <?=date('m-d-Y h:i A',strtotime($audit_data->updated_at)) ?> </span><?php } ?></p>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="customcardheader1" >
                                <button type="submit" class="save-data smbtn ml-3" id="btnSave_Edit" >Save Information
                                      <img src="<?php echo base_url(); ?>assets/images/Vector (8).png" alt="" class="pl-2 ">
                                </button>
                                <button type="button" class="btn btn-primary dynamic_font_header2" id="plabel3">Print Label</button>

                                </div>
                            </div>
                          </div>

                            <!-- cardheader -->
                            <form class="edit-product" method="post" action="" enctype="multipart/form-data" autocomplete="off">
                            <div class="customcardbody smbtn dynamic_font_size">
                              <div class="container mb25 ">
                                  <div class="row">
                                      <input type="hidden" class="form-control" name="barcode_formats" value="<?= isset($product['barcode_formats']) ? $product['barcode_formats'] : '' ;?>">
                                      <input type="hidden" class="form-control" name="barcode_type" value="<?= isset($product['barcode_type']) ? $product['barcode_type'] : '' ;?>">
                                      <input type="hidden" class="form-control" name="shopify_product_id" value="<?= isset($product['shopify_product_id']) ? $product['shopify_product_id'] : '' ;?>">
                                      <input type="hidden" class="form-control productIDS" name="product_id" value="<?= isset($product['product_id']) ? $product['product_id'] : '' ;?>">
                                      <input type="hidden" class="form-control" id="case_upc" name="case_upc" value="<?= isset($product['case_upc']) ? $product['case_upc'] : '' ;?>">
                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">Product Name <span style="color:#FF0000;">*</span></label>
                                           <input type="text" onClick="this.select();" class="use-keyboard-input form-control customcardinput use-keyboard-input dynamic_font_size" id="product_name" aria-describedby="" plceholder="Please enter Product Name" name="product_name" value="<?= isset($product['product_name']) ? $product['product_name'] : '' ;?>">
                                          <span class="errors dynamic_font_size_err" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <input type="hidden" id="original_name" name="original_name" value="<?=$product['product_name']?>">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Product Nickname <span style="color:#FF0000;">*</span></label>
                                            <input type="text" onClick="this.select();" class="use-keyboard-input form-control customcardinput use-keyboard-input dynamic_font_size" id="nickname"  aria-describedby="" plceholder="Please enter Product Nickname" name="product_nickname" value="<?= isset($product['short_name']) ? $product['short_name'] : '' ;?>">
                                             <span class="errors dynamic_font_size_err" id="nname_err" style="color:red; font-size:14px"></span>
                                          </div>
                                       </div>
                                      <div class="col-md-4">
                                       <div class="form-group">
                                        <label for="exampleFormControlSelect1" style="color: red;margin-bottom: 0.2rem;">Category <span style="color:#FF0000;">*</span></label>
                                            <select class="form-control select-2-dropdown dynamic_font_size" id="category" name="category_id">
                                                <?php foreach ($category as $c) {?>
                                                <option value="<?=$c['category_id']?>" <?php if($c['category_id']==$product['category_id']){echo 'SELECTED';}?> ><?=$c['category_name']?></option>
                                                   <?php if(!empty($c['sub_cat'])){
                                                      foreach($c['sub_cat'] as $sub_ct1){ ?>
                                                        <option value="<?=$sub_ct1['category_id']?>" <?php if($sub_ct1['category_id']==$product['category_id']){echo 'SELECTED';}?> >
                                                          <?=$c['category_name']?> > <?=$sub_ct1['category_name']?>
                                                        </option>
                                                        <?php if(!empty($sub_ct1['child_cat'])){
                                                          foreach($sub_ct1['child_cat'] as $sub_ct2){ ?>
                                                            <option value="<?=$sub_ct2['category_id']?>" <?php if($sub_ct2['category_id']==$product['category_id']){echo 'SELECTED';}?> ><?=$c['category_name']?> > <?=$sub_ct1['category_name']?> >
                                                              <?=$sub_ct2['category_name']?>
                                                            </option>
                                                          <?php if(!empty($sub_ct2['grand_cat'])){
                                                            foreach($sub_ct2['grand_cat'] as $grnd_ct){ ?>
                                                          <option value="<?=$grnd_ct['category_id']?>" <?php if($grnd_ct['category_id']==$product['category_id']){echo 'SELECTED';}?> >
                                                            <?=$c['category_name']?> > <?=$sub_ct1['category_name']?> >
                                                              <?=$sub_ct2['category_name']?> > <?=$grnd_ct['category_name']?></option>
                                                    <?php } } } } } }?>
                                                <?php } ?>
                                                <option value="0" <?php if($product['category_id'] == '0'){echo 'SELECTED';}?> >Undefined</option>
                                            </select>
                                        <span class="errors dynamic_font_size_err" id="cat_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>

                                      <div class="col-md-3">
                                       <div class="form-group">
                                          <label class="customcardlabel">Units in a Package <span style="color:#FF0000;">*</span></label>
                                          <input list="units" onClick="this.select();" name="unit" id="unit" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" value="<?= isset($product['unit']) ? $product['unit'] : '' ;?>" placeholder="-- Select Unit --">
                                              <datalist id="units">
                                                <?php foreach($units as $u) { ?>
                                                  <option value="<?=$u['unit_name']?>"><?=$u['unit_name']?></option>
                                                <?php } ?>
                                              </datalist>
                                            <span class="errors dynamic_font_size_err" id="unit_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                        <input type="hidden" name="old_quantity" value="<?= isset($product['quantity']) ? $product['quantity'] : '' ;?>" >
                                      <div class="col-md-3">
                                       <div class="form-group">
                                           <label class="customcardlabel">Quantity for Inventory<span style="color:#FF0000;">*</span></label>
                                           <input type="number" onClick="this.select();" class="use-keyboard-input-num form-control customcardinput use-keyboard-input-num dynamic_font_size" min="1" id="quantity" aria-describedby="" name="quantity" value="<?= isset($product['quantity']) ? $product['quantity'] : '' ;?>" placeholder="Enter Quantity">
                                           <span class="errors dynamic_font_size_err" id="qty_err" style="color:red; "></span>
                                         </div>
                                      </div>
                                      <?php $car_id = $product['category_id'];
                                             $data1 = $this->Cashier_model->fetch_size($car_id);?>
                                      <input type="hidden" name="measurement_value" id="measurement_value" value="">

                                      <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="customcardlabel">Size</label>
                                            <input list="sizes"  name="size" onClick="this.select();" id="size" class=" form-control customcardinput dynamic_font_size" value="<?= isset($product['size']) ? $product['size'] : '' ;?>" placeholder="-- Select Size --">
                                              <datalist id="sizes">
                                                <?php foreach($data1['sizename'] as $s) { ?>
                                                  <option value="<?=$s['name']?>"></option>
                                                <?php } ?>
                                              </datalist>
                                            <span class="errors dynamic_font_size_err" id="size_err" style="color:red;"></span>
                                          </div>
                                       </div>

                                      <div class="col-md-3">
                                         <div class="form-group">
                                             <label class="customcardlabel">Reorder Level</label>
                                             <input type="tel" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" aria-describedby="" name="reorder_level" id="reorder_level" placeholder="Please enter Reorder Level" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6" value="<?= isset($product['reorder_level']) ? $product['reorder_level'] : '' ;?>">
                                             <span class="errors dynamic_font_size_err" id="rlevel_err" style="color:red; "></span>
                                           </div>
                                       </div>

                                       <div class="col-md-4">
                                         <div class="form-group">
                                             <label class="customcardlabel">Producer</label>
                                             <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="producer" aria-describedby="" name="producer" value="<?= isset($product['producer']) ? $product['producer'] : '' ;?>" plceholder="Please enter the Producer">
                                           </div>
                                        </div>

                                           <?php $suppid =  $product['supp_id']; $supp_name = $this->Cashier_model->get_supplier_name($suppid); ?>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                <label class="customcardlabel">Supplier</label>
                                                <input list="suppliers" onClick="this.select();" name="supplier" id="supplier" class="form-control customcardinput dynamic_font_size" placeholder="-- Select Supplier --" value="<?= isset($supp_name->supplier_name) ? $supp_name->supplier_name : $product['supplier'] ;?>">
                                                <datalist id="suppliers">
                                                  <?php foreach($supplier as $s) { ?>
                                                    <option value="<?=$s['supplier_name']?>"></option>
                                                  <?php } ?>
                                                </datalist>
                                            </div>
                                          </div>
                                       <div class="col-md-4">
                                       <?php $brandid =  $product['brand_id']; $brand_name = $this->Cashier_model->get_brand_name($brandid); ?>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1" style="color: red;margin-bottom: 0.2rem;">Brand</label>
                                            <select class="form-control customcardinput dynamic_font_size" id="brand_id" name="brand_id">
                                            <?php foreach($brand as $b) { ?>
                                                <option value="<?=$b['brand_id']?>" <?php if($b['brand_id']==$product['brand_id']){echo 'SELECTED';}?> ><?=$b['brand_name']?></option>  <?php } ?>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                           <div class="form-group">
                                              <label class="customcardlabel">Supplier Price</label>
                                             <div style="position:relative;"> <span class="prefix">$</span>
                                              <input type="tel" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num usefloathere dynamic_font_size pl-3" maxlength="7" id="supplier_price" onkeyup="this.value = get_float_value(this.value)" placeholder="Please enter Supplier Price" aria-describedby="" name="supplier_price" value="<?= isset($product['supplier_price']) ? number_format($product['supplier_price'], 2) : '' ;?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" ></div>
                                              <span class="errors dynamic_font_size_err" id="price_err" style="color:red; "></span>
                                            </div>
                                      </div>

                                               <div class="col-md-6" style="display: flex;flex-direction: column;justify-content: space-between;">
                                                  <div class="form-group">
                                                      <label for="exampleFormControlSelect1" style="color: red;"> Margin Profit in Store</label>
                                                      <label class=" text-secondary" style="font-size:10px;">(In %)</label>
                                                      <div class="probar">
                                                         <input id="rangeInput" type="range" min="0" max="99" oninput="amount.value=rangeInput.value" class="scr " value="" />
                                                         <input id="amount" onClick="this.select();" type="tel" value="" min="0" class="form-control pronum store_p use-keyboard-input-num dynamic_font_size" max="99" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="padding-top:0px; border:0px;"oninput="rangeInput.value=amount.value" />
                                                         <span class="prefix2">%</span>
                                                      </div>
                                                  </div>
                                                  <p class="errors dynamic_font_size_err" id="profit_err" style="color:red; margin-bottom:0;"></p>
                                               </div>
                                               <div class="col-md-4">
                                                   <div class="form-group">
                                                     <label class="customcardlabel">Store Sell Price <span style="color:#FF0000;">*</span></label>
                                                   <div style="position:relative;">
                                                   <span class="prefix">$</span>
                                                     <input type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num usefloathere dynamic_font_size pl-3" id="store_sell_price" aria-describedby="" name="store_sell_price" min="0.01" maxlength="7" placeholder="Please enter Store Sell Price" value="<?= isset($product['store_sell_price']) ? number_format($product['store_sell_price'], 2) : '' ;?>" >
                                                   </div>
                                                     <span class="errors dynamic_font_size_err" id="store_sell_err" style="color:red;"></span>
                                                   </div>
                                                </div>

                                                  <div class="col-md-4">
                                                     <div class="form-group">
                                                         <label class="customcardlabel">Discount</label>
                                                         <div style="position:relative;"> <span class="prefix">$</span>
                                                         <input type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num usefloathere dynamic_font_size pl-3" id="price_off" aria-describedby="" maxlength="7" placeholder="Discount" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                       </div> <span class="errors dynamic_font_size_err" id="price_off_err" style="color:red;"></span>
                                                     </div>
                                                  </div>

                                                   <div class="col-md-4">
                                                      <div class="form-group">
                                                          <label class="customcardlabel">Store Promotion Price</label>
                                                          <div style="position:relative;" >
                                                             <span class="prefix">$</span>
                                                             <input type="tel" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)"  class="form-control customcardinput use-keyboard-input-num usefloathere dynamic_font_size" id="store_promotion_price" aria-describedby="" maxlength="7" name="store_promotion_price" value="<?php if($product['store_promotion']== 0) { echo '';}else{ echo number_format($product['store_promotion'], 2); } ?>" readonly>
                                                           </div>
                                                     </div>
                                                   </div>

                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                      <input type="checkbox" id="ISecommerce" name="is_ecommerce" value="<?=$product['is_ecommerce']?>" <?php echo isset($product['is_ecommerce']) ? (($product['is_ecommerce'])==1 ? 'checked' : '') : '' ;?>>
                                                        &nbsp;&nbsp;<label class="customcardlabel">Is E-commerce Product ?</label>
                                                    </div>
                                                  </div>

                                                  <div class="col-md-6 ecell">
                                                   <div class="form-group">
                                                     <label class="customcardlabel">E-commerce Sell Price</label>
                                                     <div style="position:relative;" >
                                                   <span class="prefix">$</span>
                                                   <input type="tel" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" class="dynamic_font_size form-control customcardinput use-keyboard-input-num usefloathere" id="ecommerce_sell_price" aria-describedby="" name="ecommerce_sell_price" min="0.01" placeholder="Please enter E-commerce Sell Price" maxlength="7"  value="<?php if($product['ecomm_sell_price']== 0) { echo '';}else{ echo number_format($product['ecomm_sell_price'], 2); } ?>">
                                                    </div>
                                                     <span class="errors dynamic_font_size_err" id="ecomm_sell_err" style="color:red; "></span>
                                                   </div>
                                                    </div>
                                                    <div class="col-md-4" style="display: flex;flex-direction: column;justify-content: space-between;">
                                                  <div class="form-group emargin">
                                                    <label for="exampleFormControlSelect1"style="color: red;"> Margin Profit in Ecommerce</label>
                                                    <label class=" text-secondary" style="font-size:10px;">(In %)</label>
                                                    <div class="probar">
                                                          <input id="rangeInput2" type="range" min="0" max="99" oninput="amount2.value=rangeInput2.value" class="scr" value="" />
                                                        <input id="amount2" onClick="this.select();" type="tel" value="" min="0" class="form-control pronum ecomm_p use-keyboard-input-num dynamic_font_size" max="99" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="padding-top:0px; border:0px;"oninput="rangeInput2.value=amount2.value" />
                                                        <span class="prefix2">%</span>
                                                      </div>
                                                  </div>
                                                     </div>

                                                    <div class="col-md-6 epromotion" >
                                                       <div class="form-group">
                                                    <label class="customcardlabel">E-commerce Promotion Price</label>
                                                    <div style="position:relative;" >
                                                   <span class="prefix">$</span>
                                                   <input type="tel" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)"   class="form-control customcardinput use-keyboard-input-num usefloathere dynamic_font_size" id="ecommerce_promotion_price" aria-describedby="" maxlength="7" name="ecommerce_promotion_price" placeholder="Please enter E-commerce Promotion Price" value="<?php if($product['ecomm_promotion']== 0) { echo '';}else{ echo number_format($product['ecomm_promotion'],2); } ?>" >
                                                  </div>
                                                   </div>
                                                        </div>


                                                   <div class="col-md-6 edetails">
                                                      <div class="form-group">
                                                          <label class="customcardlabel">Details</label>
                                                          <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="details" aria-describedby="" name="details" value="<?= isset($product['product_details']) ? $product['product_details'] : '' ;?>" placeholder="Please enter the Product Details">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 etitle">
                                                      <div class="form-group">
                                                          <label class="customcardlabel">Meta Title</label>
                                                          <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="tilte" aria-describedby="" name="Meta_Title" value="<?= isset($product['Meta_Title']) ? $product['Meta_Title'] : '' ;?>" placeholder="Please enter Meta Title">
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6 etag">
                                                       <div class="form-group">
                                                           <label class="customcardlabel">Meta Tag</label>
                                                           <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="Meta_Key" aria-describedby="" name="Meta_Key" value="<?= isset($product['Meta_Key']) ? $product['Meta_Key'] : '' ;?>" placeholder="Please enter the Product Tag">
                                                         </div>
                                                      </div>

                                                      <div class="col-md-12 edescription">
                                                        <div class="form-group">
                                                            <label class="customcardlabel">Meta Description
                                                            </label>
                                                            <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="Description" aria-describedby="" name="Meta_Desc" value="<?= isset($product['Meta_Desc']) ? $product['Meta_Desc'] : '' ;?>" placeholder="Please enter Meta Description">
                                                          </div>
                                                       </div>

                                                <div class="col-md-4 eabv">
                                                  <div class="form-group">
                                                      <label class="customcardlabel">Alcohol by volume</label>
                                                      <div class="probar">
                                                        <input id="rangeInput3" type="range" min="0" max="99" oninput="amount3.value=rangeInput3.value" class="scr" value="" />
                                                         <input id="amount3" onClick="this.select();" type="number" min="0" class="form-control pronum  use-keyboard-input-num dynamic_font_size" max="100" name="abv" maxlength="3" value="<?= isset($product['abv']) ? $product['abv'] : '' ;?>" style="padding-top:0px; border:0px;"oninput="rangeInput3.value=amount3.value" />
                                                         <span class="prefix2">%</span>
                                                      </div>
                                                    </div>
                                                </div>
                                               <div class="col-md-4 eproof">
                                                <div class="form-group">
                                                    <label class="customcardlabel">Proof</label>
                                                    <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="proof" aria-describedby="" name="proof" value="<?= isset($product['proof']) ? $product['proof'] : '' ;?>" placeholder="Please enter Proof">
                                                  </div>
                                               </div>
                                               <div class="col-md-4 egeo">
                                                 <div class="form-group">
                                                     <label class="customcardlabel">Geography</label>
                                                     <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="region" aria-describedby="" name="region" value="<?= isset($product['region']) ? $product['region'] : '' ;?>"  placeholder="Please enter Geography ">
                                                   </div>
                                                </div>

                                                <?php $parent_id =  $product['parent_product']; $tat = $this->Cashier_model->getProdutctById($parent_id);?>
                                                <div class="col-md-6 egeo">
                                                    <div class="form-group">
                                                        <label class="customcardlabel">Parent Product</label>
                                                        <input type="text" class="form-control customcardinput dynamic_font_size" id="parent_product" aria-describedby="" name="parent_product" value="<?= isset($tat->product_name) ? $tat->product_name : '' ;?>">
                                                        <input type="hidden" class="form-control" name="parent_product_id" id="parent_product_id_select" value="<?= isset($tat->product_id) ? $tat->product_id : '' ;?>" />
                                                    </div>
                                               </div>

                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                      <input type="checkbox" id="CRV" name="CRV" value="1" <?php echo isset($product['Applicable_CRV']) ? (($product['Applicable_CRV'])==1 ? 'checked' : '') : '' ;?>>
                                                      <label class="customcardlabel">  Container Deposit </label>&nbsp;&nbsp;
                                                      <input class="ml-5" type="checkbox" id="TAX" name="TAX" value="1" <?php echo isset($product['Applicable_Tax']) ? (($product['Applicable_Tax'])==1 ? 'checked' : '') : '' ;?>>
                                                      <label class="customcardlabel">  TAX </label>
                                                      <input class="ml-5" type="checkbox" id="age" name="age_restrict" value="1" disabled checked>
                                                      <label class="customcardlabel" id="restict"> Age Restricted</label>
                                                  </div>
                                                </div>
                                                <div class="container  mb25">
                                                    <p class="formheader dynamic_font_header2"> Product Combo :</p>
                                                    <div class="item-apend mt-4 dynamic_font_size">
                                                      <?php $product_id = $product['product_id'];
                                                        $combo = $this->Cashier_model->get_combo_productdata($product_id);
                                                      ?>
                                                      <?php if(!empty($combo)){ foreach ($combo as $val) { ?>
                                                        <div class="row">
                                                          <input type="hidden" name="combo_id" value="<?=$val['id']?>">
                                                          <div class="col-md-4">
                                                              <div class="form-group">
                                                                  <label class="customcardlabel" for="">Combo Name</label>
                                                                  <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="pcombo" name="product_combo[]" aria-describedby="" placeholder="Please enter Combo Name" onkeypress="return onlyAlphabets(event,this);" value="<?=$val['product_combo']?>">
                                                                  <span class="errors dynamic_font_size_err" id="pcombo_err" style="color:red;"></span>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-4">
                                                              <div class="form-group">
                                                                  <label class="customcardlabel">Units in a Combo </label>
                                                                  <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="punit" name="combo_unit[]" aria-describedby="" placeholder="Please enter Units in a Combo" onkeyup="ValidateCEmail();" value="<?=$val['combo_unit']?>">
                                                                  <span class="errors dynamic_font_size_err" id="ucomb_err" style="color:red; "></span>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-3">
                                                              <div class="form-group">
                                                                  <label id="dummyclick" class="customcardlabel">Combo Price </label>
                                                                  <div style="position:relative;"> <span class="prefix">$</span>
                                                                    <input type="tel" class="form-control customcardinput use-keyboard-input-num usefloathere dynamic_font_size pl-3" id="cprice" name="combo_price[]" aria-describedby="" placeholder="Please enter Combo Price" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" value="<?=$val['combo_price']?>">
                                                                   </div>
                                                                  <span class="errors dynamic_font_size_err" id="combo_err" style="color:red;"></span>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-1">
                                                            <button type="button" class="btn btn-light apend_button removeNominee ">-</button>
                                                          </div>
                                                        </div>
                                                      <?php } }else{?>
                                                        <?php $random = rand(0,9999);?>
                                                        <input type="hidden" name="combo_row[]" value="<?=$random?>" >
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="form-group">
                                                                  <label class="customcardlabel" for="">Combo Name</label>
                                                                  <input type="text" class="form-control customcardinput use-keyboard-input product_combo dynamic_font_size" id="pcombo" data-id="<?=$random?>" name="product_combo_<?=$random?>" aria-describedby="" placeholder="Please enter Combo Name" onkeypress="return onlyAlphabets(event,this);">
                                                                  <span class="errors dynamic_font_size_err" id="pcombo_err_<?=$random?>" style="color:red;"></span>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-4">
                                                              <div class="form-group">
                                                                  <label class="customcardlabel">Units in a Combo </label>
                                                                  <input type="text" class="form-control customcardinput use-keyboard-input-num dynamic_font_size combo_unit_<?=$random?>" id="punit" name="combo_unit_<?=$random?>" aria-describedby="" placeholder="Please enter Units in a Combo">
                                                                  <span class="errors dynamic_font_size_err" id="ucomb_err_<?=$random?>" style="color:red;"></span>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-3">
                                                              <div class="form-group">
                                                                  <label id="dummyclick" class="customcardlabel">Combo Price </label>
                                                                  <div style="position:relative;"> <span class="prefix">$</span>
                                                                    <input type="tel" class="form-control customcardinput use-keyboard-input-num usefloathere pl-3 dynamic_font_size combo_price_<?=$random?>" id="cprice" name="combo_price_<?=$random?>" aria-describedby="" placeholder="Please enter Combo Price" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();">
                                                                   </div>
                                                                  <span class="errors dynamic_font_size_err" id="combo_err_<?=$random?>" style="color:red;"></span>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-1">
                                                            <button type="button" class="btn btn-light apend_button clearProductCombo">-</button>
                                                          </div>
                                                        </div>
                                                      <?php } ?>
                                                     </div>
                                                    <div class="row">
                                                      <div class="col-md-1">
                                                       <button style="background: #2d7f61;margin-top: -18px;margin-bottom: 5px; color:#fff;" type="button" class="btn btn-light apend_button add_button" href="javascript:void(0);">+</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                     <label class="customcardlabel">Display Image</label>
                                                    <div class="dynamic" style="padding: 0;">
                                                    <?php if($product['product_image'] == './uploads/products/600px-No_image_available.svg (2).png') {?>
                                                        <img src="<?php echo base_url('assets/images/600px-No_image_available.svg (2).png')?>" alt="" style="height: 140px;width: 170px;">
                                                     <?php }else{?>
                                                        <img src="<?php echo isset($product['product_image']) ? base_url($product['product_image']) : ''; ?>" alt="">

                                                        <?php if($product['product_image'] != "" || $product['product_image'] != "./uploads/products/_600px-No_image_available.svg (2).png") { ?>
                                                            <?php if($product['product_image'] != './uploads/products/_600px-No_image_available.svg (2).png'){?>
                                                                <a href="javascript:;" class="product_image_delete btn btn-secondary" data-product_id="<?= isset($product['product_id']) ? $product['product_id'] : '' ;?>" style="position: absolute; padding: 5px;color: red;background:lightyellow;margin-top:.8em;left:1em;top: 14.5em; font-size:100%;">Delete Image</a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                     <?php } ?>
                                                   </div>
                                              </div>
                                        </div>
                                    <div class="col-md-6 text-left">
                                        <!-- <button type="button" class="btn btn-primary dynamic_font_header2" id="plabel22">Print Label</button> -->
                                        <!-- <button type="button" class="btn btn-primary dynamic_font_header2" id="plabel1">Print Product Label</button> -->
                                        <input type="hidden" class="form-control" name="product_id"  id="product_id" value="<?= isset($product['product_id']) ? $product['product_id'] : '' ;?>">
                                        <!-- <button type="button" class="btn btn-primary dynamic_font_header2" id="plabel2" data-toggle="modal" data-target="#f1Sub">Print Shelf Label</button> -->

                                    </div>
                                </div>
                            </div>
                            <!-- cardbody -->
                            </form>
                        </div>
                  </div>
                </div>
          </div>
</body>

<!--Prashant create modal-->
<div class="modal front-login1" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title text-center w-100 m-0 custommodaltitle cashcenter" id="exampleModalLongTitle" style="font-size: 1.5rem;">Ring Sales Login</h5>
        <button type="button" class="close" id="pos_close12" data-dismiss="modal" aria-label="Close" style="font-size: 2.0rem;">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <form action="" method="post" class="front_logins" autocomplete="off">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <div class="col-md-5 m-0 p-0">
                <div class="col-md-12 ">
                  <div class="form-group">
                    <input type="hidden" name="module" value="">
                    <label class="rolllabel" style="font-size: 21px;">Employee ID: *</label> </label>
                  <input type="tel" autofocus="" name="username" id="empid_12" class="form-control customcardinput inputFile11 takeInputLogin" aria-describedby="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="2" style="font-size: 26px;">
                    <span class="errors" id="id2_err" style="color:red; font-size:20px"></span>
                  </div>
                </div>

                <div class="col-md-12 ">
                  <div class="form-group">
                    <label class="rolllabel" style="font-size: 21px;">Employee Password: *</label> </label>
                    <input type="password" name="password" id="emppwd_12" class="form-control customcardinput inputFile11 takeInputLogin" aria-describedby="" maxlength="4" style="font-size: 26px;">
                    <span class="errors" id="pwd2_err" style="color:red; font-size:20px"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-7 m-0 p-0">
                <div class="row m-0 p-0">
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn-btn">7</div>
                  </div>
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn-btn">8</div>
                  </div>
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn-btn">9</div>
                  </div>
                </div>
                <div class="row m-0 p-0">
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn-btn">4</div>
                  </div>
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn-btn">5</div>
                  </div>
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn-btn">6</div>
                  </div>
                </div>
                <div class="row m-0 p-0 mt-2">
                  <div class="col-md-4 m-0">
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn-btn mb-3">1</div>
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn-btn mt-2 backBTN">🠔</div>
                  </div>
                  <div class="col-md-4 m-0">
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn-btn mb-3">2</div>
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn-btn mt-2">0</div>
                  </div>
                  <div class="col-md-4 m-0">
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn-btn mb-3">3</div>
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn-btn2 mt-2"><button type="submit" class="btn btn-primary enterkeypad-btn-btn h-100 w-100" id="btnFront_12">Enter</button></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="text-align: center;"></div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- <div class="modal" tabindex="-1" id='f1S' role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Print Labels</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
        <div class="row"></div>
          <div class="row">
          <div class="col-md-3 mt-4 ">
              <label for="" class="customcardlabel text-nowrap">Number of Label</label> <br>
              <input type="tel" name="" class='use-keyboard-input-num form-control w-100 inputfile6' id="enter_number_of_labels" value="1" required maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
              <span class="errors" id="num_lab_err" style="color:red; font-size:14px"></span>
              <h6 class='mt-2 mb-0'>Select by Tag</h6>
                    <div class="sli-nav d-flex">
                      <div class="sli-chi sc1">Shelf</div>
                      <div class="sli-chi sc2 active">Product</div>
                      <div class="sli-chi sc1">Both</div>
                    </div>
            </div>
          <div class="col-md-9">
              <div class="template-viewcon w-100 p-2 scrollForLabel" >
                <div class="controls-wrappper">
                   <div class="wrapped-content position-relative" id='append_print_label'>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary print_lables_pr">Print</button>
        <button type="button" class="btn btn-dark" id="bleave6">Back</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->

<div id="label_id" style="display:none;"></div>
<!-- sublabel -->
<!-- <div class="modal" tabindex="-1" id='f1Sub' role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Print Labels</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
          <div class="col-md-12">
              <div class="template-viewcon w-100 p-2">
                <div class="controls-wrappper">
                  <div class="wrapped-content position-relative">
                    <div class="sli-r position-absolute">
                    <i class="fa fa-arrow-right loop_right" aria-hidden="true" data-id="1"></i>
                       <input type="hidden" name="loop" value="1" id="arrw_loop">
                    </div>
                    <div class="sli-l position-absolute">
                    <i class="fa fa-arrow-left loop_left" aria-hidden="true" data-id="1"></i></div>
                    <div class="slicon-con">
                      <div class="template" id='bp1'>
                        <div class="w-100 p-3">
                            <div class="first-slabel text-center mx-auto p-0 ">
                                  <div class="d-flex jc-bet">
                                      <div class="imgcon-lbl"><img src="<?=base_url('./uploads/products/012000046445_012000046445_52212056-1.jpg')?>" alt=""></div>
                                      <div class="w-50 bg-yellow">
                                      <div class="lppc-price san h6 bcname ">$1.00</div>
                                      <div class="lpc-price h6 bcname">$1.99</div>
                                  </div>
                                  </div>
                                  <div class="prodname h6 mt-3 mx-auto mb-2">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>
                                  <div class="text-left w-100 color-red bold text-bold upc-lbl">UPC#&emsp;012000046445</div>
                                  <div class="lpc-barcode new text-left  position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg"></div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="slicon-con">
                      <div class="template" id='bp2'>
                        <div class="w-100 p-3">
                            <div class="first-slabel secT text-center mx-auto ">
                                <div class="prodname h6 mx-auto">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>
                                <div class="lpc-barcode hor position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg"> <div class="bar-no position-absolute">012000046445</div></div>
                                <div class="lpc-price h6 bcname">$1.99</div>
                                <div class="lppc-price h6 bcname">$1.00</div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="slicon-con">
                      <div class="template" id='bp3'>
                        <div class="w-100 p-3">
                            <div class="first-slabel text-center mx-auto p-0 ">
                                <div class="">
                                    <div class="w-100 text-center mx-auto">
                                        <div class="lppc-price h-auto h6 amg bcname text-center">
                                            $1.00 <sub>+TAX/CRV</sub>
                                        </div>
                                        <div class="lpc-price h6 bcname">$1.99</div>
                                    </div>
                                </div>
                                <div class="prodname h6 mt-3 mx-auto mb-2">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>
                                <div class="text-left w-100 color-red bold text-bold upc-lbl black">UPC#&emsp;012000046445</div>
                                <div class="lpc-barcode new text-left  position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg"></div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='selectLabel'>Next</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->

<div class="modal" tabindex="-1" id='f1Special' role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Print Labels</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" id="label_type" value="">
      <div class="modal-body">
        <div class="container">
        <div class="row"></div>
          <div class="row">
          <div class="col-md-4 mt-4 ">

              <h6 class='mt-2 mb-0'>Select by Tag</h6>
                    <div class="sli-nav d-flex">
                      <div class="sli-chi sc1 active">Shelf</div>
                      <div class="sli-chi sc2 ">Product</div>
                      <div class="sli-chi sc3">Special</div>
                    </div>
                    <label for="" class="customcardlabel text-nowrap">Number of Label</label> <br>
                    <input type="tel" name="" class='use-keyboard-input-num form-control w-100 inputfile16' id="enter_number_of_special_labels" value="1" required maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    <span class="errors" id="num_lab_err11" style="color:red; font-size:14px"></span>

                    <label for="" class="customcardlabel text-nowrap mt-2 promot_txt" >Promotion Text</label> <br>
                    <input type="text" name="" class='use-keyboard-input-num form-control w-100 inputfile16' id="offer_text" value="Special Offer 10% off" required >
                    <span class="errors" id="offer_text_err" style="color:red; font-size:14px"></span>
            </div>

          <div class="col-md-8">
            <button type="button" class="btn btn-primary show_img">Image</button>
            <button type="button" class="btn btn-secondary hide_img">No Image</button>
              <div class="template-viewcon w-100 p-2 scrollForLabel" >
                <div class="controls-wrappper">
                  <div class="wrapped-content position-relative">
                    <div class="controls-wrappper">
                       <div class="wrapped-content position-relative" id='append_print_label12'></div>
                       <div class="wrapped-content position-relative" id='append_print_label13'></div>
                       <div class="wrapped-content position-relative" id='append_print_label14'></div>
                       <div class="wrapped-content position-relative" id='append_print_label15'></div>
                    </div>

                    <!-- <div class="slicon-con">
                      <div class="template" id='bp1'>
                        <div class="w-100 p-3">
                            <div class="first-slabel secT text-center mx-auto " style="width: 40%;">
                                <div class="prodname h6 mx-auto">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>
                                <div class="lpc-barcode hor position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg"> <div class="bar-no position-absolute">012000046445</div></div>
                                <div class="lpc-price h6 bcname" style="font-size: 1.8rem;">$1.99</div>
                                <div class="lppc-price h6 bcname">$1.00</div>
                            </div>
                        </div>
                      </div>
                    </div> -->
                    <!-- <div class="slicon-con">
                      <div class="template" id='bp2a'>
                        <div class="w-100 p-3">
                            <div class="first-slabel text-center mx-auto p-0 ">
                                  <div class="d-flex jc-bet">
                                      <div class="imgcon-lbl"><img src="<?=base_url('./uploads/products/012000046445_012000046445_52212056-1.jpg')?>" alt=""></div>
                                      <div class="w-50 bg-yellow">
                                      <div class="lppc-price san h6 bcname ">$1.00</div>
                                      <div class="lpc-price h6 bcname">$1.99</div>
                                  </div>
                                  </div>
                                  <div class="prodname h6 mt-3 mx-auto mb-2">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>
                                  <div class="text-left w-100 color-red bold text-bold upc-lbl">UPC#&emsp;012000046445</div>
                                  <div class="lpc-barcode new text-left  position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg"></div>
                            </div>
                        </div>
                      </div>
                    </div> -->

                    <!-- <div class="slicon-con">
                      <div class="template" id='bp2b'>
                        <div class="w-100 p-3">
                            <div class="first-slabel text-center mx-auto p-0 ">
                                <div class="">
                                    <div class="w-100 text-center mx-auto">
                                        <div class="lppc-price h-auto h6 amg bcname text-center">
                                            $1.00 <sub>+TAX/CRV</sub>
                                        </div>
                                        <div class="lpc-price h6 bcname">$1.99</div>
                                    </div>
                                </div>
                                <div class="prodname h6 mt-3 mx-auto mb-2">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>
                                <div class="text-left w-100 color-red bold text-bold upc-lbl black">UPC#&emsp;012000046445</div>
                                <div class="lpc-barcode new text-left  position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg"></div>
                            </div>
                        </div>
                      </div>
                    </div> -->

                    <!-- <div class="slicon-con">
                      <div class="template" id='bp3'>
                        <div class="w-100 p-3">
                            <div class="first-slabel text-center mx-auto p-0 ">
                                  <div class="d-flex jc-bet">
                                      <div class="imgcon-lbl"><img src="<?=base_url('./uploads/products/012000046445_012000046445_52212056-1.jpg')?>" alt=""></div>
                                      <div class="w-50 bg-yellow">
                                      <div class="lppc-price san h6 bcname ">$1.00</div>
                                      <div class="lpc-price h6 bcname">$1.99</div>
                                  </div>
                                  </div>
                                  <div class="prodname mt-2 mx-auto spl-text" style="font-weight: bold;color: darkred;font-size: 16px;">Special Offer 10% off</div>
                                  <div class="prodname h6 mt-3 mx-auto mb-2">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>

                            </div>
                        </div>
                      </div>
                    </div> -->
                  </div>
                   <!-- <div class="wrapped-content position-relative" id='append_print_label12'>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary customcardfooteraddbtn" id="print_spl_Label">Print</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>


<!-- <div class="modal" tabindex="-1" id='print_label_modal' role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Print Labels</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
        <div class="row"></div>
          <div class="row">
          <div class="col-md-3 mt-4 ">
              <label for="" class="customcardlabel text-nowrap">Number of Label</label> <br>
              <input type="tel" name="" class='use-keyboard-input-num form-control w-100 inputfile6' id="enter_number_of_labelssdf" value="1" required maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
              <span class="errors" id="num_lab_errsdf" style="color:red; font-size:14px"></span>
              <h6 class='mt-2 mb-0'>Select by Tag</h6>
                    <div class="sli-nav d-flex">
                      <div class="sli-chi sc1">Shelf</div>
                      <div class="sli-chi sc2 active">Product</div>
                      <div class="sli-chi sc1">Both</div>
                    </div>
            </div>
          <div class="col-md-9">
              <div class="template-viewcon w-100 p-2 scrollForLabel" >
                <div class="controls-wrappper">
                   <div class="wrapped-content position-relative" id='append_print_labelsdf'>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary print_lables_pr">Print</button>
        <button type="button" class="btn btn-dark" id="bleave6sdf">Back</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
<script>
  var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
  var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
</script>
<script src="<?php echo base_url(); ?>assets/cashier/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/cashier/js/inventory_js/edit_product_js.js"></script>

<link rel="stylesheet" href="<?=base_url()?>assets/style/ui@1.11.4/jquery-ui.css">
<script src="<?=base_url()?>assets/js/jquery@1.10.2/jquery-1.10.2.js"></script>
<script src="<?=base_url()?>assets/js/ui@1.11.4/jquery-ui.js"></script>

<script src="<?php echo base_url()?>assets/cashier/js/select2@4.0.8/select2.min.js" defer></script>
<link href="<?php echo base_url().'assets/cashier/style/select2.min.css'; ?>" rel="stylesheet" />
<script src="<?php echo base_url() ?>assets/cashier/js/select2-tab-fix.min.js"></script>

<script src="<?=base_url()?>assets/cashier/js/inventory_js/edit_product_nxt_js.js"></script>
