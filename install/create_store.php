<?php
    $fileName = "create_store";    
    include_once 'includes/header.php';    

    $action = ((isset($_GET['action']) && $_GET['action'] == "summary")?"summary":"create_store");    
    
    $merchant_id = ((isset($_SESSION['merchant_id']) && $_SESSION['merchant_id'] != "")?$_SESSION['merchant_id']:"");
    $license_key = ((isset($_SESSION['license_key']) && $_SESSION['license_key'] != "")?$_SESSION['license_key']:"");

    // Store Information
    $store_id = ((isset($_SESSION["store_session_data"]["store_information"]['store_id']) && $_SESSION["store_session_data"]["store_information"]['store_id'] != "")?$_SESSION["store_session_data"]["store_information"]['store_id']:"0");

    $store_name = ((isset($_SESSION["store_session_data"]["store_information"]['store_name']) && $_SESSION["store_session_data"]["store_information"]['store_name'] != "")?$_SESSION["store_session_data"]["store_information"]['store_name']:"");
    
    $store_address_1 = ((isset($_SESSION["store_session_data"]["store_information"]['store_address_1']) && $_SESSION["store_session_data"]["store_information"]['store_address_1'] != "")?$_SESSION["store_session_data"]["store_information"]['store_address_1']:"");
    
    $store_suite = ((isset($_SESSION["store_session_data"]["store_information"]['store_suite']) && $_SESSION["store_session_data"]["store_information"]['store_suite'] != "")?$_SESSION["store_session_data"]["store_information"]['store_suite']:"");
    
    $city = ((isset($_SESSION["store_session_data"]["store_information"]['city']) && $_SESSION["store_session_data"]["store_information"]['city'] != "")?$_SESSION["store_session_data"]["store_information"]['city']:"");
    
    $state = ((isset($_SESSION["store_session_data"]["store_information"]['state']) && $_SESSION["store_session_data"]["store_information"]['state'] != "")?$_SESSION["store_session_data"]["store_information"]['state']:"");
    
    $zipcode = ((isset($_SESSION["store_session_data"]["store_information"]['zipcode']) && $_SESSION["store_session_data"]["store_information"]['zipcode'] != "")?$_SESSION["store_session_data"]["store_information"]['zipcode']:"");
    
    $store_country = ((isset($_SESSION["store_session_data"]["store_information"]['store_country']) && $_SESSION["store_session_data"]["store_information"]['store_country'] != "")?$_SESSION["store_session_data"]["store_information"]['store_country']:"");
    
    $store_contact = ((isset($_SESSION["store_session_data"]["store_information"]['store_contact']) && $_SESSION["store_session_data"]["store_information"]['store_contact'] != "")?$_SESSION["store_session_data"]["store_information"]['store_contact']:"");
    
    $store_email = ((isset($_SESSION["store_session_data"]["store_information"]['store_email']) && $_SESSION["store_session_data"]["store_information"]['store_email'] != "")?$_SESSION["store_session_data"]["store_information"]['store_email']:"");

    // Tax Settings
    $tax_setting_others = ((isset($_SESSION["store_session_data"]["tax_information"]['tax_setting_others']) && $_SESSION["store_session_data"]["tax_information"]['tax_setting_others'] != "")?$_SESSION["store_session_data"]["tax_information"]['tax_setting_others']:"");

    // Card Processor Settings Data
    $card_transaction_api_url = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_api_url']) && $_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_api_url'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_api_url']:"");

    $card_transaction_uat_api_url = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_uat_api_url']) && $_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_uat_api_url'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_uat_api_url']:"");

    $card_transaction_api_key = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_api_key']) && $_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_api_key'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_api_key']:"");

    $card_transaction_auth_key = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_auth_key']) && $_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_auth_key'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_auth_key']:"");

    $card_transaction_merchant_id = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_merchant_id']) && $_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_merchant_id'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_merchant_id']:"");

    $card_transaction_assoc_merchant_id = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_assoc_merchant_id']) && $_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_assoc_merchant_id'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_assoc_merchant_id']:"");

    $card_transaction_terminal_hsn_no = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_terminal_hsn_no']) && $_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_terminal_hsn_no'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_terminal_hsn_no']:"");

    $card_transaction_username = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_username']) && $_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_username'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_username']:"");

    $card_transaction_password = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_password']) && $_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_password'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['card_transaction_password']:"");

    $CLOVER_APP_SECRET = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['CLOVER_APP_SECRET']) && $_SESSION["store_session_data"]["card_processor_settings"]['CLOVER_APP_SECRET'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['CLOVER_APP_SECRET']:"");

    $CLOVER_APP_ID = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['CLOVER_APP_ID']) && $_SESSION["store_session_data"]["card_processor_settings"]['CLOVER_APP_ID'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['CLOVER_APP_ID']:"");

    $CLOVER_ACCESS_TOKEN = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['CLOVER_ACCESS_TOKEN']) && $_SESSION["store_session_data"]["card_processor_settings"]['CLOVER_ACCESS_TOKEN'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['CLOVER_ACCESS_TOKEN']:"");

    $CLOVER_MERCHANT_ID = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['CLOVER_MERCHANT_ID']) && $_SESSION["store_session_data"]["card_processor_settings"]['CLOVER_MERCHANT_ID'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['CLOVER_MERCHANT_ID']:"");

    $active_transaction_type = ((isset($_SESSION["store_session_data"]["card_processor_settings"]['active_transaction_type']) && $_SESSION["store_session_data"]["card_processor_settings"]['active_transaction_type'] != "")?$_SESSION["store_session_data"]["card_processor_settings"]['active_transaction_type']:"");

    // Cash Register Information Data
    $start_cash = ((isset($_SESSION["store_session_data"]["cash_register_information"]['start_cash']) && $_SESSION["store_session_data"]["cash_register_information"]['start_cash'] != "")?$_SESSION["store_session_data"]["cash_register_information"]['start_cash']:"");
    $cash_register = ((isset($_SESSION["store_session_data"]["cash_register_information"]['cash_register']) && $_SESSION["store_session_data"]["cash_register_information"]['cash_register'] != "")?$_SESSION["store_session_data"]["cash_register_information"]['cash_register']:"");
    $cashback_fee = ((isset($_SESSION["store_session_data"]["cash_register_information"]['cashback_fee']) && $_SESSION["store_session_data"]["cash_register_information"]['cashback_fee'] != "")?$_SESSION["store_session_data"]["cash_register_information"]['cashback_fee']:"");
