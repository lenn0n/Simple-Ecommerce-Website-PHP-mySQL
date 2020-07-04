<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
<meta charset="utf-8">
<title>Home</title></head>
<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
<link rel="stylesheet" href="style.css" media="screen">
<link rel="stylesheet" href="style.responsive.css" media="all">
<script src="jquery.js"></script> 
<script src="script.js"></script>
<script src="script.responsive.js"></script>
<link href="style/style.css" rel="stylesheet" type="text/css">
<style type="text/css">.art-content .art-postcontent-0 .layout-item-0{ background:}
.art-content .art-postcontent-0 .layout-item-1 { padding: 10px;}
.art-content .art-postcontent-0 .layout-item-2 { margin-top: 20px;margin-bottom: 0px;}
.art-content .art-postcontent-0 .layout-item-3 { color: #262626; background:  url('images/a242b.png') no-repeat scroll; padding: 0px;}
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important;}
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important;}
</style>
<div id="art-main">
<header class="art-header">
<h1 class="art-headline"><img src="images/logo.png" style="border:0px;padding:-100px;margin:-45px" width="100px"/>
<a style="margin-left:50px" href="index.php"><i>HANABISHI</i></a>
</h1>
<h2 class="art-slogan"><font style="margin-left:70px">Quality That Grows With You.<br></font><font style="margin-left:60px;float:right">Kapartner ng praktikal na nanay!</font></h2>
<nav class="art-nav">
<div class="art-nav-inner">
<ul class="art-hmenu"><li><a href="index.php">Home</a></li><li>
<?php
 error_reporting (E_ALL ^ E_NOTICE);
$checklogin = mysql_query("SELECT * FROM login WHERE username = '$_SESSION[uid]' and password = '$_SESSION[pwd]'");
if(mysql_num_rows($checklogin)>0){
echo '<a href="cart.php">My Cart</a></li><li><a href="logout.php">Logout</a>';
}
else{
echo '<a href="login.php">Login</a>';
}?>

</li></ul></div></nav>                 
</header>
<body>