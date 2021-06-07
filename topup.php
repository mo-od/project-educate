<!-- Favicon -->
<link rel="shortcut icon" type="image/icon" href="img/logodota.png"/>
<?php
require_once 'config/check.php';
?>
<!-- Required meta tags -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Itim|Kanit|Mitr|Prompt&display=swap" rel="stylesheet">
<title>Topup</title>
<!-- เรียกใช้Navnbar -->
<?php require_once 'navbar.php'; ?>

<div class="container">
        <center>
        <div class="card bg-light border-light shadow-lg mt-5" style="100%">
            <div class="card-body">
            <h3 class="my-3">
           <h3><font size="8" color="#ffffff" style="font-family: 'Mitr', sans-serif; "><i class="fas fa-university"></i> TOPUP</font></h3>
            <hr>
                <div class="form-group mt-5">
                    <div class="row">
                        <div class="col-6">
                        <div class="form-group">
                                <a href="topupbank.php"><img src="img/ktb.png" title="เติมผ่านธนาคาร" class="img-fluid shadow" alt="Responsive image" width="250" height="250"></a>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-success shadow" href="topupbank.php" role="button"><b><i class="fas fa-exchange-alt"></i> TOPUP BANK</b></a>
                            </div>
                        </div> 
                      <!--  <div class="col-6">
                            <div class="form-group">
                                <a href="<?php echo $config['web_address']; ?>wallet.php"><img src="img/truewallet.png" class="img-fluid shadow" title="เติมเงินผ่านทรูมันนี่วอลเลท" alt="Responsive image" width="250" height="250"></a>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-warning shadow" href="wallet.php" role="button"><i class="fas fa-exchange-alt"></i> เติมผ่านทรูมันนี่วอลเลท</a>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        </center>