<div class="container-fluid mt20">
             <div class="row">
               <div class="col-md-12">

                     <div class="customcard">
                         <div class="customcardheader">
                              <div class="row">
                                <div class="col-md-5">
                                  <p>Update product (UPC #<?php echo $product['case_upc'];?>)</p>
                                </div>
                                <div class="col-md-7">
                                  <div id="message"></div>
                                </div>
                              </div>                                
                          </div>
                         <!-- cardheader -->
                        <form action="" method="post" class="edit-product" enctype="multipart/form-data" autocomplete="off"> 
                         
                         <div class="customcardbody ">
                              <div class="container mb25 ">
                                  <div class="row">
                                      <input type="hidden" class="form-control" name="product_id" value="<?= isset($product['product_id']) ? $product['product_id'] : '' ;?>">
                                     
                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">Product Name*</label>
                                           <input type="text" onClick="this.select();" class="form-control customcardinput" id="product_name" aria-describedby="" plceholder="Please enter Product Name" name="product_name" value="<?= isset($product['product_name']) ? $product['product_name'] : '' ;?>">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>

                                      
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Product Nickname*</label>
                                            <input type="text" onClick="this.select();" class="form-control customcardinput" id="nickname"  aria-describedby="" plceholder="Please enter Product Nickname" name="product_nickname" value="<?= isset($product['short_name']) ? $product['short_name'] : '' ;?>">
                                             <span class="errors" id="nname_err" style="color:red; font-size:14px"></span>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Product UPC*</label>
                                            <input type="text" onClick="this.select();" class="form-control customcardinput" id="UPC"  aria-describedby="" plceholder="Please enter Product UPC" name="case_upc" value="<?= isset($product['case_upc']) ? $product['case_upc'] : '' ;?>" readonly>
                                            <span class="errors" id="upc_err" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                       <div class="form-group">
                                        <label for="exampleFormControlSelect1" style="color: red;margin-bottom: 0.2rem;">Category*</label>
                                            <select class="form-control select-2-dropdown" id="category" name="category_id">
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
                                           
                                        <span class="errors" id="cat_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>

                                      <div class="col-md-4">
                                       <div class="form-group">
                                          <label class="customcardlabel">Unit In a package*</label>
                                          <input list="units" onClick="this.select();" name="unit" id="unit" class="form-control customcardinput" value="<?= isset($product['unit']) ? $product['unit'] : '' ;?>" placeholder="-- Select Unit --">
                                              <datalist id="units">
                                                <?php foreach($units as $u) { ?>
                                                  <option value="<?=$u['unit_name']?>"><?=$u['unit_name']?></option>
                                                <?php } ?>  
                                              </datalist>
                                            <span class="errors" id="unit_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <div class="col-md-4">
                                       <div class="form-group">
                                           <label class="customcardlabel">Quantity for Inventory*</label>
                                           <input type="number" onClick="this.select();" class="form-control customcardinput" min="1" id="quantity" aria-describedby="" name="quantity" value="<?= isset($product['quantity']) ? $product['quantity'] : '' ;?>" placeholder="Enter Quantity">
                                           <span class="errors" id="qty_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <?php $car_id = $product['category_id']; 
                                             $data1 = $this->Products->fetch_size($car_id);?>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="customcardlabel">Size</label>
                                            <input list="sizes"  name="size" onClick="this.select();" id="size" class="form-control customcardinput" value="<?= isset($product['size']) ? $product['size'] : '' ;?>" placeholder="-- Select Size --">
                                              <datalist id="sizes">
                                                <?php foreach($data1['sizename'] as $s) { ?>
                                                  <option value="<?=$s['name']?>"><?=$s['name']?></option>
                                                <?php } ?>  
                                              </datalist>
                                            <span class="errors" id="size_err" style="color:red; font-size:14px"></span>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1" style="color: red;margin-bottom: 0.2rem;">Brand</label>
                                            <select class="form-control customcardinput" id="brand_id" name="brand_id">
                                              <?php foreach($brand as $b) { ?>
                                                <option value="<?=$b['brand_id']?>" <?php if($b['brand_id']==$product['brand_id']){echo 'SELECTED';}?> ><?=$b['brand_name']?></option>  <?php } ?>  
                                            </select>
                                        </div>
                                      </div>
                                        
                                           <div class="col-md-3">
                                             <div class="form-group">
                                                 <label class="customcardlabel">Producer</label>
                                                 <input type="text" onClick="this.select();" class="form-control customcardinput" id="producer" aria-describedby="" name="producer" value="<?= isset($product['producer']) ? $product['producer'] : '' ;?>" plceholder="Please enter the Producer">
                                                 <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                               </div>
                                            </div>
                                            
                                        
                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="customcardlabel">Supplier</label>
                                                <input type="text" onClick="this.select();" class="form-control customcardinput" id="supplier" aria-describedby="" name="supplier" value="<?= isset($product['supplier']) ? $product['supplier'] : '' ;?>" plceholder="Please enter Supplier Name">
                                              </div>
                                           </div> -->    
                                          <div class="col-md-3">
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
                                            

                                               
                                                   <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="customcardlabel">Supplier Price</label>
                                                   <div class="position-relative">
                                                      <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                    <input type="tel" onClick="this.select();" class="form-control customcardinput" maxlength="7" id="supplier_price" onkeyup="this.value = get_float_value(this.value)" placeholder="Please enter Supplier Price" aria-describedby="" name="supplier_price" value="<?= isset($product['supplier_price']) ? $product['supplier_price'] : '' ;?>" ></div> 
                                                    <span class="errors" id="price_err" style="color:red; font-size:14px"></span>
                                                  </div>
                                               </div>  

                                               <div class="col-md-6" style="display: flex;flex-direction: column;justify-content: space-between;">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1" style="color: red;"> Margin Profit in Store</label>
                                                    <label class=" text-secondary" style="font-size:10px;">(In %)</label>
                                                    <div class="probar">
                                                      <!-- <input type="range" class="custom-range scr store_p custom" name="profit_store" min="0" max="100" value="0%" id="myRange2" oninput="amount.value=myRange2.value" > -->
                                                      <!-- <span class=" pronum" id="percent">%</span> -->
                                                      <input id="rangeInput" type="range" min="0" max="99" oninput="amount.value=rangeInput.value" class="scr" value="" />
                                                       <input id="amount" onClick="this.select();" type="tel" value="" min="0" class=" pronum store_p" max="99" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="padding-top:0px; border:0px;"oninput="rangeInput.value=amount.value" />                
                                                       <span class="prefix2">%</span>

                                                        </div>
                                                    
                                                    </div>
                                                          <p class="errors" id="profit_err" style="color:red; font-size:14px;margin-bottom:0;"></p> 
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                     <label class="customcardlabel">Store Sell Price*</label>
                                                   <div class="position-relative">
                                                      <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                     <input type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" class="form-control customcardinput" id="store_sell_price" aria-describedby="" name="store_sell_price" min="0.01" maxlength="7" placeholder="Please enter Store Sell Price" value="<?= isset($product['store_sell_price']) ? $product['store_sell_price'] : '' ;?>" >
                                                   </div>
                                                     <span class="errors" id="store_sell_err" style="color:red; font-size:14px"></span>
                                                   </div>
                                                   </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label class="customcardlabel">Store Promotion Price</label>
                                                    <div class="position-relative">
                                                      <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                   <input type="tel" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)"  class="form-control customcardinput" id="store_promotion_price" aria-describedby="" maxlength="7" name="store_promotion_price" placeholder="Please enter Store Promotion Price"  value="<?php if($product['store_promotion']== 0) { echo '';}else{ echo $product['store_promotion']; } ?>">

                                                  </div>
                                                     <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
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
                                                     <div class="position-relative">
                                                        <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                   <input type="tel" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" class="form-control customcardinput" id="ecommerce_sell_price" aria-describedby="" name="ecommerce_sell_price" min="0.01" placeholder="Please enter E-commerce Sell Price" maxlength="7"  value="<?php if($product['ecomm_sell_price']== 0) { echo '';}else{ echo $product['ecomm_sell_price']; } ?>">

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
                                                        <input id="amount2" onClick="this.select();" type="tel" value="" min="0" class=" pronum ecomm_p" max="99" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="padding-top:0px; border:0px;"oninput="rangeInput2.value=amount2.value" />                                                
                                                        <span class="prefix2">%</span>

                                                      </div>
                                                     
                                                  </div>                                                   
                                                     </div>

                                                    <div class="col-md-6 epromotion" >
                                                       <div class="form-group">
                                                    <label class="customcardlabel">E-commerce Promotion Price</label>
                                                    <div class="position-relative">
                                                      <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                   <input type="tel" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)"   class="form-control customcardinput" id="ecommerce_promotion_price" aria-describedby="" maxlength="7" name="ecommerce_promotion_price" placeholder="Please enter E-commerce Promotion Price" value="<?php if($product['ecomm_promotion']== 0) { echo '';}else{ echo $product['ecomm_promotion']; } ?>" >

                                                  </div> 
                                                     <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                   </div>
                                                        </div>


                                                   <div class="col-md-6 edetails">
                                                      <div class="form-group">
                                                          <label class="customcardlabel">Details</label>
                                                          <input type="text" onClick="this.select();" class="form-control customcardinput" id="details" aria-describedby="" name="details" value="<?= isset($product['product_details']) ? $product['product_details'] : '' ;?>" placeholder="Please enter the Product Details">
                                                          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 etitle">
                                                      <div class="form-group">
                                                          <label class="customcardlabel">Meta Title</label>
                                                          <input type="text" onClick="this.select();" class="form-control customcardinput" id="tilte" aria-describedby="" name="Meta_Title" value="<?= isset($product['Meta_Title']) ? $product['Meta_Title'] : '' ;?>" placeholder="Please enter Meta Title">
                                                          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6 etag">
                                                       <div class="form-group">
                                                           <label class="customcardlabel">Meta Tag</label>
                                                           <input type="text" onClick="this.select();" class="form-control customcardinput" id="Meta_Key" aria-describedby="" name="Meta_Key" value="<?= isset($product['Meta_Key']) ? $product['Meta_Key'] : '' ;?>" placeholder="Please enter the Product Tag">
                                                           <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                         </div>
                                                      </div>
             
                                                      <div class="col-md-12 edescription">
                                                        <div class="form-group">
                                                            <label class="customcardlabel">Meta Description
                                                            </label>
                                                            <input type="text" onClick="this.select();" class="form-control customcardinput" id="Description" aria-describedby="" name="Meta_Desc" value="<?= isset($product['Meta_Desc']) ? $product['Meta_Desc'] : '' ;?>" placeholder="Please enter Meta Description">
                                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                          </div>
                                                       </div>

                                                <div class="col-md-4 eabv">
                                                  <div class="form-group">
                                                      <label class="customcardlabel">Alcohol by volume</label>
                                                      <div class="probar">
                                                        <input id="rangeInput3" type="range" min="0" max="99" oninput="amount3.value=rangeInput3.value" class="scr" value="" />
                                                         <input id="amount3" onClick="this.select();" type="number" min="0" class=" pronum " max="100" name="abv" maxlength="3" value="<?= isset($product['abv']) ? $product['abv'] : '' ;?>" style="padding-top:0px; border:0px;"oninput="rangeInput3.value=amount3.value" />
                                                         <span class="prefix2">%</span>         
                                                      </div>
                                                    </div>
                                                </div>
                                               <div class="col-md-4 eproof">
                                                <div class="form-group">
                                                    <label class="customcardlabel">Proof</label>
                                                    <input type="text" onClick="this.select();" class="form-control customcardinput" id="proof" aria-describedby="" name="proof" value="<?= isset($product['proof']) ? $product['proof'] : '' ;?>" placeholder="Please enter Proof">
                                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                  </div>
                                               </div>
                                               <div class="col-md-4 egeo">
                                                 <div class="form-group">
                                                     <label class="customcardlabel">Geography</label>
                                                     <input type="text" onClick="this.select();" class="form-control customcardinput" id="region" aria-describedby="" name="region" value="<?= isset($product['region']) ? $product['region'] : '' ;?>"  placeholder="Please enter Geography ">
                                                     <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
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
                                                   <!--   <span style="color:#6c757d;">(This product is age restricted)</span> -->
                                                   </label>
                                                    
                                                  </div>
                                                </div>     
                                                    <div class="col-md-6">
                                                       <div class="form-group">
                                                     <label class="customcardlabel">Display Image</label>
                                                     <div class="dynamic">
                                                     
                                                    <?php if($product['product_image'] == './uploads/products/600px-No_image_available.svg (2).png') {?>
                                                        <img src="<?php echo base_url('assets/images/600px-No_image_available.svg (2).png')?>" alt="">
                                                     <?php }else{?>
                                                        <img style="width: 200px;" src="<?php echo isset($product['product_image']) ? base_url($product['product_image']) : ''; ?>" alt="" id="displayimg">
                                                        <a href='' type="button" class="btn btn-outline-dark btn-sm customfootercancelbtn deleteimg">Delete</a>
                                                     <?php } ?>
                                                   </div>
                                                        </div>  
                                                      </div>
                                                        <div class="col-md-6">
                                                     
                                                       <div class="wrap-custom-file">                                                     
                                                            <input type="file" name="product_hidden_img1" id="image1" accept=".gif, .jpg, .png" />
                                                            <label  for="image1">
                                                              <span>Select Product Image</span>
                                                              <i class="fa fa-plus-circle"></i>
                                                            </label>
                                                          </div>
                                                  </div>


                                        
                                        </div>
                 

                               
                            </div>
                            <!-- cardbody -->
                            
                         <!-- cardbody -->
                         <div class="customcardfooter">
                           
                     </div>
                  
               </div>

             </div>
              <div style="text-align: center;">
                                <a href='<?=base_url('Cproduct/manage_product')?>' type="button" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Update</button>
                            </div>
                         </div>
                         </form>
       </div>


