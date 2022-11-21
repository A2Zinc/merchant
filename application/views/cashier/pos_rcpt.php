<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="c:\Users\91912\New folder\customer.css" />
  <link rel="stylesheet" type="text/css" href="c:\Users\91912\New folder\rc.css" />
  <!-- Bootstrap CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

  <title>Print Reciept</title>
  <style>
    body {
      max-width: 80mm;
      margin: 0 auto;
    }

    .src {
      filter: grayscale(1);
      width: 60%;
      margin: 0 auto;
    }

    .header {
      width: 100%;
      max-width: 80mm;
    }

    .stars {
      overflow: hidden;
      width: 100%;
    }

    .lines {
      width: 87%;
    }

    .right-col>p {
      text-align: right;
    }

    td:last-child {
      text-align: right;
    }

    td:nth-child(2) {
      text-align: center;
    }

    td:nth-child(3) {
      text-align: center;
    }

    .tq {
      text-align: center;
      font-weight: 600;
      font-size: 179%;
    }

    th {
      font-weight: 500;
    }

    .bold {
      font-weight: 900;
    }

    .bold-2 {
      font-weight: 600;
    }

    .bold-3 {
      font-weight: 500;
    }

    .titleText {
      font-size: 150%;
    }

    p {
      margin-bottom: 0.5em;
    }

    table {
      width: 100%;
    }

    thead>th:nth-child(1) {
      text-align: left;
    }

    th:last-child {
      text-align: right;
    }

    tr>td {
      text-align: left !important;
      height: 30px;
    }

    tr>td:last-child {
      text-align: right !important;
    }

    .quant {
      position: absolute;
    }

    @font-face {
      font-family: "Latin Mono";
      src: url("<?php print base_url() . '/assets/cashier/font/lmmonolt10-bold.otf'; ?>") format("opentype");
    }

    * {
       font-family: 'Arial Narrow'
    }

    .product {
      /*text-decoration: underline;*/
    }

    .foot-text {
      font-size: 140%;
    }

    .left-col>p {
      margin-bottom: 0;
    }

    .right-col>p {
      margin-bottom: 0;
    }

    .textcon {
      max-width: 80mm;
    }

    .img-bar {
      max-width: 80mm;
    }

    .imp {
      word-wrap: break-word !important;
    }

     .w-56 {
      width: 56%;
    }

    .p-wrapper {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
    }

    .p-wrapper2 {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
    }
  </style>
</head>

<body class="body2" onload="window.print();window.close();">
  <div class="header d-flex justify-content-center mt-5 flex-column">
    <!-- <img src="<?php print base_url() . '/assets/cashier/images/c.png'; ?>" alt="" class="src" /> -->

    <div class="textcon mx-auto d-flex flex-column">
      <!-- <div class="titleText text-center bold-2">CAMPUS LIQUOR</div> -->
      <p class="left bold-3  mt-0 mb-0  mx-auto text-wrap">
        5425 El Cajon Blvd.,


      </p>
      <p class="m-0 mx-auto">
        San Diego, CA 92115
      </p>
      <?php $order_no= $getPOSReceiptData["order_no"];?>
      <div class="subText text-center bold-3">STORE ID : 5670690</div>
      <!-- <img src="<?php print base_url() . '/assets/cashier/images/bar.svg'; ?>" class="w-50 mx-auto img-bar" /> -->
      <img src="<?php echo base_url() . '/cashier/generateBarcode_reciept?order_id=' . $order_no . ''; ?>" class=" " style="width: 95%;position:relative;left:3.5em;display:block; height: 2.5rem;" >
      <div class="stars bold">
        ************************************************************
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-between">
    <div class="wrap-address d-flex flex-column w-50">
      <p class="left bold-3">ORDER NO:</p>
      <p class="left bold-3 w-75 text-wrap">
        <!-- <?php print $getPOSReceiptData["order_no"]; ?> -->
        <?php $order_no= $getPOSReceiptData["order_no"];
        print $order_no; ?>
      </p>
    </div>
    <div class="top-wrap d-flex w-50 justify-content-end">
      <div class="wrap-address d-flex flex-column text-end">
        <p class="middle bold-3 text-nowrap">DATE & TIME:</p>
        <!-- <p class="middle w-100"><?php //print date("m/d/Y"); ?> <span id='time_set'></span></p> -->
        <p class="middle w-100"><?php print date("m/d/Y H:i:s"); ?></p>

        <!-- <p id='time_set' class="right w-100"><?php print $getPOSReceiptData["order_time"]; ?></p> -->
        <!-- <p id='time_set' class="right w-100"></p> -->
      </div>
      <!-- <div class="wrap-address d-flex flex-column">
        <p class="right bold-3">TIME:</p>
        <p class="right w-25"><?php print $getPOSReceiptData["order_time"]; ?></p>
      </div> -->
    </div>
  </div>
  <!-- <div class="d-flex justify-content-between">
    
   
   
