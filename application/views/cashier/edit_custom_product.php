<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard_demo.css">

<body class="signback1 dynamic_font_size">
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
                <a href="<?=base_url('cashier/Cashier/CustomProduct_list')?>"><button class="bckbtn">
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
                            <p style="margin-left:40px;"> Update Custom Product (UPC # <?php echo $product['case_upc'];?>)</p>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="customcardheader1" >
                            <button type= "submit" class="save-data smbtn" id="btnSave_Custom">Save Information
                                  <img src="<?php echo base_url(); ?>assets/images/Vector (8).png" alt="" class="pl-2 ">
                            </button>
                          </div>
                        </div>
                      </div>
                            <!-- cardheader -->
                            <form class="edit-product" method="post" action="" enctype="multipart/form-data" autocomplete="off">
                            <div class="customcardbody smbtn ">
                            <div class="container mb25 ">
                            <div class="row">
                            <input type="hidden" class="form-control" name="product_id" value="<?= isset($product['product_id']) ? $product['product_id'] : '' ;?>">
                            <input type="hidden" class="form-control" id="case_upc" name="case_upc" value="<?= isset($product['case_upc']) ? $product['case_upc'] : '' ;?>">
                            <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">Product Name <span style="color:#FF0000;">*</span></label>
                                           <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input" id="product_name" aria-describedby="" plceholder="Please enter Product Name" name="product_name" value="<?= isset($product['product_name']) ? $product['product_name'] : '' ;?>">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <input type="hidden" id="original_name" name="original_name" value="<?=$product['product_name']?>">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Product Nickname <span style="color:#FF0000;">*</span></label>
                                            <input type="text" class="form-control customcardinput use-keyboard-input" id="nickname"  aria-describedby="" plceholder="Please enter Product Nickname" name="product_nickname" value="<?= isset($product['short_name']) ? $product['short_name'] : '' ;?>">
                                             <span class="errors" id="nname_err" style="color:red; font-size:14px"></span>
                                          </div>
                                       </div>

                                      <div class="col-md-4">
                                       <div class="form-group">
                                        <label for="exampleFormControlSelect1" style="margin-bottom: 0.2rem;">Category <span style="color:#FF0000;">*</span></label>
                                            <select class="form-control select-2-dropdown" id="category" name="category_id">
                                                <?php foreach ($category as $c) {?>
                                                <option class=" use-keyboard-input" value="<?=$c['category_id']?>" <?php if($c['category_id']==$product['category_id']){echo 'SELECTED';}?> ><?=$c['category_name']?></option>
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
                                                <option value="0" <?php if($product['category_id'] == ''){echo 'SELECTED';}?> >Undefined</option>
                                            </select>
                                        <span class="errors" id="cat_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <div class="col-md-3">
                                       <div class="form-group">
                                          <label class="customcardlabel">Units in a Package<span style="color:#FF0000;">*</span></label>
                                          <input list="units" onClick="this.select();" name="unit" id="unit" class="form-control  customcardinput" value="<?= isset($product['unit']) ? $product['unit'] : '' ;?>" placeholder="-- Select Unit --">
                                              <datalist id="units">
                                                <?php foreach($units as $u) { ?>
                                                  <option value="<?=$u['unit_name']?>"><?=$u['unit_name']?></option>
                                                <?php } ?>
                                              </datalist>
                                            <span class="errors" id="unit_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <div class="col-md-3">
                                       <div class="form-group">
                                           <label class="customcardlabel">Quantity for Inventory <span style="color:#FF0000;">*</span></label>
                                           <input type="number" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num" min="1" id="quantity" aria-describedby="" name="quantity" value="<?= isset($product['quantity']) ? $product['quantity'] : '' ;?>" placeholder="Enter Quantity">
                                           <span class="errors" id="qty_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <?php $car_id = $product['category_id'];
                                             $data1 = $this->Cashier_model->fetch_size($car_id);?>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="customcardlabel">Size</label>
                                            <input list="sizes"  name="size" onClick="this.select();" id="size" class="form-control customcardinput " value="<?= isset($product['size']) ? $product['size'] : '' ;?>" placeholder="-- Select Size --">
                                              <datalist id="sizes">
                                                <?php foreach($data1['sizename'] as $s) { ?>
                                                  <option value="<?=$s['name']?>"></option>
                                                <?php } ?>
                                              </datalist>
                                            <span class="errors" id="size_err" style="color:red; font-size:14px"></span>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                              <label class="customcardlabel">Reorder Level</label>
                                              <input type="tel" class="form-control customcardinput use-keyboard-input-num" aria-describedby="" name="reorder_level" id="reorder_level" placeholder="Please enter Reorder Level" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6" value="<?= isset($product['reorder_level']) ? $product['reorder_level'] : '' ;?>">
                                              <span class="errors" id="rlevel_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                           <div class="col-md-4">
                                             <div class="form-group">
                                                 <label class="customcardlabel">Producer</label>
                                                 <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input" id="producer" aria-describedby="" name="producer" value="<?= isset($product['producer']) ? $product['producer'] : '' ;?>" plceholder="Please enter the Producer">
                                               </div>
                                            </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                <label class="customcardlabel">Supplier</label>
                                                <input list="suppliers" onClick="this.select();" name="supplier" id="supplier" class="form-control customcardinput" placeholder="-- Select Supplier --" value="<?= isset($product['supplier']) ? $product['supplier'] : '' ;?>">
                                                <datalist id="suppliers">
                                                  <?php foreach($supplier as $s) { ?>
                                                    <option value="<?=$s['supplier_name']?>"></option>
                                                  <?php } ?>
                                                </datalist>
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                           <div class="form-group">
                                               <label for="exampleFormControlSelect1" style="margin-bottom: 0.2rem;">Brand</label>
                                               <select class="form-control customcardinput " id="brand_id" name="brand_id">
                                                 <?php foreach($brand as $b) { ?>
                                                   <option value="<?=$b['brand_id']?>" <?php if($b['brand_id']==$product['brand_id']){echo 'SELECTED';}?> ><?=$b['brand_name']?></option>  <?php } ?>
                                               </select>
                                           </div>
                                         </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="customcardlabel">Supplier Price</label>
                                                   <div style="position:relative;"> <span class="prefix">$</span>
                                                    <input type="tel" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num usefloathere pl-3" maxlength="7" id="supplier_price" onkeyup="this.value = get_float_value(this.value)" placeholder="Please enter Supplier Price" aria-describedby="" name="supplier_price" value="<?= isset($product['supplier_price']) ? $product['supplier_price'] : '' ;?>" ></div>
                                                    <span class="errors" id="price_err" style="color:red; font-size:14px"></span>
                                                  </div>
                                               </div>

                                               <div class="col-md-6" style="display: flex;flex-direction: column;justify-content: space-between;">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1" > Margin Profit in Store</label>
                                                    <label class=" text-secondary" style="font-size:10px;">(In %)</label>
                                                    <div class="probar">
                                                      <input id="rangeInput" type="range" min="0" max="99" oninput="amount.value=rangeInput.value" class="scr" value="" />
                                                       <input id="amount" onClick="this.select();" type="tel" value="" min="0" class="form-control pronum store_p use-keyboard-input-num usefloathere" max="99" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="padding-top:0px; border:0px;"oninput="rangeInput.value=amount.value" />
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
                                                      <input type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num usefloathere pl-3" id="store_sell_price" aria-describedby="" name="store_sell_price" min="0.01" maxlength="7" placeholder="Please enter Store Sell Price" value="<?= isset($product['store_sell_price']) ? $product['store_sell_price'] : '' ;?>" >
                                                   </div>
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
                                                   <input type="tel" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)"  class="form-control customcardinput use-keyboard-input-num usefloathere pl-3" id="store_promotion_price" aria-describedby="" maxlength="7" name="store_promotion_price" value="<?php if($product['store_promotion']== 0) { echo '';}else{ echo $product['store_promotion']; } ?>" readonly>
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
                                                   <input type="tel" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" class="form-control customcardinput usefloathere use-keyboard-input-num" id="ecommerce_sell_price" aria-describedby="" name="ecommerce_sell_price" min="0.01" placeholder="Please enter E-commerce Sell Price" maxlength="7"  value="<?php if($product['ecomm_sell_price']== 0) { echo '';}else{ echo $product['ecomm_sell_price']; } ?>">
                                                    </div>
                                                     <span class="errors" id="ecomm_sell_err" style="color:red; font-size:14px"></span>
                                                   </div>
                                                    </div>
                                                    <div class="col-md-4" style="display: flex;flex-direction: column;justify-content: space-between;">
                                                  <div class="form-group emargin">
                                                    <label for="exampleFormControlSelect1"style="color: red;"> Margin Profit in Ecommerce</label>
                                                    <label class=" text-secondary" style="font-size:10px;">(In %)</label>
                                                    <div class="probar">
                                                          <input id="rangeInput2" type="range" min="0" max="99" oninput="amount2.value=rangeInput2.value" class="scr" value="" />
                                                        <input id="amount2" onClick="this.select();" type="tel" value="" min="0" class=" form-control usefloathere use-keyboard-input-num pronum ecomm_p" max="99" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="padding-top:0px; border:0px;"oninput="rangeInput2.value=amount2.value" />
                                                        <span class="prefix2">%</span>
                                                      </div>
                                                  </div>
                                                     </div>
                                                    <div class="col-md-6 epromotion" >
                                                       <div class="form-group">
                                                    <label class="customcardlabel">E-commerce Promotion Price</label>
                                                    <div style="position:relative;" >
                                                   <span class="prefix">$</span>
                                                   <input type="tel" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)"   class="usefloathere use-keyboard-input-num form-control customcardinput" id="ecommerce_promotion_price" aria-describedby="" maxlength="7" name="ecommerce_promotion_price" placeholder="Please enter E-commerce Promotion Price" value="<?php if($product['ecomm_promotion']== 0) { echo '';}else{ echo $product['ecomm_promotion']; } ?>" >

                                                  </div>
                                                   </div>
                                                        </div>
                                                   <div class="col-md-6 edetails">
                                                      <div class="form-group">
                                                          <label class="customcardlabel">Details</label>
                                                          <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input" id="details" aria-describedby="" name="details" value="<?= isset($product['product_details']) ? $product['product_details'] : '' ;?>" placeholder="Please enter the Product Details">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 etitle">
                                                      <div class="form-group">
                                                          <label class="customcardlabel">Meta Title</label>
                                                          <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input" id="tilte" aria-describedby="" name="Meta_Title" value="<?= isset($product['Meta_Title']) ? $product['Meta_Title'] : '' ;?>" placeholder="Please enter Meta Title">
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6 etag">
                                                       <div class="form-group">
                                                           <label class="customcardlabel">Meta Tag</label>
                                                           <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input" id="Meta_Key" aria-describedby="" name="Meta_Key" value="<?= isset($product['Meta_Key']) ? $product['Meta_Key'] : '' ;?>" placeholder="Please enter the Product Tag">
                                                         </div>
                                                      </div>

                                                      <div class="col-md-12 edescription">
                                                        <div class="form-group">
                                                            <label class="customcardlabel">Meta Description
                                                            </label>
                                                            <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input" id="Description" aria-describedby="" name="Meta_Desc" value="<?= isset($product['Meta_Desc']) ? $product['Meta_Desc'] : '' ;?>" placeholder="Please enter Meta Description">
                                                          </div>
                                                       </div>

                                                <div class="col-md-4 eabv">
                                                  <div class="form-group">
                                                      <label class="customcardlabel">Alcohol by volume</label>
                                                      <div class="probar">
                                                        <input id="rangeInput3" type="range" min="0" max="99" oninput="amount3.value=rangeInput3.value" class="scr" value="" />
                                                         <input id="amount3" onClick="this.select();" type="number" min="0" class="form-control pronum usefloathere use-keyboard-input-num" max="100" name="abv" maxlength="3" value="<?= isset($product['abv']) ? $product['abv'] : '' ;?>" style="padding-top:0px; border:0px;"oninput="rangeInput3.value=amount3.value" />
                                                         <span class="prefix2">%</span>
                                                      </div>
                                                    </div>
                                                </div>
                                               <div class="col-md-4 eproof">
                                                <div class="form-group">
                                                    <label class="customcardlabel">Proof</label>
                                                    <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input" id="proof" aria-describedby="" name="proof" value="<?= isset($product['proof']) ? $product['proof'] : '' ;?>" placeholder="Please enter Proof">
                                                  </div>
                                               </div>
                                               <div class="col-md-4 egeo">
                                                 <div class="form-group">
                                                     <label class="customcardlabel">Geography</label>
                                                     <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input" id="region" aria-describedby="" name="region" value="<?= isset($product['region']) ? $product['region'] : '' ;?>"  placeholder="Please enter Geography ">
                                                   </div>
                                                </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                    <input type="checkbox" id="CRV" name="CRV" value="1" <?php echo isset($product['Applicable_CRV']) ? (($product['Applicable_CRV'])==1 ? 'checked' : '') : '' ;?>>
                                                    <label class="customcardlabel">  Container Deposit </label>&nbsp;&nbsp;
                                                    <input class="ml-5" type="checkbox" id="TAX" name="TAX" value="1" <?php echo isset($product['Applicable_Tax']) ? (($product['Applicable_Tax'])==1 ? 'checked' : '') : '' ;?>>
                                                    <label class="customcardlabel">  TAX </label>

                                                    <input class="ml-5" type="checkbox" id="age" name="age_restrict" value="1" disabled checked>
                                                    <label class="customcardlabel" id="restict"> Age Restricted
                                                   </label>

                                                  </div>
                                                </div>
                                                <div class="container  mb25">
                                                    <p class="formheader"> Product Combo :</p>
                                                    <div class="item-apend mt-4">
                                                      <?php $product_id = $product['id'];
                                                        $combo = $this->Cashier_model->get_combo_productdata($product_id);
                                                      ?>
                                                      <?php if(!empty($combo)){ foreach ($combo as $val) { ?>
                                                        <div class="row">
                                                          <input type="hidden" name="combo_id" value="<?=$val['id']?>">
                                                          <div class="col-md-4">
                                                              <div class="form-group">
                                                                  <label class="customcardlabel" for="">Combo Name</label>
                                                                  <input type="text" class="form-control customcardinput use-keyboard-input" id="pcombo" name="product_combo[]" aria-describedby="" placeholder="Please enter Combo Name" onkeypress="return onlyAlphabets(event,this);" value="<?=$val['product_combo']?>">
                                                                  <span class="errors" id="pcombo_err" style="color:red; font-size:14px"></span>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-4">
                                                              <div class="form-group">
                                                                  <label class="customcardlabel">Units in a Combo </label>
                                                                  <input type="text" class="form-control customcardinput use-keyboard-input-num" id="punit" name="combo_unit[]" aria-describedby="" placeholder="Please enter Units in a Combo" onkeyup="ValidateCEmail();" value="<?=$val['combo_unit']?>">
                                                                  <span class="errors" id="ucomb_err" style="color:red; font-size:14px"></span>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-3">
                                                              <div class="form-group">
                                                                  <label id="dummyclick" class="customcardlabel">Combo Price </label>
                                                                  <div style="position:relative;"> <span class="prefix">$</span>
                                                                      <input type="tel" class="form-control customcardinput use-keyboard-input-num usefloathere pl-3" id="cprice" name="combo_price[]" aria-describedby="" placeholder="Please enter Combo Price" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" value="<?=$val['combo_price']?>">
                                                                  </div>
                                                                  <span class="errors" id="combo_err" style="color:red; font-size:14px"></span>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-1">
                                                            <button type="button" class="btn btn-light apend_button removeNominee">-</button>
                                                          </div>
                                                        </div>
                                                      <?php } }else{?>
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="form-group">
                                                                  <label class="customcardlabel" for="">Combo Name</label>
                                                                  <input type="text" class="form-control customcardinput use-keyboard-input" id="pcombo" name="product_combo[]" aria-describedby="" placeholder="Please enter Combo Name" onkeypress="return onlyAlphabets(event,this);">
                                                                  <span class="errors" id="pcombo_err" style="color:red; font-size:14px"></span>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-4">
                                                              <div class="form-group">
                                                                  <label class="customcardlabel">Units in a Combo </label>
                                                                  <input type="text" class="form-control customcardinput use-keyboard-input-num" id="punit" name="combo_unit[]" aria-describedby="" placeholder="Please enter Units in a Combo" onkeyup="ValidateCEmail();">
                                                                  <span class="errors" id="ucomb_err" style="color:red; font-size:14px"></span>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-3">
                                                              <div class="form-group">
                                                                  <label id="dummyclick" class="customcardlabel">Combo Price </label>
                                                                  <div style="position:relative;"> <span class="prefix">$</span>
                                                                    <input type="tel" class="form-control customcardinput use-keyboard-input-num usefloathere pl-3" id="cprice" name="combo_price[]" aria-describedby="" placeholder="Please enter Combo Price" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();">
                                                                  </div>
                                                                  <span class="errors" id="combo_err" style="color:red; font-size:14px"></span>
                                                              </div>
                                                          </div>
                                                          <!-- prashant add 31 July below div -->
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
                                                     <div class="dynamic">
                                                    <?php if($product['product_image'] == './uploads/products/600px-No_image_available.svg (2).png') {?>
                                                        <img src="<?php echo base_url('assets/images/600px-No_image_available.svg (2).png')?>" alt="">
                                                     <?php }else{?>
                                                        <img src="<?php echo isset($product['product_image']) ? base_url($product['product_image']) : ''; ?>" alt="">
                                                        <?php if($product['product_image'] != "") { ?>
                                                        <a href="javascript:;" class="product_image_delete" data-product_id="<?= isset($product['product_id']) ? $product['product_id'] : '' ;?>" style="position: absolute; padding-top: 20px;color: red;">X</a>
                                                        <?php } ?>
                                                     <?php } ?>
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

<script src="<?php echo base_url()?>assets/cashier/js/select2@4.0.8/select2.min.js" defer></script>
<link href="<?php echo base_url().'assets/cashier/style/select2.min.css'; ?>" rel="stylesheet" />

<script src="<?=base_url()?>assets/cashier/js/inventory_js/edit_custom_product_js.js"></script>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
