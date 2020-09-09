<?php
session_start();
define('TITLE', 'Success');
include('includes/header.php');
include('../dbConnection.php');

if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='RequesterLogin.php'</script>";
}

$sql = "SELECT * FROM custpolicy_tb WHERE id = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    echo "<div class='ml-5 mt-5'>
 <h3 class='text-center'>Customer Bill</h3>
 <table class='table'>
  <tbody>
   <tr>
     <th>Customer ID</th>
     <td>".$row['request_id']."</td>
   </tr>
   <tr>
   <th>Policy</th>
   <td>".$row['cpname']."</td>
  </tr>
   <tr>
    <th>Quantity</th>
    <td>".$row['cpquantity']."</td>
   </tr>
   <tr>
    <th>Price Each</th>
    <td>".$row['cpeach']."</td>
   </tr>
   <tr>
    <th>Total Cost</th>
    <td>".$row['cptotal']."</td>
   </tr>
   <tr>
   <th>Date</th>
   <td>".$row['cpdate']."</td>
  </tr>
   <tr>
    <td><form class='d-print-none'><input class='btn btn-info' type='submit' value='Print' onClick='window.print()'></form></td>
    <td><a href='PolicyRequest.php' class='btn btn-secondary d-print-none'>Close</a></td>
  </tr>
  </tbody>
 </table> </div>
 ";
} else {
    echo "Failed";
}
?>

<?php
include('includes/footer.php');
?>