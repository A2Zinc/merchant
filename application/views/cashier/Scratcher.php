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
                    <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" class="mobileimg"></a>
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
                <h5 class="">Scratcher Management</h5>

                <a href="<?=base_url('cashier/Cashier/add_Scratcher')?>"><button type="button" class="btn btn-success">Add Scratcher</button></a>
<!--                <a href="<?=base_url('cashier/Cashier/listLotteries')?>"><button type="button" class="btn btn-success">List Lotteries</button></a>-->
                <br><br>

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
                                <table class="table table-sm cell-border" id="tbl_Scratchier" style="width:100%">
                                    <thead class="headsec">
                                        <tr>
                                          <th class="text-white"></th>
                                         <th class="text-white" id="lottery_name">Game Name</th>
                                            <th class="text-white">Price</th>
                                            <th class="text-white">UPC</th>
                                            <th class="text-white">Bin</th>
                                            <th class="text-white">Expiry</th>
                                             <th class="text-white">Payout Prize</th>
                                            <th class="text-white">Edit</th>
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
        <form action="<?= base_url('cashier/lotteryadd') ?>" method="POST" id="upc_form">
            <input type="hidden" name="product_json" id="barcode_json" class="form-control">
        </form>
    </div>

    <style>
       .product-select {
            background-color: #cfd4da;
        }

        #table_inventory {

            margin: 0 auto;
            width: 100%;
            clear: both;
            border-collapse: collapse;
            table-layout: fixed;
            word-wrap: break-word;
        }

        table tr {
            border-left: 1px solid #F1F1F1;
            border-right: 1px solid #F1F1F1;
            border-top: 1px solid #F1F1F1;
            border-bottom: 1px solid #F1F1F1;
        }

        #table_lottery table>tr:hover {
            background: #F1F1F1 !important;
        }

        #table_lottery>thead>tr>th {

            color: white;
        }

        #table_lottery table>thead>tr:hover {
            background: #EC4D4D !important;
        }

        th.dt-center,
        td.dt-center {
            text-align: center;
        }
        </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#read_barcode').focus();
        });
        $(document).ready(function() {
          //  alert("dasd"); exit;
            var oTable = $('#tbl_Scratchier').dataTable({
               "processing": true,
                "serverSide": true,
                "pageLength": 10,
                "autoWidth": true,
                "bLengthChange": false,
                "responsive": true,
                "scrollY": "400px",
                "scrollCollapse": true,
                "columnDefs": [{
                        "searchable": true,
                        "orderable": false,
                        "targets": [-0, 6],
                    },
                    {
                        "width": "5%",
                        "targets": 0
                    },
                    {
                        "width": "10%",
                        "targets": 5
                    }, {
                        "className": "dt-center",
                        "targets": [0, -5, -4, -3, -2, -1]
                    }
                ],


                "order": [
                    [1, 'asc']
                ],
                "ajax": "<?php echo base_url() . 'cashier/Cashier/scratcherdatalist'; ?>",

            });

            jQuery(document).on("focus", "#read_barcode", function(e) {
                $('#tbl_Scratchier_filter input').val('');
                oTable.fnFilter('');
            });


            jQuery(document).on("keypress", "#read_barcode", function(e) {

                if (e.which == 13) {
                    //        alert('You pressed enter!');
                    //
                    //}

                    var barcode = $("#read_barcode").val();
                    // alert(base_url);

                    if (barcode != '') {


                        jQuery.ajax({

                            type: "POST",

                            dataType: "json",

                            url: base_url + "cashier/scanUPC",

                            data: {
                                barcode: barcode
                            }

                        }).done(function(data) {
                            console.log(data);
                            //alert(data.products[0].product_id);  //css("color:red");
                            if (data.success == 'yes') {
                                if (data.products[0].status == 'update') {
                                    oTable.fnFilter(barcode);
                                    $('#read_barcode').focusout();
                                } else {
                                    console.log(JSON.stringify(data));
//                                    $('#created_at').val(data.products[0].created_at);
//                                    $('#employee_id').val(data.products[0].employee_id);
                                     $('#id').val(data.products[0].id);
                                    $('#game_name').val(data.products[0].game_name);
                                    $('#price').val(JSON.stringify(data.products[0].price));
                                    $('#upc').val(data.products[0].price);
                                     $('#bin_data').val(data.products[0].bin_data);
                                    $('#expiry').val(data.products[0].expiry);
                                     $('#payout_price').val(data.products[0].payout_price);
                                    $('#id').val(data.products[0].id);
                                    //hidden value
//                                    $('#barcode_formats').val(data.products[0].barcode_formats);
//                                    $('#case_upc').val(data.products[0].barcode_number);
//                                    $('#barcode_type').val(data.products[0].barcode_type);
//                                    $('#mpn').val(data.products[0].mpn);
//                                    $('#barcode_json').val(JSON.stringify(data));
                                    // e.preventDefault();
                                    $("#upc_form").submit();
                                }
                            }
//                            else {
//
//                                swal({
//                                        title: "Oops!",
//                                        text: "Product Not Found.",
//                                        icon: "warning",
//                                        buttons: {
//                                            catch: {
//                                                text: "Add Product",
//                                                value: "catch",
//                                            },
//                                            cancel: "Cancel",
//
//                                            //defeat: true,
//                                        },
//                                    })
//                                    .then((value) => {
//                                        switch (value) {
//
//                                            case "catch":
//                                                window.location.href = base_url + "cashier/inventoryadd?upc=" + barcode;
//                                                break;
//
//                                            default:
//                                                //swal("Got away safely!");
//                                        }
//                                    });
//                            }
                            $("#read_barcode").val('');
                            $('#tbl_Scratchier_filter input').focus();

                        });

                    }
                }

            });


        });
