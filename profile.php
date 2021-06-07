<?php
session_start();
@error_reporting (E_ALL ^ E_NOTICE);
require_once 'config/check.php';
require_once 'config/connectdb.php';
?>
<!-- Required meta tags -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Itim|Kanit|Mitr|Prompt&display=swap" rel="stylesheet">
    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
input[type=submitpro] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submitpro]:hover {
  background-color: #45a049;
}

form.form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 8px;
  border-color: red ;
}
h5.pos_right {
  position: absolute;
  left: 700px;
  top: 70px;
}.form-control-plaintext1 {
    display: block;
    width: 40%;
    padding-top: 0.375rem;
    padding-bottom: 0.375rem;
    margin-bottom: 0;
    line-height: 1.5;
    color: #ff5722;
    background-color: transparent;
    border: solid transparent;
    border-width: 1px 0;
    font-weight: bold;
    font-size: 15px;
}
.row1 {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -25px;
    margin-left: 100px;
}
.container1 {
    width: 50%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
</style>
<style>p.indent1{ padding-left: 10.5em }</style>
<!-- Navbar -->
<?php require_once 'navbar.php'; ?>
<div class="container" style="width:50%">      
        <div class="card bg-light border-light shadow-lg mt-5" style="100%">
            <div class="card-body">
            <center><h3 class="my-3"><font size="8" color="#ffffff" style="font-family: 'Mitr', sans-serif; ">PROFILE</font></h3>
           <hr> 
           <h5><font color="#FFFFFF" style="font-family: 'Itim', sans-serif; ">ยินดีต้อนรับคุณ </font><span class="badge badge-warning"><font color="#FFFFFF" style="font-family: sans-serif; "><?php echo $objResult['name']; ?></span>  </font>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
           <font color="#FFFFFF" style="font-family: 'Itim', sans-serif; ">เงินคงเหลือ </font><span class="badge badge-success"><?php echo number_format($objResult['point'],2); ?></span> <font color="#FFFFFF" style="font-family: 'Itim', sans-serif; "> บาท</font></h5>
           </center>
                      <form class="form" method="post" action="" enctype="multipart/form-data"> 
                      <div class="table-responsive">
              <table class="table table-borderless" width="50%" cellspacing="0">
                 <!-- Form Update -->
                <tbody> 
                  <tr>
                    <td width="35%" align="right"> <!-- Text input--> <label for="id"><font color="#212529"><b>Username:</b></font></label></td>
                    <td width="65%" ><input class="form-control col-8" id="pid" name="pid" type="text" placeholder="" required value="<?php echo $objResult['username']; ?>" readonly></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right">  <!-- Text input--> <label for="password"><font color="#212529"><b>Password:</b></font></label>  </td>
                    <td width="65%" >
                    <form  method="POST" action="profile.php?u_id=<?=$objResult['u_id'];?>" id="updatepassword" name="updatepassword" >
                    <input id="name" class="form-control-sm col-8" name="updatepassword" type="text"  value="">&nbsp;
                    <button class="btn btn-danger btn-sm " type="submit" name="submitpassword"><b><i class="fas fa-sync-alt fa-fw"></i> Update<b></button> 
                    </form>
                  </tr>
                  <tr>
                    <td width="35%" align="right"> <!-- Text input--> <label for="p_name"><font color="#212529"><b>Name: </b></font></label></td>
                    <td width="65%" ><input class="form-control col-8" id="p_name" name="p_name" type="text" placeholder="" required value="<?php echo $objResult['name']; ?>"></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"> <!-- Text input--> <label for="p_email"><font color="#212529"><b>E-mail:</b></font></label></td>
                    <td width="65%" ><input class="form-control col-8" id="p_email" name="p_email" type="text" placeholder=""  value="<?php echo $objResult['email']; ?>"></td>
                  </tr>
                  <tr>
                    <td width="35%" align="right"> <!-- Text input--> <label for="p_link"><font color="#212529"><b>Steam Link:</b></font></label></td>
                    <td width="65%" ><input class="form-control col-8" id="p_link" name="p_link" type="text" placeholder="" required value="<?php echo $objResult['link']; ?>"></td>
                  </tr>
                  <tr>
                  <td></td>
                    <td align="left"><button id="Submit" name="submit" class="btn btn-primary btn-sm"><b><i class="fas fa-save fa-fw"></i> SAVE &nbsp;</b></button></td>
                  </tr>
                </tbody>          
               </table>
                 </div>   
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php //UpDate User 
      if(isset($_POST['submit'])){ 

       $name = $_POST['p_name'];
       $name = stripslashes($_REQUEST['p_name']);
       $name = mysqli_real_escape_string($conn, $name);
     
       $email = $_POST['p_email'];
       $email = mysqli_real_escape_string($conn, $email);

       $steam = $_POST['p_link'];
       $steam = mysqli_real_escape_string($conn, $steam);
      
        $updateuser = " UPDATE users SET name = '$name', email = '$email', link = '$steam' WHERE u_id = '$objResult[u_id]'";
        $$update_user= mysqli_query($conn,$updateuser)or die("Update Username Failed". mysqli_error());
        mysqli_close($conn);
        echo '<script language="JavaScript">
        swal({
          title: "Success!",
          text: "Update Completed",
          button: "OK",
          icon: "success",
          });
              </script>';
              echo '<meta http-equiv="refresh" content="2; url=profile.php" />';
      } 
      ?>
    <?php //UpDate Password
    $errors = array();
      if(isset($_POST['submitpassword'])){ 

      $password = $_POST['updatepassword'];
      $password = mysqli_real_escape_string($conn, $_POST['updatepassword']);
      $passwords = md5($password);

        if(empty($password)) { 
           echo '<script language="JavaScript">
          swal({
            title: "Error!",
            text: "Password is required",
            button: "OK",
            icon: "error",
            });
                </script>';
                exit;
        }
          $updatpassword = " UPDATE users SET password = '$passwords' WHERE u_id = '$objResult[u_id]'";
          $$update_password= mysqli_query($conn,$updatpassword)or die("Update Password Failed". mysqli_error());
          mysqli_close($conn);
          echo '<script language="JavaScript">
          swal({
            title: "Success!",
            text: "Update Password Completed",
            button: "OK",
            icon: "success",
            });
                </script>';
                echo '<meta http-equiv="refresh" content="2; url=profile.php" />';     
      }  exit;
      ?>
