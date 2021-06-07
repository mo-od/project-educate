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
    <title>Add Products</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- sweetalert2 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">

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
          <li class="breadcrumb-item active">Add Products</li>
        </ol>
 <!-- Example Tables Card -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Add Products
          </div>             
            <form method="post" action="" enctype="multipart/form-data">
            <div class="table-responsive">
              <table class="table " width="50%" cellspacing="0">
                 <!-- Form Update -->
                <tbody> 
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="typeproduct"><b>Type Product </b></label></td>
                    <td width="80%" ><select class="form-control col-3" name="typeproduct"  required >
                    <?php
                            $sqltype ="SELECT * FROM typeproduct"; 
                            $rstype = mysqli_query($conn,$sqltype);
                            while($datatype = mysqli_fetch_array($rstype)){
                              ?>
                                <option value="<?php echo $datatype['type'];?>"><?php echo $datatype['name_pro'];?></option>>
                                <?php  }  ?>
                  </select>  
                    </td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="p_name"><b>Product Name</b></label></td>
                    <td width="80%" ><input class="form-control col-3" id="p_name" name="p_name" type="text" placeholder="" required></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="p_description"><b>Detail</b></label></td>
                    <td width="80%" ><input class="form-control col-3" id="p_description" name="p_description" type="text" placeholder=""></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="p_rarity"><b>Rarity</b></label></td>
                    <td width="80%" ><input class="form-control col-3" id="p_rarity" name="p_rarity" type="text" placeholder=""  ></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input-->  <label for="p_price"><b>Price</b></label></td>
                    <td width="80%" ><input class="form-control col-3" id="p_price" name="p_price" type="text" placeholder="บาท" required ></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- Text input--> <label for="p_amount"><b>Unit</b></label>  </td>
                    <td width="80%" ><input class="form-control col-3" id="p_amount" name="p_amount" type="text" placeholder="ชิ้น" required ></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"> <!-- File Button -->  <label for="image"><b>Image Product</b><br><font size="2px">recommended image size (354 x 242 px)</font></label></td>
                    <td width="80%" ><input class="form-control col-3 " id="image" name="image" class="input-file" type="file" required></td>
                  </tr>
                  <tr>
                  <td></td>
                    <td align="left"><button id="Submit" name="Submit" class="btn btn-primary"><i class="fas fa-save fa-fw"></i><b>SAVE &nbsp;</b></button></td>
                  </tr>
                </tbody>          
    </table>
    </div>
    </form>
    <?php
    if(isset($_POST['Submit'])){
      require_once '../config/connectdb.php';

      $typeproduct = stripslashes($_POST['typeproduct']);
      $typeproduct = mysqli_real_escape_string($conn,$typeproduct);

      $p_name = stripslashes($_POST['p_name']);
      $p_name = mysqli_real_escape_string($conn,$p_name);
      
      $p_description = stripslashes($_POST['p_description']);
      $p_description = mysqli_real_escape_string($conn, $p_description); 
      $p_rarity = $_POST['p_rarity'];
      $p_price = $_POST['p_price'];
      $p_amount = $_POST['p_amount'];
     
      $uploaddir = '../photo/';
      $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    
      
      if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    
        $image = $_FILES["image"]["name"];
  
        $addproduct = "INSERT INTO `product` (`p_id`, `p_name`, `p_description`, `p_image`, `p_price`, `p_type`, `p_rarity`, `p_amount`) VALUES 
        ('', '$p_name', '$p_description', '$image', '$p_price', '$typeproduct', '$p_rarity','$p_amount')";
        mysqli_query($conn,$addproduct) or die ("Insert Failed"); 
       
        echo '<script language="JavaScript">
        swal({
          title: "Success !",
          text: "Add Product",
          icon: "success",
          });
              </script>';
         echo '<meta http-equiv="refresh" content="2; url=productdota.php" />';
         mysqli_close($conn);
    
    } 
      }
      ?>    
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
