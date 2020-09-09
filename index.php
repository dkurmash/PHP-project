<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/all.min.css">
 <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="css/custom.css">

 <title>DANA'S INSURANCE</title>
</head>
<body>
 <nav class="navbar navbar-expand-sm navbar-dark bg-info pl-5 fixed-top">
  <a href="index.php" class="navbar-brand">DANA'S INSURANCE</a>
  <span class="navbar-text">Customer's Happiness is our Aim</span>
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
   <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="myMenu">
   <ul class="navbar-nav pl-5 custom-nav">
    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
    <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
    <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
    <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
   </ul>
  </div>
 </nav>


 <header class="jumbotron back-image" style="background-image:url(images/2.jpg);">
  <div class="myclass mainHeading">
   <h1 class="text-uppercase text-info font-weight-bold text-center">Welcome to DANA'S INSURANCE</h1>
   <p class="font-italic text-center text-white">Customer's Happiness is our Aim</p>

  </div>
 </header>


 <div class="container">
  <div class="jumbotron">
   <h3 class="text-center">Company Mission</h3>
   <p>
       We work for the happiness of other people and every employee works to get as close to it as possible. Every Manager knows and remembers: We do not sell tours or provide services, we do everything to make people happy with us.
       Our team is united by the goal of helping other people, bringing good to society, the desire to develop and engage in self-education in both professional and spiritual fields.
       Our entire team, with all our heart, wishes each of our clients a wonderful, happy holiday. That is why we solve all issues related to Your trips around the clock and seven days a week. The main principle of our activity is full support of the client by our company's specialists throughout the entire trip, as well as after it.

   </p>
  </div>
 </div>

 <div class="container text-center border-bottom" id="Services">
  <h2>Our Services</h2>
  <div class="row mt-4">
   <div class="col-sm-4 mb-4">
    <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
    <h4 class="mt-4">No Queues</h4>
   </div>
   <div class="col-sm-4 mb-4">
    <a href="#"><i class="fas fa-address-card fa-8x text-primary"></i></a>
    <h4 class="mt-4">Quick Registration</h4>
   </div>
   <div class="col-sm-4 mb-4">
    <a href="#"><i class="fas fa-phone-square-alt fa-8x text-info"></i></a>
    <h4 class="mt-4">Support 24/7</h4>
   </div>
  </div>
 </div>

 <?php include('UserRegistration.php') ?>

 <div class="jumbotron bg-info">
   <div class="container">
    <h2 class="text-center text-white">Happy Customers</h2>
    <div class="row mt-5">
     <div class="col-lg-3 col-sm-6">
      <div class="card shadow-lg mb-2">
       <div class="card-body text-center">
        <img src="images/av1.png" class="img-fluid" style="border-radius:100px;" alt="avt1">
        <h4 class="card-title">Doszhan Kurmash</h4>
        <p class="card-text">Very cool service and maintenance, insurance agents explain everything in detail. Thanks!</p>
       </div>
      </div>
     </div>
     <div class="col-lg-3 col-sm-6">
      <div class="card shadow-lg mb-2">
       <div class="card-body text-center">
        <img src="images/av2.png" class="img-fluid" style="border-radius:100px;" alt="avt2">
        <h4 class="card-title">Kami Adilbayeva</h4>
        <p class="card-text">Very cool service and maintenance, insurance agents explain everything in detail. Thanks!</p>
       </div>
      </div>
     </div>
     <div class="col-lg-3 col-sm-6">
      <div class="card shadow-lg mb-2">
       <div class="card-body text-center">
        <img src="images/av3.png" class="img-fluid" style="border-radius:100px;" alt="avt3">
        <h4 class="card-title">Adelya Abdildina</h4>
        <p class="card-text">Very cool service and maintenance, insurance agents explain everything in detail. Thanks!</p>
       </div>
      </div>
     </div>
     <div class="col-lg-3 col-sm-6">
      <div class="card shadow-lg mb-2">
       <div class="card-body text-center">
        <img src="images/av4.png" class="img-fluid" style="border-radius:100px;" alt="avt4">
        <h4 class="card-title">Alina Tleubayeva</h4>
        <p class="card-text">Very cool service and maintenance, insurance agents explain everything in detail. Thanks!</p>
       </div>
      </div>
     </div>
    </div>
   </div>
 </div>

 <div class="container" id="Contact">
  <h2 class="text-center mb-4">Contact Us</h2>
  <div class="row">
   <div class="container text-center">
    <strong>Headquarter:</strong><br>
    DANA'S INSURANCE<br>
    Zhuldyz-1, 19-12 <br>
    Almaty - 050049 <br>
    Phone: +77073777165<br>
    <a href="#" target="_blank">www.insurance.com</a><br>
    <br> <br>
    <strong>Branch:</strong><br>
       DANA'S INSURANCE<br>
       Altai-4, 14<br>
       Almaty - 050049<br>
       Phone: +77073777165<br>
    <a href="#" target="_blank">www.insurance.com</a><br>
   </div>
  </div>
 </div>


 <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3be540e018a6486705829499417cd66df1355ece78c7db356f624610b21ee3a5&amp;width=100%25&amp;height=300&amp;lang=ru_RU&amp;scroll=true"></script>

 <footer class="container-fluid bg-dark mt-5 text-white">
  <div class="container">
   <div class="row py-3">
    <div class="col-md-6">
     <span class="pr-2">Follow Us: </span>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
    </div>
    <div class="col-md-6 text-right">
     <small>Designed by Dana &copy; 2020</small>
     <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
    </div>
   </div>
  </div>
 </footer>


 <script src="js/jquery.min.js"></script>
 <script src="js/popper.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/all.min.js"></script>
</body>
</html>