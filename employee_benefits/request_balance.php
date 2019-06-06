<?php
require 'config.php';

	if(isset($_POST['submit'])){
		$id = $_POST['empId'];

		$sql = "SELECT * FROM tbl_employees WHERE emp_id = '$id'";
		$query = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($query);
		$pts = $row['emp_points'];
		echo "The date today is, ".date('Y-m-d')."<br><br>";
		echo "Your current points are: <b>".$pts."</b> Work harder and you could get promoted and earn more points ;-)";

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