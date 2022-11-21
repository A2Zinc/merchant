
<body class="signback1">

  
<div class="containermain2">
<div class="row m"> 
            <!-- <div class="col-md-8  col-xs-4 col-sm-6"> -->
                <div class="logobar ">
                    <img src="<?php echo base_url().$this->session->sitelogo; ?>" class="dem1 ">
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



        <div class=" container-fluid mt20">

            <div class="row mb-3 align-items-center">
                <div class="col-md-8">
                    <h5 class="" >Inventory Management</h5>
                 </div>
                 <div class="col-md-2 text-right">
                    <input type="text" name="read_barcode" id="read_barcode" placeholder="Scan Barcode" value="" class="codebar">
                </div>
                <div class="col-md-2 text-right">
                    
                    <button type="button" class="btn-data " id='saveinfo'>Save Information</button>
                </div>   
            </div>



            
         <div class="row">
             <div class="col-md-12">
                 <div class="customcard">
                     <div>
                       
                         <div class="">
                             <div class="">
                                 <table class="table table-sm" id="tbl_inventory">
                                     <thead class="headsec"> 
                                         <tr class="rowsec">
                                             <th style="text-align:center;"> #
                                             </th>
                                             <th>Images </th>  
                                           
                                             <th style="white-space:nowrap;">Product Name
                                             </th>
                                             <!-- <th>UPC</th> -->
                                             <th class="text-center">Supplier</th>

                                             <th>Category</th>
                                             <th >Quant.
                                                <img id='one' src="<?php echo base_url(); ?>assets/images/Vector (7).png" alt="">
                                             </th>
                                             <th  style="white-space:nowrap;">Supplier Price
                                                <img  id='three' src="<?php echo base_url(); ?>assets/images/Vector (7).png" alt="">
                                             </th>
                                             <th  style="white-space:nowrap;">Retail Price
                                                <img  id='two' src="<?php echo base_url(); ?>assets/images/Vector (7).png" alt="">
                                             </th>
                                             <th  style="white-space:nowrap;">Promotion
                                                <img id='four' src="<?php echo base_url(); ?>assets/images/Vector (7).png" alt="">
                                             </th>
                                            
                                             <th style="text-align: center;">Action</th>

                                         </tr>
                                         <!-- tr -->

                                     </thead>
                                     <tbody>
                                         <?php $i=1; if(!empty($products)) { foreach ($products as $p) { ?>
                                         
                                             <tr class="inventory-list" id="<?=$p['product_id']?>"> 
                                              <td style="text-align:center;"><?=$i?></td>
                                                 
                                             <td>
                                                <!-- <?php if($p['image_thumb'] == './uploads/products/600px-No_image_available.svg (2).png'){ ?>
                                                <img src="<?php echo base_url('assets/images/600px-No_image_available.svg (2).png')?>" alt="" height="50" width="50"> <?php }else{?>
                                                  <img src="<?php echo base_url().$p['image_thumb']; ?>" alt="" height="50" width="50">
                                                 <?php } ?> -->

                                                 -
                                            </td>
                                             <td><p>
                                                    <?php echo wordwrap($p['product_name'], 30, "<br />\n"); ?>    
                                                </p>
                                             </td>
                                             <!-- <td><p><?php //echo wordwrap($p['case_UPC'], 5, "<br />\n"); ?></p></td> -->
                                             <td><p><?php echo wordwrap($p['supplier'], 20, "<br />\n"); ?></p></td>
                                             <td><p><?php echo wordwrap($p['category_name'], 10, "<br />\n"); ?></p></td>
                                             <td><p class="qs"><?= (!empty($p['quantity'])?$p['quantity']:'')?></p></td>
                                             <td><p class="sp2">
                                                <?php if(!empty($p['supplier_price'])){ ?>
                                                    $ <?=number_format($p['supplier_price'], 2);?>
                                                <?php } ?>
                                                </p>
                                            </td>
                                             <td><p class="sp">$ <?=number_format($p['onsale_price'], 2);?></p></td>
                                             <td><p class="op"><?php if(!empty($p['store_promotion_price'])){ ?>
                                                    $ <?=number_format($p['store_promotion_price'], 2);?>
                                                <?php } ?></p></td>
                                             <td style="text-align: center;">
                                             <a href="<?=base_url('cashier/inventoryedit?id='.$p['product_id'])?>">  <button type="button" class="btn  btn-style">Edit  
                                                </button></a>
                                             </td>
                                         </tr>
                                         <?php $i++; } }?>
                                     </tbody>
                                 </table>
                                 <!-- modal -->
                             
                             </div>

                         </div>

                     </div>
                 </div>
             </div>

         </div>
     
    </div>
