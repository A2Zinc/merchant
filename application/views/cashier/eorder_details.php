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

.table td, .table th {
    text-transform: capitalize;
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
.signback1 {
 overflow-y: scroll !important;
}
.table{
    /* border:1px solid#bdc3c7; */
    border-collapse:collapse;
    overflow-y: scroll;
    margin-left:60px;
    margin-right:50px;
    width:90%;
}
.table td, .table th{
    text-align:center;
}
th{
    color:#fff;
    background:#999b9a;
    font-size:19px;
}
td{
    font-size:18px;
}
.left{
    margin-top:50px;
    margin-left:100px;
    font-size:20px;
}
.right{
    /* margin-top:50px; */
    margin-left:100px;
    font-size:20px;
}
.total{
    font-size:20px;
}

.backbtn{
    position: relative;
}

 .dropbtn {
  background-color: #3498DB;
  color: #fff!important;
  padding: 7px 15px;
  font-size: 16px;
  border: none;
  border-radius:7px;
}
select {
  width: 150px;
  border: 1px solid #000;
  border-radius: 0.25em;
  padding: 8px 10px;
  font-size: 1.10rem;
  cursor: pointer;
  line-height: 1.1;
  background-color: #fff;
}
pre{
    font-family: "Circular Std Book"!important;
}
.box-sizing{
    box-sizing: border-box;
     width: 250px;
      height: 50px;
      padding: 12px;

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
                <div class=" backbtn">
                        <button class="bckbtn btn-backWrapper newredwrap reportbackbtn" onclick="goBack();" >
                        <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="" >
                    </button>
                </div>
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
                <!-- <a style="float:right; display: block;" href="<?php echo site_url('cashier/root_eorder/') ?>" class="btn"> Back</a> -->

            </div>
        </div>

        <div class="row customcard " style="margin-left:50px;margin-right:50px">
            <div class="pt-5 col-md-6" >
                <div class="">
                         <div class="">
                            <?php //echo "<pre>"; print_r($eorder); ?>
                                <?php if(isset($eorder->shipping_station_details->labelData)){ ?>
                                <a href="?print=1" target="_blank">Print Shipping Label</a>
                                <?php } else { ?>
                                <form action="#" method="post">
                                        <input type="hidden" name="eorder_id" value="<?php echo $eorder->id ?>">
                                        <input type="hidden" name="order_id" value="<?php echo $order_details->order_id ?>">
                                        <select name="actions" id="actions_2">
                                        <option value=""  selected>...</option>
                                        <option value="fullfillment">Fullfillment(FedEx)</option>
                                        </select>
                                    <input type="submit" name="fullfillment" value="Fullfill" class=" dropbtn"style="padding:11px 15px;margin:0px 30px;" name="">
                                </form>
                                <?php } ?>
                         </div>
                 </div>
            </div>
            <div class="pt-5 col-md-6" >
                <div class="float-right">
                    <div class=" text-center">
                        <form action="#" method="post">
                            <input type="hidden" name="eorder_id" value="<?php echo $eorder->id ?>">
                                        <input type="hidden" name="order_id" value="<?php echo $order_details->order_id ?>">
                            <select name="status"  id="actions">

                            <?php
                                $all_status=['Prooccessing','fullfillment','completed'];
                                foreach ($all_status as $key => $value) { ?>
                                    <option <?php echo $value==$order_details->e_order_status?"selected":"" ?> value="<?php echo $value ?>"><?php echo strtoupper($value) ?></option>
                                <?php }
                            ?>

                            </select>
                            <input type="submit" name="status_button" value="Submit" class=" dropbtn"style="padding:11px 15px;margin:0px 30px;" name="">
                        </form>
                        </div>
                    </div>
                </div>



        </div>
        <div class="row customcard " style="margin-left:50px;margin-right:50px;">
            <div class="col-md-12 mt-3" style="text-align: center;">
                <h4 class=" customcard">Order Id #<?php echo $order_details->order_id ?></h4>
            </div>
            <div class="col-md-6">
                <div class="pt-2 left">
                    <pre><b>Date   </b>:    <?php echo $order_details->date ?>  </pre>
                    <pre><b>Order Id   </b>:      <?php echo $order_details->order_id ?></pre>
                    <pre><b>E-Order Id </b>:      <?php echo $eorder->id ?></pre>
                    <pre><b>Payment Status     </b>:      <?php echo $eorder->financial_status ?></p></pre>
                    <pre><b>Order Status     </b>:<?php echo $order_details->e_order_status    ?></p></pre>
                </div>
             </div>


            <div class="col-md-6" style="margin-bottom: 10px;">
                <div class=" right ml-5">
                    <h5 class="mb-4 mt-3 ml-2">Customer Details</h5>
                    <?php if(isset($eorder->customer->default_address) && !empty($eorder->customer->default_address)){
                        //print_r($eorder->customer->default_address);
                     ?>
                    <pre><b> Customer Id </b>:      <?php echo $eorder->customer->default_address->customer_id ?> </pre>
                    <pre><b> Name       </b> :      <?php echo $eorder->customer->default_address->first_name ?> </pre>
                    <pre><b> Address    </b> :      <?php echo $eorder->customer->default_address->address1 ?>, <?php echo $eorder->customer->default_address->zip ?></pre>
                    <pre><b> Phone      </b> :      <?php echo $eorder->customer->default_address->phone ?> </pre>
                    <pre><b> Country    </b> :      <?php echo $eorder->customer->default_address->country_name ?> </pre>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php //echo json_encode($eorder); ?>
        <div class="row customcard " style="margin-left:50px;margin-right:50px;" >
            <div class="col-md-12 pt-2 ">
                <h5 class="text-center pt-3 ">Order Details</h5>
                     <form method="post">
                     <table class="table table-bordered" >
                        <tr >
                            <th ></th>
                            <th >Title</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                       <?php $i=0; foreach ($eorder->line_items as $key => $value) { ?>

                                    <tr>
                                        <td>
                                            <input type="checkbox" class="qchange" name="item_ids[<?php echo $i ?>][id]" value="<?php echo $value->id ?>">
                                            <select style="width:30px"  name="item_ids[<?php echo $i ?>][qty]" value="<?php echo $value->fulfillable_quantity ?>">
                                                <option value="">Select Quantity</option>
                                                <?php for($j=1; $j <= $value->fulfillable_quantity; $j++) { ?>
                                                    <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                                <?php } ?>
                                            </select>

                                        </td>
                                        <td><?php echo $value->title ?></td>
                                        <td><?php echo "$".$value->price ?></td>
                                        <td><?php echo $value->quantity ?></td>
                                        <td><?php echo "$".$value->quantity*$value->price ?></td>
                                    </tr>
                                    <?php $i++; } ?>
                        </tr>
                     </table>
                     <input type="hidden" name="status"  id="actions" value="refund">
                     <input type="hidden" name="eorder_id" value="<?php echo $eorder->id ?>">
                     <input type="hidden" name="order_id" value="<?php echo $order_details->order_id ?>">
                     <div class="col-md-6" >
                         <input type="submit" name="status_button" value="Refund" class=" refundbutton dropbtn"style="padding:11px 15px;margin:0px 30px;" name="">
                     </div>

                     </form>
             </div>
             <div class="col-md-12">
                <div class=" pt-1 ">
                     <div class="total">
                        <div class="pl-4 pr-5 text-center" style="float:right;width:500px;margin-left:40px;">
                            <pre><b> Sub Total </b>:      <?php echo "$".$eorder->current_subtotal_price ?> </pre>
                            <pre><b> Tax       </b>:      <?php echo "$".$eorder->current_total_tax ?></pre>
                            <pre style="padding: 12px; background:#ccc;width:300px;margin-left:70px;"><b> Total    </b> :      <?php echo "$".$eorder->current_total_price ?> </pre>
                        </div>
                    </div>
                </div>
            </div>


              <script>

                  function goBack(){
                    window.location.href='<?php echo site_url("cashier/root_eorder") ?>';
                  }
                  $(document).ready(function(){
                        $('.refundbutton').hide();
                        $('.qchange').click(function(){
                             f=0;

                            $('.qchange').each(function(){
                                var pro=$(this).val();
                                if(this.checked){
                                    f=1;
                                }
                            })
                            if(f==1){
                                $('.refundbutton').show();
                            } else{
                               $('.refundbutton').hide();
                            }
                        })


                  })
                  </script>


        </div>
    </div>

</body>
