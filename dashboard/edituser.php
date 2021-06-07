<?php
  session_start(); 
  error_reporting( error_reporting() & ~E_NOTICE );
  require_once '../config/check.php';
  require_once '../config/connectdb.php';

  $sqledituser= "SELECT * FROM users Where u_id = '".$_GET['u_id']."'"; //ให้ตรงกับฐานข้อมูล
  $resultedituser = mysqli_query($conn,$sqledituser);
  $dataedituser = mysqli_fetch_array($resultedituser); 
  
  
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
          <li class="breadcrumb-item active">Editing Username</li>
        </ol>
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-users"></i>
            Editing Username
          </div>             
            <form method="post" action="" enctype="multipart/form-data">
            <div class="table-responsive">
              <table class="table " width="50%" cellspacing="0">
                 <!-- Form Update -->
                <tbody> 
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="u_id"><b>Username </b></label></td>
                    <td width="80%" ><input class="form-control col-5" id="username" name="username" type="text" placeholder="" required value="<?php echo $dataedituser['username'];?>" readonly></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="u_status"><b>Type User</b></label></td>
                    <td width="80%" >
                    <input required name="u_status" type="radio" value="0" ><b>Member</b>&nbsp;
                    <input required name="u_status" type="radio" value="1" ><b>Admin</b>
                  </td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="u_name"><b>Name</b></label></td>
                    <td width="80%" ><input class="form-control col-5" id="u_name" name="u_name" type="text" placeholder="" required value="<?php echo $dataedituser['name'];?>"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="email"><b>E-Mail</b></label></td>
                    <td width="80%" ><input class="form-control col-5" id="email" name="email" type="text" placeholder=""  value="<?php echo $dataedituser['email'];?>"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="steam"><b>Stean Link</b></label></td>
                    <td width="80%" ><input class="form-control col-5" id="steam" name="steam" type="text" placeholder="" required value="<?php echo $dataedituser['link'];?>"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input-->  <label for="point"><b>Point</b></label></td>
                    <td width="80%" ><input class="form-control col-5" id="point" name="point" type="text" placeholder="" required value="<?php echo $dataedituser['point'];?>"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="password"><b>Password</b></label>  </td>
                    <td width="80%" >
                    <form role="form" action="edituser.php?u_id=<?=$dataedituser['u_id'];?>" method="POST" id="updatepassword" name="updatepassword" >
                    <input id="name" class="form-control-sm col-5" name="updatepassword" type="text" value="">&nbsp;
                    <button class="btn btn-danger btn-sm" type="submit" name="submitpassword"><b><i class="fas fa-sync-alt fa-fw"></i>Update<b></button> 
                    </form>
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
       $u_status = $_POST['u_status'];

       $name = $_POST['u_name'];
       $name = stripslashes($_REQUEST['u_name']);
       $name = mysqli_real_escape_string($conn, $name);
     
       $email = $_POST['email'];
       $email = mysqli_real_escape_string($conn, $email);

       $steam = $_POST['steam'];
       $steam = mysqli_real_escape_string($conn, $steam);
     
       $point = $_POST['point'];
      
        $updateuser = " UPDATE users SET name = '$name', email = '$email', link = '$steam', status = '$u_status', point = '$point' WHERE u_id = '$_GET[u_id]'";
        $$update_user= mysqli_query($conn,$updateuser)or die("Update Username Failed". mysqli_error());
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
              exit;
            } 
      ?>

                     
        
          </div>
          <div class="card-footer small text-muted">
          Editing Username
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
