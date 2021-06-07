<!-- Favicon -->
<link rel="shortcut icon" type="image/icon" href="img/logodota.png"/>
<?php
require_once 'config/check.php';
?>
<!-- Required meta tags -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Itim|Kanit|Mitr|Prompt&display=swap" rel="stylesheet">

<!-- เรียกใช้Navnbar -->
<?php require_once 'navbar.php'; ?>
<div class="container">
<div class="card bg-light border-danger shadow-lg mt-5" style="width:100%">
            <div class="card-body">
            <h3 class="my-3" align="center" ><font size="8" color="#ffffff" style="font-family: 'Mitr', sans-serif; ">ORDERS DETAILS</font></h3>
            <div class="table-responsive-md">
                <table id="example2" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center" width="2%"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">NO.</font></th> 
                            <th class="text-center" width="10%"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">Image</font></th>
                            <th class="text-center" width="15%"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">Name</font></th>
                            <th class="text-center" width="4%"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">Price</font></th>
                            <th class="text-center" width="4%"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">Unit</font></th>
                            <th class="text-center" width="4%"><font size="4" color="#ffffff"  style="font-family:  sans-serif; ">Unit/Price</font></th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                   include_once("config/connectdb.php");//ConnectDB

                   $historyorder= "SELECT * FROM orders_run AS t1 INNER JOIN orders AS t2 ON (t1.ordersid_run = t2.order_namber) INNER JOIN product AS t3 ON (t2.product = t3.p_id) WHERE t1.ordersid_run ='".$_GET['id']."'";
                   $resulthistory = mysqli_query($conn,$historyorder);
                   $num=1;
                  
                   
                   while ($historyorder = mysqli_fetch_array($resulthistory)) {
                    $qty = $historyorder['unit'] * $historyorder['unit_price'];
					$sum += $qty;
                ?>
                            <tr>
                                <td class="text-center"><font size="4" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo $num; ?></font></td>
                                <td class="text-center"><font size="4" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo "<img src='photo/$historyorder[p_image]' height='70rem' width='90rem' />";?></font></td>
                                <td class="text-center"><font size="4" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo $historyorder['p_name']; ?></font></td> 
                                <td class="text-center"><font size="4" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo number_format($historyorder['unit_price'],2); ?></font></td>
                                <td class="text-center"><font size="4" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo $historyorder['unit']; ?></font></td> 
                                <td class="text-center"><font size="4" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo number_format($historyorder['total_price'],2); ?></font></td>
                            </tr>
                            
                            <?php        
                          $num++;    } 
                            ?>
                                <tr>
                                <th colspan='5' class="text-right"><font size="4" color="#FDFEFE"  style="font-family:  sans-serif; ">Total Parice :</font></td>
                                <th colspan='6' class="text-center"><font size="4" color="#FDFEFE"  style="font-family:  sans-serif; "><?php echo number_format($sum,2) ; ?></font></td>
                                </tr>  
                                <?php        
                         mysqli_close($conn);
                            ?>                     
                        </tbody>      
                        </table>
                        <center>   <a href="history.php" class="btn btn-danger" ><b>&nbsp;&nbsp;BACK&nbsp;&nbsp;</b></a></center>          
                    </div>
                                    </div>
                                </div>
</div>

