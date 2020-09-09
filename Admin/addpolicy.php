<?php
define('TITLE', 'Add New Policy');
define('PAGE', 'policies');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['psubmit'])){
 if(($_REQUEST['pname'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['psellingcost'] == "")){
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
  $pname = $_REQUEST['pname'];
  $pava = $_REQUEST['pava'];
  $psellingcost = $_REQUEST['psellingcost'];
  $sql = "INSERT INTO policies_tb (pname,pava,psellingcost) VALUES ('$pname', '$pava', '$psellingcost')";
  if($conn->query($sql) == TRUE){
   $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
  } else {
   $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
  }
 }
}
?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
  <h3 class="text-center">Add New Policy</h3>
  <form action="" method="POST">
    <div class="form-group">
      <label for="pname">Insurance Policy Name</label>
      <input type="text" class="form-control" id="pname" name="pname">
    </div>
    <div class="form-group">
      <label for="pava">Available</label>
      <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="psellingcost">Selling Cost Each</label>
      <input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-info" id="psubmit" name="psubmit">Submit</button>
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