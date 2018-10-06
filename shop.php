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
	<div class="main-wrapper">
		<h2>Shop</h2>
		<?php
		
		if (mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result))
			{
				?>
					<div>
						<form action="shop.php?action=add&id<?php echo $row["sh_id"]; ?> method="post">
						<div>
						<img src="<?php echo $row["sh_image"]; ?>" /><br/>
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
	</table>
	</div>
	</div>
</section>
<?php
include_once 'footer.php';
?>