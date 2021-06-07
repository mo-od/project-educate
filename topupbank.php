<!-- Favicon -->
<link rel="shortcut icon" type="image/icon" href="img/logodota.png"/>
<?php
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
<title>Topup Bank</title>
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
<div class="card bg-light border-light shadow-lg mt-5" style="100%">
<div class="card-body">
<center><h3 class="my-3"><font size="8" color="#ffffff" style="font-family: 'Mitr', sans-serif; ">TOPUP BANK</font></h3>
           <hr> </center>
                      <form class="form" method="post"  enctype="multipart/form-data">
                      <div class="table-responsive">
              <table class="table table-borderless" width="50%" cellspacing="0">
                 <!-- Form Update -->
                <tbody> 
                  <tr>
                    <td width="35%" align="right"> <!-- Text input--><label><font color="#212529"><b>ยอดเงินที่โอน :</b></font></label></td>
                    <td width="65%" ><input class="form-control col-8" id="amount" name="amount" type="text" placeholder="" required ></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"> <!-- Text input--> <label><font color="#212529"><b>ธนาคารที่โอนเงิน :</b></font></label></td>
                    <td width="65%" > <input name="bank_transfer" value="‎Krungthai" type="radio" required>
                    <img src="img/ktbicon.png" width="30"><font color="#212529"> ‎Krungthai Bank Account NO: 931-3-00271-0 </font><br>
                              <input name="bank_transfer" class="mt-2" value="Promptpay" type="radio" required>
                    <img src="img/promotpayicon.png" class="mt-1" width="30"><font color="#212529"> Promptpay Tel: 086-375-3035 </font>
                              </td>
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
                    <td width="35%" align="right"> <!-- Text input--> <label><font color="#212529"><b>หลักฐานการชำระเงิน :</b></font></label></td>
                    <td width="65%" >  <input id="name" name="image" type="file" class="form-control col-8"  required> <br>
                      <span ><font size="2px"color="#FF000"><b>*การใช้หลักฐานปลอม มีความผิดตาม พรบ. คอมพิวเตอร์</b></font></span></td>
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
 
    $u_id = $objResult['u_id'];
    $amount = $_POST['amount'];
    $bank_transfer = $_POST['bank_transfer'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $remark= $_POST['remark'];
    $status= 1;
    
    $uploaddir = 'topup/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
  
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
  
      $image = "topup/".$_FILES["image"]["name"];

      $topupp = "INSERT INTO `topup` (`topup_id`, `topup_uid`, `amount`, `bank_transfer`, `topup_date`, `time`, `file`, `remark`, `topup_status`) VALUES 
      ('', '$u_id','$amount','$bank_transfer','$date','$time','$image','$remark','$status')";
      mysqli_query($conn,$topupp);
      mysqli_close($conn);
      echo '<script language="JavaScript">
      swal({
        title: "Success !",
        text: "",
        icon: "success",
        });
            </script>';
       echo '<meta http-equiv="refresh" content="2; url=topup.php" />';
  } 
  
  }
   exit;
?>
     
<!-- เรียกใช้footer-->
<?php require_once 'footer.php'; ?> 
</body>
</html>