</div> -->
  <div class="stars bold">
    *****************************************************************
  </div>
  <div class="table-con">
    <table>
      <thead>
        <!-- <th style='width: 15%;'>SL.NO</th> -->
        <th>QTY.</th>
        <!-- <th style='width: 7%;'> </th> -->
        <th class="text-left">ITEMS</th>

        <th>PRICE</th>
      </thead>
      <tbody>
        <?php
        $sub_total = 0;
        $tot_qty   = 0;
        $tot_savings=0;
        $pro_price=0;
        $price=0;
        if (count($getPOSReceiptData['order_details']) > 0) {
                 foreach ($getPOSReceiptData['order_details'] as $key => $value) {
              $promo_price=$value['store_promotion_price'];
              $onsale_price=$value['onsale_price'];
              $quantity=$value['quantity'];

              //prashant added
              $coupon_discount = $getPOSReceiptData['coupon_apply']; 
              if($value['is_combo_apply'] == 1){
                $price = $value['total_price'];
              }else{
                $price = ($onsale_price * $quantity);
              } 
        ?>
            <tr>
              <td class="quant"><?php print $quantity; ?></td>
              <td>
                  <div class="p-wrapper">
                    <!-- <p class='product m-0'><span class="bold">*</span><?php print $value['product_name']; ?> <?php //print $value['rate']; ?> -->

                    <p class='product m-0'><?php print $value['product_name']; ?>
                    <?php if((!empty($promo_price)) || ($coupon_discount > 0) || ($value['is_combo_apply'] == 1)) { ?>
                    <span class="">&nbsp;&nbsp;&nbsp;Reg </span>$<?php print $onsale_price * $quantity; ?>
                    <?php } ?>

                    </p>

                  </div>
                    
              </td>
              <td>
                  <div class="p-wrapper">
                    <p class='product m-0'><span class="bold"></span>$<?php
                                            //$pp = ($value['rate'] * $quantity) - $coupon_discount;
                                            $pp = ($value['total_price']) - $coupon_discount;
                                            print number_format($pp, 2);
                                          ?>
                        <!-- <?php if($promo_price!='0') { ?>
                        <span class="bold"></span><s>$<?php
                                            print $onsale_price;
                                            ?></s>
                        <?php } ?> -->
                         </p> 
                        </div>
                     </td>
              </tr>
              <tr></tr>
              <tr></tr>
              
      <!--          <td>
                <div class="p-wrapper2">
                  <tr>
                  <div class="product m-0">$<?php
                                            $pp = $value['rate'] * $value['quantity'];
                                            print number_format($pp, 2);
                                            ?></div>
                    </td>
                  </tr>
                  </table>-->
        <?php
          //   $tot_qty   = $tot_qty + $value['quantity'];
          //   $sub_total = $sub_total + ($value['rate'] * $value['quantity']);
          // }
            $tot_qty   = $tot_qty + $quantity;
            // $sub_total = $sub_total + ($value['rate'] * $quantity);
            // $sub_total = $sub_total + ($value['rate'] * $quantity) - $coupon_discount; //prashant   added
            // $tot_savings=$tot_savings+($onsale_price*$quantity-($value['rate'] * $quantity));

            if($value['is_combo_apply'] == 1) {
               $sub_total = $sub_total + $price - $coupon_discount;
               $tot_savings=$tot_savings+($onsale_price*$quantity-($price));
            }else{
               $sub_total = $sub_total + ($value['rate'] * $quantity) - $coupon_discount;
               $tot_savings=$tot_savings+($onsale_price*$quantity-($value['rate'] * $quantity));

            }

           }
        }
       ?>
      <br>
      
        <tr></tr>
      </tbody>
    </table>
    <p class="total-items m-0 mt-3">Total Items : <?php print $tot_qty; ?></p>
    <div class="stars lines w-100">
      ---------------------------------------------------------------------
    </div>
    <div class="total-con d-flex justify-content-between">
      <div class="left-col d-flex flex-column">
        <p>Subtotal</p>
        <p>Tax</p>
        <p>Container Deposit</p>

        <?php if($getPOSReceiptData['redeem_discount'] != '0.00') { ?>
            <p>Loyalty Discount</p>            
        <?php } ?>

        <?php if($getPOSReceiptData['discount_discount'] != '0.00') { ?>
            <p>Custom Discount</p>            
        <?php } ?>

        <?php if($getPOSReceiptData['is_cashback'] == 1) { ?>
        <p>Cashback Amount</p>
        <p>Cashback Fee</p>
        <?php } ?>

        <p>Total</p>
        <p class="mt-3 mb-3 text-nowrap" style="display: none;">Card **** **** 1523</p>
        <p class="mt-2">Cash</p>
        <p>Change</p>
      </div>
      <?php
      $grand_total = $getPOSReceiptData['due_amount'];
      ?>
      <div class="right-col d-flex flex-column text-right">
        <p>$<?php print number_format($getPOSReceiptData['due_amount'], 2); ?></p>
        <p>$<?php print $getPOSReceiptData['tax']; ?></p>
        <p>$<?php print $getPOSReceiptData['container_deposit']; ?></p>

        <?php if($getPOSReceiptData['redeem_discount'] != '0.00') { ?>
            <p>$<?php print $getPOSReceiptData['redeem_discount']; ?></p>
        <?php } ?>
        <?php if($getPOSReceiptData['discount_discount'] != '0.00') { ?>
            <p>$<?php print $getPOSReceiptData['discount_discount']; ?></p>
        <?php } ?>

        <?php if($getPOSReceiptData['is_cashback'] == 1) { ?>
        <p>$<?php print $getPOSReceiptData['cashback_amount']; ?></p>
        <p>$<?php print $getPOSReceiptData['cashback_fee']; ?></p>
        <?php
            $grand_total = $grand_total + $getPOSReceiptData['cashback_amount'] + $getPOSReceiptData['cashback_fee'];
        }

        if($getPOSReceiptData['redeem_discount'] != '0.00') {
            $grand_total = $grand_total - $getPOSReceiptData['redeem_discount'];
        }
        
        ?>

        <p>$<?php print number_format($grand_total, 2); ?></p>
        <p class="mt-3 mb-3" style="display: none;">$400.00</p>
        <p style="margin-top:.5em">$<?php
                                    $tt = $grand_total + $getPOSReceiptData['return_balance'];
                                    print number_format($tt, 2);
                                    ?></p>
        <p>$<?php print $getPOSReceiptData['return_balance']; ?></p>
      </div>
    </div>
  </div>
  <div class="stars bold">
    *****************************************************************
  </div>
  <!-- <p class="text-center foot-text">Your Total Savings on This Order</p>
  <p class="amt text-center foot-text">$0</p>
  <p class=" text-center ">You earned 0 Points</p> -->
  <!-- <p class="text-center w-75 mx-auto lh-1.5 foot-text">
    Happy New Year
  </p> -->

  <?php  if($tot_savings > 0) { ?>
  <p class="text-center foot-text">Your Total Savings on This Order</p>
  <p class="amt text-center foot-text">$<?php print number_format($tot_savings, 2);?></p>
  <?php } ?>
  <?php $footer_msg = $this->Cashier_model->get_promotion_receipt_msg();?>
    <?php foreach ($footer_msg as $mg){?>
    <p><?=$mg['receipt_promotion']?></p>
  <?php }?>
  <?php $msg = $this->Cashier_model->get_fontsize() ?>
  <p class="tq mb-0"><?php if(!empty($msg->custom_msg)){ echo $msg->custom_msg; } else{ echo 'THANK YOU !!';}?></p>
  <!-- <p class="tq mt-0 mb-3">FOR SHOPPING WITH US</p> -->

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      var d = new Date(); // for now
      d.getHours(); // => 9
      d.getMinutes(); // =>  30
      let mins;
      if (d.getMinutes() < 10) {
        mins = '0'

      } else {
        mins = ''
      }
      mins = mins + d.getMinutes();
      document.getElementById('time_set').innerHTML = d.getHours() + ":" + mins;
      console.log(d);
    });
  </script>
</body>

</html>