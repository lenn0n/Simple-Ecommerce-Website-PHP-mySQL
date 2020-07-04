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
	if (isset($_SESSION["error"])){
	echo "<div style='text-align:center;padding:5px;background-color:maroon;color:white;float:right'>Username and Password didn't match!</div>";
	unset($_SESSION["error"]);
	}
	$checklogin = mysql_query("SELECT * FROM login WHERE username = '$_SESSION[uid]' and password = '$_SESSION[pwd]'");
	if(mysql_num_rows($checklogin) > 0){
	
	echo "<div style='text-align:center;padding:5px;background-color:maroon;color:white'>You are already logged in!</div>";
	
	}
	else {
	echo '<form method="POST" action="go.php"><div style="margin-top:-35px;background-color:#F5AF00;padding:10px;color:black;font-weight:bold;border-radius:0 0 95px 25px;font-family:rockwell">
<div style="float:left;padding-left:40px;margin-top:-10px"><img src="images/computers.png"/></div>
<div style="float:left;padding-top:-10px;font-size:20px">Username: &nbsp <input type="text" style="font-size:20px;border-radius: 5px 5px 25px 5px" name="fsid" value="" autofocus/><br><br>
Password:&nbsp &nbsp <input type="password" style="font-size:20px;border-radius: 5px 5px 25px 5px" name="fpwd"/> <br><br></div>
<div style="float:left;padding-left:70px;padding-top:30px;font-size:20px">Need an Account?<br> <a href="register.php" style="font-size:25px;color:maroon;text-decoration:none;">Click Here!</a></div>
<div style="clear:both;" align="center"> <input type="submit" style="background-color:maroon;color:white;padding:10px;border-radius:15px 15px 15px 15px;margin-top:-10px;;font-size:20px;margin-left:-20px;margin-bottom:10px;font-family:rockwell" value="Login My Account"/></div>
</div></form><br>';
}

$showitems = mysql_query("SELECT * FROM products LIMIT 3");
echo '<ul class="products">';
while($row = mysql_fetch_array($showitems))
{
	echo '
	<li class="product">
	<form method="POST" action="cart_update.php">
	<div class="product-content"><h3>'.$row[product_name].'</h3>
	<div class="product-thumb"><img src="images/'.$row[product_img_url].' " width=100px"></div>
	<div class="product-descs" style="max-height:80px">'.$row[product_desc].'</div><hr/>
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
echo '</ul>';
?>

                    </div>
                </div>
            </div>
		</div>
    </div>
<?php
include_once("footer.php");
?>

