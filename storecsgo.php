<!-- Favicon -->
<link rel="shortcut icon" type="image/icon" href="img/logodota.png"/>
<?php
require_once 'config/check.php';
?>
<!-- Required meta tags -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Itim|Kanit|Mitr|Prompt&display=swap" rel="stylesheet">
<title>Store</title>
<!-- CSS/Search -->
<?php require_once 'css/search.php'; ?>

<!-- เรียกใช้Navnbar -->
<?php require_once 'navbar.php'; ?>
 <!-- Page Content -->
 <div class="container">
  <?php
    ini_set('display_errors', 1);
    error_reporting( error_reporting() & ~E_NOTICE );
    $strKeyword = null;
    if(isset($_POST["txtKeyword"]))
    {
    $strKeyword = $_POST["txtKeyword"];
    }
    ?>
<div class="row">
  <div class="col-lg-3">
    <h2 class="my-3"><font size="8" color="#ffffff" style="font-family: 'Mitr', sans-serif; ">Toxic </font></h2>
    <div class="list-group">
    <!-- Search -->
      <div class="page">
    <div class="page__demo">
      <form class="search" name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>" >
        <div class="a-field search__field">
          <input type="text"name="txtKeyword" id="query" class="r-text-field a-field__input search__input" value="<?php echo $strKeyword;?>" placeholder="ค้าหาชื่อสินค้า">
          <button class="r-button search__button search__clear" type="reset">
            <span class="search__clear-label">Clear the search form</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47.971 47.971" class="search__icon search__icon-clear">
              <path d="M28.228 23.986L47.092 5.122a2.998 2.998 0 0 0 0-4.242 2.998 2.998 0 0 0-4.242 0L23.986 19.744 5.121.88a2.998 2.998 0 0 0-4.242 0 2.998 2.998 0 0 0 0 4.242l18.865 18.864L.879 42.85a2.998 2.998 0 1 0 4.242 4.241l18.865-18.864L42.85 47.091c.586.586 1.354.879 2.121.879s1.535-.293 2.121-.879a2.998 2.998 0 0 0 0-4.242L28.228 23.986z"/>
            </svg>          
          </button>
          <label class="a-field__label-wrap search__hint" for="query">
            <span class="a-field__label">What are you looking for?</span>
          </label>        
        </div>
        <button class="r-button search__button search__submit" type="submit">
          <span class="search__submit-label">Search</span>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.966 56.966" class="search__icon search__icon-search">
            <path d="M55.146 51.887L41.588 37.786A22.926 22.926 0 0 0 46.984 23c0-12.682-10.318-23-23-23s-23 10.318-23 23 10.318 23 23 23c4.761 0 9.298-1.436 13.177-4.162l13.661 14.208c.571.593 1.339.92 2.162.92.779 0 1.518-.297 2.079-.837a3.004 3.004 0 0 0 .083-4.242zM23.984 6c9.374 0 17 7.626 17 17s-7.626 17-17 17-17-7.626-17-17 7.626-17 17-17z"/>
          </svg>
        </button>
      </form>
    </div>
   </div>
<!-- Search End -->

      <a href="store.php" class="list-group-item"><img class="menu-hot" src="img/dota2.png"><font size="4" color="#f99910" style="font-family: 'Itim', sans-serif; "> DOTA2</font></a>
      <a href="storecsgo.php" class="list-group-item"><img class="menu-hot" src="img/csgo.png"><font size="4" color="#f99910" style="font-family: 'Itim', sans-serif; "> CS:GO</font></a>
      <a href="storepubg.php" class="list-group-item"><img class="menu-hot" src="img/pubg.png"><font size="4" color="#f99910" style="font-family: 'Itim', sans-serif; "> PUBG</font></a>
      <br>
      <span align="right" class="badge badge-Warning" ><a href="topup.php"><i class="fas fa-wallet fa-fw" style='font-size:18px;color:white'></i>&nbsp;<font color="#FDFEFE"  size="4"   style="font-family: 'Itim',"> 
      THB <?php echo number_format($objResult['point'],2); ?></font></a></span>
              <div class="list-group-item">
                <a class="btn btn-danger"style="width:100%" href="cart.php"> <i class="fa fa-shopping-cart"></i> <b>CART</b>
                
                  </a>
              </div>
              <!-- / cart box -->
              <!-- search box -->
      
    </div>
  </div>


  <!-- /.col-lg-3 -->

  <div class="col-lg-9">
  <div class="row carousel-holder">
  <div class="col-md-12">
    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="img/storecsgo.png"  alt="dota2" > 
        </div>
        </div>
  </div>
          
              <!-- สินค้า -->
              <div class="row">
    <!-- โค้ดPHP-->
    <?php
  include_once("config/connectdb.php");//ใส่ ../ คือการเลือกไฟล์จาก โฟลเดอร์ข้างนอก
    /*$sql = "SELECT * FROM product WHERE (p_name LIKE '%".$_GET["txtKeyword"]."%' or p_rarity LIKE '%".$_GET["txtKeyword"]."%' )";*/ //ค้นหาชื่อ
    $sql = "SELECT * FROM product INNER JOIN typeproduct ON product.p_type=typeproduct.type WHERE 
    (p_name LIKE '%".$_GET["txtKeyword"]."%' or p_rarity LIKE '%".$_GET["txtKeyword"]."%' or p_description LIKE '%".$_GET["txtKeyword"]."%')AND typeproduct.type  = 2";
    
    $query = mysqli_query($conn,$sql);
  while($data=mysqli_fetch_array($query,MYSQLI_ASSOC)) 
  {
?>
      <div class="col-lg-4 col-md-6 mb-3">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="photo/<?=$data['p_image'];?>" alt=""></a>
          <div class="card-body" style="padding: 0.8rem;">
            <h class="card-text">
            <a href=""><font size="3" color="#D3D3D3" style="font-family: 'Kanit', sans-serif;"> <?php echo $data['p_name'];?></font></a>
            </h><br>
            <p class="card-text"><font size="3"color="#FFD700" style="font-family: 'Kanit', sans-serif;"><?=$data['p_rarity'];?></font></p>
            <p class="card-text">จำนวนคงเหลือ <?php echo $data['p_amount'];?></p> 
            <h><font size="3" color="#FF4500" style="font-family: 'Kanit', sans-serif;">Price: <?php echo @number_format($data["p_price"],2); ?> ฿</font></h>
            <center>
            <?php  
            if($data['p_amount'] == 0){
              echo "<font size='3' color='#FFFF00' style='font-family: 'Kanit', sans-serif;'> Out of stock </font>";
            }else{
              echo "<a href='cart.php?p_id=$data[p_id]&act=add'class='btn btn-Danger mt-2'> 
              <font size='2' color='#FFFFFF' style='font-family: 'Kanit', sans-serif;'><b><i class='fas fa-plus'></i> ADD TO CART</b></font></a>"; 
            }
            ?>
            </center>          
          </div>
        </div>
      </div>
      
      <?php        
	}
	mysqli_close($conn);
?>

