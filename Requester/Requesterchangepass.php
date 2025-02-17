<?php 
define('TITLE', 'Change Password');
define('PAGE', 'Requesterchangepass');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'</script>";
}
$rEmail = $_SESSION['rEmail'];
if(isset($_REQUEST['passupdate'])) {
    if (($_REQUEST['rPassword'] == "")||($_REQUEST['oldPassword'] =="")) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $check = "SELECT * FROM requesterlogin_tb WHERE r_password = {$_REQUEST['oldPassword']}";
        $result2 = $conn->query($check);
        $row = $result2->fetch_assoc();
        if (($row['r_password'] == $_REQUEST['oldPassword'])) {
            $rPass = $_REQUEST['rPassword'];
            $sql = "UPDATE requesterlogin_tb SET r_password = '$rPass' WHERE r_email = '$rEmail'";
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
   <input type="email" class="form-control" id="inputEmail" value="<?php echo $rEmail; ?>" readonly>
  </div>
  <div class="form-group">
      <label for="inputoldpassword">Old Password</label>
      <input type="password" class="form-control" id="inputoldpassword" placeholder="Old Password" name="oldPassword">
  </div>
  <div class="form-group">
   <label for="inputnewpassword">New Password</label>
   <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="rPassword">
  </div>
  <button type="submit" class="btn btn-info mr-4 mt-4" name="passupdate">Update</button>
  <button type="reset" class="btn btn-secondary mt-4">Reset</button>
  <?php if(isset($passmsg)){echo $passmsg;} ?>
 </form>
</div>

<?php 
include('includes/footer.php');
?>