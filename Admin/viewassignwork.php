<?php
define('TITLE', 'Work Order');
define('PAGE', 'work');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
?>

<div class="col-sm-6 mt-5 mx-3">
 <h3 class="text-center">Assigned Insurance  Details</h3>
 <?php
  if(isset($_REQUEST['view'])){
   $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc(); ?>
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
     <form action="" class="mb-3 d-print-none d-inline">
      <input class="btn btn-info" type="submit" value="Print" onClick="window.print()"> </form>
      <form action="work.php" class="mb-3 d-print-none d-inline"><input class="btn btn-secondary" type="submit" value="Close">
     </form>
    </div>
 <?php }?>
</div>


<?php include('includes/footer.php')?>