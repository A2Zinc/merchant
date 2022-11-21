
<body class="signback1">


<div class="containermain2">
<div class="row m">
            <!-- <div class="col-md-8  col-xs-4 col-sm-6"> -->
            <div class="logobar ">
              <?php if(file_exists(base_url().$this->session->sitelogo) === 1){ ?>
                <img src="<?php echo base_url().$this->session->sitelogo; ?>" class="dem sitelogo">
              <?php }else{?>
                <img src="<?php echo base_url('assets/images/Liquor-011.png'); ?>" class="dem sitelogo">
              <?php }?>
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
                                        <tr>
                                            <th>Images</th>
                                            <th>Product Name</th>
                                            <th>UPC</th>
                                            <th>Supplier</th>
                                            <th>Supplier Price</th>
                                            <th>Retail Price</th>
                                            <th>Promotion</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
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
        // $('#tbl_inventory').DataTable({
        //     "processing": true,
        //     "pageLength": 250,
        //     "lengthMenu": [[50, 200, 500, 1000], [50, 200, 500, 1000]],
        //     deferRender: true
        // });


        var oTable = $('#tbl_inventory').dataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "bLengthChange" : false,
            "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": [-1,-6,-8],
            } ],
            "order": [[ 1, 'asc' ]],
            "ajax": "<?php echo base_url().'cashier/inventorydatalist'; ?>",

        });

        jQuery(document).on("focus", "#read_barcode", function(e){
            $('#tbl_inventory_filter input').val('');
            oTable.fnFilter('');
        });


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
                        oTable.fnFilter(barcode);
                        $('#read_barcode').focusout();
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
                $('#tbl_inventory_filter input').focus();

            });

        }
    }

    });


    });
</script>
