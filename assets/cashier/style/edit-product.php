
<body class="signback1">

    <div class="containermain2">
        <div class="row m"> 
            <!-- <div class="col-md-8  col-xs-4 col-sm-6"> -->
                <div class="logobar ">
                    <img src="<?php echo base_url(); ?>assets/images/Liquor-01 1.png" class="dem1">
                </div>
            <!-- </div> -->


                <div class="gg">
            <!-- <div class="col-md-1 col-xs-6 col-sm-6"> -->
                <div>
                  <a href="<?php echo base_url(); ?>cashier/POSterminal"><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" class="mobileimg "></a>
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


    <div class="row mt-4">
        <div class="col-md-9">
              <h5 class="mainline ml-3 mt-3" >Inventory Management:</h5>
              <?php if($this->session->flashdata('success')){ ?>
                        <div class="alert alert-success alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                          </button>
                          <?php echo $this->session->flashdata('success'); ?>
                          <!--Msg-->
                        </div>
                    <?php }elseif($this->session->flashdata('error')){ ?> 
                        <div class="alert alert-danger alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                          </button>
                          <?php echo $this->session->flashdata('error'); ?>
                          <!--Msg-->
                        </div>
                    <?php } ?>
         </div>

        
             <!--  <div class="col-md-2">
                <input type="text" name="read_barcode" id="read_barcode" placeholder="Scan Barcode" value="" class="codebar">
              
               </div> -->
              <div class="col-md-3">
               <button class="save-data" id="btnSave">Save Information
                    <img src="<?php echo base_url(); ?>assets/images/Vector (8).png" alt="" class="pl-2 "> 
               </button>
               </div>
            
          
            </div>

            <div class="container-fluid mt20">
                <div class="row">
                  <div class="col-md-12">
                        <div class="customcard">
                            <div class="customcardheader1">
                                 <p> Update Product</p>
                            </div>
                            <!-- cardheader -->
                            <form class="add-product" method="post" action="" enctype="multipart/form-data">

                            <div class="customcardbody ">
                              <div class="container mb25 ">
                                  <div class="row">
                                      <input type="hidden" class="form-control" id="barcode_formats" name="barcode_formats">
                                      <input type="hidden" class="form-control" id="case_upc" name="case_upc">
                                      <input type="hidden" class="form-control" id="barcode_type" name="barcode_type">
                                      <input type="hidden" class="form-control" id="mpn" name="mpn">

                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">Product Name*</label>
                                           <input type="text" class="form-control customcardinput" id="product_name" aria-describedby="" name="product_name" placeholder="Please enter the Product Name">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>

                                      
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Product Nickname*</label>
                                            <input type="text" class="form-control customcardinput" id="nicknamename"  aria-describedby="" name="product_nickname" placeholder="Please Enter Product Nickname">
                                            
                                          </div>
                                       </div>

                                      <div class="col-md-4">
                                       <div class="form-group">
                                        <label for="exampleFormControlSelect1" style="color: red;">Category*</label>
                                        <select class="form-control customcardinput" id="category" name="category_id">
                                          <option>Please select the  Category</option>
                                          <?php foreach($category as $c) { ?>
                                            <option value="<?=$c['category_id']?>"><?=$c['category_name']?></option>
                                          <?php } ?>
                                        </select>
                                        <span class="errors" id="cat_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>

                                      <div class="col-md-4">
                                       <div class="form-group">
                                           <label class="customcardlabel">Unit*</label>
                                           <input type="number" class="form-control customcardinput" id="" aria-describedby="" name="" placeholder="Please enter the number of Unit">
                                           <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                         </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1" style="color: red;">Brand</label>
                                           <!--  <select class="form-control customcardinput" id="brand" name="brand_id">
                                              <option>Please select the Brand</option>
                                              <?php foreach($brand as $b) { ?>
                                                <option value="<?=$b['brand_id']?>"><?=$b['brand_name']?></option>
                                              <?php } ?>  
                                            </select> -->

                                             <input type="text" class="form-control customcardinput" id="brand" aria-describedby="" name="brand" placeholder="Please enter the Brand Name">
                                            <span class="errors" id="brand_err" style="color:red; font-size:14px"></span>
                                             </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Size*</label>
                                            <input type="number" class="form-control customcardinput" aria-describedby="" id="size" name="size" placeholder="Please enter the Product Size">
                                            <span class="errors" id="size_err" style="color:red; font-size:14px"></span>
                                          </div>
                                       </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="customcardlabel">Details</label>
                                                <input type="text" class="form-control customcardinput" id="details" aria-describedby="" name="details" placeholder="Please enter the Product Details">
                                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                              </div>
                                           </div>
                                           <div class="col-md-6">
                                             <div class="form-group">
                                                 <label class="customcardlabel">Producer</label>
                                                 <input type="email" class="form-control customcardinput" id="" aria-describedby="" name="producer" placeholder="Please enter the Producer">
                                                 <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                               </div>
                                            </div>
                                            
                                            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="customcardlabel">Meta Title</label>
                                                <input type="email" class="form-control customcardinput" id="" aria-describedby="" name="Meta_Title" placeholder="Please enter Meta Title">
                                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                              </div>
                                           </div>
                                           <div class="col-md-6">
                                             <div class="form-group">
                                                 <label class="customcardlabel">Meta Tag</label>
                                                 <input type="text" class="form-control customcardinput" id="" aria-describedby="" name="Meta_Key" placeholder="Please enter the Product Tag">
                                                 <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                               </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="customcardlabel">Meta Description
                                                    </label>
                                                    <input type="text" class="form-control customcardinput" id="Description" aria-describedby="" name="Meta_Desc" placeholder="Please enter Meta Description">
                                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                  </div>
                                               </div>

                                               <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="customcardlabel">ABV</label>
                                                    <input type="text" class="form-control customcardinput" id="" aria-describedby="" name="abv" placeholder="Please enter the ABV">
                                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                  </div>
                                               </div>
                                               <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="customcardlabel">Proof</label>
                                                    <input type="text" class="form-control customcardinput" id="" aria-describedby="" name="" placeholder="Please enter Proof">
                                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                  </div>
                                               </div>
                                               <div class="col-md-4">
                                                 <div class="form-group">
                                                     <label class="customcardlabel">Geography</label>
                                                     <input type="text" class="form-control customcardinput" id="" aria-describedby="" name="region" placeholder="Please enter Geography ">
                                                     <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                   </div>
                                                </div>


                                                       
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="customcardlabel">Supplier Price*</label>
                                                    <input type="tel" class="form-control customcardinput" id="supplier_price" aria-describedby="" name="supplier_price" placeholder="Please enter Supplier Price">
                                                    <span class="errors" id="price_err" style="color:red; font-size:14px"></span>
                                                  </div>
                                               </div>
                                               <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1" style="color: red;">Profit% in Store*</label>
                                                    <div class="probar">
                                                    <input type="range" class="custom-range scr" name="profit_store" min="0" max="100" value="50%"  id="myRange" >
                                                     <span class=" pronum" id="percent">%</span>
                                                  </div>
                                                     </div>
                                               </div>
                                               <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1"style="color: red;">Profit% in Ecommerce*</label>
                                                    <div class="probar">
                                                    <input type="range" class="custom-range scr" name="profit_store" min="0" max="100" value="50%"  id="myRange2" >
                                                     <span class=" pronum" id="percent2">%</span>
                                                  </div>                                                   
                                                     </div>
                                                </div>
                                              
                                                   <div class="col-md-6">
                                                   <div class="form-group">
                                                     <label class="customcardlabel">Store Sell Price*</label>
                                                     <input type="text" class="form-control customcardinput" id="" aria-describedby="" name="" placeholder="Please enter Store Sell Price ">
                                                     <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                   </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                   <div class="form-group">
                                                     <label class="customcardlabel">E-commerce Sell Price</label>
                                                     <input type="text" class="form-control customcardinput" id="" aria-describedby="" name="" placeholder="Please select E-commerce Sell Price ">
                                                     <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                   </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                     <label class="customcardlabel">Store Promotion Price</label>
                                                     <input type="text" class="form-control customcardinput" id="" aria-describedby="" name="" placeholder="Please enter Promotion Price ">
                                                     <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                   </div>
                                                       </div>
                                                       <div class="col-md-6">
                                                       <div class="form-group">
                                                     <label class="customcardlabel">E-commerce Promotion Price</label>
                                                     <input type="text" class="form-control customcardinput" id="" aria-describedby="" name="" placeholder="Please select E-commerce Promotion Price ">
                                                     <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
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

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  -->
<script src="<?php echo base_url(); ?>assets/core/vendor/jquery-3.4.1.min.js"></script>

