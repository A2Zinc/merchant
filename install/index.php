<?php
	session_start();
	unset($_SESSION['merchant_id']);
	unset($_SESSION['license_key']);
	unset($_SESSION['store_session_data']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
	<title>Network Selection</title>		
	</head>
	<body class="bdbg">
	    <div class="container centering">
	      	<div class="col-md-12 main-block2">
	        	<div class="net-heading">
	          		<label for="network" class="cp">Please select your network</label>
	        	</div>
		        <div class="row text-center justify-content-center">
		          	<select class="shadow_input" name="network" id="network">
		            	<option value="option" selected disabled>Select your network</option>
		            	<option value="option1">option1</option>
		            	<option value="option2">option2</option>
		            	<option value="option3">option3</option>
		            	<option value="option4">option4</option>
		          	</select>
		        </div>
	        	<div class="row">
	          		<div class="col-md-10 mt-5 text-center ml-4">
						<a href="wizard.php"><button type="button" class="btn btn-primary btn2">Next</button></a>
	          		</div>
	        	</div>
	      	</div>
	    </div>
  	</body>
</html>