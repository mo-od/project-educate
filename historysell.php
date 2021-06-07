<?php
date_default_timezone_set('Asia/Bangkok');
session_start();
@error_reporting (E_ALL ^ E_NOTICE);
?>
<!-- Favicon -->
<link rel="shortcut icon" type="image/icon" href="img/logodota.png"/>
<?php
require_once 'config/check.php';
require_once 'config/connectdb.php';
?>
<!-- Required meta tags -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Itim|Kanit|Mitr|Prompt&display=swap" rel="stylesheet">
<title>History Sell</title>
<style> 
        hr.new1 {
           border-top: 1px solid red;
              }
    </style>
<!-- เรียกใช้Navnbar -->
<?php require_once 'navbar.php'; ?>
<div class="container">
        <center>
        <div class="card bg-light border-danger shadow-lg mt-5" style="width:100%">
            <div class="card-body">
            <h3 class="my-3"><font size="8" color="#ffffff" style="font-family: 'Mitr', sans-serif; ">HISTORY SELL</font></h3>
            <div class="table-responsive-md">
                <table id="example"  class="display table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">NO.</font></th> 
                            <th class="text-center"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">Bank</font></th> 
                            <th class="text-center"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">Account NO.</font></th>
                            <th class="text-center"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">Date</font></th>
                            <th class="text-center"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">Status</font></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      $num=1;
                      $sql= "SELECT * FROM sell WHERE sell_uid ='".$objResult['u_id']."'";
                      $result = mysqli_query($conn, $sql);
                      while ($data = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td class="text-center"><font size="4" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo $num;?></font></td>
                                <td class="text-center"><font size="4" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo $data['sell_bank'];?></font></td>
                                <td class="text-center"><font size="4" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo $data['sell_bankacc'];?></font></td>
                                <td class="text-center"><font size="4" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo date('d/m/Y',strtotime($data["sell_date"])); ?> <?php echo date('H:i',strtotime($data["sell_time"])); ?></font></td>
                                <td class="text-center">
                                <?php
                                if($data["sell_status"] == 1){
                                    echo "<h5><b><span class='badge badge-warning'><font color='#fff'>Pending</font></span></b></h5>";
                            } 
                                if($data["sell_status"] == 2){
                                    echo "<h5><b><span class='badge badge-success'><font color='#fff'>Confirm</font></span></b></h5>";
                            } 
                                if($data["sell_status"] == 3){
                                    echo "<h5><b><span class='badge badge-danger'><font color='#fff'>Failed</font></span></b></h5>";
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