<script src="<?php echo base_url().'assets/cashier/js/select2.min.js'; ?>"></script>
<link href="<?php echo base_url().'assets/cashier/style/select2.min.css'; ?>" rel="stylesheet" />
<link href="<?php echo base_url().'assets/cashier/style/customestyle.css'; ?>" rel="stylesheet" />

<script>
$('input[type="file"]').each(function(){
  // Refs
  var $file = $(this),
      $label = $file.next('label'),
      $labelText = $label.find('span'),
      labelDefault = $labelText.text();

  // When a new file is selected
  $file.on('change', function(event){
    var fileName = $file.val().split( '\\' ).pop(),
        tmppath = URL.createObjectURL(event.target.files[0]);
    //Check successfully selection
    if( fileName ){
      $label
        .addClass('file-ok')
        .css('background-image', 'url(' + tmppath + ')');
      $labelText.text(fileName);
    }else{
      $label.removeClass('file-ok');
      $labelText.text(labelDefault);
    }
  });

// End loop of file input elements
});
</script>
<style type="text/css">
  /*** CUSTOM FILE INPUT STYE ***/
.wrap-custom-file {
  position: relative;
  display: inline-block;
  width: 200px;
  height: 150px;
  margin: 0 0.5rem 1rem;
  text-align: center;
}
.wrap-custom-file input[type="file"] {
  position: absolute;
  top: 0;
  left: 0;
  width: 2px;
  height: 2px;
  overflow: hidden;
  opacity: 0;
}
.wrap-custom-file label {
  z-index: 1;
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  overflow: hidden;
  padding: 0 0.5rem;
  cursor: pointer;
  background-color: #fff;
  border-radius: 4px;
  -webkit-transition: -webkit-transform 0.4s;
  transition: -webkit-transform 0.4s;
  transition: transform 0.4s;
  transition: transform 0.4s, -webkit-transform 0.4s;
}
.wrap-custom-file label span {
  display: block;
  margin-top: 2rem;
  font-size: 1.4rem;
  color: #777;
  -webkit-transition: color 0.4s;
  transition: color 0.4s;
}
.wrap-custom-file label .fa {
  position: absolute;
  bottom: 1rem;
  left: 50%;
  -webkit-transform: translatex(-50%);
  transform: translatex(-50%);
  font-size: 1.5rem;
  color: lightcoral;
  -webkit-transition: color 0.4s;
  transition: color 0.4s;
}
.wrap-custom-file label:hover {
  -webkit-transform: translateY(-1rem);
  transform: translateY(-1rem);
}
.wrap-custom-file label:hover span, .wrap-custom-file label:hover .fa {
  color: #333;
}
.wrap-custom-file label.file-ok {
  background-size: cover;
  background-position: center;
}
.wrap-custom-file label.file-ok span {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 0.3rem;
  font-size: 1.1rem;
  color: #000;
  background-color: rgba(255, 255, 255, 0.7);
}
.wrap-custom-file label.file-ok .fa {
  display: none;
}
</style>

