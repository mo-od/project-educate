<!doctype html>
<html>
<head>
<!-- Required meta tags -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- เพิ่มมาใหม่ -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="css/stylereg.css">
<!-- sweetalert2 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<meta charset="utf-8">
<title>Toxic Shop</title>
</head>
<!-- Background img -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
html { 
  background: url(img/bg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.btn--form {
  padding: .5rem 2.5rem;
  font-size: .95rem;
  font-weight: 600;
  text-transform: uppercase;
  color: #fff;
  background: #29ce23;
  border-radius: 2.1875rem;
}
.btn--form1 {
  padding: .5rem 2.5rem;
  font-size: .95rem;
  font-weight: 600;
  text-transform: uppercase;
  color: #fff;
  background: #5bc0de;
  border-radius: 2.1875rem;
}
element.style {
}
[type="text"] {
    color: #fff;
}
.form-control {
    background-color: transparent;
    border-top: 0;
    border-right: 0;
    border-left: 0;
    border-radius: 0;
}
.form-control {
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #55595c;
    background-color: #fff;
    background-image: none;
    border: .0625rem solid #191111;
    border-radius: .25rem;
}
</style>
<body>

<div class="signup__container">
  <div class="container__child signup__thumbnail">
    <div class="thumbnail__logo">
   <a class="nav-link" href="index.php"><img class="logo__shape" src="img/dota2.png">
      <h1 class="logo__text" ><b>Toxic Shop</b></h1></a>
    </div>
    <div class="thumbnail__content text-center">
   
      <h1 class="heading--primary"></h1>
      <h2 class="heading--secondary"></h2>
    </div>
    <div class="thumbnail__links">
   <!--   <ul class="list-inline m-b-0 text-center">
        <li><a href="http://alexdevero.com/" target="_blank"><i class="fa fa-globe"></i></a></li>
        <li><a href="https://www.behance.net/alexdevero" target="_blank"><fa class="fa fa-behance"></fa></a></li>
        <li><a href="https://github.com/alexdevero" target="_blank"><i class="fa fa-github"></i></a></li>
        <li><a href="https://twitter.com/alexdevero" target="_blank"><i class="fa fa-twitter"></i></a></li>
      </ul> -->
    </div>
    <div class="signup__overlay"></div>
  </div>
  <div class="container__child signup__form">
    <form role="form" action="" method="POST" id="signup" name="signupform" >
    <div class="form-group">
    
						<label for="name"><font color="#f1f1f1">User Name</font></label>
						<input type="text" name="username" placeholder="User Name" required value="" class="form-control" />
						<span class="text-danger"></span>
          </div>
    <div class="form-group">
						<label for="name"><font color="#f1f1f1">Password</font></label>
						<input type="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"></span>
					</div>
    <div class="form-group">
						<label for="name"><font color="#f1f1f1">First name</font></label>
						<input type="text" name="name" placeholder="Name" required value="" class="form-control" />
						<span class="text-danger"></span>
					</div>
    <div class="form-group">
						<label for="name"><font color="#f1f1f1">E-Mail</font></label>
						<input type="text" name="email" placeholder="Jisoo@yg.com" required value="" class="form-control" />
						<span class="text-danger"></span>
					</div>
    <div class="form-group">
						<label for="name"><font color="#f1f1f1">Steam Link</font></label>
						<input type="text" name="steam" placeholder="https://steamcommunity.com/id/jisoo" required value="" class="form-control" />
						<span class="text-danger"></span>
					</div>
		
					<div class="form-group">
					 <ul class="list-inline">
           <center>	<input type="submit" name="submit" value="Sign Up" class="btn btn--form" />
           &nbsp;
           <a href="login.php" class="btn btn--form1" role="button" aria-pressed="true">LOGIN</a>
          </center>
          
						 </ul>
					</div>
      <div class="m-t-lg">
      </div>
    </form>  
  </div>
</div>
<?php 
require_once("config/connectdb.php");
 
 $strSQL = "SELECT * FROM users";
 $objQuery = mysqli_query($conn,$strSQL);
 $ccc = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

 if(isset($_POST['submit'])){ 
	 $username = $_POST["username"];
	 $username = stripslashes($_REQUEST['username']); //ฟังก์ชัน stripslashes ตัด backslashe ออกจากสตริง
	 $username = mysqli_real_escape_string($conn, $username); //ฟังก์ชัน mysql_real_escape_string() เพื่อหลีกเลี่ยง SQL Injection
 
	 $password = stripslashes($_REQUEST['password']);
	 $password = mysqli_real_escape_string($conn, $password);
	 $password = md5($password);

	 $name = stripslashes($_REQUEST['name']);
	 $name = mysqli_real_escape_string($conn, $name);

	 $email = stripslashes($_REQUEST['email']);
	 $email = mysqli_real_escape_string($conn, $email);
	 
	 $steam = stripslashes($_REQUEST['steam']);
	 $steam = mysqli_real_escape_string($conn, $steam);
	 $status =0; //Set status Default = 0 
	 $date = date('Y-m-d H:i:s'); //Format Date 1999-01-22 Time 17:16:18
	 

	 $check = "SELECT  * FROM users  WHERE username = '$username' "; //Check Username 
	 $result = mysqli_query($conn,$check) or die(mysqli_error());
	 $num=mysqli_num_rows($result);
	 
	if($num > 0)
		{
      echo '<script language="JavaScript">
      swal("Username นี้ถูกใช้ไปแล้ว!", "", "error");
             </script>';
      exit;
		}
	else{
		  $query = "INSERT INTO users (username,password,name,email,link,status,date)
		  VALUES ('$username','$password','$name','$email','$steam','$status','$date')";
		  $result = mysqli_query($conn,$query)or die("เพิ่มข้อมูลไม่ได้". mysqli_error());
	}
	
	    mysqli_close($conn);
	    if($result){
    echo '<script language="JavaScript">
    swal("สมัครสมาชิกสำเร็จ !", "", "success");
           </script>';
    echo '<meta http-equiv="refresh" content="3; url=login.php" />';
		}
	 
}
?>
</body>
</html>

