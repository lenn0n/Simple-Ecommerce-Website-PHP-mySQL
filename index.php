<?php session_start();
include_once("config.php");
include_once("header.php");
?>

<div style="text-align:center;font-size:20px;background-color:#F5AF00;color:black;padding:4px;font-family:rockwell">Welcome to Online Hanabishi Appliances Store! The leading brand in the Philippines!</div>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
							<!--END OF START TAGS ng ARTISETEER TEMPLATE, CODING NA.-->
<?php
echo '<div style="text-align:center"><form method="GET" action="index.php"/>
<font style="margin:10px;font-family:rockwell;font-size:15px">Search Item:</font>
<input type="text" style="max-width:1000px;max-height:10px;margin-top:5px" value="'.$_GET[query].'" name="query"/>
<input type="submit" class="button3" value="Go"/><br>
<font style="tex-margin:10px;font-family:rockwell;font-size:15px">Order By:</font>
<select name="order">
<option value="1">A-Z</option>
<option value="2">Low To High</option>
<option value="3">High To Low</option>
<option value="4">Z-A</option>
<option value="5">Date Added</option>
</select></form></div><div style="margin:20px"></div>';

if (isset($_GET['query'])){
$sq = "SELECT * FROM products WHERE product_name LIKE '%$_GET[query]%'";
}else{
$sq = "SELECT * FROM products";
$order = " ORDER BY product_name ASC";}
if (isset($_GET['order']) && $_GET['order'] == 1){
$order = " ORDER BY product_name ASC";
}
elseif (isset($_GET['order']) && $_GET['order'] == 2){
$order = " ORDER BY product_price ASC";

}
elseif (isset($_GET['order']) && $_GET['order'] == 3){
$order = " ORDER BY product_price DESC";
}
elseif (isset($_GET['order']) && $_GET['order'] == 4){
$order = " ORDER BY product_name DESC";
}
elseif (isset($_GET['order']) && $_GET['order'] == 5){
$order = "";
}

$query = $sq . $order;
$showitems = mysql_query($query);
if (mysql_num_rows($showitems)){
echo '<ul class="products">';
while($row = mysql_fetch_array($showitems))
{
	echo '
	<li class="product">
	<form method="POST" action="cart_update.php">
	<div class="product-content"><h3>'.$row[product_name].'</h3>
	<div class="product-thumb"><img src="images/'.$row[product_img_url].' " width=100px"></div>
	<div class="product-descs" style="">'.$row[product_desc].'</div><hr/>
	<div class="product-info">
	<b>Price: '.$currency.$row[product_price].' </b>
	<fieldset>
	<label>
	<span style="margin-top:8px"><b>Quantity:</b></span>
	<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	</fieldset>
	<input type="hidden" name="product_code" value="'.$row[product_code].'" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="" />';
	$checklogin = mysql_query("SELECT * FROM login WHERE username = '$_SESSION[uid]' and password = '$_SESSION[pwd]'");
	if(mysql_num_rows($checklogin)>0){
	echo '<div align="center"><button type="submit" class="add_to_cart">Add To Cart</button></div>';
	}
	else {
	echo '<div align="center"><a href="login.php" class="add_to_cart" style="background-color: #39b3d7;min-width: 100px;border: none;padding: 10px;display: inline-block;text-align: center;cursor: pointer;text-decoration: none;color: #FFF;min-height: 15px;font: 12px/15px Arial, Helvetica, sans-serif;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);border-radius: 3px;">Login First</a></div>';
	}
	echo '
	</div></div>
	</form>
	</li>
	';
}
echo '</ul><div style="margin:20px"></div>';
}
else{
echo '<font style="font-size:20px"><center>Sorry. We couldn\'t find what are you looking for.</center></font>';
}?>

<!--CLOSE TAGS ARTISETEER TEMPLATE-->
	 
                    </div>
                </div>
            </div>
		</div>
    </div>

<?php
include_once("footer.php");
?>


