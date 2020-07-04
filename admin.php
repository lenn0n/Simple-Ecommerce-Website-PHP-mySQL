<?php session_start();
include_once("config.php");
include_once("header.php");
?>

<style type="text/css">

		#linya{
		margin:10px;
		font-size:20px;
		
		}

		#errornotif{
		background-color:maroon;
		color:white;
		padding:10;
		text-align:center;
		font-size:20px;
		font-family:rockwell;

		}

		#successnotif{
		background-color:darkgreen;
		color:white;
		padding:10;
		text-align:center;
		font-size:20px;
		font-family:rockwell;
		}
		
		
		}

</style>

<div style="text-align:center;font-size:20px;background-color:#F5AF00;color:black;padding:4px"><br></div>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">

						<?php
						if ($_POST['action'] == "delitem" && !$_POST['pcode'] == ""){
						$check = mysql_query("SELECT * FROM products WHERE product_code = '$_POST[pcode]'");
						if (mysql_num_rows($check)>0){
						echo "<div id='successnotif' style='font-size:20px;text-align:center'>The product was successfully deleted!</div>";
						mysql_query("DELETE FROM products WHERE product_code = '$_POST[pcode]'");
						}
						else{
						echo "<div id='errornotif'>The file was not found!</div>";
						}
						}
						if ($_POST['action'] == "additem"){
						
						$target_dir = "images/";
						$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
						$uploadOk = 1;
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						
						// Prevent SQL Injection.
						function clean($str) {
						$str = @trim($str);
						if(get_magic_quotes_gpc()) {
						$str = stripslashes($str);
						}
						return mysql_real_escape_string($str);
						}
						$pcode = clean($_POST['pcode']);
						$pname = clean($_POST['pname']);
						$pprice = clean($_POST['pprice']);
						$pdesc = clean($_POST['pdesc']);
						
						// Check if file already exists
						if (file_exists($target_file)) {
							echo "<div id='errornotif'>Sorry, file already exists.</div>";
							$uploadOk = 0;
						}
						// Allow certain file formats
						else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
							echo "<div id='errornotif'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
							$uploadOk = 0;
						}
						else if($pcode == null || $pcode == ""){
							echo "<div id='errornotif'>Please input product code.</div>";
						}
						else if($pname == null || $pname == ""){
							echo "<div id='errornotif'>Please input product name.</div>";
						}
						else if($pprice == null || $pprice == ""){
							echo "<div id='errornotif'>Please input product price.</div>";
						}
						else if($pdesc == null || $pdesc == ""){
							echo "<div id='errornotif'>Please input product description.</div>";
						}
						
						// Check if $uploadOk is set to 0 by an error
						if($uploadOk == 0) {
							
						// if everything is ok, try to upload file
						} else {
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
							  echo "<div id='successnotif' style='font-size:20px;text-align:center'>The product was successfully added!</div>";
						
							  $_SESSION['pic'] = basename($_FILES["fileToUpload"]["name"]);
							  mysql_query("INSERT INTO products(product_name,product_desc,product_img_url,product_price,product_code) VALUES('$pname','$pdesc','$_SESSION[pic]','$pprice','$pcode')");

							  unset($_SESSION['pic']);
							} else {
								echo "<div id='errornotif'>Sorry, there was an error uploading your file.</div>";
							 }
						}
						}
						
						
						if ($_SESSION['uid'] == "lennon" && $_SESSION['pwd'] == "damascus"){
						
						echo "<table cols='50%,50%' style='margin-left:120px'><tr><td><div class='cart-view-table-back' style='max-width:350px'>
						
						<b><font style='font-size:20px'>Add Product</font></b>
						<form action='admin.php' method='POST' enctype='multipart/form-data'>Thumbnail:
						<input type='file' name='fileToUpload' id='cover' style='padding-bottom:10px;padding-top:8px'/><br>
						Product Code:<br> <input type='text' name='pcode'/><br>
						Product Name:<br><input type='text' name='pname'/><br>
						Product Price:<br><input type='text' name='pprice'/><br>
						Product Description:<br><textarea cols='20' rows='5' name='pdesc'></textarea><br>
						<input type='hidden' name='action' value='additem'/><br>
						<input type='submit' value='Add Item' name='submit' style='font-size:20px;background-color:darkblue;color:white;font-family:rockwell;padding:10px;border-radius: 5px 5px 15px 5px'/> 
						</form>
						
						</div></td>
						";
						
						echo "<td><div class='cart-view-table-back' style='max-width:350px'>
						
						<b><font style='font-size:20px'>Delete Product</font></b>
						<form action='admin.php' method='POST'>
						Product Code:<br> <input type='text' name='pcode'/><br>
						<input type='hidden' name='action' value='delitem'/><br>
						<input type='submit' value='Delete Item' name='submit' style='font-size:18px;background-color:darkblue;color:white;font-family:rockwell;padding:10px;border-radius: 5px 5px 15px 5px'/> 
						</form>
						
						</div></td></tr></table>
						";
						
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

