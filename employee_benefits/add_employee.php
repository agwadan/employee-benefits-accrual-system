<?php
    


    require('config.php');
                // If form submitted, insert values into the database.
    
    if (isset($_REQUEST['Uname'])){    
        $Id = stripslashes($_REQUEST['Uname']);
        $Id = mysqli_real_escape_string($link,$username); 
    
        $password = stripslashes($_REQUEST['Upassword']);
        $password = mysqli_real_escape_string($link,$password);
    
        $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into tbl_employees (emp_Id, emp_password)
        VALUES ('$Id', '".md5($password)."')";
    
        $result = mysqli_query($link,$query);
    
       if($result)
        {
            header("Location: request_balance.php");
            echo "<script type= 'text/javascript'>alert('Welcome on board :)');</script>";
        }
    else{
        echo "<script type= 'text/javascript'>alert('There is an error in your input');</script>";
        header("Location: add_employee.php");
    }
}
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Employee</title>
</head>
<body>
	<form action="" method="post">
		<label>Employee ID: </label>
        <input type="text" name="empId" id="empId" placeholder="Employee ID"> <br><br>
        <label>Password: </label>
        <input type="password" name="password" id="pass" placeholder="Password"><br><br>
		<input type="submit" name="submit" value="Add">
	</form>
</body>
</html>