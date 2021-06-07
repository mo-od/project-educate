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
    <title>Orders</title>

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
          <li class="breadcrumb-item active">Product</li>
        </ol>
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-list"></i>
            List Products
          </div>
          <div class="card-body"> 
          <?php  
                $ordersmanagename ="SELECT * FROM orders_run AS t1 INNER JOIN users AS t2 ON (t1.u_id = t2.u_id) INNER JOIN status_orders AS t3 ON (t1.status = t3.status_ordersid) INNER JOIN orders AS t4 ON (t1.ordersid_run = t4.order_namber) INNER JOIN product AS t5 ON (t4.product = t5.p_id)  WHERE t1.ordersid_run ='".$_GET['id']."'";
                $resultordername = mysqli_query($conn, $ordersmanagename);  
                $datausername = mysqli_fetch_array($resultordername);
          ?>
        <form method="post" action="">
          <div class="table-responsive">
              <table class="table table-borderless">
                  <thead>
                  <tr>
                     <th width="20%"><label for="orderno">Order NO :</label> <span class="badge badge-danger">&nbsp;<?php echo $datausername["ordersid_run"]; ?>&nbsp;</span></th> 
                     <th width="20%"><label for="username">Username :</label> <span class="badge badge-success">&nbsp;<?php echo $datausername["username"]; ?>&nbsp;</span></th> 
                     <th width="20%"><label for="steamlink">Steam Link :</label> <a class="badge badge-success"href="<?php echo $datausername["link"]; ?>" >&nbsp;<i class="fas fa-link"></i><b>&nbsp;Cilck</b>&nbsp;</a></th>
                     <th class="table-primary" width="20%"><center>
                          <input name="status_o" type="radio" value="2" required> <label for="confirm"><font color="#28a745">Confirm </font></label> <label for="|">|</label> 
                          <input name="status_o" type="radio" value="3" required> <label for="failed"><font color="#FF0000">Failed </font></label> </center>
                      </th>
                      <th class="table-primary"><button id="submit" name="submit" class="btn btn-primary btn-sm"><i class="fas fa-save fa-fw"></i><b>SAVE &nbsp;</b></button></th>
                  </tr>    
                  </thead>             
              </table>
        </div>  
      </form>
            <div class="table-responsive">
              <table class="table table-striped" width="100%"  cellspacing="0">
                <thead>
                  <tr>
                                    <th width="2%" >NO.</th> 
                                    <th width="2%" >ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Unit</th>
                                    <th>Unit/Price</th>
                  </tr>
                </thead>
                <tbody>
                <?php  
                
              $ordersmanage ="SELECT * FROM orders_run AS t1 INNER JOIN users AS t2 ON (t1.u_id = t2.u_id) INNER JOIN status_orders AS t3 ON (t1.status = t3.status_ordersid) INNER JOIN orders AS t4 ON (t1.ordersid_run = t4.order_namber) INNER JOIN product AS t5 ON (t4.product = t5.p_id)  WHERE t1.ordersid_run ='".$_GET['id']."'";
              $resultorder = mysqli_query($conn, $ordersmanage);  
              $num=1;
              while($ordersmanage = mysqli_fetch_array($resultorder))  { 
                $qty = $ordersmanage['unit'] * $ordersmanage['unit_price'];
                $sum += $qty;
              ?>  
                  <tr>
                    <td align="center" ><b><?php echo $num; ?></b></td>
                    <td align="center" ><b><?php echo $ordersmanage["p_id"]; ?></b></td>
                    <td><img src="../photo/<?php echo $ordersmanage["p_image"]; ?>" height="90rem" width="110rem" /></td>
                    <td><b><?php echo $ordersmanage["p_name"]; ?></b></td>
                    <td><b><?php echo number_format($ordersmanage['unit_price'],2); ?></b></td>
                    <td ><b><?php echo $ordersmanage['unit']; ?></b></td>
                    <td ><b><?php echo number_format($ordersmanage['total_price'],2); ?></b></td>
                  </tr>
                  <?php  
                     $num++;} 
                  ?> 
                  <tr>
                    <th colspan='6' class="text-right"><font size="4"   style="font-family:  sans-serif; ">Total Parice :</font></td>
                    <th colspan='7' class="text-left"><font size="4"  style="font-family:  sans-serif; "><?php echo number_format($sum,2) ; ?></font></td>
                  </tr>  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
          List Products
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
      <?php //Up Date Unit Product
      if(isset($_POST['submit'])){ 
        $status = $_POST['status_o'];
        $updateunit = "UPDATE orders_run SET status = $status WHERE ordersid_run = '$_GET[id]'";
        $$update_unit = mysqli_query($conn,$updateunit)or die("Update Unit Failed". mysqli_error());
        
        echo '<script language="JavaScript">
        swal({
          title: "Success!",
          text: "Confirm Order ✈️",
          button: "OK",
          icon: "success",
          });
              </script>';
              echo '<meta http-equiv="refresh" content="1; url=orders.php" />';
        mysqli_close($conn);
      
      }  
      ?>
  

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
