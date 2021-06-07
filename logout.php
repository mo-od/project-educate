<meta charset="utf-8">
<?php
@session_start();

//session_destroy();
unset($_SESSION['shopping_cart']);	
unset($_SESSION['u_id']);
unset($_SESSION['username']);
unset($_SESSION['name']);
unset($_SESSION['status']);
unset($_SESSION['point']);
	echo "<script>";
	echo "window.location='login.php';";
	echo "</script>";	
?>