?>
<div class="app-main__outer">
    <div class="">

        <form id="showForm1">
            <div class="form-group row">
            <p class="heading1"> Business Information</p>
            </div>
            
            <div class="card" style="width: 60vw;">                    
                <div class="card-body">
                    <p class="card-text">  App URL: https://www.google.com/</p>
                    <p class="card-text">  Instagram URL: https://www.instagram.com/</p>
                    <p class="card-text">  Twitter URL: https://www.twitter.com/ </p>
                    <p class="card-text">  Facebook URL: https://www.facebook.com/</p>
                    <p class="card-text">  Secret Key: Dxf4cZC"JuJW5!d@fsWDc:6I#kK9c</p>                    
                </div>
            </div>

        </form>

        <form name="store_information" id="store_information" method="POST">
            <input type="hidden" name="merchant_id" value="<?php print $merchant_id; ?>">
            <input type="hidden" name="license_key" value="<?php print $license_key; ?>">
            <input type="hidden" name="store_id" id="store_id" value="<?php print $store_id; ?>">
            <div class="col-md-12">                
                <div class="form-group row"><p class="heading1">Set up your store</p></div>
                <div><p class="ml-3 row">Your location, name and address will be visible on your receipts and register. </p></div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">                        
                            <div class="col-sm-12 pl-0">
                                <input type="text" class="form-control" name="store_name" id="store_name" placeholder="Store Name" value="<?php print $store_name; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 pl-0">
                                <input type="text" class="form-control" name="store_address_1" id="store_address_1" placeholder="Street Address" value="<?php print $store_address_1; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 pl-0">
                                <input type="text" class="form-control" name="store_suite" id="store_suite" placeholder="Suite#" value="<?php print $store_suite; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 pl-0">
                                <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php print $city; ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="state" id="state" placeholder="State" value="<?php print $state; ?>" required>
                            </div>
                            <div class="col-sm-5 pl-0">
                                <input type="number" class="form-control" name="zipcode" id="zipcode" placeholder="Zip" value="<?php print $zipcode; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 pl-0">
                                <input type="text" class="form-control" name="store_country" id="store_country" placeholder="Country" value="<?php print $store_country; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 pl-0">
                                <input type="tel" class="form-control" name="store_contact" id="store_contact" placeholder="Phone" value="<?php print $store_contact; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 pl-0">
                                <input type="email" class="form-control" name="store_email" id="store_email" placeholder="Email" value="<?php print $store_email; ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mt-2">
                                <button type="reset" class="btn btn-primary btn-save btn-c">Cancel</button>
                                <?php
                                    $btnName = "Save";
                                    if(intval($store_id) > 0) {
                                        $btnName = "Update";
                                    } 
                                ?>
                                <button type="submit" class="btn btn-primary btn-save btn-s ml-2 store_information_save"><?php print $btnName; ?></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 pl-0">
                        <div class="text-center store">
                            <!-- <img class="pt-1 pb-3" src="images/shop.png" alt="" width="100" style="opacity:0.7;"> -->
                            <img src="images/Liquor-011 1.png" alt="" style="margin-top: -9px;">
                            
                            <div>
                                <p>
                                    Campus Liquor<br>

                                    614 Marshall Street<br>
                                    Edgewood, MD 21040<br>
                                    +1-410-671-2057

                                </p>
                            </div>
                            <hr class="m-0">
                            <!-- <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="float-md-left">ORDER NO:</p>
                                </div>
                                <div class="col-md-6">
                                   <p>123456</p>
                                </div>
                    
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                     <p class="pl-0 mb-0 float-md-left">Date & Time</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">22:22:22</p>
                                </div>
                            </div>
                            </div> 
                            <hr class="m-0">-->
                            <div class=" table-borderless">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left" scope="col">ITEMS</th>
                                            <th class="text-right" scope="col">PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="store-checkout">
                                                <p>product1</p>
                                            </td>
                                            <td class="store-checkout">
                                                <p>$</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="store-checkout">
                                                <p>product2</p>
                                            </td>
                                            <td class="store-checkout">
                                                <p>$</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
        
                        </div>
                        
                    </div>
                </div>        
                
                </div>
            </div>
        </form>

        <form name="tax_information" id="tax_information" method="POST">
            <input type="hidden" name="merchant_id" value="<?php print $merchant_id; ?>">
            <input type="hidden" name="license_key" value="<?php print $license_key; ?>">
            <input type="hidden" name="store_id" id="store_id" value="<?php print $store_id; ?>">

            <div class="form-group row">
            <p class="heading1">Enter Sales Tax Rate</p>
            </div>
            <div class="container">
                
                <div class="col-md-12 pl-0">
                    <div class="row">
                    <div class="col-md-6 pl-0">
                        <div class="input-container mt-5">
                            <input class="input-field form-control" type="text" placeholder="7.25" name="tax_setting_others" id="tax_setting_others" value="<?php print $tax_setting_others; ?>" required>
                            <i class="icon">%</i>
                        </div>
                        
                        <div class="mt-5 pl-0">
                            <button type="reset" class="btn btn-primary btn-save btn-c">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-save btn-s ml-2">Save</button>
                        </div>
                    </div>
                    
                    <div class="col-md-6 pl-0">
                        <div class="text-center store">
                            <img class="pt-1 pb-3" src="images/shop.png" alt="" width="100" style="opacity:0.7;">
                            <hr class="m-0">
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="float-md-left">ORDER NO:</p>
                                </div>
                                <div class="col-md-6">
                                   <p>123456</p>
                                </div>
                    
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                     <p class="pl-0 mb-0 float-md-left">Date & Time</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">22:22:22</p>
                                </div>
                            </div>
                            </div>
                            <hr class="m-0">
                            <div class=" table-borderless">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left " scope="col">ITEMS</th>
                                            <th class="text-right" scope="col">PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="store-checkout">
                                                <p>product1</p>
                                            </td>
                                            <td class="store-checkout">
                                                <p>$</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="store-checkout">
                                                <p>product2</p>
                                            </td>
                                            <td class="store-checkout">
                                                <p>$</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <p>Total Items</p>
                                        <p>Tax</p>
                                        <p>Total Tax</p>
                                        <p>Total</p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <p>$10.00</p>
                                        <p>$0.72</p>
                                        <p>$0.72</p>
                                        <p>$10.72</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
                
            </div>            
        </form>

        <form name="card_processor_settings" id="card_processor_settings" method="POST">

            <input type="hidden" name="merchant_id" value="<?php print $merchant_id; ?>">
            <input type="hidden" name="license_key" value="<?php print $license_key; ?>">
            <input type="hidden" name="store_id" id="store_id" value="<?php print $store_id; ?>">

            <div class="form-group row">
                <p class="heading1">Card Payment Method</p>
            </div>

            <div class="form-group row">
              <div class="col-sm-6">
                <select name="active_transaction_type" id="active_transaction_type" class="form-control">
                    <option value="1" <?php if($active_transaction_type == 1) print "selected='selected'"; ?>>Bolt</option>
                    <option value="2" <?php if($active_transaction_type == 2) print "selected='selected'"; ?>>Clover</option>
                </select>
              </div>
            </div>

            <div id="bolt_card_processor_settings">
                <div class="form-group mt-2">
                    <p class="heading1 pl-0">Card Processor Settings</p>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="card_transaction_api_url" id="card_transaction_api_url" placeholder="Add URL" value="<?php print $card_transaction_api_url; ?>" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="card_transaction_uat_api_url" id="card_transaction_uat_api_url" placeholder="Api UAT URL" value="<?php print $card_transaction_uat_api_url; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="card_transaction_api_key" id="card_transaction_api_key" placeholder="API Key" value="<?php print $card_transaction_api_key; ?>" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="card_transaction_auth_key" id="card_transaction_auth_key" placeholder="Authentication Key" value="<?php print $card_transaction_auth_key; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="card_transaction_merchant_id" id="card_transaction_merchant_id" placeholder="Merchant ID" value="<?php print $card_transaction_merchant_id; ?>" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="card_transaction_assoc_merchant_id" id="card_transaction_assoc_merchant_id" placeholder="Associate Merchant ID" value="<?php print $card_transaction_assoc_merchant_id; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="card_transaction_terminal_hsn_no" id="card_transaction_terminal_hsn_no" placeholder="Terminal HSN Number" value="<?php print $card_transaction_terminal_hsn_no; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="card_transaction_username" id="card_transaction_username" placeholder="Username" value="<?php print $card_transaction_username; ?>" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="card_transaction_password" id="card_transaction_password" placeholder="Password" value="<?php print $card_transaction_password; ?>" required>
                    </div>
                </div>
            </div>

            <div id="clover_card_processor_settings" style="display:none;">
                <div class="form-group mt-2">
                    <p class="heading1 pl-0">Clover Card Processing Settings</p>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="CLOVER_APP_SECRET" id="CLOVER_APP_SECRET" placeholder="Clover App Secret" value="<?php print $CLOVER_APP_SECRET; ?>" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="CLOVER_APP_ID" id="CLOVER_APP_ID" placeholder="Clover App ID" value="<?php print $CLOVER_APP_ID; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="CLOVER_ACCESS_TOKEN" id="CLOVER_ACCESS_TOKEN" placeholder="Clover App access token" value="<?php print $CLOVER_ACCESS_TOKEN; ?>" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="CLOVER_MERCHANT_ID" id="CLOVER_MERCHANT_ID" placeholder="Clover App merchant ID" value="<?php print $CLOVER_MERCHANT_ID; ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12 mt-2">
                  <button type="reset" class="btn btn-primary btn-save btn-c">Cancel</button>
                  <button type="submit" class="btn btn-primary btn-save btn-s ml-2">Save</button>
                </div>
            </div>
        </form>

        <form name="cash_register_information" id="cash_register_information" method="POST">

            <input type="hidden" name="merchant_id" value="<?php print $merchant_id; ?>">
            <input type="hidden" name="license_key" value="<?php print $license_key; ?>">
            <input type="hidden" name="store_id" id="store_id" value="<?php print $store_id; ?>">

            <div class="form-group row">
            <p class="heading1">Cash Register Settings</p>
            </div>
            
            <div class="form-group row">
              
              <div class="col-sm-6">
                <input type="text" class="form-control" name="start_cash" id="start_cash" placeholder="Start Cash" value="<?php print $start_cash; ?>" required>
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="cash_register" id="cash_register" placeholder="Cash Drop Treshold Value* " value="<?php print $cash_register; ?>" required>
              </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="cashback_fee" id="cashback_fee" placeholder="Cashback Fee" value="<?php print $cashback_fee; ?>" required>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-12 mt-2">
                  <button type="reset" class="btn btn-primary btn-save btn-c">Cancel</button>
                  <button type="submit" class="btn btn-primary btn-save btn-s ml-2">Save</button>
                </div>
            </div>
        </form>

        <form id="showForm6">
            <div class="form-group row">
            <p class="heading1">Choose a device to register</p>
            </div>
      
            <div class="form-group row">
              
              <div class="col-sm-10">
                <input type="checkbox" id="" name="device-select" value="Bike">
                <label for="device-select" class="col-sm-8 col-form-label">Lock this device to the register selected</label>
             </div>
              
            </div>
            <div class="col-sm-6 row">
                <div class="register-device">
                <img src="images/Group 251.png" alt="">
                <p>Register1</p>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-12 mt-5">
                  <button type="reset" class="btn btn-primary btn-save btn-c">Cancel</button>
                  <button type="submit" class="btn btn-primary btn-save btn-s ml-2">Register</button>
                </div>
            </div>
        </form>

        <form id="showForm7">
            <div class="form-group row">
               <p class="heading1">Business Information</p>
            </div>
          
                <div class="card" style="width: 60vw;">
                    
                    <div class="card-body">
                        <a href="javascript:;" class="btn btn-primary btn-e" onclick="showForm1()">Edit</a>
                        <p class="card-text">App URL: https://www.google.com/</p>
                        <p class="card-text">  Instagram URL: https://www.instagram.com/</p>
                        <p class="card-text">  Twitter URL: https://www.twitter.com/ </p>
                        <p class="card-text">  Facebook URL: https://www.facebook.com/</p>
                        <p class="card-text">  Secret Key: Dxf4cZC"JuJW5!d@fsWDc:6I#kK9c</p>
                        
                    </div>
                </div>
                
                <div class="form-group row mt-2">
                <p class="heading1">Store detail</p>
                </div>
      
                <div class="card" style="width: 60vw;">
                    <?php
                        $store_address = "";
                        if($store_address_1 != "") {
                            $store_address .= $store_address_1;
                        }
                        if($city != "") {
                            $store_address .= ", ".$city;
                        }
                        if($state != "") {
                            $store_address .= ", ".$state;
                        }
                        if($zipcode != "") {
                            $store_address .= " ".$zipcode;
                        }
                        if($store_country != "") {
                            $store_address .= ", ".$store_country;
                        }
                    ?>
                    <div class="card-body">
                        <a href="javascript:;" class="btn btn-primary btn-e" onclick="showForm2()">Edit</a>
                        <p class="card-text"><img src="images/shop.png" width="20">  <?php print $store_name; ?></p>
                        <p class="card-text"><img src="images/placeholder.png" width="20">  <?php print $store_address; ?> </p>
                        <p class="card-text"><img src="images/phone.png" width="20">  <?php print $store_contact; ?> </p>
                        <p class="card-text"><img src="images/mail.png" width="20"> <?php print $store_email; ?> </p>
                    </div>
                </div>

            <div class="form-group row mt-3">
                <p class="heading1">Tax detail</p>
            </div>
            <div class="card" style="width: 60vw;">
            
                <div class="card-body">
                  <a href="javascript:;" class="btn btn-primary btn-e" onclick="showForm3()">Edit</a>
                  <p class="card-text"> <?php print $tax_setting_others; ?> %</p>
                  
                </div>
            </div>

            <?php if($active_transaction_type == 1) { ?>
            <div class="form-group row mt-3">
                <p class="heading1">Card Processor settings</p>
            </div>
            <div class="card" style="width: 60vw;">                    
                <div class="card-body">
                    <a href="javascript:;" class="btn btn-primary btn-e" onclick="showForm4()">Edit</a>
                    <p class="card-text">  App URL: <?php print $card_transaction_api_url; ?></p>
                    <p class="card-text">  API UAT URL: <?php print $card_transaction_uat_api_url; ?></p>
                    <p class="card-text">  API Key: <?php print $card_transaction_api_key; ?></p>
                    <p class="card-text">  Authentication Key: <?php print $card_transaction_auth_key; ?></p>
                    <p class="card-text">  Merchant ID: <?php print $card_transaction_merchant_id; ?></p>
                    <p class="card-text">  Associate Merchant ID: <?php print $card_transaction_assoc_merchant_id; ?></p>
                    <p class="card-text">  Terminal HSN No: <?php print $card_transaction_terminal_hsn_no; ?></p>
                    <p class="card-text">  Username: <?php print $card_transaction_username; ?></p>
                    <p class="card-text">  Password: ******</p>                    
                </div>
            </div>
            <?php } else if($active_transaction_type == 2) { ?>
            <div class="form-group row mt-3">
                <p class="heading1">Clover Card Processing Settings</p>
            </div>
            <div class="card" style="width: 60vw;">                    
                <div class="card-body">
                    <a href="javascript:;" class="btn btn-primary btn-e" onclick="showForm4()">Edit</a>
                    <p class="card-text">  Clover App Secret: <?php print $CLOVER_APP_SECRET; ?></p>
                    <p class="card-text">  Clover App ID: <?php print $CLOVER_APP_ID; ?></p>
                    <p class="card-text">  Clover App access token: <?php print $CLOVER_ACCESS_TOKEN; ?></p>
                    <p class="card-text">  Clover App merchant ID: <?php print $CLOVER_MERCHANT_ID; ?></p>
                </div>
            </div>
            <?php } ?>

            <div class="form-group row mt-3">
                <p class="heading1">Cash Register settings</p>
            </div>
            <div class="card" style="width: 60vw;">
                    
                <div class="card-body">
                    <a href="javascript:;" class="btn btn-primary btn-e" onclick="showForm5()">Edit</a>
                    <p class="card-text">  Start Cash: $<?php print $start_cash; ?></p>
                    <p class="card-text">  Cash Drop: $<?php print $cash_register; ?></p>
                    <p class="card-text">  Cashback fee: $<?php print $cashback_fee; ?></p>
                    
                </div>
            </div>
        </form>

    </div>
