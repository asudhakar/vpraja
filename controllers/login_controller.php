<?php 
	include_once 'default_functions.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$id = check_user($email, $password);
	if($id){
		header('Location: ../view/home.php');
	}else{
		header('Location: ../view/login.php?type=login_error');
	}
	function check_user($email, $password){
		if($email == "vprajain" && $password == "07121971"){
			create_session();
			return true;
		}else{
			return false;
		}
	}