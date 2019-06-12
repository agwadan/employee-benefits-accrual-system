<?php

	require 'config.php';
	include 'functions.php';

	$total_tenure_pts = 0;

	if(isset($_POST['submit'])){
		$id = $_POST['empId'];

		$sql = "SELECT * FROM tbl_employees WHERE emp_id = '$id'";
		$query = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($query);
		$pts = $row['emp_points'];
		
		//Checking the tracking table for past record of an employee
		$sql = "SELECT * FROM tbl_track WHERE emp_id = '$id'";
		$query = mysqli_query($link, $sql);
		$row2 = mysqli_fetch_array($query);
		$init_start_date = $row2['emp_startDate'];
		$srtDate = $init_start_date;
		
		//actual calculation of the points through the times that an employee's seniority changed.
		if (mysqli_num_rows($query) > 0) {
			while ($row2 = mysqli_fetch_array($query)) {
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

				$ten_multiplier = calcMultiplier($init_start_date, $endDate);

				echo $ten_multiplier."<br><br>";

				$pts_db = calcDate($srtDate, $endDate, $points, $ten_multiplier);
				$srtDate = $endDate;

			}
		}


		//Calculating the points accrued from the last time the seniority was changed to the current date//
		$today = date('Y-m-d');
		echo $today."<br><br>";

		$ts = strtotime($today);
		$month = date('m', $ts);
		echo $month."<br><br>";

		
		if ($month = 01) {
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
			echo $srtDate."<br><br>";
			$ten_multiplier = calcMultiplier($init_start_date, $endDate);
			$pts_update = calcDate($srtDate, $today, $points, $ten_multiplier);
			echo $pts_update."<br><br>";
		}

		//Updating the database value with the new number of points.
		$emp_points = ($pts_db + $pts_update);
		echo "Your total points are: ".$emp_points;
		$sql = "UPDATE tbl_employees SET emp_points = '$emp_points' WHERE emp_id = '$id'";
		$query4 = mysqli_query($link, $sql);


	}



?>

<!--HTML script for the web page-->
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