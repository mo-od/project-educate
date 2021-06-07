 
  <?php  
 //fetch.php  
 require('../config/connectdb.php');
 if(isset($_POST["p_id"]))  
 {  
      $query = "SELECT * FROM product WHERE p_id = '".$_POST["p_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>