<script type="text/javascript">

  $(document).on('click','.deleteimg',function(){
  $('#displayimg').remove();
  $('.deleteimg').css("display","none");
  return false;
});

  $(document).ready(function() {
    var abv = $('#amount3').val();
    if(abv != ''){
      $('#rangeInput3').val(abv);
    }else{
      $('#rangeInput3').val(0);
    }
    

    if($('#ISecommerce').val()== 0){
        $('.ecell').hide();
        $('.emargin').hide();
        $('.epromotion').hide();
        $('.edetails').hide();
        $('.etitle').hide();
        $('.etag').hide();
        $('.edescription').hide();
        $('.eabv').hide();
        $('.eproof').hide();
        $('.egeo').hide();
    }else{
        $('.ecell').show();
        $('.emargin').show();
        $('.epromotion').show();
        $('.edetails').show();
          $('.etitle').show();
          $('.etag').show();
          $('.edescription').show();
          $('.eabv').show();
          $('.eproof').show();
         $('.egeo').show();
    }
    $('.select-2-dropdown').select2();
  });

  $('#ISecommerce').change(function() {
       if(this.checked) {
        $('#ISecommerce').val(1);
        $('.ecell').show();
        $('.emargin').show();
        $('.epromotion').show();
        $('.edetails').show();
          $('.etitle').show();
          $('.etag').show();
          $('.edescription').show();
          $('.eabv').show();
          $('.eproof').show();
         $('.egeo').show();
      }else{
        $('#ISecommerce').val(0);
        $('.ecell').hide();
        $('.emargin').hide();
        $('.epromotion').hide();
        $('.edetails').hide();
        $('.etitle').hide();
        $('.etag').hide();
        $('.edescription').hide();
        $('.eabv').hide();
        $('.eproof').hide();
        $('.egeo').hide();
      }
   });

    $('#size').on('input', function() {
      $(this).val($(this).val().replace(/[^a-z0-9./ ]/gi, ''));
    }); 
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>         -->
<script type="text/javascript">

    $('#btnSave').click(function(){
      var supplier_price = parseFloat($('#supplier_price').val());
       var sell_price = parseFloat($('#store_sell_price').val());
       
      if($('#product_name').val() == '') {
          $("#name_err").html("Please enter the Product Name").show();
          return false;
      }
      if($('#nickname').val() == '') {
          $("#nname_err").html("Please enter the Product Nickname").show();
          return false;
      }
      if($('#UPC').val() == '') {
          $("#upc_err").html("Please enter the Product UPC").show();
          return false;
      }
      if($('#category').val() == '--Select Category--'){
          $("#cat_err").html("Please select Category").show();
          return false;
      }
      if($('#unit').val() == ''){
            $("#unit_err").html("Please select number of Unit").show();
            return false;
      }
      if($('#quantity').val() == '' || $('#quantity').val() == 0){
          $("#qty_err").html("Please enter Quantity").show();
          return false;
      }
      // if($('#size').val() == '') {
      //     $("#size_err").html("Please select the Product Size").show();
      //     return false;
      // }

      if($('#size').val() != ''){
          if(!($('#size').val().indexOf(' ml') > -1 || $('#size').val().indexOf(' oz') > -1 || $('#size').val().indexOf(' liter') > -1)){
            $("#size_err").html("only support oz, ml, liter format. (ex. 100 ml)").show();
            return false;
          }
        }
      // if(!($('#size').val().indexOf(' ml') > -1 || $('#size').val().indexOf(' oz') > -1 || $('#size').val().indexOf(' liter') > -1)){
      //     $("#size_err").html("only support oz, ml, liter format. (ex. 100 ml)").show();
      //     return false;
      // }
      if($('#store_sell_price').val() == '' || $('#store_sell_price').val() == '0' || $('#store_sell_price').val() == '0.00' || $('#store_sell_price').val() == '00' || $('#store_sell_price').val() == '000' || $('#store_sell_price').val() == '0000'|| $('#store_sell_price').val() == '00000' || $('#store_sell_price').val() == '000000' || $('#store_sell_price').val() == '0000000'){
          $("#store_sell_err").html("Please enter Store Sell Price").show();
          return false;

      }
      if(parseFloat(supplier_price) >= parseFloat(sell_price)){
          $("#store_sell_err").html("Store sell Price is not less than or equal supplier price, Please enter correct Store Sell price").show();
          return false;
      }

      if($('#ecommerce_sell_price').val() != ''){
          if(parseFloat(supplier_price) >= parseFloat($('#ecommerce_sell_price').val()) ){
            $("#ecomm_sell_err").html("E-commerce sell Price is not less than or equal supplier price, Please enter correct E-commerce Sell price").show();
            return false;
          }
      }

      if(supplier_price == '0' || supplier_price == '0.00' || supplier_price == '00' || supplier_price == '000' || supplier_price == '0000'|| supplier_price == '00000' || supplier_price == '000000' || supplier_price == '0000000'){
        $("#price_err").html("Please enter correct Supplier Price").show();
        return false;
      }

      if(supplier_price == ''){
          $('#rangeInput').val('0');
          $('#rangeInput').attr('max', 0);
          $('#amount').val('');
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }
        
      var formdata = $('.edit-product')[0];
      $.ajax({
          url: "<?=base_url('Cproduct/updateproduct')?>",
          type:"post",
          data:new FormData(formdata),
          processData:false,
          contentType:false,
          dataType : 'json', 
          cache:false,
          async:false,
          success: function(data){
            console.log(data);
               $('#message').html('');
                  if(data.status=='success'){
                    $('#message').append(
                      '<div class="alert alert-success alert-dismissable">'+
                        '<button type="button" class="close" data-dismiss="alert">'+
                            '<span aria-hidden="true">&times;</span>'+
                            '<span class="sr-only">Close</span>'+
                        '</button>'+
                        data.message+
                      '</div>'
                    );
                }else{
                    $('#message').append(
                      '<div class="alert alert-danger alert-dismissable">'+
                        '<button type="button" class="close" data-dismiss="alert">'+
                            '<span aria-hidden="true">&times;</span>'+
                            '<span class="sr-only">Close</span>'+
                        '</button>'+
                        data.message+
                      '</div>'
                    );
                }
              
            $('.edit-product')[0].reset();
            setTimeout( function (){
              $('#message').fadeOut('slow');
              window.location = "<?=base_url('Cproduct/manage_product')?>";
            },1600);   
            
          },

      });
      return false;
    });
