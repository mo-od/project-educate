<?php
  session_start(); 
  error_reporting( error_reporting() & ~E_NOTICE );
  require_once '../config/check.php';
  require_once '../config/connectdb.php';

  $sqleselledit= "SELECT * FROM sell AS t1 INNER JOIN users AS t2 ON (t1.sell_uid = t2.u_id) Where t1.sell_id = '".$_GET['id']."'"; //ให้ตรงกับฐานข้อมูล
  $resulteselledit = mysqli_query($conn,$sqleselledit);
  $dataeselledit = mysqli_fetch_array($resulteselledit); 
  
  
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
    <title>View Sell</title>

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
          <li class="breadcrumb-item active">View Sell</li>
        </ol>
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-handshake"></i>
            View Sell
          </div>        
            <form method="post" action="" enctype="multipart/form-data">
            <div class="table-responsive">
              <table class="table " width="50%" cellspacing="0">
                 <!-- Form Update -->
                <tbody> 
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label><b>Username :</b></label></td>
                    <td width="80%" ><label for="u_status"><b><?php echo $dataeselledit['username'];?></b></label></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label><b>Steam Name :</b></label></td>
                    <td width="80%" ><label for="u_status"><b><?php echo $dataeselledit['sell_steam'];?></b></label></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="email"><b>Date :  </b></label><label>&ensp;<b><?php echo date('d/m/Y',strtotime($dataeselledit["sell_date"])); ?></b></label></td>
                    <td width="80%" ><label for="email"><b>Time : </b></label><label>&ensp;<b><?php echo date('H:i',strtotime($dataeselledit["sell_time"])); ?></b></label></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label><b>Bank :</b></label></td>
                    <td width="80%" ><label for="u_status"><b><?php echo $dataeselledit['sell_bank'];?></b></label></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label><b>Account NO.</b></label></td>
                    <td width="80%" ><label for="u_status"><b><?php echo $dataeselledit['sell_bankacc'];?></b></label></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label><b>*Note :</b></label></td>
                    <td width="80%" ><label for="u_status"><b><?php echo $dataeselledit['sell_remark'];?></b></label></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"></td>
                    <td width="80%" ><b>
                        <input name="status_o" type="radio" value="2" required> <label for="confirm"><font color="#28a745">Confirm </font></label> <label for="|">|</label> 
                        <input name="status_o" type="radio" value="1" required> <label for="pending"><font color="#FF5733">Pending </font></label> <label for="|">|</label> 
                        <input name="status_o" type="radio" value="3" required> <label for="failed"><font color="#FF0000">Failed </font></label> </b>
                  </td>
                  </tr>
                  <tr>
                  <td></td>
                    <td align="left"><button id="submit" name="submit" class="btn btn-primary"><i class="fas fa-save fa-fw"></i><b>SAVE &nbsp;</b></button></td>
                  </tr>
                </tbody>          
    </table>
    </div>
    </form>
    <?php //UpDate User 
      if(isset($_POST['submit'])){ 
       $status = $_POST['status_o'];
      
        $updateuser = " UPDATE sell SET sell_status = '$status' WHERE sell_id = '$_GET[id]'";
        $$update_user= mysqli_query($conn,$updateuser)or die("Update Username Failed". mysqli_error());
        mysqli_close($conn);
        echo '<script language="JavaScript">
        swal({
          title: "Success!",
          text: "Update Completed",
          button: "OK",
          icon: "success",
          });
              </script>';
              echo '<meta http-equiv="refresh" content="1; url=sell_order.php" />';
        
      
      }  
      ?>
                    
          </div>
          <div class="card-footer small text-muted">
          View Sell
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
