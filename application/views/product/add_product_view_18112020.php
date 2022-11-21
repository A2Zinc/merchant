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
                                        <label class="customcardlabel" for="">Product Name</label>
                                        <input type="text" class="form-control customcardinput" id="product_name" name="product_name" aria-describedby="" placeholder="enter Product Name">
                                        <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
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
                                      <label for="exampleFormControlSelect1 customcardlabel">Category</label>
                                      <select  name="category_id" style="width: 100%" class="form-control customcardinput mySelect for" id="category">
                                        <option>--Select Category--</option>
                                        <?php foreach($category as $c) { ?>
                                          <option value="<?=$c['category_id']?>"><?=$c['category_name']?></option>
                                        <?php } ?>
                                      <span class="errors" id="cat_err" style="color:red; font-size:14px"></span>  
                                      </select>
                                    </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1 customcardlabel">Sub category</label>
                                        <input type="text" class="form-control customcardinput" id="sub_category" name="sub_category" aria-describedby="" placeholder="enter Sub category">
                                      </div>
                                      
                                   </div>
                                   <div class="col-md-6">
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
                                        <label class="customcardlabel customcardlabel" for="exampleFormControlTextarea1">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                                      </div>
                                      <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="manage_stock" name="manage_stock" >
                                        <label class="form-check-label customcardlabel checklabel" for="exampleCheck1">Manage Stock</label>
                                      </div>
                                   </div>
                                
                                   
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