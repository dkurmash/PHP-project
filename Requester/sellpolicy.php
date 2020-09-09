<?php
define('TITLE', 'Sell Policy');
define('PAGE', 'PolicyRequest');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='RequesterLogin.php'</script>";
}

     if(isset($_REQUEST['psubmit'])) {
         if (($_REQUEST['checkid'] == "") || ($_REQUEST['pname'] == "") || ($_REQUEST['pquantity'] == "") || ($_REQUEST['psellingcost'] == "") || ($_REQUEST['selldate'] == "")) {
             $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';

         } else {

             $check = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
             $result = $conn->query($check);
             $row = $result->fetch_assoc();
             if (($row['request_id'] == $_REQUEST['checkid'])) {

                 $pid = $_REQUEST['pid'];
                 $pava = $_REQUEST['pava'] - $_REQUEST['pquantity'];
                 $checkid = $_REQUEST['checkid'];
                 $cpname = $_REQUEST['pname'];
                 $cpquantity = $_REQUEST['pquantity'];
                 $cpeach = $_REQUEST['psellingcost'];
                 $cptotal = $_REQUEST['pquantity'] * $_REQUEST['psellingcost'];
                 $cpdate = $_REQUEST['selldate'];
                 $sql = "INSERT INTO custpolicy_tb (request_id, cpname, cpquantity, cpeach, cptotal, cpdate) VALUES ('$checkid', '$cpname', '$cpquantity', '$cpeach', '$cptotal', '$cpdate')";
                 if ($conn->query($sql) == TRUE) {
                     $genid = mysqli_insert_id($conn);
                     session_start();
                     $_SESSION['myid'] = $genid;
                     echo "<script> location.href='policysuccess.php'; </script>";
                     echo "Added";
                 }

                 $sqlup = "UPDATE policies_tb SET pava = '$pava' WHERE pid = '$pid'";
                 $conn->query($sqlup);
             }
             else $msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Your Request is not assigned yet!</div>';
         }
     }

?>

    <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Customer Bill</h3>
        <?php
        if(isset($_REQUEST['issue'])){
            $sql = "SELECT * FROM policies_tb WHERE pid = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
        ?>
        <form action="" method="POST" oninput="totalcost.value = parseInt(pquantity.value) * parseInt(psellingcost.value)">
            <div class="form-group">
                <label for="pid">Policy ID</label>
                <input type="text" class="form-control" id="pid" name="pid" value="<?php if(isset($row['pid'])) {echo $row['pid']; }?>" readonly>
            </div>
            <div class="form-group">
                <label for="checkid">Customer ID</label>
                <input type="text" class="form-control" id="checkid" name="checkid" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="pname">Insurance Policy Name</label>
                <input type="text" class="form-control" id="pname" name="pname" value="<?php if(isset($row['pname'])) {echo $row['pname']; }?>">
            </div>
            <div class="form-group">
                <label for="pava">Available</label>
                <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)" value="<?php if(isset($row['pava'])) {echo $row['pava']; }?>" readonly>
            </div>
            <div class="form-group">
                <label for="pquantity">Quantity</label>
                <input type="number" min="1" value="1" class="form-control" id="pquantity" name="pquantity" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="psellingcost">Price Each (Tenge)</label>
                <input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)" value="<?php if(isset($row['psellingcost'])) {echo $row['psellingcost']; }?>">
            </div>
            <div class="form-group" >
                <label for="totalcost">Total Price (Tenge)</label>
                <output type="text" class="form-control" id="totalcost" name="totalcost" oninput="totalcost.value = parseInt(pquantity.value) * parseInt(psellingcost.value)" ></output>
            </div>
            <div class="form-group col-md-4">
                <label for="inputDate">Date</label>
                <input type="date" class="form-control" id="inputDate" name="selldate">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-info" id="psubmit" name="psubmit">Submit</button>
                <a href="PolicyRequest.php" class="btn btn-secondary">Close</a>
            </div>
            <?php if(isset($msg)) {echo $msg; } ?>
        </form>
    </div>

    <script  type="text/javascript">
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

