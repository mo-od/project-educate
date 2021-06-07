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
    <title>Rate Price</title>

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
          <li class="breadcrumb-item active">Rate Price</li>
        </ol>
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-coins fa-fw"></i>
            Rate Price 
          </div> 
          <div class="card-body">
        <form method="post" action="">
          <div class="table-responsive">
              <table class="table table-borderless">
                  <thead>
                  <tr>
                     <th width="3%"><label for="orderno">Name: </label></th>
                     <th width="25%"><input class="form-control col-13" id="" name="name" type="text" placeholder="" required value=""></th> 
                     <th width="3%"><label for="orderno">Price: </label></th>
                     <th width="15%"><input class="form-control col-13" id="" name="price" type="text" placeholder="Baht" required value=""></th> 
                     <th width="3%"><label for="orderno">Hero: </label></th>
                     <th width="20%"><input class="form-control col-13" id="" name="hero" type="text" placeholder="" required value=""></th>                    
                     <th><button id="submit" name="submit" class="btn btn-primary btn-sm">&nbsp;<i class="fas fa-plus-circle fa-fw"></i><b>ADD&nbsp;</b></button></th>
                  </tr>    
                  </thead>             
              </table>
        </div>  
      </form>
            <div class="table-responsive">
              <table class="table table-striped" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                                    <th>NO.</th>  
                                    <th>Name</th>
                                    <th>Price</th>  
                                    <th>Hero</th>
                                    <th>Status</th>   
                                    <th>Manage</th>  
                                    <th>Delete</th> 
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                                    <th >NO.</th>  
                                    <th >Name</th>
                                    <th>Price</th>  
                                    <th>Hero</th>
                                    <th>Status</th>   
                                    <th>Manage</th>  
                                    <th>Delete</th> 
                  </tr>
                </tfoot>
                <tbody>
                <?php  
              $sqlrateprice = "SELECT * FROM rateprice";  
              $resultrateprice = mysqli_query($conn, $sqlrateprice);  
              $num=1;
              while($daterateprice = mysqli_fetch_array($resultrateprice))  
              { 
              ?>  
                  <tr>
                    <td align="" ><b><?php echo $num; ?></b></td>
                    <td align="" ><b><?php echo $daterateprice['rp_name'];?></b></td>
                    <td align="" ><b><?php echo number_format($daterateprice['rp_price'],2);?></b></td>
                    <td align="" ><b><?php echo $daterateprice['rp_hero'];?></b></td>
                    <td align="" >
                    <?php
                                if($daterateprice["rp_status"] == 1){
                                    echo "<font color='#28B463'><b>รับซื้อ</b></font>";
                            } 
                                if($daterateprice["rp_status"] == 2){
                                    echo "<font color='#FF5733'><b>ไม่รับซื้อ</b></font>";
                            }  
                            ?>  
                    </td>
                    <td> 
                    <a class="btn btn-success btn-sm" href="editrateprice.php?rp_id=<?php echo $daterateprice['rp_id']; ?>">&nbsp;<i class="fas fa-pencil-alt fa-fw "></i><b> Edit&nbsp;</b></a>
                    </td>
                    <td>
                    <form role="form" method="POST">
                    <button class="btn btn-danger btn-sm" type="submit" name="submitprice" value="<?php echo $daterateprice['rp_id'];?>" >&nbsp;<i class="fas fa-trash fa-fw"></i><b>Delete&nbsp;</b> </button>
                    </form>
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
          Rate Price 
          </div>
        </div>
      </div>
      </div>
    <?php //Up Add Product
      if(isset($_POST['submit'])){ 
        $name = $_POST['name'];
        $name = mysqli_real_escape_string($conn,$name);

        $price = $_POST['price'];
        $price = mysqli_real_escape_string($conn,$price);

        $hero = $_POST['hero'];
        $hero = mysqli_real_escape_string($conn,$hero);
        $status = 1 ;
        $insertrp = "INSERT INTO `rateprice` (`rp_id`, `rp_name`, `rp_price`, `rp_hero`, `rp_status`) VALUES 
        ('', '$name', '$price', '$hero', '$status');";
        $insert_rp = mysqli_query($conn,$insertrp)or die("Inser Rateprice Failed". mysqli_error());
        
        echo '<script language="JavaScript">
        swal({
          title: "Success!",
          text: "Add '.$_POST['hero'].'",
          button: "OK",
          icon: "success",
          });
              </script>';
              echo '<meta http-equiv="refresh" content="1; url=rateprice.php" />';
        mysqli_close($conn);
        exit;
      }  
    ?>
<?php //Delete
        if(isset($_POST['submitprice'])){
        $delrp= "delete from rateprice where rp_id='".$_POST['submitprice']."'";
        $del_rateprice = mysqli_query($conn,$delrp)or die("Delete Rateprice Failed". mysqli_error());
        mysqli_close($conn);
        echo '<script language="JavaScript">
        swal({
          title: "Success!",
          text: "",
          button: "OK",
          icon: "success",
          });
              </script>';
   echo '<meta http-equiv="refresh" content="1"; url=rateprice.php" />';
       exit;
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
