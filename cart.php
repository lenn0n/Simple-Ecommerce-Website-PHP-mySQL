<?php session_start();
include_once("config.php");
include_once("header.php");
?>

<div style="text-align:center;font-size:20px;background-color:#F5AF00;color:black;padding:4px"><br></div>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
<?php
$query = mysql_query("SELECT * FROM login WHERE username='$_SESSION[uid]'");
while ($row = mysql_fetch_array($query)){
$name = $row['name'];
$address = $row['address'];
$contact = $row['contact'];

}
?>
<div style="font-family:rockwell;font-size:20px;margin-left:80px;padding-bottom:20px">
Account: <?php echo $name;?><br>
Address: <?php echo $address;?><br>
Contact Number: <?php echo $contact;?></div><br><div style="float:right;margin-top:-80px;margin-right:75px"><a href="history.php" class="button">View Transaction History</a>
</div>
<div class="cart-view-table-back">
<form method="post" action="cart_update.php">
<table style="font-size:18px;clear:both" width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead><br>
  <tbody>
 	<?php
	if(isset($_SESSION["cart_products"])) //check session var
    {
		$total = 0; //set initial total value
		$b = 0; //var for zebra stripe table 
		foreach ($_SESSION["cart_products"] as $cart_itm)
        {
			//set variables to use in content below
			$product_name = $cart_itm["product_name"];
			$product_qty = $cart_itm["product_qty"];
			$product_price = $cart_itm["product_price"];
			$product_code = $cart_itm["product_code"];

			$subtotal = ($product_price * $product_qty); //calculate Price x Qty
			
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
		    echo '<tr class="'.$bg_color.'">';
			echo '<td><input type="text" size="2" maxlength="2" style="font-size:18px" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
			echo '<td style="padding-top:10px">'.$product_name.'</td>';
			echo '<td style="padding-top:10px">'.$currency.$product_price.'</td>';
			echo '<td style="padding-top:10px">'.$currency.$subtotal.'</td>';
			echo '<td style="padding-top:10px"><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
            echo '</tr>';
			$total = ($total + $subtotal); //add subtotal to total var
        }
		
		$grand_total = $total + $shipfee; //grand total including shipping cost
	}
    ?>
    <tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo 'Shipping Cost: '.$currency.$shipfee.'<br>';?>Total Amount: <?php echo $currency; echo sprintf("%01.2f", $grand_total);?></span></td></tr>
    <tr><td colspan="5"><a href="pay.php" class="button2">Proceed Checkout</a><a href="index.php" class="button">Add More Items</a><button type="submit">Update</button></td></tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>
	<?php 
	if ($_SESSION['uid'] == "lennon" && $_SESSION['pwd'] == "damascus"){
	echo '<div style="text-align:center"><br><a href="admin.php" style="text-decoration:none;font-family:rockwell;font-size:20px;color:maroon">ADD/DELETE PRODUCT</a></div>';
	}

	?>
                    </div>
                </div>
            </div>
		</div>
    </div>

<?php
include_once("footer.php");
?>


