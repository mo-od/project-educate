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
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Orders History</title>

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
          <li class="breadcrumb-item active">Orders History</li>
        </ol>
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-history fa-fw"></i>
            Orders History 
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                                    <th>NO.</th>  
                                    <th>Order NO.</th>
                                    <th>Username</th>  
                                    <th>Date</th>
                                    <th>Status</th>   
                                    <th>Manage</th>  
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                                    <th >NO.</th>  
                                    <th >Order NO.</th>
                                    <th>Username</th>  
                                    <th>Date</th>
                                    <th>Status</th>   
                                    <th>Manage</th>  
                  </tr>
                </tfoot>
                <tbody>
                <?php  
              $orders = "SELECT * FROM orders_run AS t1 INNER JOIN users AS t2 ON (t1.u_id = t2.u_id) INNER JOIN status_orders AS t3 ON (t1.status = t3.status_ordersid)  WHERE t1.status= 2 OR t1.status= 3  ORDER BY ordersid_run ASC";  
              $result1 = mysqli_query($conn, $orders);  
              $num=1;
              while($dataorders = mysqli_fetch_array($result1))  
              { 
              ?>  
                  <tr>
                    <td align="" ><b><?php echo $num; ?></b></td>
                    <td align="" ><b><?php echo $dataorders['ordersid_run'];?></b></td>
                    <td align="" ><b><?php echo $dataorders['username'];?></b></td>
                    <td><b><?php echo$dataorders['ordersdate_run']; ?></b></td>
                    <td> 
                       <?php
                                if($dataorders["status_ordersid"] == 1){
                                    echo "<font color='#FF5733'><b>".$dataorders["status_ordersname"]."</b></font>";
                            } 
                                if($dataorders["status_ordersid"] == 2){
                                    echo "<font color='#28a745'><b>".$dataorders["status_ordersname"]."</b></font>";
                            } 
                                if($dataorders["status_ordersid"] == 3){
                                echo "<font color='#FF0000'><b>".$dataorders["status_ordersname"]."</b></font>";
                            } 
                            ?></td>
                    <td>
                      <a class="btn btn-success btn-sm" href="order_edit.php?id=<?php echo $dataorders['ordersid_run']; ?>" >&nbsp;<i class="fas fa-pencil-alt fa-fw "></i><b> Edit&nbsp;</b></a>
                    </td>
                  </tr>
                  <?php  
                     $num++;}mysqli_close($conn);
                  ?> 
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
          Orders History 
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
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

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
