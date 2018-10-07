<?php
$dbServicename = "localhost";
$dbUsername = "root";
$dbPassword = "zxcvb12345";
$dbName = "register";

//connect to mysql and create register/login database

$conn = mysqli_connect($dbServicename, $dbUsername, $dbPassword);
$sql = "CREATE DATABASE register";
if (mysqli_query($conn, $sql))
	echo "Database register create success\n";
else
{
	echo "Database register create failure";
	mysqli_close($conn);
	return ;
}

//create shop database

$sql = "CREATE DATABASE shop";
if (mysqli_query($conn, $sql))
	echo "Database shop create success\n";
else
{
	echo "Database shop create failure";
	mysqli_close($conn);
	return ;
}
mysqli_close($conn);

//create users table

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

//create table for shop items and cart

$dbName = "shop";
$conn = mysqli_connect($dbServicename, $dbUsername, $dbPassword, $dbName);
$sql = "CREATE TABLE items (
	sh_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	sh_name varchar(256) not null,
	sh_image varchar(256) not null,
	sh_price float(11, 2) not null	
);";
if (mysqli_query($conn, $sql))
	echo "Table (items) create success";
else
{
	echo "Table (items) create failure" . $conn->error;
	mysqli_close($conn);
	return ;
}
$sql = "CREATE TABLE cart (
	ca_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	ca_name varchar(256) not null,
	ca_image varchar(256) not null,
	ca_price float(11, 2) not null,
	ca_quant int(3) not null
);";
if (mysqli_query($conn, $sql))
	echo "Table (cart) create success";
else
{
	echo "Table (cart) create failure" . $conn->error;
	mysqli_close($conn);
	return ;
}
mysqli_close($conn);

//add items to table

$dbName = "shop";
$files = scandir('../images');
$conn = mysqli_connect($dbServicename, $dbUsername, $dbPassword, $dbName);
foreach ($files as $v)
{
	if ($v != ".." && $v != "." && $v != ".DS_Store")
	{
		$name = $v;
		$image = 'images/'.$v;
		$price = 5;
		$sql = "INSERT INTO items (sh_name, sh_image, sh_price) VALUES ('$name','$image' ,'$price');";
		if (mysqli_query($conn, $sql))
			echo $v." added to table\n";
		else
		{
			echo "Table create failure" . $conn->error;
			mysqli_close($conn);
			return ;
		}
	}
}
mysqli_close($conn);
?>