</script>    
<script>
    $('.customcardinput').bind('change', function() {
      var supplier_price = parseFloat($('#supplier_price').val());
      var sell_price = parseFloat($('#store_sell_price').val());
        if($('#product_name').val() == '') {
            $("#name_err").html("Please enter the Product Name").show();
            return false;
        }else{
            $("#name_err").html("").show();
        }
        if($('#nickname').val() == '') {
            $("#nname_err").html("Please enter the Product Nickname").show();
            return false;
        }else{
            $("#nname_err").html("").show();
        }
        if($('#UPC').val() == '') {
          $("#upc_err").html("Please enter the Product UPC").show();
          return false;
        }else{
            $("#nname_err").html("").show();
        }
        if($('#category').val() == ''){
            $("#cat_err").html("Please select Category").show();
            return false;
        }else{
            $("#cat_err").html("").show();
        }
        if($('#unit').val() == ''){
            $("#unit_err").html("Please select number of Unit").show();
            return false;
        }else{
            $("#unit_err").html("").show();
        }
        if($('#quantity').val() == ''){
            $("#qty_err").html("Please enter Quantity").show();
            return false;
        } else{
            $("#qty_err").html("").show();
        }
        // if($('#size').val() == '') {
        //     $("#size_err").html("Please select Product Size").show();
        //     return false;
        // }else{
        //     $("#size_err").html("").show();
        // }
        if($('#size').val() != ''){
          if(!($('#size').val().indexOf(' ml') > -1 || $('#size').val().indexOf(' oz') > -1 || $('#size').val().indexOf(' liter') > -1)){
            $("#size_err").html("only support oz, ml, liter format. (ex. 100 ml)").show();
            return false;
          }else{
              $("#size_err").html("").show();
          }
        }
        
        if(supplier_price == '0' || supplier_price == '0.00'){
            $("#price_err").html("Please enter correct Supplier Price").show();
            return false;
        }else{
            $("#price_err").html("").show();
        } 
        
        if($('#store_sell_price').val() == '' || $('#store_sell_price').val() == '0' || $('#store_sell_price').val() == '0.00' || $('#store_sell_price').val() == '00' || $('#store_sell_price').val() == '000' || $('#store_sell_price').val() == '0000'|| $('#store_sell_price').val() == '00000' || $('#store_sell_price').val() == '000000' || $('#store_sell_price').val() == '0000000'){
            $("#store_sell_err").html("Please enter Store Sell Price").show();
            return false;
        }else{
            $("#store_sell_err").html("").show();
        }

        if(supplier_price == '0' || supplier_price == '0.00' || supplier_price == '00' || supplier_price == '000' || supplier_price == '0000'|| supplier_price == '00000' || supplier_price == '000000' || supplier_price == '0000000'){
            $("#price_err").html("Please enter correct Supplier Price").show();
            return false;
        }else{
            $("#price_err").html("").show();
        } 

        if($('#ecommerce_sell_price').val() != ''){
          if(supplier_price >= $('#ecommerce_sell_price').val()){
            $("#ecomm_sell_err").html("E-commerce sell Price is not less than or equal supplier price, Please enter correct E-commerce Sell price").show();
            return false;
          }else{
             $("#ecomm_sell_err").html("").show();
          }
        }
        
    });

