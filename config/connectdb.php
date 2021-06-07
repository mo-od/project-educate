<meta charset="utf-8">

<?php
$config = array(
    'steam' => 'https://steamcommunity.com/tradeoffer/new/?partner=441522523&token=TM91C-IV&fbclid=IwAR1USrt6Ga2XaMLmevepV9jIBjlQXjrg5lOYgvSFLXhE96pupDHfqmVbYIw', 
);
	date_default_timezone_set('Asia/Bangkok');
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "pro1";
	
	$conn = mysqli_connect($host, $user, $pwd) or die("ConnectDB Failed");
	mysqli_select_db($conn, $db) or die("SelectDB Failed");
	mysqli_query($conn, "SET NAMES utf8");

?>