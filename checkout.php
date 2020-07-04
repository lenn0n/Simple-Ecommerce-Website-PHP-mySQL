<?php session_start();
include_once("config.php");
include_once("header.php");
?>

<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
							<!--END OF START TAGS ng ARTISETEER TEMPLATE, CODING NA.-->
							<?php
							if ($_SESSION['trans'] == "success"){
							foreach ($_SESSION["cart_products"] as $cart_itm)
							{
								//set variables to use in content below
								$product_name = $cart_itm["product_name"];
								$product_qty = $cart_itm["product_qty"];
								$product_price = $cart_itm["product_price"];
								$product_code = $cart_itm["product_code"];
								$product_img = $cart_itm["product_img"];
								
								mysql_query("INSERT INTO trans(username,product_name,product_quantity,product_img_url,product_price) VALUES('$_SESSION[uid]','$product_name','$product_qty','$product_img','$product_price')");
								
							}
								
								echo '<div style="margin-top:-35px;background-color:#F5AF00;padding:10px;color:black;font-size:20px;font-weight:bold;border-radius:0 0 95px 25px;font-family:rockwell"><center>YOUR TRANSACTION WAS SUCCESSFULLY PROCESSED!</center></div>';
								
								foreach ($_SESSION["cart_products"] as $cart_itm)
								{
								//set variables to use in content below
								$product_name = $cart_itm["product_name"];
								$product_qty = $cart_itm["product_qty"];
								$product_price = $cart_itm["product_price"];
								$product_code = $cart_itm["product_code"];
								$product_img = $cart_itm["product_img"];
								$total = $product_qty * $product_price;
								echo "<img src='images/$product_img'/>
								<div style='font-family:rockwell;font-size:20px;margin-left:110px;padding-bottom:20px;margin-top:-70px'>$product_name * $product_qty<br>Total Cost: $total</div>";
								}
								unset($_SESSION["trans"]);
								unset($_SESSION["cart_products"]);
								echo '<div style="margin-bottom:10px"></div>';
							}
							
							else{
							echo '<div style="margin-top:-35px;background-color:#F5AF00;padding:10px;color:black;font-size:20px;font-weight:bold;border-radius:0 0 95px 25px;font-family:rockwell"><center>THERE WAS AN ERROR IN TRANSACTION!</center></div>';
							}
							
							?>
							<!--CLOSE TAGS ARTISETEER TEMPLATE-->
	 
                    </div>
                </div>
            </div>
		</div>
    </div>

<?php
include_once("footer.php");
?>