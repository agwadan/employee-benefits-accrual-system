<?php

	require 'config.php';
	include 'date.php';

	if(isset($_POST['submit'])){
		$id = $_POST['empId'];

		$sql = "SELECT * FROM tbl_employees WHERE emp_id = '$id'";
		$query = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($query);
		$pts = $row['emp_points'];
		echo $pts."<br><br>";

		$rowSQL = "SELECT MAX(track_id) AS max FROM tbl_track";
		$query1 = mysqli_query($link, $rowSQL);
		$row1 = mysqli_fetch_array($query1);
		$maxtrack = $row1['max'];
		echo $maxtrack ."<br><br>";

		$sql2 = "SELECT * FROM tbl_track WHERE emp_id = '$id'";
		$query2 = mysqli_query($link, $sql2);
		$row2 = mysqli_fetch_array($query2);

		$init_start_date = $row2['emp_startDate'];
		echo $init_start_date."<br><br>";




		for ($i=0; $i <$maxtrack ; $i++) { 

			$sql3 = "SELECT * FROM tbl_track WHERE track_id = '$i' AND emp_id = '$id'";
			$query3 = mysqli_query($link, $sql3);
			$row3 = mysqli_fetch_array($query3);
			
			$srtDate = $init_start_date;
			$endDate = $row3['emp_startDate'];

			echo $endDate."<br><br>";
			

			calcDate($srtDate, $endDate);		
			 
			//echo $srtDate."....";
			
		}

			
			


	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Balance Request</title>
</head>
<body>
	<form action="" method="post">
		<label>Employee ID</label>
		<input type="text" name="empId" id="empId"> <br><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>