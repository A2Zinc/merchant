<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Add new customer start -->
 <div class=" container-fluid mt20">
        <div class="row ">
          <div class="col-md-12 ">
            <div class="customcard">
              <div >
                <div class="usercardheader">
                    <p>Receipt Settings <span class="text-secondary">(Manage website receipt setting)</span></p>
                   
               </div>
           </div>
       </div>
   </div>
</div>

    

    <section class="content">
        <!-- Alert Message -->
        <?php
            $message = $this->session->userdata('message');
            if (isset($message)) {
        ?>
       
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message ?>                    
        </div>
        <?php 
            $this->session->unset_userdata('message');
            }
            $error_message = $this->session->userdata('error_message');
            if (isset($error_message)) {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $error_message ?>                    
        </div>
        <?php 
            $this->session->unset_userdata('error_message');
            }
        ?>

        <!-- New customer -->
        <div class="customcardbody" style="height:100%">
            <div class="col-sm-32">
                <div class="panel panel-bd lobidrag">
                   
                  <?php echo form_open_multipart('Crcpt_setting/update_setting', array('class' => 'form-vertical','id' => 'validate'))?>
                    <div class="panel-body">
                        <div class="header d-flex justify-content-center mt-5 flex-column">
    <img src="<?php print base_url() . '/assets/cashier/images/c.png'; ?>" alt="" class="src" />

    <div class="textcon mx-auto d-flex flex-column">
      <!-- <div class="titleText text-center bold-2">CAMPUS LIQUOR</div> -->
      <div class="subText text-center bold-3">STORE ID 5670690</div>
      <img src="<?php print base_url() . '/assets/cashier/images/bar.svg'; ?>" class="w-50 mx-auto img-bar" />
      <div class="stars bold">
        *******************************************************************************
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-between">
    <div class="wrap-address d-flex flex-column w-100">
      <p class="left bold-3">ADDRESS:</p>
      <p class="left bold-3 w-75 text-wrap">88,House Street,California
        <?php print $getPOSReceiptData["customer_address"]; ?>
      </p>
    </div>
    <div class="top-wrap d-flex w-50 justify-content-between">
      <div class="wrap-address d-flex flex-column text-center">
        <p class="middle bold-3 text-nowrap">DATE & TIME:</p>
        <p class="middle w-100"><?php print date("m/d/Y"); ?></p>
        <!-- <p id='time_set' class="right w-100"><?php print $getPOSReceiptData["order_time"]; ?></p> -->
        <p id='time_set' class="right w-100"></p>
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
  <div class="d-flex justify-content-between">
    <p class="left bold-3">CUSTOMER Name:</p>
    <p class="middle bold-3">ORDER NO.</p>
    <!-- <p class="right bold-3">RECEIPT NO.</p> -->
  </div>
  <div class="d-flex justify-content-between">
    <p class="left w-25 text-wrap"><?php print $getPOSReceiptData["customer_name"]; ?>Super Admin</p>
    <p class="middle text-center text-wrap imp"><?php echo $getPOSReceiptData["order_no"]; ?>12356</p>
    <!-- <p class="right w-25 text-wrap imp"><?php echo $getPOSReceiptData["order_no"]; ?></p> -->
  </div>
  <div class="stars bold">
    *****************************************************************
  </div>
  <div class="table-con">
    <table>
      <thead>
        <!-- <th style='width: 15%;'>SL.NO</th> -->
        <th>QUANT.</th>
        <!-- <th style='width: 7%;'> </th> -->
        <th class="text-left">ITEMS</th>

        <th>PRICE</th>
      </thead>
      <tbody>
       
              
        <tr><td>2</td><td>Alcohol</td><td>$50</td></tr>
        <tr><td>10</td><td>Beer</td><td>$100</td></tr>
      </tbody>
    </table>
    <p class="total-items m-0 mt-3">Total Items : 12</p>
    <div class="stars lines w-100">
      -----------------------------------
    </div>
    <div class="total-con d-flex justify-content-between">
      <div class="left-col d-flex flex-column">
        <p>Subtotal</p>
        <p>Tax</p>
        <p>Container Deposit</p>
        <p>Total</p>
        <p class="mt-3 mb-3 text-nowrap" style="display: none;">Card **** **** 1523</p>
        <p class="mt-2">Cash</p>
        <p>Change</p>
      </div>
      <?php
      $grand_total = $sub_total + $getPOSReceiptData['tax'] + $getPOSReceiptData['container_deposit'];
      ?>
      <div class="right-col d-flex flex-column text-right">
       <!--  <p>$<?php print number_format($sub_total, 2); ?>150</p>
        <p>$<?php print $getPOSReceiptData['tax']; ?>0</p>
        <p>$<?php print $getPOSReceiptData['container_deposit']; ?>0</p>
        <p>$<?php print number_format($grand_total, 2); ?>150</p>
        <p class="mt-3 mb-3" style="display: none;">$400.00</p>
        <p style="margin-top:.5em">$<?php
                                    $tt = $grand_total + $getPOSReceiptData['return_balance'];
                                    print number_format($tt, 2);
                                    ?>150</p>
        <p>$<?php print $getPOSReceiptData['return_balance']; ?></p> -->
        <div>$150</div>
        <div>$0</div>
        <div>$150</div>
        <div>$200</div>
        <div>$50</div>
      </div>
    </div>
  </div>
  <div class="stars bold">
    *****************************************************************
  </div>
  <p class="text-center foot-text">Your Total Savings on This Order</p>
  <p class="amt text-center foot-text">$0</p>
  <p class=" text-center ">You earned 15 Points</p>
  <p class="text-center w-75 mx-auto lh-1.5 foot-text">
    Happy New Year
  </p>
  <p class="tq mb-0">THANK YOU !!</p>
  <p class="tq mt-0 mb-3">FOR SHOPPING WITH US</p>

  

                      </div>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- receipt setting end -->
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
 <script type="text/javascript">
        function isNumberKey(txt, evt) {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode == 46) {
            //Check if the text already contains the . character
            if (txt.value.indexOf('.') === -1) {
              return true;
            } else {
              return false;
            }
          } else {
            if (charCode > 31 &&
              (charCode < 48 || charCode > 57))
              return false;
          }
          return true;
        }
</script>

 <style>
   
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
    }

    tr>td:last-child {
      text-align: right !important;
    }

    .quant {
      position: absolute;
    }

    
    .product {
      text-decoration: underline;
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
  </style>
