<?php
	require_once 'config/check.php';
    error_reporting( error_reporting() & ~E_NOTICE );
	session_start(); 
	$p_id = $_REQUEST['p_id']; 
	$act = $_REQUEST['act'];
	if($act=='add' && !empty($p_id))
	{
		if(!isset($_SESSION['shopping_cart']))
		{	 
			$_SESSION['shopping_cart']=array();
		}else{
		 
		}
		if(isset($_SESSION['shopping_cart'][$p_id]))
		{
			$_SESSION['shopping_cart'][$p_id]++;
		}
		else
		{
			$_SESSION['shopping_cart'][$p_id]=1;
		}
	}
	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['shopping_cart'][$p_id]);
	}
 
	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['shopping_cart'][$p_id]=$amount;
		}
	}
	//ยกเลิกสินค้าทั้งตะกร้า
	if($act=='Cancel-Cart'){
		unset($_SESSION['shopping_cart']);	
	}
	?>
<!-- Required meta tags -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Itim|Kanit|Mitr|Prompt&display=swap" rel="stylesheet">
<!-- sweetalert2 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<title>Cart</title>

<style>
table.a {
    max-width: 50rem;
    margin-bottom: 1rem;
	color: #888;
}
</style>
<!-- เรียกใช้Navnbar -->
<?php require_once 'navbar.php'; ?>

