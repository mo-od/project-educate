<!doctype html>
<html>
<head>
<!-- Required meta tags -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Itim|Kanit|Mitr|Prompt&display=swap" rel="stylesheet">
<meta charset="utf-8">
<title>Rate Price</title>
 <!-- Favicon -->
 <link rel="shortcut icon" type="image/icon" href="img/logodota.png"/>
</head>
<style>
img {
  max-width: 100%;
  height: auto;
}
</style>
<body>
<!-- เรียกใช้Navnbar -->

<?php require_once 'navbar.php'; ?>
<!--<center> 
<div class="alert alert-dismissible alert-primary">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
</div></center>-->
<div class="container">
        <center>
        <div class="card bg-light border-danger shadow-lg mt-5" style="width:100%">
            <div class="card-body">
            <h3 class="my-3"><font size="8" color="#ffffff" style="font-family: 'Mitr', sans-serif; ">RATE PRICE</font></h3>
            <div class="table-responsive-md">
                <table id="example"  class="display table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">NO.</font></th> 
                            <th class="text-center"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">Name</font></th> 
                            <th class="text-center"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">Hero</font></th>
                            <th class="text-center"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">Price</font></th>
                            <th class="text-center"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">Status</font></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      include_once("config/connectdb.php");//ConnectDB
                      $num=1;
                      $sql_rp= "SELECT * FROM rateprice";
                      $result_rp = mysqli_query($conn, $sql_rp);
                      while ($data_rp = mysqli_fetch_array($result_rp)) {
                    ?>
                            <tr>
                                <td class="text-center"><font size="3" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo $num;?></font></td>
                                <td ><font size="3" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo $data_rp['rp_name'];?></font></td>
                                <td ><font size="3" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo $data_rp['rp_hero']; ?></font></td>
                                <td class="text-center"><font size="3" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo number_format($data_rp['rp_price'],2); ?></font></td>
                                <td class="text-center">
                                <?php
                                if($data_rp["rp_status"] == 1){
                                    echo "<h5><b><span class='badge badge-success'><font color='#fff'>รับซื้อ</font></span></b></h5>";
                            } 
                                if($data_rp["rp_status"] == 2){
                                    echo "<h5><b><span class='badge badge-danger'><font color='#fff'>ไม่รับซื้อ</font></span></b></h5>";
                            } 
                            ?>
                                 </td>
                            </tr>
                            <?php        
                        $num++;  } mysqli_close($conn);
                            ?>
                     </tbody>    
                   </table>             
                                        </div>
                                    </div>
                                </div>
                                </center>
                            </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $('#example').dataTable( {
        responsive: true,
        "oLanguage": {
        "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
        "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
        "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
        "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
        "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
        "sSearch": "ค้นหา :"
            }
        } );
    } );
</script>



     
<!-- เรียกใช้footer-->
<?php require_once 'footer.php'; ?> 
</body>
</html>

