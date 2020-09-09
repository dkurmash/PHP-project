<?php 
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'</script>";
}

if(isset($_REQUEST['submitrequest'])){

 if(($_REQUEST['requestername'] == "") || ($_REQUEST['requesterlastname'] == "") || ($_REQUEST['requestdateofbirth'] == "") ||
     ($_REQUEST['requesternumber'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") ||
     ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") ||
     ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requestdoctype'] == "") || ($_REQUEST['requestdateissue'] == "")||
     ($_REQUEST['requestdateto'] == "") || ($_REQUEST['requestissuedby'] == "") || ($_REQUEST['requestdocnumber'] == "") ||
     ($_REQUEST['requeststartdate'] == "") || ($_REQUEST['requestenddate'] == "") || ($_REQUEST['requesterstate'] == "") ||
     ($_REQUEST['requestdesc'] == "")){
  $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
 } else {
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

  $sql = "INSERT INTO submitrequest_tb(requester_name, requester_lastname,request_datebirth,requester_number,requester_add1, requester_add2, requester_city, requester_zip, requester_email, requester_mobile, request_doctype,request_dateissue, request_dateto, request_issuedby, request_docnumber, request_startdate, request_enddate, requester_state, request_desc)VALUES('$rname', '$rlname', '$rdateofb', '$rnum','$radd1', '$radd2', '$rcity', '$rzip', '$remail', '$rmobile', '$rdoctype', '$rdateissue','$rdateto','$rissuedby', '$rdocnum', '$rstartdate', '$renddate', '$rstate', '$rdesc')";
  if($conn->query($sql) == TRUE){
    $genid = mysqli_insert_id($conn);
    $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Request Submitted Sucessfully</div>";
    $_SESSION['myid'] = $genid;
    echo "<script> location.href='submitrequestsuccess.php'</script>";
  } else {
    $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Submit Your Request</div>";
  }
 }
}

?>


<div class="col-sm-9 col-md-10 mt-5">
 <form class="mx-5" action="" method="POST">
     <div class="form-row">
         <div class="form-group col-md-6">
             <label for="inputName">FirstName</label>
             <input type="text" class="form-control" id="inputName" placeholder="Dana" name="requestername">
         </div>
         <div class="form-group col-md-6">
             <label for="inputName">LastName</label>
             <input type="text" class="form-control" id="inputName" placeholder="Kurmash" name="requesterlastname">
         </div>
     </div>

     <div class="form-row">
         <div class="form-group col-md-6">
             <label for="inputDate">Date of Birth</label>
             <input type="date" class="form-control" id="inputDate" name="requestdateofbirth">
         </div>
         <div class="form-group col-md-6">
             <label for="inputNumber">Individual identification number</label>
             <input type="text" maxlength="12" class="form-control" id="inputNumber" name="requesternumber" onkeypress="isInputNumber(event)">

         </div>
     </div>
  <div class="form-row">
   <div class="form-group col-md-6">
     <label for="inputAddress">Address Line 1</label>
     <input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" name="requesteradd1">
   </div>
   <div class="form-group col-md-6">
    <label for="inputAddress2">Address Line 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Railway Colony" name="requesteradd2">
   </div>
  </div>
  <div class="form-row">
   <div class="form-group col-md-6">
    <label for="inputCity">City</label>
       <select id="inputCity" class="select form-control" name="requestercity" aria-required="true">
       <option value="Almaty">Almaty</option>
       <option value="Astana">Astana</option>
       <option value="Ust-Kamenogorsk">Ust-Kamenogorsk</option>
       <option value="Shymkent">Shymkent</option>
       <option value="Pavlodar">Pavlodar</option>
       </select>
   </div>
   <div class="form-group col-md-6">
    <label for="inputZip">Zip</label>
    <input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="isInputNumber(event)">
   </div>
  </div>
  <div class="form-row">
   <div class="form-group col-md-6">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control" id="inputEmail" name="requesteremail">
   </div>
   <div class="form-group col-md-6">
    <label for="inputMobile">Mobile</label>
    <input type="text" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)">
   </div>
  </div>

   <div class="form-row">
       <div class="form-group col-md-6">
           <label for="inputDocumentType">Document Type</label>
           <select id="inputDocumentType" class="select form-control" name="requestdoctype" aria-required="true">
               <option value="Passport">Passport</option>
               <option value="Identification Card">Identification Card</option>
               <option value="Birth Сertificate">Birth Certificate</option>
           </select>
       </div>
       <div class="form-group col-md-3">
           <label for="inputDate">Date Issue </label>
           <input type="date" class="form-control" id="inputDate" name="requestdateissue">
       </div>
       <div class="form-group col-md-3">
           <label for="inputDate">Date To</label>
           <input type="date" class="form-control" id="inputDate" name="requestdateto">
       </div>
   </div>
     <div class="form-row">
         <div class="form-group col-md-6">
             <label for="inputIssuedType">Issued By</label>
             <select id="inputIssuedType" class="select form-control" name="requestissuedby" aria-required="true">
                 <option value="Ministry of Internal Affairs">Ministry of Internal Affairs</option>
                 <option value="Ministry of Justice">Ministry of Justice</option>
             </select>
         </div>
         <div class="form-group col-md-6">
             <label for="inputNumber">Document Number</label>
             <input type="text" class="form-control" maxlength="9" id="inputNumber" name="requestdocnumber" onkeypress="isInputNumber(event)">
         </div>
     </div>

     <div class="form-row">
         <div class="form-group col-md-6">
             <label for="inputDate">Trip Start Date </label>
             <input type="date" class="form-control" id="inputDate" name="requeststartdate">
         </div>
         <div class="form-group col-md-6">
             <label for="inputDate">Trip End Date</label>
             <input type="date" class="form-control" id="inputDate" name="requestenddate">
         </div>
     </div>
     <div class="form-row">
     <div class="form-group col-md-6">
         <label for="inputState">Country of Trip</label>
         <select id="inputState"  class="select form-control" name="requesterstate" aria-required="true">
             <option value="USA">USA</option>
             <option value="UK">UK</option>
             <option value="China">China</option>
             <option value="Singapore">Singapore</option>
             <option value="Malaysia ">Malaysia </option>
             <option value="Germany">Germany</option>
             <option value="France ">France </option>
             <option value="Italy ">Italy </option>
             <option value="Japan">Japan</option>
             <option value="UAE ">UAE </option>
             <option value="Bali">Bali </option>
         </select>
     </div>
         <div class="form-group col-md-6">
             <label for="inputRequestDescription">Description of Trip</label>
             <select id="inputRequestDescription"  class="select form-control" name="requestdesc" aria-required="true">
                 <option value="Work">Work</option>
                 <option value="Study">Study</option>
                 <option value="Travel/Leisure">Travel/Leisure</option>
             </select>
         </div>
     </div>

  <button type="submit" class="btn btn-info" name="submitrequest">Submit</button>
  <button type="reset" class="btn btn-secondary">Reset</button>
 </form>
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

