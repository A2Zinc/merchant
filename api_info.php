<title>plugin :</title>
<style>
table { 
 color:  #333333;
 font-family: Helvetica, Arial, sans-serif;
/* border-collapse:  collapse; border-spacing: 0; */
 /*width:100%;*/
 margin-bottom:20px; 
 font-size:16px; 
}
 
td, th { 
 border: 1px solid transparent; /* No more visible border */
 height: 30px; 
 transition: all 0.3s;  /* Simple transition for hover effect */
}
 
th {
 background: #FFFFFF;  /* Darken header a bit */
 font-weight: bold;
}
 
td {
 background: #FAFAFA;
 text-align: left;
}

/* Cells in even rows (2,4,6...) are one color */ 
tr:nth-child(even) td { background: #F1F1F1; }   

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */ 
tr:nth-child(odd) td { background: #fff; }  
 
tr td:hover { background: #666; color: #FFF; } /* Hover cell effect! */

.lbl{ width:0% !important; font-size:14px; }
.lblsmall{ width:0% !important; font-size:12px; }
.info{ width:85% !important;  }
</style>
<script language="javascript">
function showHide(tblname)
{
  var trs = document.getElementsByTagName("table");
  
  for(var i=0;i<trs.length;i++)
  {
     var tblId = trs[i].id;
     
     if(tblId!="")
     {
       document.getElementById(tblId).style.display="none";
    }  
  }
  document.getElementById(tblname).style.display="";
}

</script>
</head><body>
<?php

$api_link = "http://3.129.61.135/POS_system/project/";  

//API CAPTION TO ADD IN ARRAY //
$apiCaption[0] = "Inventory List";
$apiCaption[1] = "Product Info";
$apiCaption[2] = "Inventory Update";
$apiCaption[3] = "Product Add";
$apiCaption[4] = "Product Update";
// $apiCaption[4] = "Inventory Update";



//API URL //
$apiURL[0] = $api_link."api/V1/api2/inventorylist";
$apiURL[1] = $api_link."api/V1/api2/inventorybyid";
$apiURL[2] = $api_link."api/V1/api2/inventoryupdate";
$apiURL[3] = $api_link."api/V1/api2/insertProduct";
$apiURL[4] = $api_link."api/V1/api2/updateProduct";


//API PARMETER TO ADD IN ARRAY //
$apiParam[0] = "";
$apiParam[1] = "accesstoken=qwkrufhtjrkehtg547j&product_id=6GFJRGJ1";
$apiParam[2] = "accesstoken=qwkrufhtjrkehtg547j&product_id=6GFJRGJ1&product_qty=10";

$apiParam[3] = "accesstoken=qwkrufhtjrkehtg547j&product_hidden_img=https://images.barcodelookup.com/2973/29739239-1.jpg&case_upc=123456&supplier=PepsiCO&brand=BRISK&unit=2&size=50ml&supplier_price=12.45&product_name=Test Product&product_nickname=Test&category_id=6OKDIOOP9H86PH5&shopify_product_id=shopify12&details=test&producer=test&Meta_Title=test title&Meta_Key=test key&Meta_Desc=test desc&quantity=2&abv=5&proof=demo& region=india&store_sell_price=6.59&ecommerce_sell_price=7.56&barcode_formats=UPC 1123467890, EAN 1123467890&barcode_type=UPC&mpn=test&store_promotion_price=7.69&ecommerce_promotion_price=5.23&CRV=1&TAX=0&upc=123456&is_ecommerce=1&status=insert&product_combo[0]=Test Combo&combo_unit[0]=5&combo_price[0]=12.45";

$apiParam[4] = "accesstoken=qwkrufhtjrkehtg547j&product_id=ACRLYYBZ&shopify_product_id=shopify123&size=100 ml&supplier_price=12.12&supplier=PepsiCO
&product_name=cando it first&product_nickname=cando it new&category_id=6OKDIOOP9H86PH5
&brand_id=WPNYZ77L6J8FP2N&details=test &producer=test&Meta_Title=sdfsdf&Meta_Key=sfsdfsdfsf&Meta_Desc=dfdfdfsdfsddf&unit=4&quantity=2&abv=5&proof=proof&region=india&store_sell_price=12.15&ecommerce_sell_price=12.01&store_promotion_price=10.99&ecommerce_promotion_price=11.78&CRV=1&TAX&is_ecommerce=1&product_combo[0]=Test new&combo_unit[0]=3&combo_price[0]=12.74";



//API ACTION SUCCESS TO ADD IN ARRAY //
$apiSuccess[0] = '{"status":1,"message":"Item found","data":[{"brand_name":null,"brand_id":null,"category_id":null,"category_name":null,"id":"3548","product_id":"FPDBX5F3","store_id":null,"supplier_id":null,"supplier":null,"Unit_pack_UPC":null,"case_UPC":"1617614263613","barcode_type":null,"barcode_formats":null,"mpn":null,"manufacturer":null,"product_name":"Payal Beer","short_name":"Payal Beer","SKU":"0","Meta_Title":null,"Meta_Key":null,"Meta_Desc":null,"slug":null,"price":"0.00","supplier_price":null,"unit":null,"quantity":null,"product_model":null,"product_details":null,"image_thumb":null,"variants":null,"default_variant":null,"type":null,"best_sale":"0","onsale":"0","onsale_price":"12","ecomm_sale_price":null,"store_promotion_price":null,"ecomm_promotion_price":null,"invoice_details":null,"image_large_details":null,"review":null,"description":null,"tag":null,"specification":null,"video":null,"size":null,"proof":null,"abv":null,"region":null,"producer":null,"about_producer":null,"distributor_notes":null,"gift":null,"special":null,"Sold_out":"0","is_promotion_page":"0","status":"1","barcode_json":null,"Applicable_CRV":"0","Applicable_Tax":"0","is_ecommerce":"0","is_deleted":"0","is_custom_product":"1","bin":null,"is_scratchable":"0","scratcher_no_from":"0","scratcher_no_to":"0","created_at":"2021-04-05 09:19:47"}] <br>';

$apiSuccess[1] = '{"status":1,"message":"Item found","data":{"category_id":"4I8XHFO8B6XYX39","category_name":"Alcoholic Beverage","brand_id":"O8UHHT2JDCAVXMB","brand_name":"0","id":"3157","product_id":"6GFJRGJ1","store_id":null,"supplier_id":"Q37K8DRQDI8ISGOGND17","shopify_product_id":"6685788012703-39743577915551","supplier":"sadasd","Unit_pack_UPC":"","case_UPC":"99999","barcode_type":"","barcode_formats":"","mpn":"","manufacturer":"","product_name":"99999 Retesting","short_name":"Testing","SKU":"0","Meta_Title":"","Meta_Key":"","Meta_Desc":"","slug":"","price":"0.00","supplier_price":null,"unit":"1","quantity":"2","product_model":null,"product_details":"","image_thumb":".\/uploads\/products\/600px-No_image_available.svg (2).png","variants":null,"default_variant":null,"type":null,"best_sale":"0","onsale":"0","onsale_price":"10","ecomm_sale_price":"0","store_promotion_price":"0","ecomm_promotion_price":"0","invoice_details":null,"image_large_details":"","review":null,"description":null,"tag":null,"specification":null,"video":null,"size":"1 gallon","proof":"","abv":"","region":"","producer":"","about_producer":null,"distributor_notes":null,"gift":"0","special":"0","Sold_out":"0","is_promotion_page":"0","status":"1","barcode_json":"","Applicable_CRV":"1","Applicable_Tax":"1","is_ecommerce":"0","is_deleted":"0","is_custom_product":"0","bin":null,"is_scratchable":"0","is_from_shopify":"0","scratcher_no_from":"0","scratcher_no_to":"0","created_at":"2021-04-05 07:47:56"}}';

$apiSuccess[2] = '{"status": 1,"message": "Inventory updated successfully"}';
$apiSuccess[3] = '{"status": 1,"message": "Product has been created"}';
$apiSuccess[4] = '{"status": 1,"message": "Product has been updated"}';



  
//API ACTION FAIL TO ADD IN ARRAY //
$apiFail[0] = '{"status": 0,"message":"No Item found"}';
$apiFail[1] = '{"status": 0,"message":"No Item found"}';
$apiFail[2] = '{"status":0,"message":"No Item found"}';
$apiFail[3] = '{"status": 0,"message":"Failed to create Product"}';
$apiFail[4] = '{"status": 0,"message":"Failed to update product"}';






?>
<table style="margin:5px; text-align:left;vertical-align:top; background-color:#ebebeb;width:1524px !important ">
  <tr>
    <td colspan="2" align="center"  width="1524px;"><div style="margin:15px 15px 15px 5px;">
        <p>API Guide</p>
        <p>Link URL : <strong><?php echo $api_link; ?></strong></p>
      </div></td>
  </tr>
  <tr>
    <td align="center"  width="224px" >
    <strong>API Name</strong>
    </td>
    <td align="center"  width="1300px" >
    <strong>API INFORMATION GOES HERE</strong>
    </td>
  </tr>
  <tr>
    <td align="center"  width="224px" style="margin:20px 0px; text-align:left;vertical-align:top; background-color:#ebebeb;   "><table cellmargin="5" cellspacing="5" width="224px">
        <?php
      for($k=0;$k<count($apiCaption);$k++)
      {
      ?>
        <tr>
          <td class="lblsmall" onClick="showHide('tbl_<?php echo $k; ?>')"><img src="check.png"  width="24"  style="vertical-align:middle;"> <?php echo $apiCaption[$k]; ?></td>
        </tr>
        <?php
      }
    
    ?>
      </table></td>
    <td align="center"  width="1300px" style="margin:20px 20px 20px 20px; text-align:left;vertical-align:top; background-color:#ebebeb"><!-- ALL TABLE INFO GOES HERE START -->
      <?php 
    for($i=0;$i<count($apiCaption);$i++)
    {
    ?>
      <table border="0" cellmargin="5" cellspacing="5" id="tbl_<?php echo $i; ?>" style="display:none; " width="1300px">
        <tr>
          <th colspan="2" align="left"><a target="_blank" href="<?php echo $api_link; ?>?<?php echo $apiParam[$i];  ?>"><img src="link.png"  width="24"  style="vertical-align:middle;"></a> &nbsp; <?php echo $apiCaption[$i]; ?></th>
        </tr>
        <tr>
          <td class="lbl"  width="100px">URL</td>
          <td class="lbl"  width="1200px"><?php echo $apiURL[$i]; ?></td>
        </tr>
        <tr>
          <td class="lbl"  width="100px">Param</td>
          <td class="lbl"  width="1200px"><?php echo $apiParam[$i]; ?></td>
        </tr>
        <tr>
          <td class="lbl"  width="100px">Success</td>
          <td class="lbl"  width="1200px"><div><?php echo $apiSuccess[$i]; ?></div></td>
        </tr>
        <tr>
          <td class="lbl"  width="100px">Failed</td>
          <td class="lbl"  width="1200px"> <?php echo $apiFail[$i]; ?></td>
        </tr>
      </table>
      <?php
    }
    ?>
      <!-- ALL TABLE INFO GOES HERE END -->
      &lArr;  Click on API name to view detail. </td>
  </tr>
</table>
</body>
</html>