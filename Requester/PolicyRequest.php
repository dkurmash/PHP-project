<?php
define('TITLE', 'Policy Request');
define('PAGE', 'PolicyRequest');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='RequesterLogin.php'</script>";
}
?>

<div class="col-sm-9 col-md-10 mt-5 text-center">
 <p class="bg-dark text-white p-2">Policies Details</p>
 <?php
  $sql = "SELECT * FROM policies_tb";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
   echo '<table class="table">';
    echo '<thead>';
     echo '<tr>';
      echo '<th scope="col">Policy ID</th>';
      echo '<th scope="col">Name</th>';
      echo '<th scope="col">Available</th>';
      echo '<th scope="col">Selling Cost Each</th>';
      echo '<th scope="col">Action</th>';
     echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
     while($row = $result->fetch_assoc()){
      echo '<tr>';
       echo '<td>'.$row["pid"].'</td>';
       echo '<td>'.$row["pname"].'</td>';
       echo '<td>'.$row["pava"].'</td>';
       echo '<td>'.$row["psellingcost"].'</td>';
       echo '<td>';
       echo '<form action="sellpolicy.php" class="d-inline" method="POST">';
         echo '<input type="hidden" name="id" value='.$row["pid"].'><button type="submit" class="btn btn-warning mr-3" name="issue" value="Issue"><i class="fas fa-handshake"></i></button>';
        echo '</form>';
       echo '</td>';
      echo '</tr>';
     }
    echo '</tbody>';
   echo '</table>';
  } else {
   echo '0 Result';
  }
 ?>
</div>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
 </body>
</html>