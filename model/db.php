<?php 


	function db_connect(){
		$connection = mysqli_connect("localhost", "root", "palaniM@67", "raja");
		if (!$connection) {
		    die("Connection failed: " . mysqli_connect_error());
		    exit();
		}
		return $connection;
	}


	function execute_query($query, $link){
		if(!empty($link)){
			return mysqli_query($link, $query);
		}else{
			return mysqli_query(db_connect(), $query);
		}
	}