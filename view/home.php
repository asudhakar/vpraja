<?php 
	include_once '../controllers/default_functions.php';
	include_once '../model/db.php';
	$conn = db_connect();
	landing_page_session_check();
	$userDetails = $_SESSION['userDetails'];
	$details = extract_user_details($userDetails);
	$name = $details['name'];
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br/>
<div class="container">
<br/>

	<blockquote>welcome <?php echo "$name"; ?></blockquote>
	<hr/>
	<div style="text-align:center">
		<h4>Added Files</h4>

		<?php 

			$sql = "SELECT * FROM `files`";
			$result = execute_query($sql, $conn);
			while($row = mysqli_fetch_assoc($result)) {
				$final_output[$row['id']] = $row['file_name'];
			}
			foreach ($final_output as $key => $value) {
				$temp = $value;
				$final_name = explode("/", $temp);
				echo '<br/><div><a href="http://ec2-52-23-164-92.compute-1.amazonaws.com/vpraja/view/dashboard.php?file_path='.$value.'">'.$final_name[1].'</a><form action="http://ec2-52-23-164-92.compute-1.amazonaws.com/vpraja/delete.php" method="get"><input type="hidden" name="id" value="'.$key.'"><input type="hidden" name="file" value="'.$value.'"><input type="submit" class="btn btn-danger" style="font-size: 13px;"  value="delete"></form></div><br/>';
			}


		 ?>
	 </div>



</div>
</body>
</html>