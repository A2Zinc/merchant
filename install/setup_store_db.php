<?php
error_reporting(0);
set_time_limit(0);
$db_config_path = '../application/config/database.php';

// Only load the classes in case the user submitted the form
if($_POST) {

	/*
	// Load the classes and create the new objects
	require_once('../application/includes/core_class.php');
	require_once('../application/includes/database_class.php');	

	$core = new Core();
	$database = new Database();

	// Validate the post data

	$request_host 		= $_POST['host'];
	$request_username 	= $_POST['store_username'];
	$request_password 	= $_POST['store_password'];
	$request_db 		= $_POST['store_db'];

	$data             = array();
	$data["hostname"] = $request_host;
	$data["username"] = $request_username;
	$data["password"] = $request_password;
	$data["database"] = $request_db;

	// ST - Database config
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	
	$database1 = $data["database"];
	$database2 = $request_db;

	// live connnection
	$dbh1 = mysqli_connect($data["hostname"],$data["username"], $data["password"]) or die("remote connection error ".$data["database"]);
	mysqli_select_db($dbh1,$data["database"]);

	// local connnection
	$dbh2 = mysqli_connect($hostname,$username, $password) or die("connection error dbh2");
	
	// // Delete Database
	mysqli_query($dbh2,"DROP DATABASE $database2");

	// // Create New Database
	mysqli_query($dbh2,"CREATE DATABASE $database2");

	mysqli_select_db($dbh2,$database2);						

	$keyfield = "";

	// ST - Copy and drop unused tables
	$tables = mysqli_query($dbh1,"SHOW TABLES FROM $database1");			
	while ($line = mysqli_fetch_row($tables)) {
	    $tab = $line[0];

	    $tableInfo = mysqli_fetch_array(mysqli_query($dbh1,"SHOW CREATE TABLE $tab  ")); // get structure from table on server 1
		mysqli_query($dbh2," $tableInfo[1] "); // use found structure to make table on server 2

		// Uncomment when insert records
	    // $re=mysqli_query($dbh1,"SELECT * FROM ".$tab);
		// while($i=mysqli_fetch_assoc($re)) {
			// $u=array();
			// foreach($i as $k=>$v) if($k!=$keyfield) $u[]="$k='$v'";
			// $q =  "INSERT INTO $tab (".implode(',',array_keys($i)).") VALUES ('".implode("','",$i)."')";
			// mysqli_query($dbh2,$q);
		// }
		// break;
	}

	if ($core->write_config($_POST) == false) {
		$message = $core->show_message('error',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
	}				

	// If no errors, redirect to registration page
	$response= array();
	if(!isset($message)) {
		$response['status']= 1;
	}else{
		$response['status']= 0;
		$response['message']= $message;
	} */

	$response['status']= 1;
	echo json_encode($response);
}
?>