</script>    
<script type="text/javascript">
  $(document).ready(function() {

    var supplier_price = $('#supplier_price').val();  

      if(supplier_price == ''){
          $('#rangeInput').val('0');
          $('#amount').val('');
          $('#rangeInput2').val('0');
          $('#amount2').val('');  
      }else{
        //store profit margin calculate

     var sto_price = $('#store_sell_price').val() ;  //change  /100 addtional

     var prof_margin = (sto_price - supplier_price) / sto_price  * 100;  
     // alert(prof_margin);
     $('#rangeInput').val(prof_margin);
     $('.store_p').val(prof_margin.toFixed(2));

    //ecommerce profit margin calculate
     // var supplier_price = parseFloat($('#supplier_price').val());   
     var ecom_price = $('#ecommerce_sell_price').val(); 

     var prit_margin = (ecom_price - supplier_price) / ecom_price  * 100;  
     $('#rangeInput2').val(prit_margin);
     $('.ecomm_p').val(prit_margin.toFixed(2));
    

      }

      if($('#ecommerce_sell_price').val() == 0){
         $('#rangeInput2').val('0');
         $('#amount2').val('');  
      }
        

    
    //store sell price calculate

     // var supplier_price = parseFloat($('#supplier_price').val());   
     // var profit_margin = parseFloat($('.store_p').val());  
     
     // var store_sell_price = supplier_price / (1 - (profit_margin / 100));

     // $('#store_sell_price').val(store_sell_price.toFixed(2));

     //ecommerce sell price calculate

     // var supplier_price = parseFloat($('#supplier_price').val());   
    //  var profit_margin = parseFloat($('.ecomm_p').val());  

    //  var ecomm_sell_price = supplier_price / (1 - (profit_margin / 100));

    //  $('#ecommerce_sell_price').val(ecomm_sell_price.toFixed(2));
     // }
      
      



      
 
          
  });
