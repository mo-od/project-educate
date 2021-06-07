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
    <title>Content</title>

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
          <li class="breadcrumb-item active">Content</li>
        </ol>
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-ad"></i>
            Content
          </div>        
          <?php 
          $sqlcontact= "SELECT * FROM contact WHERE status = 1";
          $resultcontact = mysqli_query($conn, $sqlcontact);
          $datacontact = mysqli_fetch_array($resultcontact);
          ?>
            <form method="post" action="">
            <div class="table-responsive">
              <table class="table " width="50%" cellspacing="0">
                 <!-- Form Update -->
                 <thead>
                <tr>
                     <th width="50%"><label for="topic"><b>Topic </b></label>
                     <textarea style="resize:none" class="form-control" rows="5" cols="40" name="topic" placeholder="" required ><?php echo $datacontact['topic'];?></textarea>
                    </th> 
                     <th width="50%"><label for="detail"><b>Detail</b></label>
                     <textarea style="resize:none" class="form-control" rows="5" cols="40" name="detail" placeholder="" required ><?php echo $datacontact['description'];?></textarea>
                    </th> 
                </tr> 
                <tr> <td colspan='2'><center><button id="submit" name="submit" class="btn btn-primary"><i class="fas fa-save fa-fw"></i><b>SAVE&nbsp;</b></button></center></td></tr>
              </thead>
              <tbody>
              <tr>
                    <td colspan='2'><b><h4>How to Use</h4></b></td>        
             <tr>  
             <tr>
                    <td colspan='2'><textarea style="resize:none" class="form-control"rows="5" cols="40">
<font size="size"color="color" style="font-family: 'Kanit', sans-serif;">text</font>
<a href="Link Web" class="card-link"></a>
<i class="Icons Font Awesome 5"></i></textarea></td>
             <tr>
            </tbody>
    </table>
    </form>
          </div>
          <div class="card-footer small text-muted">
          Content
          </div>
        </div>
        <?php //Up Date Unit Product
      if(isset($_POST['submit'])){ 
        $topic = $_POST['topic'];
        $topic = mysqli_real_escape_string($conn,$topic);

        $detail = $_POST['detail'];
        $detail = mysqli_real_escape_string($conn,$detail);

        $updatecontent = "UPDATE contact SET topic = '$topic',description = '$detail' WHERE status = 1";
        $update_content = mysqli_query($conn,$updatecontent)or die("Update Content Failed". mysqli_error());
        
        echo '<script language="JavaScript">
        swal({
          title: "Success!",
          text: "Update Content",
          button: "OK",
          icon: "success",
          });
              </script>';
              echo '<meta http-equiv="refresh" content="1; url=content.php" />';
        mysqli_close($conn);
      
      }  
      ?>
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
