<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ft_minishop</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<nav>
			<div class="main-wrepper">
				<ul>
					<li><a href="index.php">Home</a></li>
				</ul>
				<div class="nav-login">
					<form action="resource/login.php" method="POST">
						<input type="text" name="username" placeholder="Username/e-mail">
						<input type="password" name="pwd" placeholder="password">
						<button name="submit">Login</button>
					</form>
					<a href="signup.php">Sign up</a>
				</div>
			</div>
		</nav>
	</header>