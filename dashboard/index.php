<?php
  session_start(); 
  error_reporting( error_reporting() & ~E_NOTICE );
  require_once '../config/check.php';
  require_once '../config/connectdb.php';

	if(empty($objResult['status'] == '1')){ //Check ADMIN Status = 1
    
    echo "<script>";
    echo "alert('Admin Only !!');";
		echo "window.location='../index.php';";
		echo "</script>";
		exit;	
  }
  //Count Total product 
  $countproduct="select count(*) as total from product ";
  $resultcountproduct=mysqli_query($conn,$countproduct);
  $datacountproduct=mysqli_fetch_assoc($resultcountproduct);

  //Sum Total Sales
  $sumsales="select SUM(total_price) as total1 from orders";
  $resultsumsales=mysqli_query($conn,$sumsales);
  $datasumsales=mysqli_fetch_assoc($resultsumsales);

  //Count Orders 
  $sqlcount3="select count(*) as total2 from orders_run";
  $resultcount3=mysqli_query($conn,$sqlcount3);
  $datacount3=mysqli_fetch_assoc($resultcount3);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">
<!-- sweetalert2 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation -->
  <?php require_once 'navbar.php'; ?>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        
      </div>
    </nav>

    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
        </ol>
        <!-- Example Tables Card -->
        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><b><i class="fas fa-dice-d6"></i> Product Total </b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                   <h6><b>จำนวนสินค้าในร้านทั้งหมด <?php echo $datacountproduct['total'];?> ชิ้น</b></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><b><i class="fas fa-chart-pie"></i> Sales Total </b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <h6><b>ยอดขายสินค้าทั้งหมด <?php echo number_format($datasumsales['total1'],2);?> ฿</b></h6>
                                    </div>
                                </div>
                            </div>
                             <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><b><i class="fas fa-folder-plus"></i> Orders for Total</b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <h6><b>ออเดอร์ทั้งหมด <?php echo $datacount3['total2'];?> ออเดอร์</b></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-chart-line mr-1"></i><b>ยอดขายสินค้า</b></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>Product Name</th>
                                                <th>Sales</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>NO.</th>
                                                <th>Product Name</th>
                                                <th>Sales</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php  
              $productsell = "SELECT p_name,p_image,product , SUM(unit) AS sumunit FROM orders AS t1 INNER JOIN product AS t2 ON t1.product = t2.p_id GROUP BY product ORDER BY `sumunit` DESC";  
              $resultproductsell = mysqli_query($conn, $productsell);  
              $num=1;
              while($dataproductsell = mysqli_fetch_array($resultproductsell))  
              { 
              ?>  
                                            <tr>
                                                <td><b><?php echo $num; ?></b></td>
                                                <td><b><?php echo $dataproductsell["p_name"]; ?></b></td>
                                                <td><b><?php echo $dataproductsell["sumunit"]; ?></b></td>
                                            </tr>
                   <?php  
                     $num++;}  mysqli_close($conn);
                  ?>  
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
      <!-- /.container-fluid -->
     

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <!-- footer -->
    <?php require_once 'footer.php'; ?>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">TOP
      <i class="fa fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/sb-admin.min.js"></script>

  </body>

</html>
