<?php //Up Delete
  require_once '../config/connectdb.php';
  
        if(isset($_GET['rp_id'])){
        $delrp= "delete from rateprice where rp_id='".$_GET['rp_id']."'";
        $del_rateprice = mysqli_query($conn,$delrp)or die("Delete Rateprice Failed". mysqli_error());
        
        echo '<script language="JavaScript">
        swal({
          title: "Success!",
          text: "",
          button: "OK",
          icon: "success",
          });
              </script>';
              echo '<meta http-equiv="refresh" content="3"; url=rateprice.php" />';
        mysqli_close($conn);
      
      }  
    ?>