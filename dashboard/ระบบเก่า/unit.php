<script language="javascript">
function closewin() {
	window.opener.location.reload();
	self.close();
}
$close = closewin();
</script>
<? 
require_once '../config/connectdb.php';
$unit = $_POST['unit'];
$p_id = $_GET['p_id'];

if(isset($_GET['p_id'])){
	$sql11 = "UPDATE `product` SET `p_amount` = $unit WHERE `p_id`= '$_GET[p_id]'";
	mysqli_query($conn,$sql11) or die (mysqli_error($conn));
	echo "<center>แก้ไขข้อมูลแล้ว</center>";
	echo' <script type="text/javascript">window.location="index.php";
	</script>';
	echo @$close;
	
	}
	mysqli_close($conn);
?>