</script>
<script type="text/javascript">
        $('.delete_checkbox').click(function() {
            if ($(this).is(':checked')) {
                $(this).closest('tr').addClass('removeRow');
            } else {
                $(this).closest('tr').removeClass('removeRow');
            }
        });

        $('#delete_all2').click(function() {
            var checkbox = $('.delete_checkbox:checked');
            if (checkbox.length > 0) {
                var checkbox_value = [];
                $(checkbox).each(function() {
                    checkbox_value.push($(this).val());
                });

                if (checkbox.length > 1) {
                    var msg = 'these Lotteries';
                } else {
                var msg = 'this Scratcher';
                }

                swal({
                    text: "Are you sure you want to delete "+msg+"?",
                    buttons: ["Cancel", true],
                    dangerMode: true,
                    //className: "swal-title"
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "<?php echo base_url(); ?>cashier/Cashier/delete_scratcher",
                            method: "POST",
                            data: {
                                checkbox_value: checkbox_value
                            },
                            success: function() {
                                $('.removeRow').fadeOut(1500);
                                location.reload();
                            }
                        })
                    }else{
                        $('.delete_checkbox').prop('checked', false);
                    }

                });

            } else {
                swal({
                    title: "Oops!",
                    text: "Select atleast one Supplier",
                    icon: "error",
                    buttons: false,
                });
            }
        });

        $('#refresh').click(function() {
            $('.delete_checkbox').prop('checked', false); // Unchecks it
        });

$(document).ready(function () {
   $('#tbl_lottery').DataTable();
  // $('#example tr td:last-child').each(function () {
    $('#tbl_lottery').on('click', '#btnAdd', function () {
    // alert("dasd"); exit;
        var lottery_cat_id =  $(this).closest("tr").find("td:eq(1)").text();
        var lottery_price =  $(this).closest("tr").find("td:eq(2)").text();
        //  alert(lottery_price);exit;
        $(".modal .modal-title1").html(lottery_cat_id);
        $('#lottery_id_add').modal('show');
         $('#btnLottery').click(function() {
             var lottery_unique_id=$('#lottery_unique_id').val();
            if (lottery_unique_id == '') {
            $("#lottery_id_err").html("Please Enter Lottery Id").show();
            return false;
            }
          $.ajax({
         type: 'ajax',
         method: 'post',
         url : '<?=base_url("cashier/Cashier/add_lottery_id")?>',
         data : {lottery_cat_id : lottery_cat_id, lottery_unique_id : lottery_unique_id,lottery_price:lottery_price},
         dataType : 'json',
         success: function(data) {
                           if(data == 'success'){
                                swal({
                                  title: "Success!",
                                  text: "Lottery Number Successfully Inserted",
                                  icon: "success",
                                  buttons: false,
                                });
                            }
                            setTimeout(function() {
                                window.location = '<?= base_url('cashier/Cashier/Lotterylist') ?>';
                            }, 1600);
                        },

                    });
                    return false;
           });
         });
        //$('.text-center').text(name);
    });
</script>

<div class="modal clock-in-out" id="lottery_id_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle cashcenter" id="exampleModalLongTitle">Add Lottery Number</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
      </div>
      <form action="" method="post" class="emp-login">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel">Lottery Name:  <p class="modal-title1"></p></label>

<!--                  <span class="errors" id="pwd_err" style="color:red; font-size:14px"></span>-->
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel">Lottery Number: *</label> </label>
                  <input type="tel" name="lottery_unique_id"  id="lottery_unique_id" class="form-control customcardinput modal-title inputFile8" id="empID" aria-describedby="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="15">
                  <span class="errors" id="lottery_id_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
            <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>
            <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnLottery">Submit</button>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>
