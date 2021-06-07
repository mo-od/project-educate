
  <?php  
  error_reporting( error_reporting() & ~E_NOTICE );
  require('../config/connectdb.php');

 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $p_name = mysqli_real_escape_string($conn, $_POST["name"]);  
      $p_description = mysqli_real_escape_string($conn, $_POST["address"]);  
      $p_price = mysqli_real_escape_string($conn, $_POST["gender"]);  
      $p_type = mysqli_real_escape_string($conn, $_POST["designation"]);  
      $p_rarity = mysqli_real_escape_string($conn, $_POST["age"]);  
      if($_POST["p_id"] != '')  
      {  
           $query = "  
           UPDATE product   
           SET name='$p_name',   
           address='$p_description',   
           gender='$p_price',   
           designation = '$p_type',   
           age = '$p_rarity'   
           WHERE p_id='".$_POST["p_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO product( p_id,p_name,p_description,p_image,p_price,p_type,p_rarity,p_amount)  
           VALUES('','$p_name', '$p_description','', '$p_price', '$p_type', '$p_rarity','');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($conn, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM product ORDER BY p_id ASC";  
           $result = mysqli_query($conn, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                                    <th width="2%">NO.</th>  
                                    <th width="3%">Product ID</th>
                                    <th width="27%">Image</th>  
                                    <th width="26%">Name</th> 
                                    <th width="6%">Unit</th>  
                                    <th width="6%">Price</th>     
                                    <th width="15%">Edit</th>  
                                    <th width="15%">View</th>  
                     </tr>  
           ';  
           $num=1;
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr> 
                     <td>' . $num . '</td>  
                     <td>' . $row["p_id"] . '</td>  
                     <td>' . $row["p_image"] . '</td>  
                     <td>' . $row["p_name"] . '</td>  
                     <td>' . $row["p_amount"] . '</td>  
                     <td>' . $row["p_price"] . '</td>  
                     <td><input type="button" name="edit" value="Edit" id="'.$row["p_id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                     <td><input type="button" name="view" value="view" id="' . $row["p_id"] . '" class="btn btn-info btn-xs view_data" /></td> 
                     </tr>  
                ';  
            $num++;}  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>