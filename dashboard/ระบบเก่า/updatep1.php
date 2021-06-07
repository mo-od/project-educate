<?php
  session_start(); 
  error_reporting( error_reporting() & ~E_NOTICE );
  require_once '../config/check.php';
  require_once '../config/connectdb.php';
  $sql2= "SELECT * FROM product Where p_id = '".$_GET['p_id']."'"; //ให้ตรงกับฐานข้อมูล
	$result2 = mysqli_query($conn, $sql2);
	$data2 = mysqli_fetch_array($result2 ); 
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>KKN SHOP</title>

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
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">แก้ไขรายการสินค้า</li>
        </ol>
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            รายการแก่ไขสินค้า


          </div>
          <div class="card-body">
            <div class="table-responsive">
            
            
            
           <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
      <fieldset>

      <!-- Form Name -->
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="id">รหัสสินค้า</label>  
          <div class="col-md-4">
          <input id="pid" name="pid" type="text" placeholder="" class="form-control input-md" required value="<?=$data2['p_id'];?>" readonly>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="p_name">ชื่อสินค้า</label>  
          <div class="col-md-4">
          <input id="p_name" name="p_name" type="text" placeholder="" class="form-control input-md" required value="<?=$data2['p_name'];?>">
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="p_details">รายละเอียด</label>  
          <div class="col-md-4">
          <input id="p_details" name="p_details" type="text" placeholder="" class="form-control input-md"  value="<?=$data2['p_description'];?>">
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="p_rarity">ความหายาก</label>  
          <div class="col-md-4">
          <input id="p_rarity" name="p_rarity" type="text" placeholder="ชิ้น" class="form-control input-md" required value="<?=$data2['p_rarity'];?>">
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="p_price">ราคา</label>  
          <div class="col-md-4">
          <input id="p_price" name="p_price" type="text" placeholder="บาท" class="form-control input-md" required value="<?=$data2['p_price'];?>">
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="p_amount">จำนวน</label>  
          <div class="col-md-4">
          <input id="p_amount" name="p_amount" type="text" placeholder="ชิ้น" class="form-control input-md" required value="<?=$data2['p_amount'];?>">
          </div>
        </div>
        <!-- File Button --> 
        <div class="form-group">
          <label class="col-md-4 control-label" for="pfile">รูปสินค้า</label>
          <div class="col-md-4">
            <input id="pfile" name="pfile" class="input-file" type="file">
          </div>
        </div>
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="Submit"></label>
      <div class="col-md-4">
        <button id="Submit" name="Submit" class="btn btn-primary">บันทึก</button>
      </div>
    </div>
    </fieldset>
    </form>


<?php
    if(isset($_POST['Submit'])){
      require_once '../config/connectdb.php';
      $p_name= $_POST['p_name'];
      $p_price = $_POST['p_price'];
      $p_amount =$_POST['p_amount'];
      $p_description = $_POST['p_details'];
      $p_rarity=$_POST['p_rarity'];

      if($_FILES['pfile']['tmp_name']==""){
        
        $sql = "UPDATE product SET p_name = '$p_name', p_price = '$p_price', p_amount = '$p_amount', p_description = '$p_description', p_rarity = '$p_rarity'
      
        WHERE p_id = '".$data2['p_id']."';";
        
      } else {
        
      $sql = "UPDATE product SET p_name = '$p_name', p_image = '".$_FILES['pfile']['name']."',p_price = '$p_price', p_amount = '$p_amount', p_description = '$p_description', p_rarity = '$p_rarity'
      WHERE p_id = '".$data2['p_id']."';";  //โคดการอัปเดจลงฐารข้อมูลนะจะ
      $uploaddir = 'photo/';
      copy($_FILES['pfile']['tmp_name'],  "../photo/".$_FILES['pfile']['name']);//คำสั่งเพิ่มรูปภาพจากผู้ใช้
      mysqli_query($conn, $sql) or die ("แก้ไขข้อมูลไม่ได้");  //var_dump($sql); text;
      }
     
      echo '<script language="JavaScript">
      swal({
        title: "Success Update!",
        text: "",
        icon: "success",
        });
            </script>';
            echo '<meta http-equiv="refresh" content="1; url=index.php" />';
      
              
      
      
      
  }

  ?>
            
              
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            รายการแก่ไขสินค้า
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
