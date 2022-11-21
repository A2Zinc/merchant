<style>
    .customcardheader1{
      border:none;
      padding-left: 0px;
    }
    .fixfixed{
        margin-top: calc(780px - 925px);
    }
    .customcardlabel{
      color: #000 !important;
    }
    .scrollForLabel{
        max-height: 500px;
        overflow: scroll;
    }
    .dynamic > img {
      height: 140px!important;
      width: 170px!important;
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
                  <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" id="mobileimg" data-toggle="modal" data-target="#exampleModal"></a>
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
                                <div class="col-md-9">
                                  <div class="customcardheader1">
                                      <p style="margin-left:40px;"> Add New Product (UPC #<?php if(!empty($product->barcode_number)){ echo $product->barcode_number; }else{ echo $_GET['upc'];}?>)</p>
                                  </div>
                                </div>
                              <div class="col-md-3 ">
                                <div class="customcardheader1">
                                  <button type="button" class="save-data smbtn" id="btnSave_New">Save Information
                                        <img src="<?php echo base_url(); ?>assets/images/Vector (8).png" alt="" class="pl-2 ">
                                  </button>
                                </div>
                             </div>
                          </div>
                            <!-- cardheader -->
                            <form class="add-product" method="post" action="" enctype="multipart/form-data" autocomplete="off">
                            <div class="customcardbody smbtn dynamic_font_size">
                              <div class="container mb25 ">
                                  <div class="row">
                                      <input type="hidden" class="form-control" id="barcode_formats" name="barcode_formats" value="<?=$product->barcode_formats?>">
                                      <input type="hidden" class="form-control" id="case_upc" name="case_upc" value="<?=$product->barcode_number?>">
                                      <input type="hidden" class="form-control" id="barcode_type" name="barcode_type" value="<?=$product->barcode_type?>">
                                      <input type="hidden" class="form-control" id="mpn" name="mpn" value="<?=$product->mpn?>">
                                       <input type="hidden" class="form-control" id="status" name="status" value="<?=$product->status?>">
                                       <input type="hidden" class="form-control" id="from" name="from" value="<?=$product->from?>">
                                       <!-- <input type="hidden" class="form-control" id="barcode_json" name="barcode_json" value=""> -->
                                       <input type="hidden" class="form-control" id="UPC" name="upc" value="<?=$_GET['upc']?>">
                                       <input type="hidden" class="form-control" id="replicate_PRO" name="replicate_id" value="<?=$_GET['replicate_id']?>">
                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">Product Name <span style="color:#FF0000;">*</span></label>
                                           <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="product_name" aria-describedby="" name="product_name" value="<?php if(empty($_GET['replicate_id'])) { echo $product->product_name;}else{ echo $replicate_product_name;} ?>" plceholder="Please enter Product Name" tabindex="1">
                                          <span class="errors dynamic_font_size_err" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Product Nickname <span style="color:#FF0000;">*</span></label>
                                            <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="nickname"  aria-describedby="" plceholder="Please enter Product Nickname" name="product_nickname" value="<?php if(empty($_GET['replicate_id'])) { echo $product->product_name;}else{ echo $replicate_product_name;} ?>" tabindex="2">
                                            <span class="errors dynamic_font_size_err" id="nname_err" style="color:red; font-size:14px"></span>
                                          </div>
                                       </div>

                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Category <span style="color:#FF0000;">*</span></label>
                                             <select class="form-control select-2-dropdown customcardinput" id="category" name="category_id" style="" tabindex="3">
                                                <option>--Select Category--</option>

                                                    <?php foreach ($category as $c) {?>
                                                      <option value="<?=$c['category_id']?>" <?php if($c['category_id']==$product->category_id){echo 'SELECTED';}?> ><?=$c['category_name']?></option>

                                                   <?php if(!empty($c['sub_cat'])){
                                                      foreach($c['sub_cat'] as $sub_ct1){ ?>
                                                        <option value="<?=$sub_ct1['category_id']?>" <?php if($sub_ct1['category_id']==$product->category_id){echo 'SELECTED';}?> >
                                                          <?=$c['category_name']?> > <?=$sub_ct1['category_name']?>
                                                        </option>
                                                        <?php if(!empty($sub_ct1['child_cat'])){
                                                          foreach($sub_ct1['child_cat'] as $sub_ct2){ ?>
                                                            <option value="<?=$sub_ct2['category_id']?>" <?php if($sub_ct2['category_id']==$product->category_id){echo 'SELECTED';}?> ><?=$c['category_name']?> > <?=$sub_ct1['category_name']?> >
                                                              <?=$sub_ct2['category_name']?>
                                                            </option>
                                                          <?php if(!empty($sub_ct2['grand_cat'])){
                                                            foreach($sub_ct2['grand_cat'] as $grnd_ct){ ?>
                                                          <option value="<?=$grnd_ct['category_id']?>" <?php if($grnd_ct['category_id']==$product->category_id){echo 'SELECTED';}?> >
                                                            <?=$c['category_name']?> > <?=$sub_ct1['category_name']?> >
                                                              <?=$sub_ct2['category_name']?> > <?=$grnd_ct['category_name']?></option>

                                                    <?php } } } } } }?>

                                                <?php } ?>
                                                <option value="0" >Undefined</option>

                                            </select>
                                            <span class="errors dynamic_font_size_err" id="cat_err" style="color:red; font-size:14px"></span>
                                          </div>
                                       </div>

                                      <div class="col-md-3">
                                       <div class="form-group">
                                           <label class="customcardlabel">Units in a Package <span style="color:#FF0000;">*</span></label>
                                          <input list="units" value="<?= isset($product->unit) ? $product->unit : $units[0]['unit_name'] ;?>" onClick="this.select();" name="unit" id="unit" class="form-control customcardinput dynamic_font_size" placeholder="-- Select Unit --" tabindex="4">
                                              <datalist id="units">
                                                <?php foreach($units as $u) { ?>
                                                  <option value="<?=$u['unit_name']?>"><?=$u['unit_name']?></option>
                                                <?php } ?>
                                              </datalist>
                                            <span class="errors dynamic_font_size_err" id="unit_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <div class="col-md-3">
                                       <div class="form-group">
                                           <label class="customcardlabel">Quantity for Inventory<span style="color:#FF0000;">*</span></label>
                                           <input type="number" onClick="this.select();" class=" use-keyboard-input-num form-control customcardinput dynamic_font_size" id="quantity" min="1" aria-describedby="" placeholder="Enter Quantity" name="quantity" value="<?php if(!empty($_GET['replicate_id'])) { echo $product->quantity; }else{ echo  isset($product->package_quantity) ? $product->package_quantity : '' ;}?>">
                                           <span class="errors dynamic_font_size_err" id="qty_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                       <?php $car_id = $product->category_id;
                                             $data1 = $this->Cashier_model->fetch_size($car_id);?>
                                       <input type="hidden" name="measurement_value" id="measurement_value" value="">
                                      <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="customcardlabel">Size</label>
                                             <input list="sizes" onClick="this.select();" name="size" id="size" class="form-control customcardinput size12 dynamic_font_size" placeholder="-- Select Size --" value="<?php if(!empty($_GET['replicate_id'])) { echo $product->size; }else{ echo  '' ;}?>">
                                              <datalist id="sizes">
                                                <?php foreach($data1 as $s) { ?>
                                                  <option value="<?=$s['name']?>"></option>
                                                <?php } ?>
                                              </datalist>
                                            <span class="errors dynamic_font_size_err" id="size_err" style="color:red; font-size:14px"></span>
                                          </div>
                                       </div>

                                       <div class="col-md-3">
                                          <div class="form-group">
                                              <label class="customcardlabel">Reorder Level</label>
                                              <input type="tel" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" aria-describedby="" name="reorder_level" id="reorder_level1" placeholder="Please enter Reorder Level" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6" value="<?php if(!empty($_GET['replicate_id'])) { echo $product->reorder_level; }else{ echo  '';}?>">
                                              <span class="errors dynamic_font_size_err" id="rlevel_err1" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                           <div class="form-group">
                                               <label class="customcardlabel">Producer</label>
                                               <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="producer" aria-describedby="" name="producer" value="<?= isset($product->producer) ? $product->producer : $product->manufacturer ;?>" placeholder="Please enter the Producer">
                                             </div>
                                          </div>

                                           <div class="col-md-4">
                                              <div class="form-group">
                                                <label class="customcardlabel">Supplier</label>
                                                 <input list="suppliers" onClick="this.select();" name="supplier" id="supplier"  class="form-control customcardinput use-keyboard-input dynamic_font_size" placeholder="-- Select Supplier --" value="<?= isset($product->supplier) ? $product->supplier : '' ;?>">
                                                <datalist id="suppliers">
                                                  <?php foreach($supplier as $s) { ?>
                                                    <option value="<?=$s['supplier_name']?>"></option>
                                                  <?php } ?>
                                                </datalist>
                                            </div>
                                          </div>

                                          <?php $brandid =  $product->brand_id; $brand_name = $this->Cashier_model->get_brand_name($brandid); ?>
                                         <div class="col-md-4">
                                           <div class="form-group">
                                               <label for="exampleFormControlSelect1" style="margin-bottom: 0.2rem;">Brand</label>
                                               <input list="brands" onClick="this.select();" name="brand" id="brand" class="form-control customcardinput use-keyboard-input dynamic_font_size"  value="<?= isset($brand_name->brand_name) ? $brand_name->brand_name : $product->brand?>" placeholder="-- Select Brand --">
                                                 <datalist id="brands">
                                                   <?php foreach($brand as $b) { ?>
                                                     <option value="<?=$b['brand_name']?>"></option>
                                                   <?php } ?>
                                                 </datalist>
                                           </div>
                                         </div>

                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="customcardlabel">Supplier Price</label>
                                                      <div style="position:relative;"> <span class="prefix">$</span>
                                                      <input type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num usefloathere dynamic_font_size pl-3" id="supplier_price" aria-describedby="" maxlength="7" name="supplier_price" placeholder="Please enter Supplier Price" value="<?php if(!empty($_GET['replicate_id'])) { echo $product->supplier_price;}else{ echo '';} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                      </div> <span class="errors dynamic_font_size_err" id="price_err" style="color:red; font-size:14px"></span>
                                                  </div>
                                               </div>
                                               <div class="col-md-6" style="display: flex;flex-direction: column;justify-content: space-between;">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1" > Margin Profit in Store</label>
                                                    <label class=" text-secondary" style="font-size:10px;">(In %)</label>
                                                    <div class="probar">
                                                      <input id="rangeInput" type="range" min="0" max="99" oninput="amount.value=rangeInput.value" class="scr" value="0" />
                                                       <input id="amount"  type="tel" onClick="this.select();" value="" min="0" class="form-control pronum store_p use-keyboard-input-num dynamic_font_size pt-1" max="99" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="padding-top:0px; border:0px;"oninput="rangeInput.value=amount.value" />
                                                       <span class="prefix2">%</span>
                                                    </div>
                                                    </div>
                                                    <p class="errors" id="profit_err" style="color:red; font-size:14px;margin-bottom:0;"></p>
                                               </div>
                                                   <div class="col-md-4">
                                                   <div class="form-group">
                                                     <label class="customcardlabel">Store Sell Price <span style="color:#FF0000;">*</span></label>
                                                     <div style="position:relative;">
                                                   <span class="prefix">$</span>
                                                     <input type="tel" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num pl-3 usefloathere dynamic_font_size" id="store_sell_price" onkeyup="this.value = get_float_value(this.value)" aria-describedby="" name="store_sell_price" min="0.01" maxlength="7" placeholder="Please enter Store Sell Price" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php if(!empty($_GET['replicate_id'])) { echo $product->onsale_price;}else{ echo '';} ?>"></div>
                                                     <span class="errors" id="store_sell_err" style="color:red; font-size:14px"></span>
                                                   </div>
                                                   </div>

                                                   <div class="col-md-4">
                                                     <div class="form-group">
                                                         <label class="customcardlabel">Discount</label>
                                                         <div style="position:relative;"> <span class="prefix">$</span>
                                                         <input type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num usefloathere pl-3" id="price_off" aria-describedby="" maxlength="7" placeholder="Discount" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                       </div> <span class="errors" id="price_off_err" style="color:red; font-size:14px"></span>
                                                     </div>
                                                  </div>
                                                   <div class="col-md-4">
                                                    <div class="form-group">
                                                     <label class="customcardlabel">Store Promotion Price</label>
                                                     <div style="position:relative;" >
                                                   <span class="prefix">$</span>
                                                     <input type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num usefloathere pl-3" id="store_promotion_price" aria-describedby="" name="store_promotion_price" maxlength="7"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" readonly></div>
                                                   </div>
                                                  </div>

                                                   <div class="col-md-12">
                                                    <div class="form-group">
                                                      <input type="checkbox" id="ISecommerce" name="is_ecommerce" value="0" <?php echo isset($product->is_ecommerce) ? (($product->is_ecommerce)==1 ? 'checked' : '') : '' ;?>>
                                                        &nbsp;&nbsp;<label class="customcardlabel">  Is E-commerce Product ?</label>
                                                    </div>
                                                  </div>

                                                   <div class="col-md-6 ecell">
                                                   <div class="form-group">
                                                     <label class="customcardlabel">E-commerce Sell Price</label>
                                                     <div style="position:relative;" >
                                                   <span class="prefix">$</span>
                                                     <input type="tel" onClick="this.select();" class="form-control customcardinput usefloathere use-keyboard-input-num dynamic_font_size" id="ecommerce_sell_price" onkeyup="this.value = get_float_value(this.value)" aria-describedby="" name="ecommerce_sell_price" min="0.01" maxlength="7" placeholder="Please enter E-commerce Sell Price" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                   </div>
                                                     <span class="errors" id="ecomm_sell_err" style="color:red; font-size:14px"></span>
                                                   </div>
                                                    </div>
                                                    <div class="col-md-6 emargin" style="display: flex;flex-direction: column;justify-content: space-between;">
                                                <div class="form-group ">
                                                    <label for="exampleFormControlSelect1"style="color: red;"> Margin Profit in Ecommerce</label>
                                                    <label class=" text-secondary" style="font-size:10px;">(In %)</label>
                                                    <div class="probar">
                                                          <input id="rangeInput2" type="range" min="0" max="99" oninput="amount2.value=rangeInput2.value" class="scr" value="0" />
                                                        <input id="amount2" type="tel" onClick="this.select();" value="" min="0" class="form-control pronum ecomm_p use-keyboard-input-num dynamic_font_size" max="99" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="padding-top:0px; border:0px;"oninput="rangeInput2.value=amount2.value" />
                                                        <span class="prefix2">%</span>
                                                     </div>
                                                  </div>
                                                     </div>

                                                       <div class="col-md-6 epromotion">
                                                       <div class="form-group">
                                                     <label class="customcardlabel">E-commerce Promotion Price</label>
                                                     <div style="position:relative;" >
                                                   <span class="prefix">$</span>
                                                     <input type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num usefloathere dynamic_font_size" id="ecommerce_promotion_price" aria-describedby="" name="ecommerce_promotion_price" maxlength="7" placeholder="Please enter E-commerce Promotion Price" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"></div>
                                                   </div>
                                                        </div>

                                                   <div class="col-md-6 edetails">
                                                      <div class="form-group">
                                                          <label class="customcardlabel">Details</label>
                                                          <input type="text"  class="form-control customcardinput use-keyboard-input dynamic_font_size" id="details" aria-describedby="" name="details" placeholder="Please enter the Product Details">
                                                        </div>
                                                     </div>
                                                     <div class="col-md-6 etitle">
                                                      <div class="form-group">
                                                          <label class="customcardlabel">Meta Title</label>
                                                          <input type="text"  class="form-control customcardinput dynamic_font_size" id="Meta_Title" aria-describedby="" name="Meta_Title" placeholder="Please enter Meta Title">
                                                        </div>
                                                     </div>
                                                     <div class="col-md-6 etag">
                                                       <div class="form-group">
                                                           <label class="customcardlabel">Meta Tag</label>
                                                           <input type="text"  class="form-control customcardinput use-keyboard-input dynamic_font_size" id="Meta_Key" aria-describedby="" name="Meta_Key" placeholder="Please enter the Product Tag">
                                                         </div>
                                                      </div>

                                                  <div class="col-md-12 edescription">
                                                <div class="form-group ">
                                                    <label class="customcardlabel">Meta Description
                                                    </label>
                                                    <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="Description" aria-describedby="" name="Meta_Desc" placeholder="Please enter Meta Description">
                                                  </div>
                                               </div>

                                               <div class="col-md-4 eabv">
                                                <div class="form-group">
                                                    <label class="customcardlabel">Alcohol by volume</label>
                                                    <div class="probar">
                                                      <input id="rangeInput3" type="range" min="0" max="99" oninput="amount3.value=rangeInput3.value" class="scr" value="0" />
                                                       <input id="amount3" type="number" min="0" onClick="this.select();" class="form-control pronum use-keyboard-input-num " max="100" name="abv" maxlength="3"  style="padding-top:0px; border:0px;"oninput="rangeInput3.value=amount3.value" />
                                                       <span class="prefix2">%</span>
                                                    </div>
                                                  </div>
                                               </div>
                                               <div class="col-md-4 eproof">
                                                <div class="form-group">
                                                    <label class="customcardlabel">Proof</label>
                                                    <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input" id="proof" aria-describedby="" name="proof" placeholder="Please enter Proof">
                                                    </div>
                                               </div>
                                               <div class="col-md-4 egeo">
                                                 <div class="form-group">
                                                     <label class="customcardlabel">Geography</label>
                                                     <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input" id="region" aria-describedby="" name="region" placeholder="Please enter Geography ">
                                                     </div>
                                                </div>
                                                <?php $parent_dat =  $this->Cashier_model->fetch_product_name_by_id($_GET['replicate_id']);?>
                                                <div class="col-md-6 egeo">
                                                    <div class="form-group">
                                                        <label class="customcardlabel">Parent Product</label>
                                                        <input type="text" class="form-control customcardinput use-keyboard-input" id="parent_product" aria-describedby="" name="parent_product" value="<?=$parent_dat[0]['product_name']?>">
                                                        <input type="hidden" class="form-control use-keyboard-input" name="parent_product_id" id="parent_product_id_select" value="<?=$parent_dat[0]['product_id']?>" />
                                                    </div>
                                                </div>


                                                  <div class="col-md-12">
                                                  <div class="form-group">
                                                          <!-- hidden field use only replicate product -->
                                                    <input type="hidden" id="replicate_CRV" value="<?php if(!empty($_GET['replicate_id']) && $product->Applicable_CRV == 1) {echo 1; }?>">
                                                    <input type="checkbox" id="CRV" name="CRV" value="1" >
                                                    <label class="customcardlabel">Container Deposit </label>&nbsp;&nbsp;
                                                      <!-- hidden field use only replicate product -->
                                                    <input type="hidden" id="replicate_Tax" value="<?php if(!empty($_GET['replicate_id']) && $product->Applicable_Tax == 1) {echo 1; }?>">
                                                    <input class="ml-5" type="checkbox" id="TAX" name="TAX" value="1"  >
                                                    <label class="customcardlabel">TAX </label>
                                                    <input class="ml-5" type="checkbox" id="age" name="age_restrict" value="1" disabled checked>
                                                    <label class="customcardlabel" id="restict"> Age Restricted
                                                     <!--  <span style="color:#6c757d;">(This product is age restricted)</span> -->
                                                    </label>
                                                  </div>
                                                </div>

                                                <div class="container  mb25">
                                                    <p class="formheader dynamic_font_header2"> Product Combo :</p>
                                                    <div class="item-apend mt-4">
                                                        <?php $random = rand(0,9999);?>
                                                        <input type="hidden" name="combo_row[]" value="<?=$random?>" >
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="form-group">
                                                                  <label class="customcardlabel" for="">Combo Name </label>
                                                                  <input type="text" class="form-control customcardinput use-keyboard-input product_combo dynamic_font_size" id="pcombo" data-id="<?=$random?>" name="product_combo_<?=$random?>" aria-describedby="" placeholder="Please enter Combo Name" onkeypress="return onlyAlphabets(event,this);">
                                                                  <span class="errors" id="pcombo_err_<?=$random?>" style="color:red; font-size:14px"></span>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-4">
                                                              <div class="form-group">
                                                                  <label class="customcardlabel">Units in a Combo </label>
                                                                  <input type="tel" class="form-control customcardinput use-keyboard-input-num dynamic_font_size combo_unit_<?=$random?>" id="punit" name="combo_unit_<?=$random?>" aria-describedby="" placeholder="Please enter Units in a Combo" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="2">
                                                                  <span class="errors" id="ucomb_err_<?=$random?>" style="color:red; font-size:14px"></span>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-3">
                                                              <div class="form-group">
                                                                  <label id="dummyclick" class="customcardlabel">Combo Price </label>
                                                                  <div style="position:relative;"> <span class="prefix">$</span>
                                                                      <input type="tel" class="form-control customcardinput use-keyboard-input-num dynamic_font_size pl-3" id="cprice" name="combo_price[]" aria-describedby="" placeholder="Please enter Combo Price" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div>
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
                                                     <div class="dynamic" style="<?php if(!empty($product->images[0])){ echo 'padding-top: 38px;';}else{ echo 'padding-top: 0px;';}?>">
                                                      <input type="hidden" name="product_hidden_img" class="form-control" id="product_hidden_img" value="<?=$product->images[0]?>">
                                                     <img src="<?= isset($product->images[0]) ? $product->images[0] : base_url().'./uploads/products/600px-No_image_available.svg (2).png' ;?>"  alt="" id="product-img">
                                                     <?php if($product->images[0] != ''){?>
                                                          <a href="javascript:;" class="product_image_delete btn btn-secondary" style="position: absolute; padding: 5px;color: red;background:lightyellow;margin-top: 4.8em;left:1em;top: 11.5em; font-size:100%;">Delete Image</a>
                                                     <?php } ?>
                                                   </div>
                                                                                                     </div>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- cardbody -->
                            </form>
                        </div>
                  </div>
                </div>
          </div>

 <div class="modal" tabindex="-1" id='f1S' role="dialog">
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
              <label for="" class="customcardlabel text-nowrap">Enter Number of Labels to Print</label> <br>
              <input type="number" name="" class=' form-control w-100 use-keyboard-input-num'id="" value="1" required min="1">
              <span class="errors" id="num_lab_err" style="color:red; font-size:14px"></span>
              <h6 class='mt-2 mb-0'>Select by Tag</h6>
                    <div class="sli-nav d-flex">
                        <div class="sli-chi sc1">Shelf</div>
                        <div class="sli-chi sc2">Product</div>
                        <div class="sli-chi sc1">Both</div>
                    </div>
            </div>
          <div class="col-md-9">
              <div class="template-viewcon w-100 p-2 scrollForLabel" >
                <div class="controls-wrappper">
                  <div class="wrapped-content position-relative">
                    <div class="slicon-con">
                      <div class="templatee" id='bpe1'>
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
                      <div class="templatee" id='bpe2'>
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
                      <div class="templatee" id='bpe3'>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Print</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- sublabel -->

<div class="modal" tabindex="-1" id='f1Sub' role="dialog">
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
                      <i class="fa fa-arrow-right loop_right" aria-hidden="true"></i>
                    </div>
                    <div class="sli-l position-absolute"><i class="fa fa-arrow-left loop_left" aria-hidden="true"></i></div>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#f1S" data-dismiss="modal">Next</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Prashant create modal-->
<div class="modal front-login1" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title text-center w-100 m-0 custommodaltitle cashcenter" id="exampleModalLongTitle" style="font-size: 1.5rem;">Ring Sales Login</h5>
        <button type="button" class="close" id="pos_close" data-dismiss="modal" aria-label="Close" style="font-size: 2.0rem;">
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

<script>
  var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
  var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
</script>
<script src="<?=base_url()?>assets/cashier/js/inventory_js/new_product_js.js"></script>

<link rel="stylesheet" href="<?=base_url()?>assets/style/ui@1.11.4/jquery-ui.css">
<script src="<?=base_url()?>assets/js/jquery@1.10.2/jquery-1.10.2.js"></script>
<script src="<?=base_url()?>assets/js/ui@1.11.4/jquery-ui.js"></script>
<script src="<?php echo base_url()?>assets/cashier/js/select2@4.0.8/select2.min.js" defer></script>
<link href="<?php echo base_url().'assets/cashier/style/select2.min.css'; ?>" rel="stylesheet" />
<script src="<?php echo base_url() ?>assets/cashier/js/select2-tab-fix.min.js"></script>

<script src="<?=base_url()?>assets/cashier/js/inventory_js/new_product_nxt.js"></script>
