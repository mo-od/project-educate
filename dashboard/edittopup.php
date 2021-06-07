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
    <title>Confirm Payment</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
          <li class="breadcrumb-item active">Confirm Payment</li>
        </ol>
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-donate "></i>
            Confirm Payment
          </div>  
          <?php  
                $topupedit ="SELECT * FROM topup AS t1 INNER JOIN users AS t2 ON (t1.topup_uid = t2.u_id)  WHERE t1.topup_id ='".$_GET['id']."'";
                $resulttopup = mysqli_query($conn, $topupedit);  
                $datatopupedit = mysqli_fetch_array($resulttopup);
          ?>           
            <form method="post" action="" enctype="multipart/form-data">
            <div class="table-responsive">
              <table class="table " width="50%" cellspacing="0">
                 <!-- Form Update -->
                <tbody> 
                  <tr>
                    <td width="15%" align="right"><label><b>Username :</b></label></td>
                    <td width="70%" ><h5><span class="badge badge-success">&nbsp;<?php echo $datatopupedit["username"]; ?>&nbsp;</span><h/5></td>
                  </tr>
                  <tr>
                    <td width="15%" align="right"><label><b>Bank Transfer :</label> <?php echo $datatopupedit['bank_transfer'];?></b></td>
                    <td width="70%" ><label><b>Amount :</label> <font color="red"><?php echo number_format($datatopupedit['amount'],2);?> </font> ฿</b></td>
                  </tr>
                  <tr>
                    <td width="15%" align="right"><label><b>Date :</label> <?php echo $datatopupedit['topup_date'];?></b></td>
                    <td width="70%" ><label><b>Time :</label> <?php echo $datatopupedit['time'];?></b></td>
                  </tr>
                  <tr>
                    <td width="15%" align="right"><label><b>*Note :</b></label></td>
                    <td width="70%" ><b><?php echo $datatopupedit['remark'];?></b></td>
                  </tr>
                  <tr>
                    <td width="15%" align="right"><label><b>Money transfer slip </b></label></td>
                    <td width="70%" ><img src="../<?php echo $datatopupedit["file"]; ?>" style="width: 21rem;" /></td>
                  </tr>
                  <tr>
                  <td width="15%" >  <b>  
                          <input name="status_t" type="radio" value="2" required> <label for="confirm"><font color="#28a745">Confirm </font></label> <label for="|">|</label> 
                          <input name="status_t" type="radio" value="3" required> <label for="failed"><font color="#FF0000">Failed </font></label>
                        </b>  </td>
                 <td align="left"><button id="Submit" name="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i><b>SAVE &nbsp;</b></button></td>
                  </tr>
                </tbody>          
    </table>
    </div>
    </form>
    <?php //UpDate User 
      if(isset($_POST['submit'])){ 
        $point = $datatopupedit['amount'];
        $status_t = $_POST['status_t'];
        $numc = 3;
        if($status_t == @$numc ){
            //Update status 3
            $updatestatus= "UPDATE topup SET topup_status = '$status_t' WHERE topup_id = '$_GET[id]'";
            $queryupdatestatus = mysqli_query($conn,$updatestatus)or die("Update Status Failed". mysqli_error());
            mysqli_close($conn);
                echo '<script language="JavaScript">
                    swal({
                    title: "Success!",
                    text: "Update Completed ",
                    button: "OK",
                    icon: "success",
                    });
                        </script>';
                    echo '<meta http-equiv="refresh" content="1; url=topup.php" />';
                exit;
            } else
       //Add Point
        $updatetopup = " UPDATE users SET point = point + '$point' WHERE u_id = '$datatopupedit[u_id]'";
        $$update_user= mysqli_query($conn,$updatetopup)or die("Update Topup Failed". mysqli_error());
       //Update status
        $updatestatus= "UPDATE topup SET topup_status = '$status_t' WHERE topup_id = '$_GET[id]'";
        $queryupdatestatus = mysqli_query($conn,$updatestatus)or die("Update Status Failed". mysqli_error());
        mysqli_close($conn);
        echo '<script language="JavaScript">
        swal({
          title: "Success!",
          text: "Update Completed ",
          button: "OK",
          icon: "success",
          });
              </script>';
              echo '<meta http-equiv="refresh" content="1; url=topup.php" />';
        
      
      }  exit;
      ?>
                     
        
          </div>
          <div class="card-footer small text-muted">
          Confirm Payment
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