</script>
<script type="text/javascript">
    
  $('.store_p').on('change', function() {

      var supplier_price = $('#supplier_price').val();   
      var store_price = ($('#store_sell_price').val()); 
      var profit = parseFloat($('.store_p').val() /100); 
      if(profit < 1){
          var profit_margin = profit * 100 ;
       }else{
          var profit_margin = profit;
      }
      if(supplier_price != '' && supplier_price != '0.00' && supplier_price != '0' && supplier_price != '00' && supplier_price != '000' && supplier_price != '0000' && supplier_price != '00000' && supplier_price != '000000' && supplier_price != '0000000'){
        var store_sell_price = supplier_price / (1 - (profit_margin / 100));
        $('#store_sell_price').val(store_sell_price.toFixed(2));
        $('#rangeInput').val(parseFloat(profit_margin));
        $("#store_sell_err").html("").show();
      }else{
        var supplierPrice = (store_price) * ( 1 - profit_margin / 100);
        $('#supplier_price').val(supplierPrice.toFixed(2));
        $('#rangeInput').val(parseFloat(profit_margin));
        $("#price_err").html("").show(); //added
      }

    });

  // //ecommerce sell price calculate
    $('.ecomm_p').on('change', function() {
      var supplier_price = $('#supplier_price').val();   
      var ecomm_price = $('#ecommerce_sell_price').val(); 
      var profit = parseFloat($('.ecomm_p').val() /100); 

        if(profit < 1){
          var profit_margin = profit * 100 ;
        }else{
          var profit_margin = profit;
        }

        if(supplier_price != ''){
          var ecomm_sell_price = parseFloat(supplier_price) / (1 - (profit_margin / 100));
          $('#ecommerce_sell_price').val(ecomm_sell_price.toFixed(2));
          $('#rangeInput2').val(profit_margin);
      }else{
          var supplierPrice = (ecomm_price) * ( 1 - profit_margin / 100);
          $('#supplier_price').val(supplierPrice.toFixed(2));
          $('#rangeInput2').val(profit_margin);

          // only for calculate margin profit

            if(ecomm_price !=''){
            var store_price = parseFloat($('#store_sell_price').val());  
            var store_price = $('#store_sell_price').val();  
            var profit_margi = (store_price - supplierPrice) / store_price  * 100;  
            var profit_margi = (store_price - supplierPrice) / store_price  * 100;  
            $('#rangeInput').val(profit_margi);
              $('#rangeInput').val(profit_margi);
            $('.store_p').val(profit_margi.toFixed(2));
              $('.store_p').val(profit_margi.toFixed(2));
            }
      }

      //added
      if(ecomm_price != ''){
          if(parseFloat(supplier_price) >= parseFloat(ecomm_price)){
            $("#ecomm_sell_err").html("E-commerce sell Price is not less than or equal supplier price, Please enter correct E-commerce Sell price").show();
            return false;
          }else{
             $("#ecomm_sell_err").html("").show();
          }
      }

     
      
    });

