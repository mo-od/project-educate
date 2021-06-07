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
    <title>DOTA2</title>

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
          <li class="breadcrumb-item active">DOTA2 Product</li>
        </ol>
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-list"></i>
            List Products
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                                    <th width="2%">NO.</th>  
                                    <th width="2%">ID</th>
                                    <th width="17%">Image</th>  
                                    <th width="23%">Name</th>
                                    <th width="15%">Description</th>   
                                    <th width="12%">Unit</th>  
                                    <th width="10%">Price</th>     
                                    <th width="5%">Manage</th>  
                                    <th width="5%">Delete</th> 
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                                    <th width="">NO.</th>  
                                    <th width="">ID</th>
                                    <th width="">Image</th>  
                                    <th width="">Name</th>
                                    <th width="">Description</th>   
                                    <th width="">Unit</th>  
                                    <th width="">Price</th>     
                                    <th width="">Manage</th>  
                                    <th width="5%">Delete</th> 
                  </tr>
                </tfoot>
                <tbody>
                <?php  
              $query = "SELECT * FROM product WHERE p_type = 1 ORDER BY p_id ASC";  
              $result = mysqli_query($conn, $query);  
              $num=1;
              while($row = mysqli_fetch_array($result))  
              { 
              ?>  
                  <tr>
                    <td align="center" ><b><?php echo $num; ?></b></td>
                    <td align="center" ><b><?php echo $row["p_id"]; ?></b></td>
                    <td><img src="../photo/<?php echo $row["p_image"]; ?>" height="90rem" width="110rem" /></td>
                    <td><b><?php echo $row["p_name"]; ?></b></td>
                    <td><b><?php echo $row["p_description"]; ?></b></td>
                  
                    <td align="center" >
                    <form role="form" action="productdota.php?p_id=<?=$row['p_id'];?>" method="POST" id="update" name="updateunit" >
                    <input id="name" class="form-control-sm col-4" name="update" type="text" value="<?php echo $row["p_amount"]; ?>"> <br>
                    <button class="btn btn-primary btn-sm mt-1" type="submit" name="submitupdate"><b><i class="fas fa-sync-alt fa-fw"></i>Unit<b></button> 
                    </form>
                    </td>
                    <td align="center" >
                    <form role="form" action="productdota.php?p_id=<?=$row['p_id'];?>" method="POST" id="updateprice" name="updateprice" >
                    <input id="name" class="form-control-sm col-5" name="updateprice" type="text" value="<?php echo number_format($row["p_price"],2); ?>"> <br>
                    <button class="btn btn-primary btn-sm mt-1" type="submit" name="submitprice"><b><i class="fas fa-sync-alt fa-fw"></i>Price<b></button> 
                    </form>
                    </td>
                    <td>
                      <a class="btn btn-success btn-sm" href="updatep.php?p_id=<?php echo $row['p_id']; ?>" >&nbsp;<i class="fas fa-pencil-alt fa-fw"></i><b>Edit &nbsp;</b></a>
                    </td>
                    <td>
                    <form role="form" method="POST">
                      <button class="btn btn-danger btn-sm"  onclick="JavaScript:if(confirm('ลบสินค้านี้ ?')==true)JavaScript:window.open('','',400,320)" type="submit" name="delproduct" value="<?php echo $row['p_id']; ?>" >&nbsp;<i class="fas fa-trash fa-fw"></i><b>Delete&nbsp;</b> </button>
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
          List Products
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
      <?php //Up Date Unit Product
      if(isset($_POST['submitupdate'])){ 
        $unitupdate= $_POST["update"];

        $updateunit = "UPDATE product SET `p_amount` = $unitupdate WHERE `p_id`= '$_GET[p_id]'";
        $$update_unit = mysqli_query($conn,$updateunit)or die("Update Unit Failed". mysqli_error());
        
        echo '<script language="JavaScript">
        swal({
          title: "Success Update!",
          text: "",
          button: "OK",
          icon: "success",
          });
              </script>';
              echo '<meta http-equiv="refresh" content="1; url=productdota.php" />';
        mysqli_close($conn);
        exit;
      }  
      ?>
    <?php //Up Date Unit Product
      if(isset($_POST['submitprice'])){ 
        $priceupdate= $_POST["updateprice"];

        $updateprice = "UPDATE product SET `p_price` = $priceupdate WHERE `p_id`= '$_GET[p_id]'";
        $$update_price = mysqli_query($conn,$updateprice)or die("Update Price Failed". mysqli_error());
        
        echo '<script language="JavaScript">
        swal({
          title: "Success Update!",
          text: "",
          button: "OK",
          icon: "success",
          });
              </script>';
              echo '<meta http-equiv="refresh" content="1; url=productdota.php" />';
        mysqli_close($conn);
        exit;
      }  
      ?>
        <?php //Delete
        if(isset($_POST['delproduct'])){
        $delproduct = "delete from product where p_id='".$_POST['delproduct']."'";
        $del_product = mysqli_query($conn,$delproduct)or die("Delete Productdota Failed". mysqli_error());
        mysqli_close($conn);
        echo '<script language="JavaScript">
        swal({
          title: "Success!",
          text: "",
          button: "OK",
          icon: "success",
          });
              </script>';
   echo '<meta http-equiv="refresh" content="1"; url=productdota.php" />';
       exit;
      }  
    ?>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <!-- footer -->
    <?php require_once 'footer.php'; ?>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">TOP
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
