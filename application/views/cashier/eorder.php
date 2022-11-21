<?php
    $permission = $permission[0];
    $extra = $extra[0];
?>
 <!-- <script src="<?php echo base_url(); ?>assets/cashier/js/KeyboardPOS.js"></script> -->
 <style>
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
tr td:nth-child(6),tr th:nth-child(6) {
    display: none;
}
label.btn.btn-info {
    background: #fff !important;
    border: 0;
    color: #10707f !important;
    border: 1px solid #10707f !important;
}

label.btn.btn-info.active {
    background: #10707f !important;
    border: 0;
    color: #fff !important;
    border: 0px solid #10707f !important;
}

label.btn.btn-info {
    width: 237px;
}

.stable label input[type="radio"] {
    display: none;
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

</style>
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

        <div class="row mb-3 align-items-end">
            <div class="col-md-8">
                <h5 class="">E-Orders</h5>

            </div>
            <div class="col-md-4">

                <a style="float:right; display: block;" href="<?php echo site_url('cashier/eorder/') ?>" class="btn"> Back</a>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="customcard pt-2">

                    <div>
                        <div class="">
                            <div class="">

                              <table class="table stable">
                                 <tr>

                                   <td>

                                       <label class="btn btn-info"><input type="radio" class="searchstatus dp" name="searchByStatus" value="pending">Pending
                                       </label>
                                       <label class="btn btn-info"><input type="radio" class="searchstatus" name="searchByStatus" value="paid">Completed
                                       </label>

                                    </td>
                                   <td></td>
                                   <td class="text-right" style="width: 200px">
                                       <input class="form-control"  placeholder="Enter order no" type="text" id="searchByOrderno" name="">
                                   </td>
                                 </tr>
                               </table>

                                <table class="table table-sm cell-border" id="tbl_inventory" style="width:100%">
                                    <thead class="headsec">
                                        <tr>
                                            <th class="text-white"><input type="checkbox" class="select_all delete_checkbox" value="delete_all" /></th>
                                            <th class="text-white">Order ID</th>
                                            <th class="text-white">Date</th>
                                            <th class="text-white">Customer</th>
                                            <th class="text-white">Total</th>
                                            <th class="text-white">Payment Status</th>
                                            <th class="text-white">Items</th>
                                            <th class="text-white">Status</th>
                                            <th class="text-white">Action</th>
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


</body>
<div class="modal" tabindex="-1" id='f1S' role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Print Labels</h5>
         <div class="d-flex">
         <div class="back-button">
          <!-- <button class="bckbtn" id="bleave6" ><img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                            </button> -->
                          </div>

         <button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
         </div>

      </div>
      <div class="modal-body">
        <div class="container">
        <div class="row">
              <!-- <div class="col-md-3  ">
              <label for="" class="customcardlabel">Enter Number of Labels to Print</label> <br>
              <input type="number" name="" class=' form-control w-50'id="">
              <h6 class='mt-2 mb-0'>Select by Tag</h6>
                    <div class="sli-nav d-flex">
                      <div class="sli-chi sc1">
                        Shelf
                      </div>
                      <div class="sli-chi sc2">
                        Product
                      </div>
                    </div>
            </div> <br> -->

            </div>
          <div class="row">
          <div class="col-md-3 mt-4 ">
              <h6 class='mt-2 mb-0'>Enter Number of Labels to Print</h6>
              <input type="number"  name="" class="form-control w-100 inputfile6" id="enter_number_of_labels" value="1" required min="1">
              <span class="errors" id="num_lab_err" style="color:red; font-size:14px"></span>
              <h6 class='mt-2 mb-0'>Select by Tag</h6>
                    <div class="sli-nav d-flex">
                    <div class="sli-chi sc1">
                        Alls
                      </div>
                      <div class="sli-chi sc1">
                        Shelf
                      </div>
                      <div class="sli-chi sc2 active">
                        Product
                      </div>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-primary print_lables_pr">Print</button>
        <button type="button" class="btn btn-primary" id="bleave6">Back</button>
        <button type="button" id="close_button1" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>






    <style>
            .scrollForLabel{
            max-height: 500px;
            overflow: scroll;
        }
        /* table {
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
            border-top: 1px solid #F1F1F1 !important;
            border-bottom: 1px solid #F1F1F1 !important;
        }
        table td {
            border-left: 1px solid #F1F1F1 !important;
            border-right: 1px solid #F1F1F1 !important;
        }
        tr {
             width: 100%;
            display: table !important;
            table-layout: fixed !important;
        }
        tr:hover {
            background: #F1F1F1;
        }
        thead tr:hover {
            background: #EC4D4D;
        }
        thead th {
            position: sticky !important;
            top: 0;
            color: white;
        } */

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

        #table_inventory table>tr:hover {
            background: #F1F1F1 !important;
        }

        #table_inventory>thead>tr>th {

            color: white;
        }

        #table_inventory table>thead>tr:hover {
            background: #EC4D4D !important;
        }

        /* #tbl_inventory>tbody {
            width: 100%;
        }
        #tbl_inventory>tbody>tr>td {
            width: 5% !important;
        } */
        th.dt-center,
        td.dt-center {
            text-align: center;
        }
        /*.swal-text {
            padding: 17px;
            display: block;
            margin: 20px;
            text-align: center;
            color: #61534e;
            font-size: 19px;
            font-weight: bold;
        }*/
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#read_barcode').focus();
        });
        $(document).ready(function() {
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
                "autoWidth": true,
                "bLengthChange": false,
                "responsive": true,
                "scrollY": "400px",
                "scrollCollapse": true,
                'searching': false,
                "columnDefs": [{
                        "searchable": false,
                        "orderable": false,
                        // "targets": 0,
                        // "targets": [-1,-8]
                        "targets": [-1,-9]

                    },
                    {
                        "className": "dt-center",
                        "targets": [0, -4, -3, -2, -1]
                    }
                ],
                "initComplete": function(settings, json) {
                    // $('.dataTables_filter input').addClass('use-keyboard-input-num filterSearch');
                    // Keyboard.init('full');
                    // $('body').trigger("use-keyboard-input-num");
                },
                "order": [
                    [1, 'asc']
                ],
                'ajax': {
                       'url':'<?php echo base_url() . 'cashier/eorderlist'; ?>',
                       'data': function(data){
                          // Read values
                          var searchByStatus = $('.searchstatus:checked').val();
                          var searchByOrderno = $('#searchByOrderno').val();

                          // Append to data
                          data.searchByStatus = searchByStatus;
                          data.searchByOrderno = searchByOrderno;
                       }
                    },

            });



$('.searchstatus').click(function(){
    oTable.dataTable().fnFilter($(this).val());
    $('.searchstatus').parent().removeClass('active');
    $(this).parent().addClass('active');
  });
$('#searchByOrderno').keyup(function(){
    oTable.dataTable().fnFilter($(this).val());
  });
$('.dp').click();
$('.select_all').on('click', function() {
    if(this.checked){
      $("input[type='checkbox']").each(function(){
        this.checked = true;
      });
    }else{
      $("input[type='checkbox']").each(function(){
        this.checked = false;
      });
    }
});
});
</script>
