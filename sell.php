<link rel="shortcut icon" type="image/icon" href="img/logodota.png"/>
<?php
session_start();
@error_reporting (E_ALL ^ E_NOTICE);
date_default_timezone_set('Asia/Bangkok');
require_once 'config/check.php';
require_once 'config/connectdb.php';
?>
<!doctype html>
<html>
<head>
<!-- Required meta tags -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Itim|Kanit|Mitr|Prompt&display=swap" rel="stylesheet">
<!-- sweetalert2 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<meta charset="utf-8">
<title>Sell Items</title>
</head>
<style>
img {
  max-width: 100%;
  height: auto;
}form.form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 8px;
  border-color: red ;
}
</style>
<body>
<!-- เรียกใช้Navnbar -->

<?php require_once 'navbar.php'; ?>

<div class="container">
<div class="card bg-primary border-light shadow-lg mt-5" style="100%">
<div class="card-body">
<center><h3 class="my-3"><font size="8" color="#ffffff" style="font-family: 'Mitr', sans-serif; ">Sell Items</font></h3>
           <hr>
           <h5><span class="badge badge-success right"><font color="#0000"><b>กรุณาเช็คไอเทมที่รับซื้อทุกครั้งก่อนเทรดไอเทม สามารถดูได้เรทราคารับซื้อได้ที่ &nbsp;</b></font>
           <a href="rateprice.php" ><font color="#0000"><i class="fas fa-external-link-alt fa-fw "></i>Rate Price</font></a></span></h5></center>
                      <form class="form mt-2" method="post"  enctype="multipart/form-data">
                      <div class="table-responsive">
              <table class="table table-borderless" width="50%" cellspacing="0">
                 <!-- Form Sell-->
                <tbody> 
                <tr>
                    <td colspan='2' align="center"> <!-- Text input--> <label><font color="#212529"><b>Link Steam Trade :</b></font></label>&nbsp;<a class="badge badge-success"href="<?php echo $config['steam']; ?>" >&nbsp;<i class="fas fa-link"></i><b>&nbsp;Cilck</b>&nbsp;</a>
                    &nbsp;<font size="3px"color="#ff9910"><b>สามาดูวิธีการขายไอเทมได้ที่</b></font> &nbsp;<a class="badge badge-danger " href="howtosell.php" >&nbsp;<i class="fas fa-external-link-alt"></i><b>&nbsp;Cilck</b>&nbsp;</a></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"> <!-- Text input--> <label><font color="#212529"><b>Steam :</b></font></label></td>
                    <td width="65%" ><input class="form-control col-8" id="steamname" name="steamname" type="text" placeholder="" required >
                  </tr>
                  <tr>
                    <td width="35%" align="right"> <!-- Text input--><label><font color="#212529"><b>ธนาคาร :</b></font></label></td>
                    <td width="65%" > <select name="bank" class="form-control col-8" required>
                        <option value="" selected>กรุณาเลือกธนาคาร</option>
                        <option value="กสิกร" >กสิกร</option>
                        <option value="ไทยพานิชย์">ไทยพานิชย์</option>
                        <option value="กรุงเทพ">กรุงเทพ</option>
                        <option value="กรุงไทย">กรุงไทย</option>
                        <option value="ทหารไทย">ทหารไทย</option>
                        <option value="กรุงศรีอยุธยา">กรุงศรีอยุธยา</option>
                        <option value="ออมสิน">ออมสิน</option>
                        <option value="พร้อมเพย์">พร้อมเพย์</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"> <!-- Text input--> <label><font color="#212529"><b>เลขบัญชี/พร้อมเพย์ :</b></font></label></td>
                    <td width="65%" ><input class="form-control col-8" id="bankacc" name="bankacc" type="text" placeholder="" required >
                    <span ><font size="2px"color="#FF000"><b>*ใช้สำหรับโอนเงิน หลังการขายไอเทมเสร็จสิ้น</b></font></span></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"> <!-- Text input--> <label><font color="#212529"><b>เมือวันที่ :</b></font></label></td>
                    <td width="65%" > <input type="date" class="form-control col-8" placeholder="เมือวันที่" maxlength="10" name="date"></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"> <!-- Text input--> <label><font color="#212529"><b>เมื่อเวลา :</b></font></label></td>
                    <td width="65%" ><input class="form-control col-8" placeholder="ตัวอย่าง 18:53" type="text" maxlength="5" name="time"></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"> <!-- Text input--> <label><font color="#212529"><b>หมายเหตุ :</b></font></label></td>
                    <td width="65%" > <textarea style="resize:none" class="form-control col-8"  type="text" name="remark" placeholder="*ไม่จำเป็นต้องระบุ"></textarea></td>
                  </tr>
                  <tr>
                  <td></td>
                    <td align="left"><button id="submit" type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i><b>SAVE &nbsp;</b></button></td>
                  </tr>
                </tbody>          
               </table>
                 </div>    
                      </form>
                  </div>
             </div>
        </div>
        <?php

if (isset($_POST['submit'])) {

  $steamname = $_POST['steamname'];
  $steamname = mysqli_real_escape_string($conn,$steamname);

  $bank = $_POST['bank'];
  $bank = mysqli_real_escape_string($conn,$bank);

  $bankacc = $_POST['bankacc'];
  
  $date = $_POST['date'];
  $time = $_POST['time'];

  $remark = $_POST['remark'];
  $remark = mysqli_real_escape_string($conn,$remark);
  
  $status = 1;

    $sellitem = "INSERT INTO sell (sell_uid,sell_steam,	sell_bank,	sell_bankacc,	sell_date,	sell_time,	sell_remark,	sell_status) VALUES 
    ('".$objResult['u_id']."','$steamname','$bank','$bankacc','$date','$time','$remark','$status')";
    mysqli_query($conn,$sellitem)or die ("Insert Failed"); 
    
    mysqli_close($conn);
    
    echo '<script language="JavaScript">
    swal({
      title: "Success !",
      text: "",
      icon: "success",
      });
          </script>';
     echo '<meta http-equiv="refresh" content="2; url=history.php" />';
} 
?>    
<!-- เรียกใช้footer-->
<?php require_once 'footer.php'; ?> 
</body>
</html>

