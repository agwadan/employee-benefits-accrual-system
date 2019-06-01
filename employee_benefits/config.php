<?php
	
	define('DB_SERVER','localhost');
	define('DB_USERNAME','root');
	define('DB_PASSWORD','');
	define('DB_NAME','employee_benefits');

	$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	//checking for the connection.

	if($link === false)
	{
		die("ERROR: NO connection, ". mysqli_connect_error());
	}

	else
	{
		echo 'success...';
	}
?>