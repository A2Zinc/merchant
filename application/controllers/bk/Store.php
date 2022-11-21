<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Store extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('Soft_settings');
		$this->load->model('Merchant_model','merchant');
		$this->load->model('Gen_settingm');
	}
    //Default index page loading


	public function index(){

	}

	


	public function create_database(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		// Create database
		$sql = "CREATE DATABASE lwtpos_v23";
		if ($conn->query($sql) === TRUE) {
		  echo "Database created successfully";
			$config['hostname'] = 'localhost';
			$config['username'] = 'root';
			$config['password'] = '';
			$config['database'] = 'lwtpos_v23';
			$config['dbdriver'] = 'mysqli';
			$config['dbprefix'] = '';
			$config['pconnect'] = FALSE;
			$config['db_debug'] = TRUE;
			$config['cache_on'] = FALSE;
			$config['cachedir'] = '';
			$config['char_set'] = 'utf8';
			$config['dbcollat'] = 'utf8_general_ci';
			$this->import_tables($config);

		} else {
		  echo "Error creating database: " . $conn->error;
		}

		$conn->close();

	}

	public function  import_tables($config){

		$filename="lwtpos.sql";
				// Read in entire file
		echo "<pre>";
		$commands = file_get_contents($filename);
		$lines=explode("--sep",$commands);

        $db2=$this->load->database($config,true);
        $db2->trans_start();
        foreach ($lines as $line){
        	echo $line;
        	$db2->query($line);
		}
		$db2->trans_complete();

	}
}