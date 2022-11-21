<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="../assets/cashier/sweetalert@2.1.2/sweetalert.min.js"></script>
	<title>Setup Wizard</title>		
	</head>
	<body class="bdbg">
    <div id="overlay" style="display: none;"></div>
	    <div class="container centering">
	      	<div class="col-md-12 main-block">
        	<!-- multistep form -->		        
	        <!-- Multi step form -->
	        <section class="multi_step_form">
	        	
	          	<form id="msform">
	            	<!-- Tittle -->
		            <!-- <div class="tittle">
	              	<h2>Verification Process</h2>
	              	<p>
		                In order to use this service, you have to complete this
		                verification process
	              	</p>
		            </div> -->
		            <!-- progressbar -->
		            <ul id="progressbar">
		              <li class="active">Requirements</li>
		              <li>Store</li>
		            </ul>
		            <!-- fieldsets -->
		            <fieldset>
		              	<div class="form-group">
		                	<input type="text" class="form-control shadow_input" id="merchant_id" name="merchant_id" placeholder="Merchant ID" value="211019041655" />
		                	<span id="merchant_id_err" class="error" style="display:none;">Merchant ID can not be blank.</span>
		              	</div>
		              	<div class="form-group">
		                	<input type="text" class="form-control shadow_input" id="licence_key" name="licence_key" placeholder="Licence key" value="fnsfjdskjf323432" />
		                	<span id="licence_key_err" class="error" style="display:none;">Licence key can not be blank.</span>
		              	</div>
		              	<!-- <button type="button" class="next action-button mt-5">Verify</button> -->
		              	<button type="button" class="verify_license action-button mt-5">Verify</button>
		              	<input type="hidden" class="next action-button mt-5 verify_license_hidden">
		            </fieldset>

		            <fieldset>

		              <div>
		                <!-- <div class="text-center success-msg">
		                  <img src="images/right.png" alt="" />
		                  <p>
		                    Campus Liquor is<br />
		                    successfully installed
		                  </p>
		                </div> -->

		                <div id="existing_store">
		                	
		                	<div class="form-group">
					          	<select class="form-control shadow_input select_input" name="store_list" id="store_list">
					            	<option value="">Select Store</option>
					          	</select>
					          	<span id="store_list_err" class="error" style="display:none;">Store can not be blank.</span>
					        </div>

		              	</div>
	              		
	              		<div id="new_store" style="display:none;">
	              			<form>
	              				<div class="form-group">
				          			<select class="form-control shadow_input select_input" name="merchant_id" id="merchant_id">
					            		<option value="">Select Merchant</option>
				          			</select>
						        </div>
						        <div class="form-group">
                                    <input class="form-control shadow_input" name="store_name" id="store_name" type="text" placeholder="Store Name">
                                    <span class="errors" id="store_name_err" style="color:red; font-size:14px"></span>
                                </div>
	              			</form>
		              	</div>

		                <div class="row">
		                  <div class="col-md-10 mt-2 text-center ml-4"></div>
		                </div>

		              </div>
		              <button type="button" class="action-button previous previous_button mt-2">Back</button>
		              <button type="button" class="action-button mt-2" onclick="javascript:; window.location.href='create_store.php?action=create_store'">Create Store</button>
		              <button type="button" class="action-button mt-2 setup_store">Submit</button>
		              
		            </fieldset>
	          	</form>
        	</section>
        	<!-- End Multi step form -->
	      	</div>
	    </div>
		<div class="loader"></div>
	</body>

	<!-- jQuery  -->
	<script src="js/jquery-3.5.1.js" type="text/javascript"></script>
	<script src="js/custom.js"></script>
	<!-- jQuery easing plugin -->	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
</html>