<?php
define('TITLE', 'Change Password');
define('PAGE', 'changepass');
include('includes/header.php');
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 $aEmail = $_SESSION['aEmail'];
if(isset($_REQUEST['passupdate'])) {
    if (($_REQUEST['aPassword'] == "") || ($_REQUEST['oldPassword'] == "")) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $check = "SELECT * FROM adminlogin_tb WHERE a_password = {$_REQUEST['oldPassword']}";
        $result = $conn->query($check);
        $row = $result->fetch_assoc();
        if (($row['a_password'] == $_REQUEST['oldPassword'])) {
            $aPass = $_REQUEST['aPassword'];
            $sql = "UPDATE adminlogin_tb SET a_password = '$aPass' WHERE a_email = '$aEmail'";
            if ($conn->query($sql) == TRUE) {
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
            } else {
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
            }
        }
        else $passmsg =  '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Wrong Old Password! </div>';
    }
}

?>
<div class="col-sm-9 col-md-10">
 <form class="mt-5 mx-5" action="" method="POST">
  <div class="form-group">
   <label for="inputEmail">Email</label>
   <input type="email" class="form-control" id="inputEmail" value="<?php echo $aEmail; ?>" readonly>
  </div>
   <div class="form-group">
       <label for="inputoldpassword">Old Password</label>
       <input type="password" class="form-control" id="inputoldpassword" placeholder="Old Password" name="oldPassword">
   </div>
  <div class="form-group">
   <label for="inputnewpassword">New Password</label>
   <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="aPassword">
  </div>
  <button type="submit" class="btn btn-info mr-4 mt-4" name="passupdate">Update</button>
  <button type="reset" class="btn btn-secondary mt-4">Reset</button>
  <?php if(isset($passmsg)){echo $passmsg;} ?>
 </form>
</div>

<?php include('includes/footer.php')?>