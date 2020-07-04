<?php
session_start();
include_once("config.php");
$_SESSION["uid"] = $_REQUEST["fsid"];
$_SESSION["pwd"] = $_REQUEST["fpwd"];
$checklogin = mysql_query("SELECT * FROM login WHERE username = '$_SESSION[uid]' and password = '$_SESSION[pwd]'");
if(mysql_num_rows($checklogin) > 0){
header("location: index.php");
}
else{
header("location: login.php");
$_SESSION['error'] = "true";
}
?>

