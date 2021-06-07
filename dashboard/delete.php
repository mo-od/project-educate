<!-- sweetalert2 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <?php //Delete
   require_once '../config/connectdb.php';
        if(isset($_GET['id'])){
        $delproduct = "delete from product where p_id='".$_GET['id']."'";
        $del_product = mysqli_query($conn,$delproduct)or die("Delete Productcsgo Failed". mysqli_error());
        mysqli_close($conn);
        echo '<script language="JavaScript">
        swal({
          title: "Success!",
          text: "",
          button: "OK",
          icon: "success",
          });
              </script>';
   echo '<meta http-equiv="refresh" content="1"; url=productcsgo.php" />';
       exit;
      }  
    ?>
