<?php
define('TITLE', 'Update Policy');
define('PAGE', 'policies');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['pupdate'])){
  if(($_REQUEST['pname'] == "") || ($_REQUEST['pava'] == "")  || ($_REQUEST['psellingcost'] == "")){
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
   } else {
    $pid = $_REQUEST['pid'];
    $pname = $_REQUEST['pname'];
    $pava = $_REQUEST['pava'];
    $psellingcost = $_REQUEST['psellingcost'];
    $sql = "UPDATE policies_tb SET pname = '$pname',pava = '$pava', psellingcost = '$psellingcost' WHERE pid = '$pid'";
     if($conn->query($sql) == TRUE){
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
     } else {
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
     }
   }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
  <h3 class="text-center">Update Policy Details</h3>
  <?php 
   if(isset($_REQUEST['edit'])){
   $sql = "SELECT * FROM policies_tb WHERE pid = {$_REQUEST['id']}";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   }
  ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="pid">Policy ID</label>
      <input type="text" class="form-control" id="pid" name="pid" value="<?php if(isset($row['pid'])) {echo $row['pid']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="pname">Insurance Policy Name</label>
      <input type="text" class="form-control" id="pname" name="pname" value="<?php if(isset($row['pname'])) {echo $row['pname']; }?>">
    </div>

    <div class="form-group">
      <label for="pava">Available</label>
      <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)" value="<?php if(isset($row['pava'])) {echo $row['pava']; }?>">
    </div>

    <div class="form-group">
      <label for="psellingcost">Selling Cost Each</label>
      <input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)" value="<?php if(isset($row['psellingcost'])) {echo $row['psellingcost']; }?>">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-info" id="pupdate" name="pupdate">Update</button>
      <a href="policies.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>

<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>

<?php
include('includes/footer.php'); 
?>