<div class="container-fluid mt20">
             <div class="row">
               <div class="col-md-12">

                     <div class="customcard">
                         <div class="customcardheader">
                              <p>Add new product</p>
                         </div>
                         <!-- cardheader -->
                        <form action="<?=base_url('Cproduct/insert_product')?>" method="post" class="add-product" enctype="multipart/form-data" autocomplete="off"> 

                         <div class="customcardbody ">
                           <div class="container mb25">
                            
                               <div class="row">
                                   
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Product Name*</label>
                                        <input type="text" class="form-control customcardinput" id="product_name" name="product_name" aria-describedby="" placeholder="enter Product Name">
                                        <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Product NickName*</label>
                                        <input type="text" class="form-control customcardinput" id="product_nickname" name="product_nickname" aria-describedby="" placeholder="enter Product NickName">
                                        <span class="errors" id="nickname_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                  <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Unit</label>
                                        <input type="text" class="form-control customcardinput" id="unit" name="unit" aria-describedby="" placeholder="enter Product Unit">
                                        <span class="errors" id="unit_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">SKU</label>
                                        <input type="text" class="form-control customcardinput" id="sku" name="sku" aria-describedby="" placeholder="enter SKU">
                                        <span class="errors" id="sku_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>

                                    <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Size</label>
                                        <input type="text" class="form-control customcardinput" id="size" name="size" aria-describedby="" placeholder="enter Product Size">
                                        <span class="errors" id="size_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Brand</label>

                                         <select  name="brand_id" style="width: 100%" class="form-control customcardinput mySelect for" id="brand">
                                              <option>--Select Brand--</option>

                                                <?php foreach($brand as $b) { ?>
                                                  <option value="<?=$b['brand_id']?>"><?=$b['brand_name']?></option>
                                                <?php } ?>  
                                              </select>
                                        <span class="errors" id="brand_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>


                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                      <label for="exampleFormControlSelect1 customcardlabel">Category</label>
                                      <select  name="category_id" style="width: 100%" class="form-control customcardinput mySelect for" id="category">
                                        <option>--Select Category--</option>

                                        <?php foreach ($category as $c) {?>
                                                  <option value="<?=$c['category_id']?>"><?=$c['category_name']?></option>
                                                    <?php if(!empty($c['sub_cat'])){
                                                      foreach($c['sub_cat'] as $sub_ct1){ ?>
                                                        <option value="<?=$sub_ct1['category_id']?>" >
                                                          <?=$c['category_name']?> > <?=$sub_ct1['category_name']?> 
                                                        </option>
                                                        <?php if(!empty($sub_ct1['child_cat'])){ 
                                                          foreach($sub_ct1['child_cat'] as $sub_ct2){ ?>
                                                            <option value="<?=$sub_ct2['category_id']?>"><?=$c['category_name']?> > <?=$sub_ct1['category_name']?> >
                                                              <?=$sub_ct2['category_name']?>
                                                            </option>
                                                          <?php if(!empty($sub_ct2['grand_cat'])){ 
                                                            foreach($sub_ct2['grand_cat'] as $grnd_ct){ ?>
                                                          <option value="<?=$grnd_ct['category_id']?>">
                                                            <?=$c['category_name']?> > <?=$sub_ct1['category_name']?> >
                                                              <?=$sub_ct2['category_name']?> > <?=$grnd_ct['category_name']?></option>

                                                    <?php } } } } } }?>
                                                 
                                                  
                                                <?php } ?>

                                      <span class="errors" id="cat_err" style="color:red; font-size:14px"></span>  
                                      </select>
                                    </div>
                                   </div>
                                   <div class="col-md-6">
                                  <div class="form-group">
                                       <!-- <label for="exampleFormControlSelect1 customcardlabel">Sub category</label>
                                        <input type="text" class="form-control customcardinput" id="sub_category" name="sub_category" aria-describedby="" placeholder="enter Sub category"> -->
                                      </div> 
                                      
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Producer</label>
                                        <input type="text" class="form-control customcardinput" id="producer" aria-describedby="" name="producer" placeholder="Please enter the Producer">
                                        <span class="errors" id="producer_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Meta Title</label>
                                        <input type="text" class="form-control customcardinput" id="tilte" aria-describedby="" name="Meta_Title" placeholder="Please enter Meta Title">
                                        <!-- <span class="errors" id="metatitle_err" style="color:red; font-size:14px"></span> -->
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Mega Tag</label>
                                        <input type="text" class="form-control customcardinput" id="Meta_Key" aria-describedby="" name="Meta_Key" placeholder="Please enter the Product Tag">
                                        <span class="errors" id="metakey_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Meta Description</label>
                                       <input type="text" class="form-control customcardinput" id="Description" aria-describedby="" name="Meta_Desc" placeholder="Please enter Meta Description">
                                        <span class="errors" id="meadesc_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Alcohol by Value</label>
                                        <input type="text" class="form-control customcardinput" id="abv" aria-describedby="" name="abv" placeholder="Please enter the ABV">
                                        <span class="errors" id="abv_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Proof</label>
                                        <input type="text" class="form-control customcardinput" id="proof" aria-describedby="" name="proof" placeholder="Please enter Proof">
                                        <span class="errors" id="proof_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Alert Quantity</label>
                                        <input type="text" class="form-control customcardinput" id="alert_quantity" name="alert_quantity" aria-describedby="" placeholder="enter Product Name">
                                        
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Applicable Tax</label>
                                       
                                        <select class="form-control customcardinput" name="applicable_tax" id="applicable_tax">
                                          <option>No Tax</option>
                                          <option>5 %</option>
                                          <option>12 %</option>
                                          <option>18 %</option>
                                        </select>
                                         
                                        
                                      </div>

                                      
                                </div>    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Selling price tax type</label>
                                       
                                        <select class="form-control customcardinput" id="tax_type" name="tax_type">
                                          <option value="test">Test</option>
                                      </select>
                                         
                                        
                                      </div>
                                      
                                      
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Selling Price</label>
                                        <input type="tel" class="form-control customcardinput" id="selling_price" name="selling_price" aria-describedby="" placeholder="Selling Price">
                                        
                                      </div>
                                   </div> -->
                                    <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel">Geography</label>
                                                     <input type="text" class="form-control customcardinput" id="region" aria-describedby="" name="region" placeholder="Please enter Geography ">
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel">Supplier Price*</label>
                                                    <input type="tel" class="form-control customcardinput" id="supplier_price" aria-describedby="" name="supplier_price" placeholder="Please enter Supplier Price">
                                                    <span class="errors" id="price_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1" style="color: red;">Profit% in Store*</label>
                                                    <div class="probar">
                                                      <input type="range" class="custom-range scr 
                                                      store_p custom" name="profit_store" min="0" max="100" value="0%" id="myRange" >
                                                      <span class=" pronum" id="percent">%</span>
                                                      
                                                    </div>
                                                    <p class="errors" id="profit_err" style="color:red; font-size:14px;margin-bottom:0;"></p> 
                                      </div>
                                   </div>

                                    <div class="col-md-6 mb-4">
                                     <div class="form-group">
                                                    <label for="exampleFormControlSelect1"style="color: red;">Profit% in Ecommerce*</label>
                                                    <div class="probar">
                                                    <input type="range" class="custom-range scr ecomm_p custom" name="profit_ecommerce" min="0" max="100" value="0%"  id="myRange2" >
                                                     <span class=" pronum" id="percent2">%</span>
                                                     
                                                  </div>                                                   
                                                     </div>
                                                     <p class="errors" id="ecomm_err" style="color:red; font-size:14px;margin-bottom:0;"></p> 
                                   </div>



                                    <div class="col-md-6 mb-4">
                                                   <div class="form-group">
                                                     <label class="customcardlabel">Store Sell Price*</label>
                                                     <input type="text" class="form-control customcardinput" id="store_sell_price" aria-describedby="" name="store_sell_price" placeholder="Please enter Store Sell Price ">
                                                     <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                   </div>
                                                   </div>
                                        <div class="col-md-6 mb-4">
                                                   <div class="form-group">
                                                     <label class="customcardlabel">E-commerce Sell Price</label>
                                                     <input type="text" class="form-control customcardinput" id="ecommerce_sell_price" aria-describedby="" name="ecommerce_sell_price" placeholder="Please select E-commerce Sell Price ">
                                                     <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                   </div>
                                                    </div>


                                          <div class="col-md-6 md4">
                                                    <div class="form-group">
                                                     <label class="customcardlabel">Store Promotion Price</label>
                                                     <input type="text" class="form-control customcardinput" id="store_promotion_price" aria-describedby="" name="store_promotion_price" placeholder="Please enter Promotion Price ">
                                                     <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                   </div>
                                                       </div>
                                                       <div class="col-md-6 md4">
                                                       <div class="form-group">
                                                     <label class="customcardlabel">E-commerce Promotion Price</label>
                                                     <input type="text" class="form-control customcardinput" id="ecommerce_promotion_price" aria-describedby="" name="ecommerce_promotion_price" placeholder="Please select E-commerce Promotion Price ">
                                                     <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                   </div>
                                                        </div>

                                      

                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Upload Image</label>
                                        <input type="file" class="form-control customcardinput" id="product_img" name="photo" aria-describedby="">
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share customer's email with anyone else.</small> -->
                                      </div>
                                   </div>
                                   
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel customcardlabel" for="exampleFormControlTextarea1">Details</label>
                                        <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                                      </div>
                                     <!--  <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="manage_stock" name="manage_stock" >
                                        <label class="form-check-label customcardlabel checklabel" for="exampleCheck1">Manage Stock</label>
                                      </div>
                                   </div> -->
                                
                                   
                               </div>
                           </div>
                           <!-- container -->
                          
                           
                               <!-- container -->
                              
                         </div>
                         <!-- cardbody -->
                         <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href=<?=base_url('Cproduct/manage_product')?> type="button" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm">Add</button>
                            </div>
                         </div>
                         </form>
                     </div>
                  
               </div>
             </div>
       </div>


<script>
    $('#product_name').on('change', function() {
        var product_name = $('#product_name').val();
        $.ajax({
            url: '<?=base_url("Cproduct/check_product");?>',
            type:'post',
            data:{product_name:product_name},
            success:function(data){
              console.log(data);
                if(data=='success'){
                    $("#name_err").html("").show();
                }else{
                     $("#name_err").html("This Product is aleready exist").show();
                    return false;
                }
            }
        });
    });

</script>    