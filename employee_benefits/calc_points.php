<?php

	require 'config.php';
	include 'date.php';

	$total_tenure_pts = 0;

	if(isset($_POST['submit'])){
		$id = $_POST['empId'];

		$sql = "SELECT * FROM tbl_employees WHERE emp_id = '$id'";
		$query = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($query);
		$pts = $row['emp_points'];
		

		$sql = "SELECT * FROM tbl_track WHERE emp_id = '$id'";
		$query = mysqli_query($link, $sql);
		$row2 = mysqli_fetch_array($query);
		$init_start_date = $row2['emp_startDate'];
		

		if (mysqli_num_rows($query) > 0) {
			while ($row2 = mysqli_fetch_array($query)) {
				$srtDate = $init_start_date;
				$endDate = $row2['emp_startDate'];
				$sen = $row2['emp_seniority'];
				

				if ($sen == 'A') {
					$points = 5;
				} elseif ($sen == 'B') {
					$points = 10;
				} elseif ($sen == 'C') {
					$points = 15;
				} elseif ($sen == 'D') {
					$points = 20;
				} elseif ($sen == 'E') {
					$points = 25;
				}

				$pts_db = calcDate($srtDate, $endDate, $points);
			}
		}
		echo "Your total points are: ".$pts_db;
		$sql = "UPDATE tbl_employees SET emp_points = '$pts_db' WHERE emp_id = '$id'";
		$query4 = mysqli_query($link, $sql);


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