</div>
<div>
    <form action="<?=base_url('cashier/inventoryadd')?>" method="POST" id="upc_form">
        <input type="hidden" name="product_json" id="barcode_json" class="form-control">
    </form>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#read_barcode').focus();
    });

     $(document).ready(function(){
        //$.noConflict();
        $('#tbl_inventory').DataTable({
            "processing": true,
            "pageLength": 250,
            "lengthMenu": [[50, 200, 500, 1000], [50, 200, 500, 1000]],
            deferRender: true
        });


        // var oTable = $('#tbl_inventory').dataTable({
        //     "processing": true,
        //     "serverSide": true,
        //     "pageLength": 10,
        //     "ajax": "<?php echo base_url().'cashier/inventorydatalist'; ?>"
        // });


        jQuery(document).on("keypress", "#read_barcode", function(e){

        if(e.which == 13) {
          //        alert('You pressed enter!');
          //    
        //}

        var barcode = $("#read_barcode").val();
        // alert(base_url);

        if(barcode!=''){


            jQuery.ajax({

            type : "POST",

            dataType : "json",

            url : base_url+"cashier/scanUPC",

            data : { barcode : barcode } 

            }).done(function(data){
                console.log(data);
                //alert(data.products[0].product_id);  //css("color:red");
                if(data.success== 'yes'){
                    if(data.products[0].status == 'update'){
                        //oTable.fnFilter(barcode);
                    }else{
                        //console.log(JSON.stringify(data));
                        $('#product_name').val(data.products[0].product_name);
                        $('#nickname').val(data.products[0].product_name);
                        $('#brand').val(JSON.stringify(data.products[0].brand));
                        $('#details').val(data.products[0].description);
                        $('#quantity').val(data.products[0].package_quantity);
                        $('#brand').val(data.products[0].brand);
                        $('#size').val(data.products[0].size);
                        $('#unit').val(data.products[0].unit);
                        $('#details').val(data.products[0].product_details);
                        $('#tilte').val(data.products[0].meta_title);
                        $('#Meta_Key').val(data.products[0].meta_key);
                        $('#Description').val(data.products[0].meta_description);

                        $('#abv').val(data.products[0].abv);
                        $('#proof').val(data.products[0].proof);
                        $('#region').val(data.products[0].region);

                        $('#supplier_price').val(data.products[0].supplier_price);
                        $('#store_sell_price').val(data.products[0].store_sell_price);
                        $('#ecommerce_sell_price').val(data.products[0].ecomm_sell_price);

                        //$('#category').val();
                        $("#category").val(data.products[0].category_id);
                        $('#producer').val(data.products[0].manufacturer);
                        $('#product-img').attr('src', data.products[0].images[0]);
                        $('#product_hidden_img').val(data.products[0].images[0]);
                        //hidden value
                        $('#barcode_formats').val(data.products[0].barcode_formats);
                        $('#case_upc').val(data.products[0].barcode_number);
                        $('#barcode_type').val(data.products[0].barcode_type);
                        $('#mpn').val(data.products[0].mpn);
                        $('#barcode_json').val(JSON.stringify(data));
                        // e.preventDefault();
                        $("#upc_form").submit();
                    }
                }else{

                swal({
                      title: "Oops!",
                      text: "Product Not Found.",
                      icon: "warning", 
                      buttons: {
                        catch: {
                          text: "Add Product",
                          value: "catch",
                        },
                        cancel: "Cancel",

                        //defeat: true,
                      },
                })
                .then((value) => {
                  switch (value) {

                    case "catch":
                      window.location.href = base_url+"cashier/inventoryadd?upc="+barcode;
                      break;

                    default:
                      //swal("Got away safely!");
                  }
                });
                }
                $("#read_barcode").val('');

            });

        }
    }

    });


    });
</script>
