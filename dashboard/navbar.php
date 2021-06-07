<?php 
@session_start();
require_once '../config/connectdb.php';
//Count Orders by status = 1
$sqlcount="select count(*) as total from orders_run where status=1";
$resultcount=mysqli_query($conn,$sqlcount);
$datacount=mysqli_fetch_assoc($resultcount);
//Count Orders by status = 2,3
$sqlcount1="select count(*) as total1 from orders_run where status=2 OR status=3";
$resultcount1=mysqli_query($conn,$sqlcount1);
$datacount1=mysqli_fetch_assoc($resultcount1);
//Count Orders by status = 2,3
$sqlcount2="select count(*) as total2 from sell where sell_id";
$resultcount2=mysqli_query($conn,$sqlcount2);
$datacount2=mysqli_fetch_assoc($resultcount2);
?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <img class="menu-hot" src="../img/dota2.png"><a class="navbar-brand" href="../index.php"><font color="#ff9910"><b> Toxic Shop</b></font></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            </a>
          </li>
		  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
            <a class="nav-link" href="index.php">
              <span class="nav-link-text">
              <b> Home</b>
              </span>
            </a>
          </li>
        <!-- List Products --> 
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fas fa-dice-d6"></i>
              <span class="nav-link-text">
              <b>Products </b>
            </span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseExamplePages">
              <li>
              <a class="nav-link" href="productdota.php">
            <img class="menu-hot" src="img/dota2.png">
              <span class="nav-link-text">
             <b>  DOTA2 Products </b>
              </span>
            </a>
              </li>
              <li>
              <a class="nav-link" href="productcsgo.php">
            <img class="menu-hot" src="img/csgo.png">
              <span class="nav-link-text">
             <b>  CS:GO Products </b>
              </span>
            </a>
              </li>
              <li>
              <a class="nav-link" href="productpubg.php">
            <img class="menu-hot" src="img/pubg.png">
              <span class="nav-link-text">
             <b>  PUBG Products </b>
              </span>
            </a>
              </li>
            </ul>
          </li>
      <!--
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="List Products">
            <a class="nav-link" href="productdota.php">
            <img class="menu-hot" src="img/dota2.png">
              <span class="nav-link-text">
             <b>  DOTA2 Products </b>
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="List Products">
            <a class="nav-link" href="productcsgo.php">
            <img class="menu-hot" src="img/csgo.png">
              <span class="nav-link-text">
             <b>  CS:GO Products </b>
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="List Products">
            <a class="nav-link" href="productpubg.php">
            <img class="menu-hot" src="img/pubg.png">
              <span class="nav-link-text">
             <b>  PUBG Products </b>
              </span>
            </a>
          </li>
      -->

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Product">
            <a class="nav-link" href="add_product.php">
              <i class="fas fa-fw fa-plus"></i>
              <span class="nav-link-text">
              <b>  Add Product</b>
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="topup">
            <a class="nav-link" href="topup.php">
              <i class="fas fa-donate fa-fw"></i>
              <span class="nav-link-text">
              <b>  Topup </b>
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Orders">
            <a class="nav-link" href="orders.php">
              <i class="fas fa-cart-arrow-down fa-fw"></i>
              <span class="nav-link-text">
              <b>  Orders <span class="badge badge-success right"><font color="#fff"><?php echo $datacount['total'];?></font></span></b>
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Orders History ">
            <a class="nav-link" href="order_history.php">
              <i class="fas fa-history fa-fw"></i>
              <span class="nav-link-text">
              <b>  Orders History  <span class="badge badge-primary right"><font color="#fff"><?php echo $datacount1['total1'];?></font></span></b>
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sell">
            <a class="nav-link" href="sell_order.php">
              <i class="fas fa-handshake fa-fw"></i>
              <span class="nav-link-text">
              <b>  Sell  <span class="badge badge-primary right"><font color="#fff"><?php echo $datacount2['total2'];?></font></span></b>
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Content">
            <a class="nav-link" href="content.php">
              <i class="fas fa-ad fa-fw"></i>
              <span class="nav-link-text">
              <b>  Content </b>
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
            <a class="nav-link" href="manageuser.php">
              <i class="fas fa-users fa-fw"></i>
              <span class="nav-link-text">
              <b>  Users </b>
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Admin">
            <a class="nav-link" href="manageadmin.php">
              <i class="fas fa-user-cog fa-fw"></i>
              <span class="nav-link-text">
              <b>  Admin </b>
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Rate Price">
            <a class="nav-link" href="rateprice.php">
              <i class="fas fa-coins fa-fw"></i>
              <span class="nav-link-text">
              <b>  Rate Price </b>
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Rate Price">
            <a class="nav-link" href="reportuser.php">
              <i class="fas fa-users fa-fw"></i>
              <span class="nav-link-text">
              <b>  Report User </b>
              </span>
            </a>
          </li>
         
          
        </ul>
