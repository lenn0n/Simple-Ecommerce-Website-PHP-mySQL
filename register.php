<?php session_start();
include_once("config.php");
include_once("header.php");
?>

<?php 
			
		
						// Prevent SQL Injection.
						function clean($str) {
						$str = @trim($str);
						if(get_magic_quotes_gpc()) {
						$str = stripslashes($str);
						}
						return mysql_real_escape_string($str);
						}
						
						$uid = clean($_POST['uid']);
						$pwd = clean($_POST['pwd']);
						$name = clean($_POST['name']);
						$address = clean($_POST['address']);
						$contact = clean($_POST['contact']);
			
						// End

			// Let's check if the username is already exist
			
			$check = mysql_query("SELECT * FROM login");
			$available = 1;
			while ($results = mysql_fetch_array($check))
				{
				if ($results['username'] == $uid) $available = 0;
				}
			// End of checking
			
			if (!$uid && !$pwd && !$name && !$address && !$contact){
				echo "<center><div id='successnotif' style='font-size:20px'>All <font style='color:red'>* </font>fields are required.</div></center>";
			}else{
				if (strlen($uid) < 5 || strlen($uid) > 12)
				{
				echo "<div id='errornotif'>User ID must be of length 5 to 12!</div>";
				}
				else if ($available == 0)
				{
				echo "<div id='errornotif'>Username was already taken!</div>";
				}
				else if (strlen($pwd) < 7 || strlen($pwd) > 12)
				{
				echo "<div id='errornotif'>Password must be of length 7 to 12!</div>";
				}
				else if (preg_match("/^[a-zA-Z -]+$/", $name) === 0)
				{
				echo "<div id='errornotif'>Invalid name!</div>";
				}
				else if ($address==null || $address=="")
				{
				echo "<div id='errornotif'>Please give your address!</div>";
				}
				else if ($contact==null || $contact=="")
				{
				echo "<div id='errornotif'>Please give your contact!</div>";
				}
				else
				{
				
				
				mysql_query("INSERT INTO login(username,password,name,address,contact) VALUES('$uid','$pwd','$name','$address','$contact')");
				mysql_close($con);
				echo "<div id='successnotif'>Account successfully registered!</div>";
				}
			}
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
		
		input, select{
		font-size:20px;
		}

</style>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
							<!--END OF START TAGS ng ARTISETEER TEMPLATE, CODING NA.-->
							<div class="cart-view-table-back">
							<form method="POST" action="register.php">
							<h1 style="background-color:#292929;color:white;margin:-2px;padding:5px;font-family:rockwell;font-size:25px;border-radius:0 0 15px 0">REGISTER AN ACCOUNT</h1>
							<div id="linya"><font style="color:red">* </font>Username:<br> <input type="text" name="uid" value="<?php echo $_POST['uid'];?>"/></div>
							<div id="linya"><font style="color:red">* </font>Password: <br><input type="password" name="pwd" value="<?php echo $_POST['pwd'];?>"/></div>
							<div id="linya"><font style="color:red">* </font>Full Name: <br><input type="text" name="name" value="<?php echo $_POST['name'];?>"/></div>
							<div id="linya"><font style="color:red">* </font>Address: <br><input type="text" name="address" value="<?php echo $_POST['address'];?>"/></div>
							<div id="linya"><font style="color:red">* </font>Contact: <br><input type="text" name="contact" value="<?php echo $_POST['contact'];?>"/></div><br>
							<input type="submit" class="button2" value="Register Now!" style="font-size:20px;font-family:rockwell;clear:both;margin-top:10px;margin-right:-10px;margin-bottom:20px"/>
							</form>
							</div>
							<!--CLOSE TAGS ARTISETEER TEMPLATE-->
                    </div>
                </div>
            </div>
		</div>
    </div>

<?php
include_once("footer.php");
?>
