<?php 
	session_start();
	function sanitize($input, $con){
		return mysqli_real_escape_string($con, $input);
	}
	function is__array($value){
		return is_array($value);
	}
	function emptty($value){
		return empty($value);
	}
	function create_session(){
		$userDetails['name'] = 'Raja';
		$_SESSION["userDetails"] = base64_encode(serialize($userDetails));
		if(isset($_SESSION['userDetails'])){
			return true;
		}
		return false;
	}

	function landing_page_admin_session_check(){
		if(empty($_SESSION["adminDeatils"])){
			header('location:login.php');
		}
	}
	function login_page_admin_session_check(){
		if(isset($_SESSION["adminDeatils"])){
			header('location:home.php');
		}
	}
	function landing_page_session_check(){
		if(empty($_SESSION["userDetails"])){
			header('location:login.php');
		}
	}
	function login_page_session_check(){
		if(isset($_SESSION["userDetails"])){
			header('location:home.php');
		}
	}
	function log_out(){
		session_destroy();   
	}	
	function extract_user_details($details){
		$base64unserialized_details = base64_decode($details);
		$unserialized_details = unserialize($base64unserialized_details);
		return $unserialized_details;
	}