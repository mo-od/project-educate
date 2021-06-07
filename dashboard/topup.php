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
    <title>Topup</title>

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
          <li class="breadcrumb-item active">Topup</li>
        </ol>
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-donate fa-fw"></i>
            Topup 
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                                    <th>NO.</th>  
                                    <th>Username</th> 
                                    <th>Bank</th>
                                    <th>Amount</th>   
                                    <th>Date</th> 
                                    <th>Status</th> 
                                    <th>Manage</th>  
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                                    <th>NO.</th>  
                                    <th>Username</th> 
                                    <th>Bank</th>
                                    <th>Amount</th>   
                                    <th>Date</th> 
                                    <th>Status</th> 
                                    <th>Manage</th> 
                  </tr>
                </tfoot>
                <tbody>
                <?php  
              $sqltopup = "SELECT * FROM topup AS t1 INNER JOIN users AS t2 ON (t1.topup_uid = t2.u_id)";  
              $resulttopup = mysqli_query($conn, $sqltopup);  
              $num=1;
              while($datatopup = mysqli_fetch_array($resulttopup))  
              { 
              ?>  
                  <tr>
                    <td align="" ><b><?php echo $num; ?></b></td>
                    <td align="" ><b><?php echo $datatopup['username'];?></b></td>
                    <td align="" ><b><?php echo $datatopup['bank_transfer'];?></b></td>
                    <td><b><?php echo number_format($datatopup['amount'],2); ?></b></td>
                    <td align="" ><b><i class="fas fa-calendar-alt fa-sm"></i> <?php echo $datatopup['topup_date'];?> <i class="fas fa-clock fa-sm"></i> <?php echo $datatopup['time'];?></b></td>
                    <td>
                    <?php
                                if($datatopup["topup_status"] == 1){
                                    echo "<font  size='4' color='#FF5733'><b>Pending</b></font>";
                            } 
                                if($datatopup["topup_status"] == 2){
                                    echo "<font  size='4' color='#28a745'><b>Confirm</b></font>";
                            } 
                                if($datatopup["topup_status"] == 3){
                                  echo "<font  size='4' color='#FF0000'><b>Failed</b></font>";
                            } 
                            ?>
                    </td>
                    <td>
                      <a class="btn btn-success btn-sm" href="edittopup.php?id=<?php echo $datatopup['topup_id']; ?>" >&nbsp;<i class="fas fa-search fa-fw "></i><b> View&nbsp;</b></a>
                    </td>
                  </tr>
                  <?php  
                     $num++;}
                  ?> 
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
          Topup 
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
