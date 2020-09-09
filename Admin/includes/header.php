<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title><?php echo TITLE ?></title>

 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <link rel="stylesheet" href="../css/all.min.css">
 <link rel="stylesheet" href="../css/custom.css"> 
</head>
<body>

  <nav class="navbar navbar-dark fixed-top bg-info flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">DANA'S INSURANCE</a></nav>

 <div class="container-fluid" style="margin-top:40px;">
  <div class="row">
   <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
    <div class="sidebar-sticky">
     <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'dashboard'){echo 'active';} ?>" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'orders'){echo 'active';} ?>" href="work.php"><i class="fab fa-accessible-icon"></i>Orders</a></li>
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'customer'){echo 'active';} ?>" href="request.php"><i class="fas fa-align-center"></i>Customers</a></li>
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'policies'){echo 'active';} ?>" href="policies.php"><i class="fas fa-database"></i>Policies</a></li>
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'agents'){echo 'active';} ?>" href="employee.php"><i class="fab fa-teamspeak"></i>Insurance Agents</a></li>
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'users'){echo 'active';} ?>" href="requester.php"><i class="fas fa-users"></i>Users</a></li>
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'sellreport'){echo 'active';} ?>" href="soldproductreport.php"><i class="fas fa-table"></i>Sell Report</a></li>
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'workreport'){echo 'active';} ?>" href="workreport.php"><i class="fas fa-table"></i>Work Report</a></li>
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'changepass'){echo 'active';} ?>" href="changepass.php"><i class="fas fa-key"></i>Change Password</a></li>
      <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
     </ul>
    </div>
   </nav>