<?php

session_start();

if (isset($_POST['submit']))
{
	include 'database.php';

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['pwd']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);

	if (empty($username) || empty($password))
	{
		header("Location: ../index.php?login=empty");
		exit();
	}
	else 
	{
		$sql = "SELECT * FROM users";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
	
		if ($resultCheck < 1)
		{
			header("Location: ../index.php?login=error1");
			exit();
		}
		else
		{
			if ($row = mysqli_fetch_assoc($result))
			{
<<<<<<< HEAD
				$hashedPasswordCheck = hash('whirlpool', salt.$password);
				var_dump($hashedPasswordCheck);
				var_dump($row['user_pwd']);
				// if ($hashedPasswordCheck === $row['user_pwd'])
				// {
				// 	$_SESSION['u_id'] = $row['user_id'];
				// 	$_SESSION['u_name'] = $row['user_name'];
				// 	$_SESSION['u_email'] = $row['user_email'];
				// 	header("Location: ../index.php?login=success");
				// 	exit();
				// }
				// else
				// {
				// 	header("Location: ../index.php?login=error2");
				// 	exit();
				// }
=======
				$hashedPasswordCheck = password_verify($password, $row['user_pwd']);
				//var_dump($hashedPasswordCheck);
				if ($hashedPasswordCheck == false)
				{
					header("Location: ../index.php?login=".$row['user_pwd']);
					exit();
				}
				else if ($hashedPasswordCheck === true)
				{
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_name'] = $row['user_name'];
					$_SESSION['u_email'] = $row['user_email'];
					header("Location: ../index.php?login=success");
					exit();
				}
>>>>>>> 780cf0336e0f8f2cf898e0a1bdac15ea39db1bac
			}
		}
	}
}
else
{
	header("Location: ../index.php?login=error3");
	exit();
}