//change
    $('#supplier_price').on('change', function() {
      //store use only
     var storemargin =parseFloat($('.store_p').val());
     var supplier_price = $('#supplier_price').val() ; 

     var store_price = $('#store_sell_price').val() ;  //change  /100 addtional
 
     
     if(store_price == '' || store_price == '0.00'){
      var store = supplier_price / (1 - storemargin / 100);
      $('#store_sell_price').val(store.toFixed(2));
      $('#rangeInput').val(storemargin);
      $("#store_sell_err").html("").show(); //added

     }else{
      var store_price1 = $('#store_sell_price').val(); 
      profit_margin1 = (store_price1 - supplier_price) / store_price1  * 100; 
      $('.store_p').val(profit_margin1.toFixed(2));
      $('#rangeInput').val(profit_margin1);
     }

     //ecommmerce use only
     var ecomm_price = $('#ecommerce_sell_price').val(); 
     var ecommmargin = parseFloat($('.ecomm_p').val());

     // var profit_margi = (ecomm_price1 - sup_price1) / ecomm_price1  * 100;  
     

     if(ecomm_price == ''){
      var ecomm = supplier_price / (1 - ecommmargin / 100);
      $('#ecommerce_sell_price').val(ecomm.toFixed(2));
      $('#rangeInput2').val(ecommmargin);

     }else{
      var ecomm_price1 =$('#ecommerce_sell_price').val(); 
      profit_margin2 = (ecomm_price1 - supplier_price) / ecomm_price1  * 100; 
      $('.ecomm_p').val(profit_margin2.toFixed(2));
      $('#rangeInput2').val(profit_margin2);
     }

      if($('#amount').val() == '-Infinity'){
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

      if($('#amount').val() == 'NaN'){
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

      if($('#supplier_price').val() == ''){
          $('#rangeInput').val('0');
          $('#amount').val('0');
      }

      if($('#store_sell_price').val() == 'NaN'){
          $('#store_sell_price').val('');
      }
      if($('#ecommerce_sell_price').val() == 'NaN'){
          $('#ecommerce_sell_price').val('');
      }

      if( $('#amount').val() < 0) {
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

      if($('#store_sell_price').val() == ''){
          $('#store_sell_price').val('');
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

     // //  //// ecommm use

      if($('#amount2').val() == '-Infinity'){
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }

      if($('#amount2').val() == 'NaN'){
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }

      if($('#supplier_price').val() == ''){
          $('#rangeInput2').val('0');
          $('#amount2').val('0');
      }

      if( $('#amount2').val() < 0) {
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }

      if($('#ecommerce_sell_price').val() == ''){
         $('#ecommerce_sell_price').val('');
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }


       
    });


    //store profit margin calculate

  $('#store_sell_price').on('change', function() {

    var supplier_price = $('#supplier_price').val();   
    var store_price = $('#store_sell_price').val();
    var profit_margin = parseFloat($('.store_p').val() ); 

    //alert(profit_margin);
     if(supplier_price == NaN || supplier_price == '0.00'){
      var supplier_price = (store_price) * ( 1 - profit_margin / 100);
      $('#supplier_price').val(supplier_price.toFixed(2));
      $("#price_err").html("").show(); //added
      $("#store_sell_err").html("").show(); //added
    }else{
      var profit_margi = (store_price - supplier_price) / store_price  * 100;  
        $('#rangeInput').val(profit_margi);
        $('.store_p').val(profit_margi.toFixed(2));
    }

      if($('#amount').val() == '-Infinity'){
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

      if($('#amount').val() == 'NaN'){
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

      if( $('#amount').val() < 0) {
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

      if($('#supplier_price').val() == ''){
         $('#rangeInput').val('0');
         $('#amount').val('');
      }
       
    });

  // //ecommerce profit margin calculate

    $('#ecommerce_sell_price').on('change', function() {

      var supplier_price = $('#supplier_price').val();   
      var ecomm_price = $('#ecommerce_sell_price').val();
      var pro_margin = parseFloat($('.ecomm_p').val() ); 

      if(supplier_price == NaN || supplier_price == '0.00'){
        var supplier_price = (ecomm_price) * ( 1 - pro_margin / 100);
        $('#supplier_price').val(supplier_price.toFixed(2));
      }else{
        var profit_margi = (ecomm_price - supplier_price) / ecomm_price  * 100;  

        $('#rangeInput2').val(profit_margi);
        $('.ecomm_p').val(profit_margi.toFixed(2));
      }

      if($('#amount2').val() == '-Infinity'){
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }
      if($('#amount2').val() == 'NaN'){
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }


      if( $('#amount2').val() < 0) {
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }

      // if( parseFloat($('#ecommerce_sell_price').val()) < parseFloat($('#supplier_price').val() )) {
      //     $('#rangeInput2').val('0');
      //     $('#amount2').val('');
      // }

      if($('#supplier_price').val() == ''){
         $('#rangeInput2').val('0');
         $('#amount2').val('');
      }
       
    });



  //   //range input 1
    $('#rangeInput').on('change', function() {

      var supplier_price = $('#supplier_price').val();   
      var store_price = $('#store_sell_price').val(); 
      var profit_margin = parseFloat($('.store_p').val() /100); 
      //alert(profit_margin);
      if(supplier_price != '' && supplier_price != '0.00' && supplier_price != '0' && supplier_price != '00' && supplier_price != '000' && supplier_price != '0000' && supplier_price != '00000' && supplier_price != '000000' && supplier_price != '0000000'){
        var store_sell_price = supplier_price / (1 - (profit_margin));
        $('#store_sell_price').val(store_sell_price.toFixed(2));
        $("#store_sell_err").html("").show();
      }else{
        var supplierPrice = (store_price) * ( 1 - profit_margin);
        $('#supplier_price').val(supplierPrice.toFixed(2));
         $("#price_err").html("").show(); //added
      }
       
    });


     //range input 2
    $('#rangeInput2').on('change', function() {
     var supplier_price = $('#supplier_price').val();  
     var ecomm_price = $('#ecommerce_sell_price').val();  
     var profit_mar = parseFloat($('.ecomm_p').val() /100);  //change  /100 addtional

      if(supplier_price != ''){
        var ecomm_sell_price = supplier_price / (1 - (profit_mar));
        $('#ecommerce_sell_price').val(ecomm_sell_price.toFixed(2));
      }else{
        var supplier_Price = (ecomm_price) * ( 1 - profit_mar);
        $('#supplier_price').val(supplier_Price.toFixed(2));
      }


      if(ecomm_price != ''){
          if(parseFloat(supplier_price) >= parseFloat(ecomm_price)){
            $("#ecomm_sell_err").html("E-commerce sell Price is not less than or equal supplier price, Please enter correct E-commerce Sell price").show();
            return false;
          }else{
             $("#ecomm_sell_err").html("").show();
          }
      }

       
    });

    $('#amount').change(function(event) {
        var result = $('#amount').val().replace(/\b(\d+)(\d{2})\b/, '$1.$2');
        $('#amount').val(result);
    });

    $('#amount2').change(function(event) {
        var result = $('#amount2').val().replace(/\b(\d+)(\d{2})\b/, '$1.$2');
        $('#amount2').val(result);
    });

  
</script>
<script type="text/javascript">

  $(document).ready(function() {

      var category_id = $('#category').val();  
      $.ajax({
         type: "POST",
         url : '<?=base_url("Cproduct/fetch_size_type")?>',
         data : {category_id : category_id},
         dataType : 'json', 
         success : function(data){  
            console.log(data);
            var option_list = '';
              $.each(data.sizename, function(index, value){
                  //console.log(value.name);
                 option_list += '<option>'+value.name+'</option>'; 
              });
            $("#sizes").html(option_list);

            if(data.age_restrict == 0){
              $('#age').hide();
              $('#restict').hide();
            }else if(data.age_restrict == 1){
              $('#age').show();
              $('#restict').show();
            }
         },
       });

   });


</script>
 
<script>
  var slider = document.getElementById("myRange");
  var output = document.getElementById("percent");
  output.value = slider.value + "%"; // Display the default slider value
  // Update the current slider value (each time you drag the slider handle)
  slider.oninput = function() {
    output.value = this.value + "%";
  }

  function ab() {
    output.value = document.getElementById("percent").value;
  }

  var slider2 = document.getElementById("myRange2");
  var output2 = document.getElementById("percent2");
  output2.value = slider2.value + "%"; // Display the default slider value
  // Update the current slider value (each time you drag the slider handle)
  slider2.oninput = function() {
    output2.value = this.value + "%";
  }


  function get_float_value(num) {

    var rex = /(^\d{2})|(\d{1,3})(?=\d{1,3}|$)/g,
      val = num.toString().replace(/^0+|\.|,/g, ""),
      res;

    if (val.length) {
      //if (val.length && val.length > 2) {
      res = Array.prototype.reduce.call(val, (p, c) => c + p) // reverse the pure numbers string
        .match(rex) // get groups in array
        .reduce((p, c, i) => i - 1 ? p + c : p + "." + c); // insert (.) and (,) accordingly
      res += /\.|,/.test(res) ? "" : ".0"; // test if res has (.) or (,) in it
      num = Array.prototype.reduce.call(res, (p, c) => c + p); // reverse the string and display
      return num;
    } else {
      return num;
    }

  }
</script>