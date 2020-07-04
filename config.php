<?php
$currency = '₱'; //Currency Character or code
$shipfee = 100;
$db_username = 'root';
$db_password = '';
$db_name = 'hanabishi';
$db_host = 'localhost';

				
//connect to MySql						
$con = mysql_connect($db_host, $db_username, $db_password,$db_name);						
if (!$con) {
    die(mysql_error);
}
mysql_select_db($db_name, $con);
?>