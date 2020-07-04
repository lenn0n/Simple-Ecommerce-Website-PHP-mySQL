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
							<div style="margin-top:-35px;background-color:#F5AF00;padding:10px;font-size:20px;color:black;font-weight:bold;border-radius:0 0 95px 25px;font-family:rockwell">You bought:</div><br>
							<?php
							$fetchy = mysql_query("SELECT * FROM trans WHERE username='$_SESSION[uid]'");
							if (mysql_num_rows($fetchy)>0){
							while ($row = mysql_fetch_array($fetchy)){
							$total = $row[product_quantity] * $row[product_price];
							echo "<img src='images/$row[product_img_url]'/>
							<div style='font-family:rockwell;font-size:20px;margin-left:110px;padding-bottom:20px;margin-top:-70px'>$row[product_name] * $row[product_quantity]<br>Total Cost: $total</div>";
							
							}
							echo '<div style="margin-bottom:10px"></div>';
							}
							else{
							echo "Nothing!";
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
