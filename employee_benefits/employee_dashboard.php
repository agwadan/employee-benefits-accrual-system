<?php
session_start();
require 'config.php';

	if(isset($_POST['balance_request'])){
		
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM tbl_employees WHERE emp_id = '$id'";
		$query = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($query);
		$pts = $row['emp_points'];
		echo "The date today is, ".date('Y-m-d')."<br><br>";
		echo "Your current points are: <b>".$pts."</b> Work harder and you could get promoted and earn more points ;-)";

	} 

	elseif(isset($_POST['spend_points'])){
		$pts_request = $_POST['pts'];
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM tbl_employees WHERE emp_id = '$id'";
		$query = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($query);
		$pts = $row['emp_points'];

		$balance = $pts - $pts_request;
		$sql = "UPDATE tbl_employees SET emp_points = '$balance' WHERE emp_id = '$id'";
		$query = mysqli_query($link, $sql);

		echo "<br><br>".$pts_request." have been redeemed from your account.<br>
		Your account balance is now ".$balance;


		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Balance Request</title>
</head>
<body>
	<h1>Employee <?php echo $_SESSION['id'];?> is now logged in</h1>
	<?php ?>
	<form action="" method="post">
		<label>Employee ID</label>
		<input type="submit" name="balance_request">
	</form>

	<p>Do you wish to redeem some points?<br></p>

	<form action="" method="post">
		<label>Number of Points:</label>
		<input type="text" name="pts" id="points">
		<input type="submit" name="spend_points">
	</form>
</body>
</html>