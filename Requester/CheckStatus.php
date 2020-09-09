<?php 
define('TITLE', 'Status');
define('PAGE', 'CheckStatus');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
?>

<!-- Start 2nd Column  -->
<div class="col-sm-6 mt-5 mx-3">
 <form action="" method="post" class="form-inline">
  <div class="form-group mr-3">
   <label for="checkid">Enter Request ID: </label>
   <input type="text" class="form-control" name="checkid" id="checkid" onkeypress="isInputNumber(event)">
  </div>
  <button type="submit" class="btn btn-info">Search</button>
 </form>
 <?php 
  if(isset($_REQUEST['checkid'])){
   if($_REQUEST['checkid'] == ""){
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
   } else {
    $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(($row['request_id'] == $_REQUEST['checkid'])){ ?>
    <h3 class="text-center mt-5">Assigned Insurance  Details</h3>
    <table class="table table-bordered">
     <tbody>
      <tr>
       <td>Request ID</td>
       <td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
      </tr>
      <tr>
       <td>First Name</td>
       <td>
         <?php if(isset($row['requester_name'])) {echo $row['requester_name']; } ?>
       </td>
      </tr>
      <tr>
          <td>Last Name</td>
          <td>
              <?php if(isset($row['requester_lastname'])) {echo $row['requester_lastname']; } ?>
          </td>
      </tr>
      <tr>
          <td>Date of Birth</td>
          <td>
              <?php if(isset($row['request_datebirth'])) {echo $row['request_datebirth']; } ?>
          </td>
      </tr>
      <tr>
          <td>IIN</td>
          <td>
              <?php if(isset($row['requester_number'])) {echo $row['requester_number']; } ?>
          </td>
      </tr>
      <tr>
       <td>Address Line 1</td>
       <td>
         <?php if(isset($row['requester_add1'])) {echo $row['requester_add1']; } ?>
       </td>
      </tr>
      <tr>
       <td>Address Line 2</td>
       <td>
         <?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; } ?>
       </td>
      </tr>
      <tr>
       <td>City</td>
       <td>
         <?php if(isset($row['requester_city'])) {echo $row['requester_city']; } ?>
       </td>
      </tr>
      <tr>
       <td>Post Code</td>
       <td>
         <?php if(isset($row['requester_zip'])) {echo $row['requester_zip']; } ?>
       </td>
      </tr>
      <tr>
       <td>Email</td>
       <td>
         <?php if(isset($row['requester_email'])) {echo $row['requester_email']; } ?>
       </td>
      </tr>
      <tr>
       <td>Mobile</td>
       <td>
         <?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; } ?>
       </td>
      </tr>
      <tr>
          <td>Document Type</td>
          <td>
              <?php if(isset($row['request_doctype'])) {echo $row['request_doctype']; } ?>
          </td>
      </tr>
      <tr>
          <td>Date Issue</td>
          <td>
              <?php if(isset($row['request_dateissue'])) {echo $row['request_dateissue']; } ?>
          </td>
      </tr>
      <tr>
          <td>Date To</td>
          <td>
              <?php if(isset($row['request_dateto'])) {echo $row['request_dateto']; } ?>
          </td>
      </tr>
      <tr>
          <td>Issued By</td>
          <td>
              <?php if(isset($row['request_issuedby'])) {echo $row['request_issuedby']; } ?>
          </td>
      </tr>
      <tr>
          <td>Document Number</td>
          <td>
              <?php if(isset($row['request_docnumber'])) {echo $row['request_docnumber']; } ?>
          </td>
      </tr>
      <tr>
          <td>Trip Start Date</td>
          <td>
              <?php if(isset($row['request_startdate'])) {echo $row['request_startdate']; } ?>
          </td>
      </tr>
      <tr>
          <td>Trip End Date</td>
          <td>
              <?php if(isset($row['request_enddate'])) {echo $row['request_enddate']; } ?>
          </td>
      </tr>
      <tr>
          <td>Country of Trip</td>
          <td>
              <?php if(isset($row['requester_state'])) {echo $row['requester_state']; } ?>
          </td>
      </tr>
      <tr>
          <td>Description of Trip</td>
          <td><?php if(isset($row['request_desc'])){echo $row['request_desc'];} ?></td>
      </tr>
      <tr>
       <td>Assigned Date</td>
       <td>
         <?php if(isset($row['assign_date'])) {echo $row['assign_date']; } ?>
       </td>
      </tr>
      <tr>
       <td>Insurance Agent Name</td>
       <td><?php if(isset($row['assign_tech'])) {echo $row['assign_tech']; } ?></td>
      </tr>
      <tr>
       <td>Customer Sign</td>
       <td></td>
      </tr>
      <tr>
       <td>Insurance Agent Sign</td>
       <td></td>
      </tr>
     </tbody>
    </table>
    <div class="text-center">
     <form action="" class="mb-3 d-print-none">
      <input class="btn btn-info" type="submit" value="Print" onClick="window.print()">
      <input class="btn btn-secondary" type="submit" value="Close">
     </form>
    </div>
    <?php } else {
     echo '<div class="alert alert-info mt-4">Your Request is Still Pending</div>';
    }
   }
 }?>
 <?php if(isset($msg)){echo $msg;} ?>
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