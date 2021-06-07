<?php
// ใช้งาน session 
session_start();
@error_reporting (E_ALL ^ E_NOTICE);
?>

<!-- Required meta tags -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!--Navbar -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
  padding: .25rem 1rem;
  font-size: .80rem;
  font-weight: 600;
  text-transform: uppercase;
  color: #fff;
  background: #29ce23;
  border-radius: 2.1875rem;
}
.btn--form1 {
  padding: .25rem 1rem;
  font-size: .80rem;
  font-weight: 600;
  text-transform: uppercase;
  color: #fff;
  background: #5bc0de;
  border-radius: 2.1875rem;
}
.btn--form2 {
  padding: .25rem 1rem;
  font-size: .80rem;
  font-weight: 600;
  text-transform: uppercase;
  color: #fff;
  background: #d63434;
  border-radius: 2.1875rem;
}
</style>
<style>p.indent1{ padding-left: 1.5em }</style>
<!-- Navnbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark '">

<img class="menu-hot" src="img/dota2.png"><a class="navbar-brand" href="index.php">&nbsp;<font color="#ff9910"><b>Toxic Shop</b></font></a> <b>|</b>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><font color="#ffffff"><b>HOME</b></font></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rateprice.php"><font color="#ffffff"><b>RATE PRICE</b></font> <font color="#FF0000"><i class="fab fa-hotjar"></i></font></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="store.php"><font color="#ffffff"><b>STORE</b></font></a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><font color="#ffffff"><b>CART </b></font><font color="#ff8800"><i class="fa fa-shopping-cart"></i></font></a>
      </li> 

      <li class="nav-item">
        <a class="nav-link" href="history.php"><font color="#ffffff"><b>HISTORY</b></font></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="topup.php"><font color="#ffffff"><b>TOPUP</b></font></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sell.php"><font color="#19B6F5"><b>SELL </b><i class="fas fa-handshake"></i></font></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="historysell.php"><font color="#19B6F5"><b>HISTORY SELL </b></font></a>
      </li>
      <!--  รายงาน Admin only   -->
      <p class="indent1"></p>
      <?php if(@$_SESSION['status'] == 1){ ?>
      <li class="nav-item">
      <a class="nav-link" href="dashboard/index.php"><font color="#f44336"><b>DASHBOARD</b></font></a>
      </li>
      <?php  } ?> 
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <?php  if(!empty($_SESSION['name']))
    echo "<a class='nav-link badge badge-success' href='profile.php'>&nbsp;<font color='#ffffff' size='3px'><b>".$_SESSION['name']." </font>&nbsp;</a>"?>  &nbsp;&nbsp;
                  <?php
                  if(!empty($_SESSION['u_id'])){
                  echo '<a href="logout.php" class="btn btn--form2" role="button" aria-pressed="true">Logout</a> &ensp;';
                } else {
                  echo '<a href="login.php" class="btn btn--form1" role="button" aria-pressed="true">Login</a> &ensp;<a href="reg.php" class="btn btn--form" role="button" aria-pressed="true">Register</a>' ;
                 } ?>
    <!--<a href="login.php" class="btn btn--form1" role="button" aria-pressed="true">Login</a> &ensp;
    <a href="logout.php" class="btn btn--form" role="button" aria-pressed="true">Logout</a> &ensp;-->
     
    <!--    Button เดิม 
    <button type="button" class="btn btn-danger btn-sm"onclick="window.location.href='login.php'"><b>Login</b></button> 
    <button type="button" class="btn btn-warning btn-sm" onclick="window.location.href='reg.php'"><b>Register</b></button>
    -->
   
   
    </form>
  </div>
</nav>