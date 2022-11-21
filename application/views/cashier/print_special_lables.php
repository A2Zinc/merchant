<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="pos2_1.css" media="print" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/cashier/core/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" /> -->

  <title>Print Lables</title>
  <style>
    @media print and (color) {
      * {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
      }
    }

    .first-slabel {
      height: 3cm;
      width: 5.5cm;
      box-shadow: none;
      border-radius: 0;
      /* background: red; */
    }

    .sli-con {
      display: block !important;
      width: fit-content !important;
      margin: 5px 1em !important;
    }

    .imgcon-lbl>img {
      width: auto !important;
      height: 100% !important;
      max-height: 1.5cm !important;
      object-fit: cover !important;
    }

    .h6 {
      font-size: .5rem !important;

    }

    .lppc-price.h6 {
      font-size: 1.7rem !important;
    }

    .upc-lbl {
      font-size: .6rem;
    }

    .lpc-barcode.new {
      height: 1.2rem;
      width: 90%;
      overflow: hidden;
      margin: 0 auto;
      /* margin-bottom: 10px; */
      padding-bottom: 5px;
      MARGIN-LEFT: -.19CM;
    }

    .lpc-barcode.new>img {
      width: 100%;
      height: 100%;
      padding-bottom: 3px;
      object-fit: cover;
    }

    body {
      display: flex;
      width: 100%;
      flex-wrap: wrap;
      height: fit-content;
    }
    .lpc-barcode.hor {
    transform: rotate(
90deg
 );
    /* margin: 3em 0; */
    margin: 0;
}
.text-left{
  text-align: left!important;
}
  </style>
</head>

<body onload="window.print();window.close();">
   <?php  for($i==1;$i<$num_prints;$i++){
      foreach ($getPrintLabelsData as $get_Print_labels_data) {
    $price1 = $get_Print_labels_data->store_promotion_price;
    $product_name = $get_Print_labels_data->product_name;
    $price2 = $get_Print_labels_data->onsale_price;
    $image_thumb = $get_Print_labels_data->image_thumb;
    $case_upc = $get_Print_labels_data->case_upc;


    // create barcode generator
  ?>
    <?php if ($card_id == '1') { ?>
      <div class="slicon-con" style="width: fit-content; margin: 5px 1em;">
        <div class="template" >
          <div class="w-auto px-1 py-1">
            <div class="first-slabel text-center mx-auto p-0" style="height: 3.5cm !important;">
              <div class="d-flex jc-bet">
                <div class="imgcon-lbl">
                  <img width="70%" height="70%" style="height: 75% !important;" src="<?php print base_url() . $image_thumb; ?>" alt="">
                </div>
                <div class="w-50 bg-yellow" style="height:2%;">
                  <?php if ($price1 == '0') { ?>
                    <div class="lppc-price san  bcname " style="font-size: 1.7rem;text-align: left;"> $<?php echo $price2 ?></div>
                  <?php } else { ?>
                    <div class="lppc-price san  bcname " style="font-size: 1.7rem;text-align: left;"> $<?php echo $price1 ?>
                    </div>
                  <?php } ?>
                  <?php if ($price1 != '0') {  ?>
                    <div class="lpc-price  bcname" style="font-size: 1.0rem;"> $<?php echo $price2 ?>
                    </div>
                  <?php    } ?>

                </div>
              </div>
              <div class="mx-auto spl-text mt-1" style="font-weight: bold;color: darkred;font-size: 16px;"><?php echo $special_txt;?></div>

              <div class="prodname mt-1 mx-auto mb-1" style="font-size:.6rem !important;"><?php echo $product_name; ?></div>

            </div>
          </div>
        </div>
      </div>
    <?php } elseif ($card_id == '2') { ?>

      <div class="slicon-con" style="width: fit-content; margin: 5px 1em;">
        <div class="template" id='bp2'>
          <div class="w-auto px-1 py-1">
            <div class="first-slabel secT text-center mx-auto " style="width: 3cm;height: 6.5cm;    padding: 0;
    overflow: visible;
    display: flex;
    flex-direction: column;
    justify-content: space-between;">
              <div class="prodname h6 mx-auto"><?php echo $product_name; ?></div>
              <div class="lpc-barcode hor position-relative"><img src="<?php echo base_url() . '/cashier/cashier/generateBarcode?case_upc=' . $case_upc . '&product_name=' . $product_name . '&price2=' . $price2 . ''; ?>" alt="" class="barimg" style="    width: 6.2rem;
    height: 4.5rem;">
                <!--                            <img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" width="100px"; height="100px";  alt="" class="barimg">-->
                <div class="bar-no " style="font-size: small;"><?php echo $get_Print_labels_data->case_upc; ?></div>
              </div></br>
              <?php if ($price1 != '0') {   ?>
                <div class="lpc-price h6 bcname" style="display: block;
    height: auto;     font-size: large!important;">$<?php echo $price2 ?></div>
              <?php } ?>
              <?php if ($price1 == '0') { ?>
                <div class="lppc-price h6 bcname" style="display: block; height: auto; font-size: large!important;">$ <?php echo $price2 ?></div>
              <?php } else {  ?>
                <div class="lppc-price h6 bcname" style="display: block; height: auto; font-size: large!important;">$ <?php echo $price1 ?></div>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    <?php } elseif ($card_id == '3') { ?>
      <div class="slicon-con" style="width: fit-content; margin: 5px 1em;">
        <div class="template" id='bp3'>
          <div class="w-auto px-1 py-1">
            <div class="first-slabel text-center mx-auto p-0 ">
              <div class="">
                <div class="w-100 text-center mx-auto">
                  <?php if ($price1 == '0') { ?>
                    <div class="lppc-price h-auto h6 amg bcname text-center">
                      $ <?php echo $price2 ?> <sub>+TAX/CRV</sub>
                    </div>
                  <?php } else { ?>
                    <div class="lppc-price h-auto h6 amg bcname text-center">
                      $ <?php echo $price1 ?> <sub>+TAX/CRV</sub>
                    </div>
                  <?php } ?>
                  <?php if ($price1 != '0') {   ?>
                    <div class="lpc-price h6 bcname">$ <?php echo $price2 ?></div>

              <?php } ?>
              </div>
              </div>
              <div class="prodname h6 mt-3 mx-auto mb-2"><?php echo $product_name; ?></div>
              <div class="text-left w-100 color-red bold text-bold upc-lbl black">&nbsp;&nbsp;&nbsp;UPC#&emsp;<?php echo $get_Print_labels_data->case_upc; ?></div>
              <div class="lpc-barcode new text-left  position-relative"><img src="<?php echo base_url() . '/cashier/cashier/generateBarcode?case_upc=' . $case_upc . '&product_name=' . $product_name . '&price2=' . $price2 . ''; ?>" alt="" class="barimg">
                <!-- <div class="bar-no position-absolute">012000046445</div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
   <?php }  }?>
  <!-- </div>
                        </div>
                      </div>
                    </div>
</div>
 -->

  <!-- <div class="d-flex justify-content-between">

<?php //}
?>

</div> -->
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->

</body>
