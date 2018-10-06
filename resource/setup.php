<?php
$dbServicename = "localhost";
$dbUsername = "root";
$dbPassword = "zxcvb12345";
$dbName = "register";

$conn = mysqli_connect($dbServicename, $dbUsername, $dbPassword);
$sql = "CREATE DATABASE register";
if (mysqli_query($conn, $sql))
	echo "Database create success\n";
else
{
	echo "Database create failure";
	mysqli_close($conn);
	return ;
}
mysqli_close($conn);

$conn = mysqli_connect($dbServicename, $dbUsername, $dbPassword, $dbName);
$sql = "CREATE TABLE users (
	user_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	user_name varchar(256) not null,
	user_email varchar(256) not null,
	user_pwd varchar(256) not null	
);";
if (mysqli_query($conn, $sql))
	echo "Table create success";
else
{
	echo "Table create failure" . $conn->error;
	mysqli_close($conn);
	return ;
}
mysqli_close($conn);
?>