<script type="text/javascript">

        $('#btnSave').click(function(){
            // if($('#product_name').val() == '') {
            //     $("#name_err").html("Please enter the Product Name").show();
            //     return false;
            // }
            // if($('#category').val() == 'Please select the  Category'){
            //     $("#cat_err").html("Please select Category").show();
            //     return false;
            // }
            // if($('#brand').val() == 'Please select the Brand'){
            //     $("#brand_err").html("Please select Brand").show();
            //     return false;
            // }
            // if($('#size').val() == '') {
            //     $("#size_err").html("Please enter the Product Size").show();
            //     return false;
            // }
            // if($('#supplier_price').val() == ''){
            //     $("#price_err").html("Please enter Supplier Price").show();
            //     return false;
            // } 

            
            var url = $('.add-product').submit();
            var formdata = $('.add-product')[0];
            $.ajax({
                url: url,
                type:"post",
                data:new FormData(formdata),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(data){
                    // $('#addModal').modal('hide');
                  $('.add-product')[0].reset();
                  
                },

            });
            return false;
        });
</script>    
<script>
    // $('.customcardinput').bind('change', function() {
    //     if($('#product_name').val() == '') {
    //         $("#name_err").html("Please enter the Product Name").show();
    //         return false;
    //     }else{
    //         $("#name_err").html("").show();
    //     }
    //     if($('#category').val() == 'Please select the  Category'){
    //         $("#cat_err").html("Please select Category").show();
    //         return false;
    //     }else{
    //         $("#cat_err").html("").show();
    //     }
    //     if($('#brand').val() == 'Please select the Brand'){
    //         $("#brand_err").html("Please select Brand").show();
    //         return false;
    //     }else{
    //         $("#brand_err").html("").show();
    //     }
    //     if($('#size').val() == '') {
    //         $("#size_err").html("Please enter the Product Size").show();
    //         return false;
    //     }else{
    //         $("#size_err").html("").show();
    //     }
    //     if($('#supplier_price').val() == ''){
    //         $("#price_err").html("Please enter Supplier Price").show();
    //         return false;
    //     } else{
    //         $("#price_err").html("").show();
    //     }
        
        
    // });
</script>    