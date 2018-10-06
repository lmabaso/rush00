<?php
include_once 'header.php';

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "zxcvb12345";
$dbNameShop = "shop";
$connS = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbNameShop);
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
if (isset($_POST["add_to_cart"]))
{
	if (isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if (!in_array($_GET["sh_id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'		=> $_GET["sh_id"],
				'item_name'		=> $_POST["hiden_name"],
				'item_price'	=> $_POST["hiden_price"],
				'item_quantity' => $_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
			header("Location: shop.php");
		}
	}
	else
	{
		$item_array = array(
			'item_id'		=> $_GET["sh_id"],
			'item_name'		=> $_POST["hiden_name"],
			'item_price'	=> $_POST["hiden_price"],
			'item_quantity' => $_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
$sql = "SELECT * FROM items";
$result = mysqli_query($connS, $sql);
?>
<section class="main-container">
		<h2>Shop</h2>
<<<<<<< HEAD
<<<<<<< HEAD
<?php

if (mysqli_num_rows($result) > 0)
{
	while ($row = mysqli_fetch_array($result))
	{
?>
					<div>
=======
=======
>>>>>>> 780cf0336e0f8f2cf898e0a1bdac15ea39db1bac
	<div class="shop-wrapper">
		<?php
		if (mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result))
			{
				?>
					<div class="item-container">
						<img class="shop-item" src="<?php echo $row["sh_image"]; ?>" /><br/>
<<<<<<< HEAD
>>>>>>> 780cf0336e0f8f2cf898e0a1bdac15ea39db1bac
=======
>>>>>>> 780cf0336e0f8f2cf898e0a1bdac15ea39db1bac
						<form action="shop.php?action=add&id<?php echo $row["sh_id"]; ?> method="post">
						<div>
						<h4><?php echo $row["sh_name"]; ?> </h4>
						<h4><?php echo $row["sh_price"]; ?> </h4>
						<input type="number" name="quantity" value="1" />
						<input type="hidden" name="hiden_name" value="<?php echo $row["sh_name"]; ?>" />
						<input type="hidden" name="hiden_price" value="<?php echo $row["sh_price"]; ?>" />
						<input class="addto" type="submit" name="add_to_cart" value="Add to Cart" />
						</div>
						</form>
					</div>
<?php
	}
}
?>
	</div>
	<br />
	<div>
	<h3>Order Details</h3>
	<div>
	<table>
	<tr>
	<th width="40%">Item Name</th>
	<th width="40%">Quantity</th>
	<th width="40%">Price</th>
	<th width="40%">Total</th>
	<th width="40%">Action</th>
	</tr>
<?php
if (!empty($_SESSION["shopping_cart"]))
{
	$total = 0;
	foreach ($_SESSION["shopping_cart"] as $k => $v)
	{
?>
			<tr>
			<td><?php echo $v["sh_name"]; ?></td>
			<td><?php echo $v["sh_quantity"]; ?></td>
			<td><?php echo $v["sh_price"]; ?></td>
			<td><?php echo number_format($v["sh_quantity"] *  $v["sh_price"], 2); ?></td>
			<td><a href="shop.php?action=delete$id=<?php echo $v["sh_id"]; ?>">Remove</a></td>
			</tr>
<?php
		$total = $total + ($v["sh_quantity"] * $v["sh_price"]);
	}
?>
		<tr>
			<td colspan="3" align="right">Total</td>
			<td align="right">R <?php echo number_format($total, 2); ?></td>
			<td></td>
		</tr>
<?php
}
?>
	</table>
	</div>
	</div>
</section>
<?php
include_once 'footer.php';
?>
