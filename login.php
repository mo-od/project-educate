<?php
	@session_start();
?>
<!DOCTYPE html>
<html>
<title>Toxic Shop</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- sweetalert2 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
html { 
  background: url(img/bg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
body {font-family: Arial, Helvetica, sans-serif;}
form {
    border: 3px solid #050002eb;
    margin-right: auto;
    margin-left: auto;
    margin-top: 10rem;
    background-color: #050002eb;
    }

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #63c5f1;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
  padding: .7rem 2.5rem;
  font-size: .95rem;
  font-weight: 600;
  text-transform: uppercase;
  color: #fff;
  background: #d63434;
  border-radius: 2.1875rem;
}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  height: 20%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}
.btn--form {
  padding: .5rem 2.5rem;
  font-size: .95rem;
  font-weight: 600;
  text-transform: uppercase;
  color: #fff;
  background: #d63434;
  border-radius: 2.1875rem;
}
.btn--form1 {
  padding: .7rem 2.5rem;
  font-size: .95rem;
  font-weight: 600;
  text-transform: uppercase;
  color: #fff;
  background: #5bc0de;
  border-radius: 2.1875rem;
}
.swal-modal {
  background-color: #eae9e9 ;
  border: 3px solid #e64f4f;
}
.swal-button {
    background-color: #FF5722;
}
/* {
  span.psw {Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) 
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<form action="" method="post" style="width: 30rem;">
<center><font size="6px" color="#f1f1f1"><b> LOGIN </b></font></center>
  <div class="container" >
    <label for="uname"><font size="4px" color="#f1f1f1"><b>Username</b></font></label>
    <input class="form-control" type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><font size="4px" color="#f1f1f1"><b>Password</b></font></label>
    <input class="form-control" type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="submit" class="btn btn--form1"><font size="3px"><b>Login</b></font></button>
    <label>
    <span class="psw"><font size="2px" color="#f1f1f1">Don't have a account ?</font> <a href="reg.php"><font size="2px"color="#68f163">REGISTER HERE</font></a></span>
    </label>
   <!--
      <input type="checkbox" checked="checked" name="remember"><font size="3px" color="#f1f1f1">Remember me</font>
   -->
  </div>
  <div class="container" style="background-color:#050002eb">
    <button type="button" class="cancelbtn"onclick="window.location.href='index.php'"><font size="3px"><b>Cancel</b></font></button>
    
  </div>
</form>

</body>
</html>

<?php
if(isset($_POST['submit'])){
  include_once('config/connectdb.php');
  $username = $_POST['username'];
  $password = $_POST['password'];
  $passwordenc = md5($password);
	$sql = "SELECT * FROM `users` where username='".$_POST['username']."' and password='".($passwordenc)."' LIMIT 1";
	//var_dump($sql);exit;
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);
	if($num > 0 ){
		$data = mysqli_fetch_array($result);
    $_SESSION['u_id'] = $data['u_id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['name'] = $data['name'];
    $_SESSION['status'] = $data['status'];
    $_SESSION['point'] = $data['point'];
		
    echo '<script language="JavaScript">
    swal("Welcome","'.$_SESSION['name'].'", {
      className: "swal-modal"
       });
           </script>';
    echo '<meta http-equiv="refresh" content="1; url=index.php" />';	
	}else{
  echo '<script language="JavaScript">
    swal("Oops", "Username หรือ Password ไม่ถูกต้อง !", "error");
           </script>';
 //ไม่ให้โหลดหน้าใหม่ echo '<meta http-equiv="refresh" content="2; url=login.php" />';
	exit;
		
	}
}
?>	