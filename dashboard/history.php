<?php

require('../config/config.php');

if (isset($_POST['add_product'])) {

  $name = $_POST['name'];
  $price = $_POST['price'];
  $code = $_POST['code'];
  $type = $_POST['type'];
  $unit = $_POST['unit'];


  $uploaddir = '../product-images';
  $uploadfile = $uploaddir . basename($_FILES['image']['name']);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {

    $image = "product-images/".$_FILES["image"]["name"];
    $str = "INSERT INTO tblproduct (id,name,code,image,price,tproid,unit,sale) VALUES('','$name','$code','$image','$price',$type,$unit,'')";
    mysqli_query($link,$str);


} else {
 
  $image = "https://placehold.it/250x300";
  $str = "INSERT INTO tblproduct (id,name,code,image,price,tproid,unit,sale) VALUES('','$name','$code','$image','$price',$type,$unit,'')";
  mysqli_query($link,$str);
}


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
    <title>KKN SHOP</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="#">KKN SHOP</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
		 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="หน้าหลัก">
            <a class="nav-link" href="../index.php">
              <span class="nav-link-text">
                หน้าหลัก
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="เพิ่มสินค้า">
            <a class="nav-link" href="index.php">
              <i class="fa fa-fw fa-list"></i>
              <span class="nav-link-text">
                รายการสินค้า
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="เพิ่มสินค้า">
            <a class="nav-link" href="add_product.php">
              <i class="fa fa-fw fa-plus"></i>
              <span class="nav-link-text">
                เพิ่มสินค้า
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="เพิ่มสินค้า">
            <a class="nav-link" href="history.php">
              <i class="fa fa-history"></i>
              <span class="nav-link-text">
                ประวัติการสั่งซื้อ
              </span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-envelope"></i>
              <span class="d-lg-none">Messages
                <span class="badge badge-pill badge-primary">12 New</span>
              </span>

            </a>

          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell"></i>
              <span class="d-lg-none">Alerts
                <span class="badge badge-pill badge-warning">6 New</span>
              </span>

            </a>
          
            
          </li>
          <li class="nav-item">
            <form class="form-inline my-2 my-lg-0 mr-lg-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>
              Logout</a>
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
          <li class="breadcrumb-item active">ประวัติการสั่งซื้อ</li>
        </ol>

       <!-- Example Tables Card -->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            ประวัติการสั่งซื้อ


          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ออเดอร์</th>
                    <th>รหัสสินค้า</th>
                    <th>จำนวนสินค้า</th>
                    <th>ราคาสินค้า</th>
					<th>ชื่อ</th>
					<th>ที่อยู่</th>
                    <th>เบอร์โทร</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>ออเดอร์</th>
                    <th>รหัสสินค้า</th>
                    <th>จำนวนสินค้า</th>
                    <th>ราคาสินค้า</th>
					<th>ชื่อ</th>
					<th>ที่อยู่</th>
                    <th>เบอร์โทร</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php $str = "select * from orderproduct inner join orders on orderproduct.ordersid=orders.ordersid";
                  $rs = mysqli_query($link,$str);
                  $num=1;
                  while ($data = mysqli_fetch_array($rs)) {

                  ?>
                  <tr>
                    <td><?php echo $num;?></td>
                    <td><?php echo $data['ordersid'];?></td>
                    <td><?php echo $data['procode'];?></td>
                    <td><?php echo $data['unit'];?></td>
                    <td><?php echo $data['price'];?></td>
                    <td><?php echo $data['name'];?></td>
                    <td><?php echo $data['address'];?></td>
                    <td><?php echo $data['tel'];?></td>
                  </tr>
                <?php $num++;
                      }
                ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            รายการสินค้าทั้งหมด
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy; Your Website 2017</small>
        </div>
      </div>
    </footer>

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
