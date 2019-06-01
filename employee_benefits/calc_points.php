<?php

	require 'config.php';

	$sql = "SELECT * FROM tbl_track ";
	$query = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($query);

	$rowSQL = "SELECT MAX(track_id) AS max FROM tbl_track";
	$query2 = mysqli_query($link, $rowSQL);
	$row1 = mysqli_fetch_array($query2);
	$maxtrack = $row1['max'];
	echo $maxtrack ."...";

	$date = $row["emp_startDate"];
	echo $date;


?>