<?php 
if(session_id() == ''){
 session_start();
}
if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
 }
 if(isset($_REQUEST['close'])){
  $sql = "DELETE FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
  if($conn->query($sql) == TRUE){
   echo '<meta http-equiv="refresh" content= "0;URL=?closed" />';
  } else {
   echo "Unable to Delete";
  }
 }
 if(isset($_REQUEST['assign'])){
  if(($_REQUEST['request_id'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['requesterlastname'] == "") ||
      ($_REQUEST['requestdateofbirth'] == "") ||($_REQUEST['requesternumber'] == "") || ($_REQUEST['requesteradd1'] == "") ||
      ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") ||
      ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") ||
      ($_REQUEST['requestdoctype'] == "") || ($_REQUEST['requestdateissue'] == "") || ($_REQUEST['requestdateto'] == "") ||
      ($_REQUEST['requestissuedby'] == "") || ($_REQUEST['requestdocnumber'] == "") || ($_REQUEST['requeststartdate'] == "") ||
      ($_REQUEST['requestenddate'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requestdesc'] == "") ||
      ($_REQUEST['assigntech'] == "") || ($_REQUEST['inputdate'] == "")){
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fileds</div>';
  } else {
   $rid = $_REQUEST['request_id'];
   $rname = $_REQUEST['requestername'];
   $rlname = $_REQUEST['requesterlastname'];
   $rdateofb = $_REQUEST['requestdateofbirth'];
   $rnum = $_REQUEST['requesternumber'];
   $radd1 = $_REQUEST['requesteradd1'];
   $radd2 = $_REQUEST['requesteradd2'];
   $rcity = $_REQUEST['requestercity'];
   $rzip = $_REQUEST['requesterzip'];
   $remail = $_REQUEST['requesteremail'];
   $rmobile = $_REQUEST['requestermobile'];
   $rdoctype = $_REQUEST['requestdoctype'];
   $rdateissue = $_REQUEST['requestdateissue'];
   $rdateto = $_REQUEST['requestdateto'];
   $rissuedby = $_REQUEST['requestissuedby'];
   $rdocnum = $_REQUEST['requestdocnumber'];
   $rstartdate = $_REQUEST['requeststartdate'];
   $renddate = $_REQUEST['requestenddate'];
   $rstate = $_REQUEST['requesterstate'];
   $rdesc = $_REQUEST['requestdesc'];
   $rassigntech = $_REQUEST['assigntech'];
   $rdate = $_REQUEST['inputdate'];

   $sql = "INSERT INTO assignwork_tb (request_id, requester_name, requester_lastname, request_datebirth, requester_number, requester_add1, requester_add2, requester_city, requester_zip, requester_email, requester_mobile, request_doctype, request_dateissue, request_dateto, request_issuedby, request_docnumber, request_startdate, request_enddate, requester_state, request_desc, assign_tech, assign_date) VALUES ('$rid',  '$rname','$rlname', '$rdateofb', '$rnum','$radd1', '$radd2', '$rcity', '$rzip', '$remail', '$rmobile', '$rdoctype','$rdateissue', '$rdateto', '$rissuedby','$rdocnum','$rstartdate', '$renddate', '$rstate', '$rdesc','$rassigntech', '$rdate')";
   if($conn->query($sql) == TRUE){
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Work Assigned Successfully</div>';
   } else {
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Assign Work</div>';
   }
  }
 }
 ?>

<div class="col-sm-5 mt-5 jumbotron"> 
 <form action="" method="POST">
   <h5 class="text-center">Assign Insurance Order Request</h5>
   <div class="form-group">
     <label for="request_id">Request ID</label>
     <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($row['request_id']))echo $row['request_id']; ?>" readonly>
   </div>
     <div class="form-row">
         <div class="form-group col-md-6">
             <label for="requestername">FirstName</label>
             <input type="text" class="form-control" id="requestername" name="requestername" value="<?php if(isset($row['requester_name']))echo $row['requester_name']; ?>">
         </div>
         <div class="form-group col-md-6">
             <label for="requesterlastname">LastName</label>
             <input type="text" class="form-control" id="requesterlastname" name="requesterlastname" value="<?php if(isset($row['requester_lastname']))echo $row['requester_lastname']; ?>">
         </div>
     </div>
     <div class="form-row">
         <div class="form-group col-md-6">
             <label for="requestdateofbirth">Date of Birth</label>
             <input type="date" class="form-control" id="requestdateofbirth" name="requestdateofbirth" value="<?php if(isset($row['request_datebirth']))echo $row['request_datebirth']; ?>">
         </div>
         <div class="form-group col-md-6">
             <label for="requesternumber">Individual identification number</label>
             <input type="text" class="form-control" id="requesternumber" name="requesternumber" value="<?php if(isset($row['requester_number']))echo $row['requester_number']; ?>"  onkeypress="isInputNumber(event)">
         </div>
     </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="requesteradd1">Address Line 1</label>
      <input type="text" class="form-control" id="requesteradd1" name="requesteradd1" value="<?php if(isset($row['requester_add1'])) { echo $row['requester_add1']; } ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="requesteradd2">Address Line 2</label>
      <input type="text" class="form-control" id="requesteradd2" name="requesteradd2" value="<?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; }?>">
    </div>
   </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="requestercity">City</label>
      <input type="text" class="form-control" id="requestercity" name="requestercity" value="<?php if(isset($row['requester_city'])) {echo $row['requester_city']; }?>">
    </div>
    <div class="form-group col-md-6">
      <label for="requesterzip">Zip</label>
      <input type="text" class="form-control" id="requesterzip" name="requesterzip" value="<?php if(isset($row['requester_zip'])) { echo $row['requester_zip']; } ?>" onkeypress="isInputNumber(event)">
    </div>
   </div>
   <div class="form-row">
    <div class="form-group col-md-8">
      <label for="requesteremail">Email</label>
      <input type="email" class="form-control" id="requesteremail" name="requesteremail" value="<?php if(isset($row['requester_email'])) {echo $row['requester_email']; }?>">
    </div>
    <div class="form-group col-md-4">
      <label for="requestermobile">Mobile</label>
      <input type="text" class="form-control" id="requestermobile" name="requestermobile" value="<?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; }?>" onkeypress="isInputNumber(event)">
    </div>
   </div>
     <div class="form-row">
         <div class="form-group col-md-4">
             <label for="requestdoctype">Document Type</label>
             <input type="text" class="form-control" id="requestdoctype" name="requestdoctype" value="<?php if(isset($row['request_doctype'])) {echo $row['request_doctype']; }?>">
         </div>
         <div class="form-group col-md-4">
             <label for="requestdateissue">Date Issue</label>
             <input type="date" class="form-control" id="requestdateissue" name="requestdateissue" value="<?php if(isset($row['request_dateissue'])) { echo $row['request_dateissue']; } ?>">
         </div>
         <div class="form-group col-md-4">
             <label for="requestdateto">Date To</label>
             <input type="date" class="form-control" id="requestdateto" name="requestdateto" value="<?php if(isset($row['request_dateto'])) { echo $row['request_dateto']; } ?>">
         </div>
     </div>
     <div class="form-row">
         <div class="form-group col-md-4">
             <label for="requestissuedby">Issued By</label>
             <input type="text" class="form-control" id="requestissuedby" name="requestissuedby" value="<?php if(isset($row['request_issuedby'])) {echo $row['request_issuedby']; }?>">
         </div>
         <div class="form-group col-md-8">
             <label for="requestdocnumber">Document Number</label>
             <input type="text" class="form-control" id="requestdocnumber" name="requestdocnumber" value="<?php if(isset($row['request_docnumber'])) {echo $row['request_docnumber']; }?>"  onkeypress="isInputNumber(event)">
         </div>
     </div>
     <div class="form-row">
         <div class="form-group col-md-6">
             <label for="requeststartdate">Trip Start Date</label>
             <input type="date" class="form-control" id="requeststartdate" name="requeststartdate" value="<?php if(isset($row['request_startdate'])) { echo $row['request_startdate']; } ?>">
         </div>
         <div class="form-group col-md-6">
             <label for="requestenddate">Trip End Date</label>
             <input type="date" class="form-control" id="requestenddate" name="requestenddate" value="<?php if(isset($row['request_enddate'])) { echo $row['request_enddate']; } ?>">
         </div>
     </div>

     <div class="form-row">
         <div class="form-group col-md-6">
             <label for="requesterstate">Country of Trip</label>
             <input type="text" class="form-control" id="requesterstate" name="requesterstate" value="<?php if(isset($row['requester_state'])) { echo $row['requester_state']; } ?>">
         </div>
         <div class="form-group col-md-6">
             <label for="requestdesc">Description of Trip</label>
             <input type="text" class="form-control" id="requestdesc" name="requestdesc" value="<?php if(isset($row['request_desc']))echo $row['request_desc']; ?>">
         </div>
     </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="assigntech">Assign to Insurance Agent</label>
      <input type="text" class="form-control" id="assigntech" name="assigntech">
    </div>
    <div class="form-group col-md-6">
      <label for="inputDate">Date</label>
      <input type="date" class="form-control" id="inputDate" name="inputdate">
    </div>
   </div>
   <div class="float-right">
    <button type="submit" class="btn btn-success" name="assign">Assign</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
   </div>
 </form>
 <?php if(isset($msg)){echo $msg; } ?>
</div>
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>