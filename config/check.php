<head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>-->

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<body onload="showlogin()">
<style>
.swal2-modal {
  background-color: #F4F6F7 ;
  border: 3px solid #e64f4f;
}
</style>
<?php
require_once 'connectdb.php';
date_default_timezone_set('Asia/Bangkok');
session_start();
@error_reporting (E_ALL ^ E_NOTICE);
if(!isset($_SESSION["username"])){ ?>
<script>
function showlogin() {
    swal({
        type: 'error',
        title: '<strong><i class="fas fa-cat " style="font-size:36px;color:#E59866"></i> Meaw Meaw <i class="fas fa-cat fa-flip-horizontal" style="font-size:36px;color:#E59866"></i></strong>',
        text: '<b>Please Login</b>',
        html: '<b>Please Login</b>',
        allowOutsideClick: 'false',
        allowEscapeKey: 'false',
        confirmButtonColor: '#E74C3C',
        backdrop: `
                    rgba(192,192,192,0.4)
                    url("./img/nyan-cat.gif")
                    top
                    no-repeat
                `,
        confirmButtonText: "OK"
    },
    function(isConfirm){
  if (isConfirm) {
    location.href = "./login.php";
  }
    });
}

</script>
<?php 
    exit;
}
$strSQL = "SELECT * FROM users WHERE username = '".$_SESSION["username"]."'";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>	
  
</body>