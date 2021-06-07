<?php
  session_start(); 
  error_reporting( error_reporting() & ~E_NOTICE );
  require_once '../config/check.php';
  require_once '../config/connectdb.php';

  $sqlrateprice= "SELECT * FROM rateprice Where rp_id = '".$_GET['rp_id']."'"; //ให้ตรงกับฐานข้อมูล
  $resultrateprice = mysqli_query($conn,$sqlrateprice);
  $datarateprice = mysqli_fetch_array($resultrateprice); 
  
  
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
    <title>Editing Username</title>

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
          <li class="breadcrumb-item active">Editing RatePrice</li>
        </ol>
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-users"></i>
            Editing RatePrice
          </div>                              
            <form method="post" action="" enctype="multipart/form-data">
            <div class="table-responsive">
              <table class="table " width="50%" cellspacing="0">
                 <!-- Form Update -->
                <tbody> 
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="u_id"><b>Status </b></label></td>
                    <td width="80%" >
                    <input required name="rp_status" type="radio" value="1" ><b> รับซื้อ</b>&nbsp;
                    <input required name="rp_status" type="radio" value="2" ><b> ไม่รับซื้อ</b>&nbsp;
                    </td>  
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="name"><b>Name</b></label></td>
                    <td width="80%" ><input class="form-control col-5" id="name" name="name" type="text" placeholder="" required value="<?php echo $datarateprice['rp_name'];?>"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="hero"><b>Hero</b></label></td>
                    <td width="80%" ><input class="form-control col-5" id="hero" name="hero" type="text" placeholder=""  value="<?php echo $datarateprice['rp_hero'];?>"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="price"><b>Price</b></label></td>
                    <td width="80%" ><input class="form-control col-5" id="price" name="price" type="text" placeholder="" required value="<?php echo $datarateprice['rp_price'];?>"></td>
                  </tr>
                  <tr>
                  <td></td>
                    <td align="left"><button id="submit" name="submit" class="btn btn-primary">&nbsp;<i class="fas fa-save fa-fw"></i><b>SAVE &nbsp;</b></button>
                    </td>
                  </tr>
                </tbody>          
    </table>
    </div>
    </form>
    <?php //UpDate User 
      if(isset($_POST['submit'])){ 
       
       $status = $_POST['rp_status'];

       $name = $_POST['name'];
       $name = mysqli_real_escape_string($conn, $name);
     
       $hero = $_POST['hero'];
       $hero = mysqli_real_escape_string($conn, $hero);
     
       $price = $_POST['price'];
      
        $updaterateprice = " UPDATE rateprice SET rp_name = '$name', rp_price = '$price', rp_hero = '$hero ', rp_status = '$status' WHERE rp_id = '$_GET[rp_id]'";
        $$update_rateprice= mysqli_query($conn,$updaterateprice)or die("Update RatePrice Failed". mysqli_error());
        mysqli_close($conn);
        echo '<script language="JavaScript">
        swal({
          title: "Success!",
          text: "Update Completed Successfully",
          button: "OK",
          icon: "success",
          });
              </script>';
              echo '<meta http-equiv="refresh" content="1; url=rateprice.php" />';
        
      
      }  
      ?>

<?php //UpDate Password
      if(isset($_POST['submitpassword'])){ 
       
   	 $password = stripslashes($_REQUEST['updatepassword']);
	 $password = mysqli_real_escape_string($conn, $password);
	 $password = md5($password);
      
        $updatpassword = " UPDATE users SET password = '$password' WHERE u_id = '$_GET[u_id]'";
        $$update_password= mysqli_query($conn,$updatpassword)or die("Update Password Failed". mysqli_error());
        mysqli_close($conn);
        echo '<script language="JavaScript">
        swal({
          title: "Success!",
          text: "Update Completed Successfully",
          button: "OK",
          icon: "success",
          });
              </script>';
              echo '<meta http-equiv="refresh" content="1; url=manageuser.php" />';
        
      
      }  
      ?>
          </div>
          <div class="card-footer small text-muted">
          Editing RatePrice
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
