<?php
include_once 'header.php';

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "zxcvb12345";
$dbNameShop = "shop";
$connS = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbNameShop);
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Shop</h2>
		<?php
		$sql = "SELECT * FROM shop ORDER BY id ASC";
		$result = mysqli_query($connS, $sql);
		if (mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result))
			{
		?>
			<div>
				<form action="shop.php?action=add&id<?php echo $row["sh_id"]; ?> method="post">
				<div>
				<img src="<?php echo $row["sh_image"]; ?>" /></br>
				<h4><?php echo $row["sh_name"]; ?> </h4>
				<h4><?php echo $row["sh_price"]; ?> </h4>
				<input type="text" name="quantity" value="1" />
				<input type="hidden" name="hiden_name" value="<?php echo $row["sh_name"]; ?>" />
				<input type="hidden" name="hiden_price" value="<?php echo $row["sh_price"]; ?>" />
				<input type="submit" name="add_to_cart" value="Add to Cart" />
				</div>
				</form>
			</div>
		<?php
			}
		}
		?>
	</div>
</section>
<?php
include_once 'footer.php';
?>