<!DOCTYPE>
<html>
	<head>
		<title>Online Pet Shop</title>
		
		<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>

<body>

	<!--Main Container Starts here-->
	<div class="m_wrapper">
	
	
		<!--Navigation Bar Starts here-->
		<div class="menubar">
			<ul id="menu">
			<li><a href="index.php">Home</a></li>
				<li><a href="@">All</a></li>
				<li><a href="myaccount.php">My Account</a></li>
				<li><a href="@">Shopping Cart</a></li>
				<li><a href="@">Contact Us</a></li>
				<li><a href="signup.php">Register</a></li>
				<li><a href="login.php">Login</a></li>
			</ul>
			
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search"/>
					<input type="submit" name="search" value="Search"/>
			
			</div>
		</div>
		<!--Navigation Bar ends here-->
		
		<!--Content Wrapper Starts here-->
		<div class="c_wrapper">
		
				<div id="sidebar">
				
						<div id="sidebar_title">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<h1>Login/Signup</h1></div>
						<br/>
						<ul id="Cats" >
						
							<li><c><b>Sign Up</b></c></li>
								<li><a href="login.php">Log-In</a></li>
							
						
							
					
					
						</ul>
				</div>
				<center>
					<br/>
					<br/>
					<br/>
					
				<fieldset>
	
			<legend><h2>Sign Up</h2></legend>
			<br/>
				
					<input placeholder="First name" type="text" tabindex="1" required>
					<input placeholder="Last name" type="text" tabindex="2" required><br/> <br/>
				
					<input placeholder="Email" type="text" tabindex="3" required>
					<input placeholder="Confirm Email" type="text" tabindex="4" required><br/><br/> 
				<input placeholder="Contact No." type="text" tabindex="5" required>
					<input placeholder="Confirm Contact No." type="text" tabindex="6" required> <br/><br/>
				
					<input placeholder="Username" type="text" tabindex="7" required>
							<input placeholder="Confirm Username" type="text" tabindex="8" required> <br/><br/>
					<input placeholder="Password" type="password" tabindex="9" required>
					<input placeholder="Retype password" type="password" tabindex="10" required><br/>
			<br/><br/>
			<input type="submit" value="Submit">
		</fieldset>
				</center>
				<div id="c_area"></div>
		</div>
		<!--Content Wrapper ends here-->

		
		
		<div id="footer"></div>
	
	</div>
<!--Main Container ends here-->

	


</body>
</html>