<div class="table-responsive">     
      <form id="frmcart" name="frmcart" method="post" action="?act=update"> 
        <table  border="0" align="center" class="my-5 table table-hover a">
        <tr>
          <td  colspan="6" align="center" bgcolor="#E74C3C"><font size="4px" color="#ffffff" style="font-family: 'Kanit', sans-serif;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MY CART</b></span></font></td>
		  <td bgcolor="#E74C3C" align="right"> <a href="store.php" class="btn btn-success btn-sm "><b><font color="#00000"><i class="fas fa-store"></i>&nbsp;Store</font></b></a></td>
        </tr>
        <tr>
          <td align="center" class="table-secondary"><font size="3px" color="#ffffff" style="font-family: 'Kanit', sans-serif;">&nbsp;No.</font></td>
          <td align="center" class="table-secondary"><font size="3px" color="#ffffff" style="font-family: 'Kanit', sans-serif;">Image</font></td>
          <td align="center" class="table-secondary"><font size="3px" color="#ffffff" style="font-family: 'Kanit', sans-serif;">Name</font></td>
          <td align="center" class="table-secondary"><font size="3px" color="#ffffff" style="font-family: 'Kanit', sans-serif;">Price</font></td>
          <td align="center" class="table-secondary"><font size="3px" color="#ffffff" style="font-family: 'Kanit', sans-serif;">Unit</font></td>
          <td align="center" class="table-secondary"><font size="3px" color="#ffffff" style="font-family: 'Kanit', sans-serif;">Unit/Price</font></td>
          <td align="center" class="table-secondary"><font size="3px" color="#ffffff" style="font-family: 'Kanit', sans-serif;">Remove</font></td>
        </tr>
        <?php
	if(!empty($_SESSION['shopping_cart']))
	{
	require_once('config/connectdb.php');
		foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
		{
		$sql = "select * from product where p_id=$p_id";
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($query))
		{
		$sum = $row['p_price'] * $p_qty;
		$total += $sum;
		echo "<tr  >";
		echo "<td class='table-secondary' width='2%' align='center'><font size='3px' color='#ffffff' style='font-family: 'Kanit', sans-serif;'>";
        echo $i += 1;
		echo "</font></td>";
		echo "<td class='table-secondary' width='10%' align='center'>"."<img src='photo/$row[p_image]' height='55rem' width='75rem' />"."</td>";
		echo "<td class='table-secondary' width='15%' align='center' ><font size='3px' color='#ffffff' style='font-family: 'Kanit', sans-serif;'>"." " . $row["p_name"] . "</font></td>";
		echo "<td class='table-secondary' width='10%' align='center'><font size='3px' color='#ffffff' style='font-family: 'Kanit', sans-serif;'>" . number_format($row["p_price"],2) . "</font></td>";
		
		echo "<td class='table-secondary' width='8%' align='center'><font size='3px' color='#ffffff' style='font-family: 'Kanit', sans-serif;'>";  
		echo "<input type='text' name='amount[$p_id]' value='$p_qty' size='1'/></font></td>";
		
		echo "<td class='table-secondary' width='7%' align='right'><font size='3px' color='#ffffff' style='font-family: 'Kanit', sans-serif;'>" .number_format($sum,2)."</font></td>";
		echo "<td class='table-secondary' width='4%' align='center'><a href='cart.php?p_id=$p_id&act=remove' class='btnRemoveAction'><img src='img/remove.png' alt='Remove Item'/></a></td>";
		echo "</tr>";
		}
	}
		echo "<tr>";
		echo "<td colspan='2'align='left' class='table-secondary'><a href='cart.php?act=Cancel-Cart'><img src='img/cancelcart.png' alt='Cancel Cart'/></a></td>";
		echo "<td colspan='3' class='table-secondary' align='right'><font size='3px' color='#ffffff' style='font-family: 'Kanit', sans-serif;'><b>Total </b></font></td>";
		echo "<td align='right' class='table-secondary'><font size='3px' color='#ffffff ' style='font-family: 'Kanit', sans-serif;'>";
		echo "<b>";
		echo  number_format($total,2);
		echo "</b>";
		echo "</font></td>";
		echo "<td align='left' class='table-secondary'><button type='submit' name='button' id='button' class='btn btn-primary btn-sm'><font color='#00000'><b> Update</b> </font></button> </td>";
		echo "</tr>";
		echo "<tr>";
        echo "<td></td>";
        echo "<td colspan='7' align='right'>";
        echo "<button type='submit' name='submit1'  class='btn btn-danger btn-sm '><span class='fas fa-cart-plus'></span><b> Buy </b></button>";
        echo "</td>";
        echo "</tr>";
		
	}
	 ?>
        
      </form>
	  </div>
	<?php
		if(isset($_POST['submit1'])){ 
			$query_Check = "SELECT p_amount from  product where p_id=$p_id limit 1 "; //Check Unit Product
			$objQuery1 = mysqli_query($conn,$query_Check );
			$objResult1 = mysqli_fetch_array($objQuery1);

			if($objResult1['p_amount'] < $p_qty){

				echo '<script language="JavaScript">
				swal("The amount of products is over the remaining balances !", " ", "error");
					</script>';
				echo '<meta http-equiv="refresh" content="2;  url=cart.php" />';
				exit;
			}else
				if($objResult['point'] < @$total){
					echo '<script language="JavaScript">
					swal({
						title: "Not Enough Balance!",
						text: "Please TopUp 💸",
						button: "OK",
						icon: "error",
					  });
											</script>';
					echo '<meta http-equiv="refresh" content="2;   url=topup.php" />';
					exit;
				} else
				
					   $u_id = $objResult['u_id'];	
						$date = date('Y-m-d H:i:s'); //Format Date 1999-01-22 Time 17:16:18
						$status = 1; //Set status Default = 1 

						//Insert Orders_run
						$orders_run_query = "INSERT INTO orders_run (ordersid_run,u_id,ordersdate_run,status)
						VALUES ('','$u_id','$date','$status')";
						$orders_run_query1 = mysqli_query($conn,$orders_run_query)or die("Insert Orders Failed". mysqli_error());

					if(isset($_SESSION["shopping_cart"])){
					foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
						{	
							$sql33	= "SELECT * FROM product where p_id=$p_id";
							$query33 = mysqli_query($conn, $sql33);
							$row3 = mysqli_fetch_array($query33);
							$total=$row3['p_price']*$p_qty;
							
							// Run OrderNamber 			
							$sql2 = "SELECT MAX(ordersid_run) AS ordersid_run FROM orders_run WHERE u_id='$u_id'";
							$query2	= mysqli_query($conn, $sql2);
							$row = mysqli_fetch_array($query2);
							$ordersid_run = $row['ordersid_run'];
							$order_namber = $ordersid_run; // Run OrderNamber = Order NO.>>>	

							$u_id = $objResult['u_id'];
							$product = $p_id; //Product ID
							$unit = $p_qty; //Quantity Product/Unit
							$unit_price = $row3['p_price']; // Unit/Price
							$total_price = $total; //Total Price
							$date = date('Y-m-d H:i:s'); //Format Date 1999-01-22 Time 17:16:18
							
							$unitremove = $p_qty;
							//Insert Order 
							$order_query = "INSERT INTO orders (orders_id,order_namber,u_id,product,unit,unit_price,total_price,date)
							VALUES ('','$order_namber','$u_id','$product','$unit','$unit_price','$total_price','$date')";
							$queryorder = mysqli_query($conn,$order_query)or die("Insert Orders Failed". mysqli_error());
							//Remove Unit Product
							$unit_remove = "UPDATE product SET p_amount = p_amount - '$unitremove' WHERE p_id = '$product'";
							$queryremove = mysqli_query($conn,$unit_remove)or die("Update Product Failed". mysqli_error());
							//Update Point User
							$point_remove = "UPDATE users SET point = point - '$total' WHERE u_id = '$u_id'";
							$querypoint = mysqli_query($conn,$point_remove)or die("Update Users Failed". mysqli_error());
						}
								}														
						mysqli_close($conn);
						if($queryorder){
							unset($_SESSION['shopping_cart']);	
							echo '<script language="JavaScript">
							swal({
								title: "Success Complete !",
								text: "Order NO.'.$order_namber.'✈️",
								icon: "success",
								button: "OK",
							  });
											</script>';
							echo '<meta http-equiv="refresh" content="3; url=history.php" />';
						
			}	function sendToLine($message){  //LINE NOTIFY ORDERS
							$line_api = 'https://notify-api.line.me/api/notify';
							$line_token = 'SnaGbqigHHD3UKVOB5owk6cZzOqaZq40eXZK5VhIarI'; //sEfBXCvdBlv4X2tTxrx1irz4pNAeQQBwwozJGwN4d0g ตัวต่อตัว
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL,"https://notify-api.line.me/api/notify");
							curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
							curl_setopt($ch, CURLOPT_POST, 1);
							curl_setopt($ch, CURLOPT_POSTFIELDS, 'message='.$message);
							// follow redirects
							curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
							curl_setopt($ch, CURLOPT_HTTPHEADER, [
								'Content-type: application/x-www-form-urlencoded',
								'Authorization: Bearer '.$line_token,
							]);
							// receive server response ...
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							$server_output = curl_exec ($ch);
							curl_close ($ch);
					}	
					sendToLine ('Order NO. '.$order_namber.' 💾 ');		
		}exit;
	?>

