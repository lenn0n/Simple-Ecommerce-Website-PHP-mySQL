<?php
session_start();
unset($_SESSION['uid']);
unset($_SESSION['pwd']);
unset($_SESSION["cart_products"]);
header("location: index.php");
?>