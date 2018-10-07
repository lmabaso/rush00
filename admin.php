<!DOCTYPE html>
<?php
include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Admin Page</h2>
		<?php
			$dbServicename = "localhost";
			$dbUsername = "root";
			$dbPassword = "zxcvb12345";
			$dbName = "register";
			$conn = mysqli_connect($dbServicename, $dbUsername, $dbPassword);
		?>
		<form action="/admin.ph" method="GET" name="delform"></form>
			<input name="user" type="text"/>
			<input class="del_btn" type="submit" name="user-delete" value="delete user" />
		</form>
	</div>
</section>
<?php
include_once 'footer.php';
?>