
<?php

try {

    require('config.php');

    session_start();

    // If form submitted, insert values into the database.
    if (isset($_POST['empId'])) {
        $Id = stripslashes($_REQUEST['empId']);
        $Id = mysqli_real_escape_string($link, $Id);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($link, $password);

        $query = "SELECT * FROM tbl_employees WHERE emp_id ='$Id'
            and emp_password='" . md5($password) . "'";

        $result = mysqli_query($link, $query);
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            $_SESSION['id'] = $Id;
            // Redirect user to index.php
            header("Location: employee_dashboard.php");
        } else {
            throw new Exception("The Username or password is incorrect");
        }
    } else { }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee Login</title>
</head>
<body>
	<form action="" method="post">
		<label>Employee ID: </label>
        <input type="text" name="empId" id="empId" placeholder="Employee ID"> <br><br>
        <label>Password: </label>
        <input type="password" name="password" id="pass" placeholder="Password"><br><br>
		<input type="submit" name="submit" value="Login">
	</form>
</body>
</html>