</div>
<?php include_once 'includes/footer.php'; ?>
<script type="text/javascript">
    
    <?php if($action == 'summary'){ ?>
    showForm7();
    <?php } else if($action == 'create_store'){ ?>
    showForm2();
    <?php } ?>

    $("#store_information").validate({
        store_email: {
            required: true,
            email: true
        },
        messages: {
            email: "Please enter a valid email address",
        },
        submitHandler: function() {
            
            var store_information_frm = $('#store_information').serialize()+"&api_type=store_information";
            console.log(store_information_frm);
            $("#overlay,.loader").show();
            $.ajax({
                type: "POST",
                url:  "create_store_db.php",
                dataType: "json",
                data: store_information_frm,
                success: function (data) {
                    
                    $("#overlay,.loader").hide();
                    if(data.status == 1) {
                        swal({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                            buttons: false,
                            timer: 3000,
                        });
                        $(".app-sidebar__inner ul li").removeClass("disable");
                        $(".store_information_save").text("Update");
                        $("#store_id").val(data.store_id);
                        return false;
                    }
                },
            });            
        }
    });

    $("#tax_information").validate({

        rules: { 
                tax_setting_others: {
                    required: true,
                    number: true 
                },
        },
        messages: {
            tax_setting_others: {required: "This field is required.",number:"Please enter numbers Only"}
        },
        submitHandler: function() {
            var store_information_frm = $('#tax_information').serialize()+"&api_type=tax_information";
            console.log(store_information_frm);
            $("#overlay,.loader").show();
            $.ajax({
                type: "POST",
                url:  "create_store_db.php",
                dataType: "json",
                data: store_information_frm,
                success: function (data) {
                    
                    $("#overlay,.loader").hide();
                    if(data.status == 1) {
                        swal({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                            buttons: false,
                            timer: 3000,
                        });
                        $(".app-sidebar__inner ul li").removeClass("disable");
                        $(".store_information_save").text("Update");
                        $("#store_id").val(data.store_id);
                        return false;
                    }
                },
            });            
        }
    });

    $("#card_processor_settings").validate({
        
        submitHandler: function() {
            var store_information_frm = $('#card_processor_settings').serialize()+"&api_type=card_processor_settings";
            console.log(store_information_frm);
            $("#overlay,.loader").show();
            $.ajax({
                type: "POST",
                url:  "create_store_db.php",
                dataType: "json",
                data: store_information_frm,
                success: function (data) {
                    
                    $("#overlay,.loader").hide();
                    if(data.status == 1) {
                        swal({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                            buttons: false,
                            timer: 3000,
                        });
                        $(".app-sidebar__inner ul li").removeClass("disable");
                        $(".store_information_save").text("Update");
                        $("#store_id").val(data.store_id);
                        return false;
                    }
                },
            });            
        }
    });

    $("#cash_register_information").validate({

        rules: { 
            start_cash: {required: true,number: true},
            cash_register: {required: true,number: true},
            cashback_fee: {required: true,number: true}
        },
        messages: {
            start_cash: {required: "This field is required.",number:"Please enter numbers Only"},
            cash_register: {required: "This field is required.",number:"Please enter numbers Only"},
            cashback_fee: {required: "This field is required.",number:"Please enter numbers Only"}
        },
        submitHandler: function() {
            var store_information_frm = $('#cash_register_information').serialize()+"&api_type=cash_register_information";
            console.log(store_information_frm);
            $("#overlay,.loader").show();
            $.ajax({
                type: "POST",
                url:  "create_store_db.php",
                dataType: "json",
                data: store_information_frm,
                success: function (data) {
                    
                    $("#overlay,.loader").hide();
                    if(data.status == 1) {
                        swal({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                            buttons: false,
                            timer: 3000,
                        });
                        $(".app-sidebar__inner ul li").removeClass("disable");
                        $(".store_information_save").text("Update");
                        $("#store_id").val(data.store_id);
                        return false;
                    }
                },
            });            
        }
    });
    
    $(document).on("change","#active_transaction_type",function() {        
        var active_transaction_type = $(this).find(":selected").val();        
        if(active_transaction_type == 1) { // Bolt
            $("#bolt_card_processor_settings").show();
            $("#clover_card_processor_settings").hide();
        } else {
            $("#clover_card_processor_settings").show();
            $("#bolt_card_processor_settings").hide();
        }
    });

    $("#active_transaction_type").trigger("change");
</script>